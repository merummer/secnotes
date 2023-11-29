<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(){

        $attributes = request()->validate([
            'name'=> 'required|max:200', //title entspricht dem Title bei name im form
            'email'=>'required|min:2|max:255',
             'password'=>'required|min:2|max:255'
        ]);

        auth()->notes()->create($attributes);

        return back()->with('success', 'Saved');
    }
}
