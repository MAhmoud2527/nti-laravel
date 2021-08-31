<?php

namespace App\Http\Controllers;

use App\Models\tasks;
use Illuminate\Http\Request;

class TasksControllers extends Controller
{
    public function addView()
    {
        return view('taskForm');
    }

    // Select Function
    public function display()
    {
        $data = tasks::get();
        return view('displayTask', ['data' => $data]);
    }

    // Inseart Function
    public function addTask(Request $request)
    {
        $data = $this->validate(request(), [
            'name' => 'required',
            'content' => 'required',
            'startDate' => 'required|date',
            'endDate' => 'required|date'
        ]);
        $op = tasks::create($data);
        if ($op) {
            return redirect(url('displaytask'));
        }
    }
    // Delete Function
    public function distory($id)
    {
        tasks::where('id', $id)->delete();
        return redirect(url('displaytask'));
    }


    public function edit($id)
    {
        $data = tasks::where('id', $id)->get();
        return view('editTask', ['data' => $data]);
    }
    public function update(Request $request)
    {
        $data = $this->validate(request(), [
            'name' => 'required',
            'content' => 'required',
            'startDate' => 'required|date',
            'endDate' => 'required|date'
        ]);
        $op = tasks::where('id', $request->id)->update($data);
        if ($op) {
            // return back();
            return redirect(url('displaytask'));
        }
    }
}
