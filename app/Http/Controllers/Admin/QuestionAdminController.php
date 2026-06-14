<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuestionAdminController extends Controller
{
    public function index(Quiz $quiz)
{
    $quiz->load(['questions.options' => function ($q) {
        $q->orderBy('option_label');
    }]);

    return view('guru.questions.index', compact('quiz'));
}

public function create(Quiz $quiz)
{
    $nomorSoal = $quiz->questions()->count() + 1; 
    return view('guru.questions.create', compact('quiz', 'nomorSoal'));}

public function edit(Quiz $quiz, Question $question)
{
    if ($question->quiz_id !== $quiz->id) abort(404);

    $question->load('options');

    return view('guru.questions.edit', compact('quiz', 'question'));
}

    public function store(Request $request, Quiz $quiz)
    {
        $data = $request->validate([
            'question_text' => 'required|string',
            'order_no' => 'nullable|integer|min:1',

            // sekarang 5 opsi
            'options' => 'required|array|size:5',
            'options.*.label' => 'required|string|max:2',
            'options.*.text' => 'required|string',

            'correct_label' => 'required|string|max:2',
            'question_image' => 'nullable|image|mimes:jpeg,png,gif,webp|max:2048',
        ]);

        // (opsional) validasi label hanya A-E
        $validLabels = ['A','B','C','D','E'];

        foreach ($data['options'] as $opt) {
            if (!in_array(strtoupper($opt['label']), $validLabels)) {
                return back()->withErrors(['options' => 'Label opsi harus A, B, C, D, atau E']);
            }
        }

        if (!in_array(strtoupper($data['correct_label']), $validLabels)) {
            return back()->withErrors(['correct_label' => 'Jawaban benar harus A, B, C, D, atau E']);
        }

        $imagePath = null;
        if ($request->hasFile('question_image')) {
            $imagePath = $request->file('question_image')
                                ->store('question_images', 'public');
        }

        $q = $quiz->questions()->create([
            'question_text'  => $data['question_text'],
            'order_no'       => $data['order_no'] ?? ($quiz->questions()->count() + 1),
            'question_image' => $imagePath, 
        ]);

        foreach ($data['options'] as $opt) {
            $label = strtoupper($opt['label']);

            $q->options()->create([
                'option_label' => $label,
                'option_text' => $opt['text'],
                'is_correct' => ($label === strtoupper($data['correct_label'])),
            ]);
        }

        return redirect()
            ->route('guru.questions.index', $quiz->id)
            ->with('success', 'Soal berhasil ditambah.');
    }

    public function update(Request $request, Quiz $quiz, Question $question)
    {
        if ($question->quiz_id !== $quiz->id) abort(404);

        $data = $request->validate([
            'question_text' => 'required|string',
            'order_no' => 'nullable|integer|min:1',

            // sekarang 5 opsi
            'options' => 'required|array|size:5',
            'options.*.id' => 'required|integer',
            'options.*.label' => 'required|string|max:2',
            'options.*.text' => 'required|string',

            'correct_label' => 'required|string|max:2',
            'question_image' => 'nullable|image|mimes:jpeg,png,gif,webp|max:2048',
        ]);

        $validLabels = ['A','B','C','D','E'];

        foreach ($data['options'] as $opt) {
            if (!in_array(strtoupper($opt['label']), $validLabels)) {
                return back()->withErrors(['options' => 'Label opsi harus A, B, C, D, atau E']);
            }
        }

        if (!in_array(strtoupper($data['correct_label']), $validLabels)) {
            return back()->withErrors(['correct_label' => 'Jawaban benar harus A, B, C, D, atau E']);
        }

        if ($request->hapus_gambar && $question->question_image) {
            Storage::disk('public')->delete($question->question_image);
            $question->question_image = null;
        }

        if ($request->hasFile('question_image')) {
            if ($question->question_image) {
                Storage::disk('public')->delete($question->question_image);
            }
            $question->question_image = $request->file('question_image')
                                                ->store('question_images', 'public');
        }

        $question->update([
            'question_text'  => $data['question_text'],
            'order_no'       => $data['order_no'] ?? $question->order_no,
            'question_image' => $question->question_image, // ← TAMBAHKAN
        ]);

        foreach ($data['options'] as $opt) {
            $label = strtoupper($opt['label']);

            $question->options()
                ->where('id', $opt['id'])
                ->update([
                    'option_label' => $label,
                    'option_text' => $opt['text'],
                    'is_correct' => ($label === strtoupper($data['correct_label'])),
                ]);
        }

        return redirect()
            ->route('guru.questions.index', $quiz->id)
            ->with('success', 'Soal berhasil diedit.');
    }

    public function destroy(Quiz $quiz, Question $question)
    {
        if ($question->quiz_id !== $quiz->id) abort(404);

        $question->delete();
        return redirect()
            ->route('guru.questions.index', $quiz->id)
            ->with('success', 'Soal berhasil dihapus.');
    }
}
