<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coachs= Coach::all();
        return view('admin.coachs',compact('coachs'));
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
        Coach::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'number' => $request->number,
            'zipcode' => $request->zipcode,
            'email' => $request->email,
            'distance' => $request->distance,
            'type' => $request->type,

        ]);
        return redirect('/join-mentor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function show(Coach $coach)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coach =  Coach::findorfail($id);
        $coach->status = True;
        $coach->save();
        return redirect(route('coach.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        /*$coach =  Coach::findorfail($id);
        $coach->status = True;
        $coach->save();
        return redirect(route('coach.index'));*/
        return "ok";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coach =  Coach::findorfail($id);
        if ($coach) {


            // Delete the record from the database
            $coach->delete();

            // Optionally, you can display a success message or perform any additional actions
            return redirect(route('coach.index'));
        } else {
            // Event not found, handle the error accordingly
            return redirect()->back();
        }
    }
}
