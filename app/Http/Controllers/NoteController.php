<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

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
        if(!Gate::allows('change-note', $note)){
            abort(Response::HTTP_FORBIDDEN);
        }

        $note->delete();
        return back()->with('success','Your note has been deleted');
    }

    public function update(Note $note){
        if(!Gate::allows('change-note', $note)){
            abort(Response::HTTP_FORBIDDEN);
        }
        $attributes = request()->validate([
            'title'=> 'required|max:200',
            'content'=>'required|min:1|max:255'
        ]);
        $note->update($attributes);
        return back()->with('success', 'Saved');
    }
    public function edit(Note $note){
        if(!Gate::allows('change-note', $note)){
            abort(Response::HTTP_FORBIDDEN);
        }
        return view('notes.edit', ['note'=>$note]);
    }

    public function show(Note $note) {

        if(!Gate::allows('change-note', $note)){
            abort(Response::HTTP_FORBIDDEN);
        }

        return view('notes.show', [
            'note' => $note
        ]);
    }
    public function fav(Note $note){
        if(!Gate::allows('change-note', $note)){
            abort(Response::HTTP_FORBIDDEN);
        }
        $note->favorite = !$note->favorite;
        $note->update();
        return back()->with('success', 'YA');


    }
}
