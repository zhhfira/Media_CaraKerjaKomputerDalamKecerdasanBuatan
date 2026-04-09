<?php

namespace App\Http\Controllers;

use App\Models\AttemptAnswer;
use App\Models\Option;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use App\Services\GamificationService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;

class QuizController extends Controller
{
    public function show(Quiz $quiz)
    {
    $quiz->load(['questions.options' => function ($q) {
        $q->orderBy('option_label');
    }]);

    // ambil attempt TERAKHIR saja
    $attempt = QuizAttempt::where('user_id', auth()->id())
                ->where('quiz_id', $quiz->id)
                ->latest()
                ->first();
   $nextQuiz = Quiz::where('id', '>', $quiz->id)
                    ->orderBy('id')
                    ->first();

    $prevQuiz = Quiz::where('id', '<', $quiz->id)
                    ->orderByDesc('id')
                    ->first();

    return view('quiz.quiz1', compact(
        'quiz',
        'attempt',
        'nextQuiz',
        'prevQuiz'
    ));
    }
public function submit(Request $request, Quiz $quiz)
{
    $data = $request->validate([
        'answers' => 'nullable|array',
        'spent_seconds' => 'nullable|integer|min:0',
    ]);

    $quiz->load('questions.options');

    $total = $quiz->questions->count();
    $correct = 0;

    $attempt = QuizAttempt::create([
        'quiz_id' => $quiz->id,
        'user_id' => auth()->id(),
        'student_name' => auth()->user()->username,
        'started_at' => now()->subSeconds($request->integer('spent_seconds', 0)),
        'finished_at' => now(),
        'total_questions' => $total,
    ]);

    foreach ($quiz->questions as $question) {
        $pickedOptionId = $data['answers'][$question->id] ?? null;

        if ($pickedOptionId) {
            $isCorrect = Option::where('id', $pickedOptionId)
                ->where('question_id', $question->id)
                ->where('is_correct', 1)
                ->exists();

            if ($isCorrect) $correct++;
        }
    }

    $score = $correct * (int)$quiz->points_per_question;

    $attempt->update([
        'correct_count' => $correct,
        'score' => $score,
    ]);

    $gamification = new GamificationService();
    $newBadge = $gamification->handle(auth()->user(), $quiz->id, $score);
    
    return response()->json([
        'score' => $score,
        'correct' => $correct,
        'total' => $total,
        'message' => 'Submit berhasil',
        'new_badge' => $newBadge ? [
                'name'  => $newBadge->name,
                'image' => $newBadge->image,
            ] : null,
    ]);
}
}
