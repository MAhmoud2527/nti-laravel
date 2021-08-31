<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\students;

class UserControllers extends Controller
{
    public function getView()
    {
        return view('user');
    }
    public function display()
    {
        $data = students::get();
        return view('userIndex', ['data' => $data]);
    }

    public function saveData(Request $request)
    {

        $data = $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|max:10',
        ]);

        $data['password'] = bcrypt($request->password);
        $op = students::create($data);
        if ($op) {
            return back();
        }
    }
    public function distory($id)
    {
        students::where('id', $id)->delete();
        return back();
    }
}
