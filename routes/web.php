<?php

use App\Task;
use Illuminate\Http\Request;

//Event::listen('eloquent.created: App\Task', function () {
//    dd('Sending push message');
//});


/**
 * Вывести панель с задачами
 */
Route::get('/', function () {

    $tasks = Task::orderBy('created_at', 'asc')->paginate(5);

    return view('tasks', [
        'tasks' => $tasks
    ]);
});

/**
 * Добавить новую задачу
 */
Route::post('/task', function (Request $request) {

    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }


    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
});

/**
 * Удалить задачу
 */

Route::delete('/task/{task}', function (Task $task) {
    $task->delete();

    return redirect('/');
});