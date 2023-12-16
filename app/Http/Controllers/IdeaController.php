<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store() {

        request()->validate([
            'idea' => 'required|min:3|max:240',
        ]);

        $idea = new Idea([
            'content' => request()->get('idea', ''),
        ]);
        $idea->save();

        return redirect()->route('dashboard')->with('success', 'Idea was created successfully!');
    }
}
