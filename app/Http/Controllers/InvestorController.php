<?php

namespace App\Http\Controllers;

use App\Models\Investor;
use Illuminate\Http\Request;

class InvestorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $investors= Investor::all();
        return view('admin.investors',compact('investors'));
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
        Investor::create([
            'name' => $request->name,
            'linkedin' => $request->linkedin,
            'number' => $request->number,
            'where' => $request->where,
            'email' => $request->email,
            'industries' => $request->industries,
            'type' => $request->type,
            'region' => $request->region,
            'how_much' => $request->how_much,
            'how_many' => $request->how_many,
            'note' => $request->note,
        ]);
        return redirect('/join-investor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function show(Investor $investor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $investor =  Investor::findorfail($id);
        $investor->status = True;
        $investor->save();
        return redirect(route('investor.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Investor $investor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $investor =  Investor::findorfail($id);
        if ($investor) {


            // Delete the record from the database
            $investor->delete();

            // Optionally, you can display a success message or perform any additional actions
            return redirect(route('investor.index'));
        } else {
            // Event not found, handle the error accordingly
            return redirect()->back();
        }
    
    }
}
