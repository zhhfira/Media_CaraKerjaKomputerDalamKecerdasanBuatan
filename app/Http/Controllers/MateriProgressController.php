<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MateriProgress;
use Illuminate\Support\Facades\Auth;

class MateriProgressController extends Controller
{
    public function markRead(Request $request)
    {
        $request->validate(['materi_key' => 'required|string']);

        MateriProgress::updateOrCreate(
            ['user_id' => Auth::id(), 'materi_key' => $request->materi_key],
            ['is_read' => true]
        );

        return response()->json(['success' => true]);
    }
}