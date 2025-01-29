<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;


Route::get('/', function () {
    return view('welcome'); });



Route::get('/blog', [BlogPostController::class, 'index']);
Route::get('/blog/create', [BlogPostController::class, 'create']);
Route::post('/blog', [BlogPostController::class, 'store']);
Route::get('/blog/{id}/edit', [BlogPostController::class, 'edit']);
Route::put('/blog/{id}', [BlogPostController::class, 'update']);
Route::delete('/blog/{id}', [BlogPostController::class, 'destroy']);
Route::post('/blog/{id}/toggle', [BlogPostController::class, 'togglePublish']);

