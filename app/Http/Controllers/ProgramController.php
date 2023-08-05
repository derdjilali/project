<?php

namespace App\Http\Controllers;

use App\Models\program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::all();
        return view('admin.programs',compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_program');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Program::create([
            'title' => $request->title,
            'sub_title' => $request->subtitle,
            'desciprtion' => $request->desc,
        ]);
        return redirect(route('programs.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(program $program)
    {
        $edit_program = Program::findorfail($program->id);
        return view('admin.edit_program', compact('edit_program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, program $program)
    {
        $program->title = $request->title;
        $program->desciprtion = $request->desc;
        $program->sub_title = $request->subtitle;
        $program->save();
        return redirect(route('programs.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program =  Program::findorfail($id);
        Program::destroy($id);
        return redirect(route('programs.index'));
    }
}
