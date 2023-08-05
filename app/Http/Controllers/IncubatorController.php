<?php

namespace App\Http\Controllers;

use App\Models\incubator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class IncubatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incubators = incubator::all();
        return view('admin.incubators', compact('incubators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_incubator');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('picture')) {
            $imageName = $request->file('picture')->getClientOriginalName();
            $image = $request->file('picture')->storeAs('./incubators',$imageName,'pictures');
            Incubator::create([
                 'name' => $request->name,
                 'wilaya' => $request->wilaya,
                 'desc' => $request->desc,
                 'photo' => $imageName,
             ]);
        }
         return redirect(route('incubator.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\incubator  $incubator
     * @return \Illuminate\Http\Response
     */
    public function show(incubator $incubator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\incubator  $incubator
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_incubator = incubator::findorfail($id);
        return view('admin.edit_incubator', compact('edit_incubator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\incubator  $incubator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, incubator $incubator)
    {
        $incubator->name = $request->name;
        $incubator->wilaya = $request->wilaya;
        $incubator->desc = $request->desc;

        if ($request->hasFile('picture')) {
            $imagePath = 'incubators/' . $incubator->photo;

            // Delete the file from the 'pictures' disk
            Storage::disk('pictures')->delete($imagePath);

            // Delete the file from the default disk (e.g., 'public')
            Storage::delete($imagePath);

            $imageName = $request->file('picture')->getClientOriginalName();
            $image = $request->file('picture')->storeAs('./incubators',$imageName,'pictures');
            $incubator->photo = $imageName;
        }
        $incubator->save();


        return redirect(route('incubator.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\incubator  $incubator
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $incubator =  incubator::findorfail($id);
        if ($incubator) {
            $imagePath = 'incubators/' . $incubator->photo;

            // Delete the file from the 'pictures' disk
            Storage::disk('pictures')->delete($imagePath);

            // Delete the file from the default disk (e.g., 'public')
            Storage::delete($imagePath);

            // Delete the record from the database
            $incubator->delete();

            // Optionally, you can display a success message or perform any additional actions
            return redirect(route('incubator.index'));
        } else {
            // Event not found, handle the error accordingly
            return redirect()->back()->with('error', 'Event not found.');
        }
    }
}
