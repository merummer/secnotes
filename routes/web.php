<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/notes', function(){
    $notes=Auth::user()->notes->sortby([
        ['favorite', 'desc'],
        ['title', 'asc']
    ]);
    $notes=null;
    if (Auth::user()->role == true){
        $notes=Note::all();
    }
    else{
        $notes=Auth::user()->notes->sortby([
            ['favorite', 'desc'],
            ['title', 'asc']
        ]);
    }
    return view('notes.index', ['notes'=>$notes]);

})  ->name('notes.index')
    ->middleware(['auth', 'verified'])
;

Route::post('/users', [UserController::class, 'store']);

Route::post('/notes', [NoteController::class, 'store'])->middleware(['auth']);

Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->middleware(['auth']);

Route::patch('/notes/{note}/favorite',[NoteController::class, 'fav']);

Route::patch('/notes/{note}/copy',[NoteController::class, 'copy']);

Route::get('/notes/{note:id}/show', [NoteController::class, 'show'])
    ->middleware(['auth']);

Route::patch('/notes/{note}', [NoteController::class, 'update'])->middleware(['auth']); //patch hängt mit ändern zusammen

Route::get('/notes/{note:id}/edit', [NoteController::class, 'edit'])->middleware(['auth'])->name('notes.edit');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




