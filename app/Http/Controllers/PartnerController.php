<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners= Partner::all();
        return view('admin.partners',compact('partners'));
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
        Partner::create([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'company' => $request->company_name,
            'company_site' => $request->company_site,
            'job' => $request->job,
            'desc' => $request->desc,
        ]);
        return redirect('/join-partner');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partner =  Partner::findorfail($id);
        $partner->status = True;
        $partner->save();
        return redirect(route('partner.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partner =  Partner::findorfail($id);
        if ($partner) {


            // Delete the record from the database
            $partner->delete();

            // Optionally, you can display a success message or perform any additional actions
            return redirect(route('partner.index'));
        } else {
            // Event not found, handle the error accordingly
            return redirect()->back();
        }
    }
}
