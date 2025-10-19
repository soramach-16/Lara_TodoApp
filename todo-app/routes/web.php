<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FolderController;

Route::get("/folders/{id}/tasks", [TaskController::class, "index"])->name("tasks.index");
Route::get('/folders/create', [FolderController::class,"showCreateForm"])->name('folders.create');
Route::post('/folders/create', [FolderController::class,"create"]);
Route::get('/folders/{id}/tasks/create', [TaskController::class,"showCreateForm"])->name('tasks.create');
Route::post('/folders/{id}/tasks/create', [TaskController::class,"create"]);
Route::get('/folders/{id}/tasks/{task_id}/edit', [TaskController::class,"showEditForm"])->name('tasks.edit');
Route::post('/folders/{id}/tasks/{task_id}/edit', [TaskController::class,"edit"]);
Route::get('/folders/{id}/tasks/{task_id}/delete', [TaskController::class,"showDeleteForm"])->name('tasks.delete');
Route::post('/folders/{id}/tasks/{task_id}/delete', [TaskController::class,"delete"]);