<?php

use App\Http\Controllers\Controleur;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [Controleur::class,'index'])->name('index');

Route::get('/page_secondaire', [Controleur::class,'page_secondaire'])->name('page_secondaire');

Route::post('/ajouter_premiere_lettre',[Controleur::class,'ajouter_premiere_lettre'])->name('ajouter_premiere_lettre');

Route::post('/ajouter_lettre',[Controleur::class,'ajouter_lettre'])->name('ajouter_lettre');
