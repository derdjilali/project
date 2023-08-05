<?php

namespace App\Http\Controllers;

use App\Models\domicilation;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;


class DomicilationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domicilations = domicilation::all();
        return View('admin.domicilation', compact('domicilations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('domicilation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        domicilation::create([
            'name' => $request->name,
            'email' => $request->email,
            'desc' => $request->desc,
            'number' => $request->number,
            'birthday' => $request->birthday,
            'wilaya' => $request->wilaya,
            'have_a_label'=>$request->label,
            'label' => $request->idea,
        ]);
        return redirect(route('domicilation.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\domicilation  $domicilation
     * @return \Illuminate\Http\Response
     */
    public function show(domicilation $domicilation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\domicilation  $domicilation
     * @return \Illuminate\Http\Response
     */
    public function edit(domicilation $domicilation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\domicilation  $domicilation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, domicilation $domicilation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\domicilation  $domicilation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = domicilation::findOrFail($id);

        $item->delete();


        return redirect(route('domicilation.index'));
    }
}
