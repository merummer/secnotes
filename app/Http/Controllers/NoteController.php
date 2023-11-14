<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function store(){
        $attributes = request()->validate([
            'title'=> 'required|max:200', //title entspricht dem Title bei name im form
            'content'=>'required|min:2|max:255'
        ]);

        auth()->user()->notes()->create($attributes); //ich nehme die validierten Daten her

        return back()->with('success', 'Saved');
    }

    public function destroy(Note $note){
        $note->delete();
        return back()->with('success','Your note has been deleted');
    }

    public function update(Note $note){
        $attributes = request()->validate([
            'title'=> 'required|max:200',
            'content'=>'required|min:1|max:255'
        ]);
        $note->update($attributes);
        return back()->with('success', 'Saved');
    }
    public function edit(Note $note){
        return view('notes.edit', ['note'=>$note]);
    }

    public function show(Note $note) {

        return view('notes.show', [
            'note' => $note
        ]);
    }
}
