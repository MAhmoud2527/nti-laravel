<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserControllers extends Controller
{
    public function getView()
    {
        return view('user');
    }
    public function saveData(Request $request)
    {
        $errors = [];
        if ($request->isMethod('POST')) {
            $name = $request->name;
            $email = $request->email;
            $password = $request->password;
            if (empty($name)) {
                $errors = ['Name filed is Required'];
            } elseif (!filter_var($name, FILTER_SANITIZE_STRING)) {
                $errors['name'] = "Name Must be a String";
            }
            if (empty($email)) {
                $errors = ['Email filed is Required'];
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['name'] = "Email Filed Must Be a Valid Email";
            }
            if (empty($password)) {
                $errors = ['Password filed is Required'];
            } elseif (strlen($password) < 6) {
                $errors = ['Password must be more than 6 chars'];
            }
            if (empty($errors)) {
                return view('userProfile', ['name' => $name, 'email' => $email, 'password' => $password]);
            } else {
                return  $errors;
            }
        }
    }
}
