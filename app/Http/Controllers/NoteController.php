<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function store(){
        $attributes = request()->validate([
            'title'=> 'required|max:200', //title entspricht dem Title bei name im form
            'content'=>'required|min:2|max:255'
        ]);

        auth()->user()->notes()->create($attributes);

        return back()->with('success', 'Saved');
    }
}
