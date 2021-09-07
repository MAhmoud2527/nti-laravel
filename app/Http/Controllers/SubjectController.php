<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subject;


class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = subject::paginate(5);
        return view('subject.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $this->validate(request(), [
            'title' => 'required',
            'content' => 'required',
            'startDate' => 'required|date',
            'endDate' => 'required|date',
            'teacherName' => 'required',
            'code' => 'required',
        ]);
        $op = subject::create($data);
        if ($op) {
            $message = 'One Row Inserted';
        } else {
            $message = 'Error try again';
        }
        session()->flash('Message', $message);
        return redirect(url('subject'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = subject::where('id', $id)->get();
        return view('subject.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $data = $this->validate(request(), [
            'title' => 'required',
            'content' => 'required',
            'startDate' => 'required|date',
            'endDate' => 'required|date',
            'teacherName' => 'required',
            'code' => 'required'
        ]);
        $op = subject::where('id', $request->id)->update($data);
        if ($op) {
            $message = 'One Row Updated';
        } else {
            $message = 'Error try again';
        }
        session()->flash('Message', $message);
        return redirect(url('subject'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $op =  subject::where('id', $id)->delete();
        if ($op) {
            $message = 'One Row Deleted';
        } else {
            $message = 'Error try again';
        }
        session()->flash('Message', $message);
        return redirect(url('subject'));
    }
}
