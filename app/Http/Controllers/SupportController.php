<?php

namespace App\Http\Controllers;

use App\Models\support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $msgs= Support::all();
        return view('admin.msg_support',compact('msgs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Support::create([
            'name' => $request->name,
            'number' => $request->number,
            'email' => $request->email,

            'message' => $request->msg,
        ]);
        return redirect('/support');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\support  $support
     * @return \Illuminate\Http\Response
     */
    public function show(support $support)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\support  $support
     * @return \Illuminate\Http\Response
     */
    public function edit(support $support)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\support  $support
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, support $support)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\support  $support
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $msg =  Support::findorfail($id);
        if ($msg) {


            // Delete the record from the database
            $msg->delete();

            // Optionally, you can display a success message or perform any additional actions
            return redirect(route('supportmsg.index'));
        } else {
            // Event not found, handle the error accordingly
            return redirect()->back();
        }
    }
}
