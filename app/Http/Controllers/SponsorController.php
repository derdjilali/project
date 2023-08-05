<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsors= Sponsor::all();
        return view('admin.sponsors',compact('sponsors'));
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
        Sponsor::create([
            'bus_name' => $request->bus_name,
            'contact' => $request->contact,
            'number' => $request->number,
            'company' => $request->company,
            'email' => $request->email,
            'level' => $request->level,
            'type' => $request->type,
            'comment' => $request->comment,
        ]);
        return redirect('/join-sponsor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function show(Sponsor $sponsor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sponsor =  Sponsor::findorfail($id);
        $sponsor->status = True;
        $sponsor->save();
        return redirect(route('sponsor.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sponsor $sponsor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sponsor =  Sponsor::findorfail($id);
        if ($sponsor) {


            // Delete the record from the database
            $sponsor->delete();

            // Optionally, you can display a success message or perform any additional actions
            return redirect(route('investor.index'));
        } else {
            // Event not found, handle the error accordingly
            return redirect()->back();
        }
    }
}
