<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(int $id){
        $folders = Folder::all();

        $folder = Folder::find($id);

        $tasks = Task::where('folder_id', $folder->id)->get();

        return view("tasks/index",[
            'folders' => $folders,
            'folder_id' => $folder->id,
            'tasks' => $tasks
        ]);
    }
}
