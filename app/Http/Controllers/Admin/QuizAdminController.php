<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizAdminController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::orderBy('id', 'asc')->get();
        return view('guru.quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        return view('guru.quizzes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'duration_minutes' => 'required|integer|min:1|max:300',
            'kkm' => 'required|integer|min:0|max:100',
        ]);

        $quiz = Quiz::create($data);

        return redirect()->route('guru.quizzes.edit', $quiz->id)
            ->with('success', 'Quiz berhasil dibuat.');
    }

    public function edit(Quiz $quiz)
    {
        $quiz->load('questions.options');
        return view('guru.quizzes.edit', compact('quiz'));
    }

    public function update(Request $request, Quiz $quiz)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'duration_minutes' => 'required|integer|min:1',
        'kkm' => 'required|integer|min:0|max:100',
    ]);

    $quiz->update($data);

    return redirect()->route('guru.quizzes.index')->with('success', 'Kuis berhasil diedit.');
}


    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('guru.quizzes.index')->with('success', 'Kuiz berhasil dihapus.');
    }
}
