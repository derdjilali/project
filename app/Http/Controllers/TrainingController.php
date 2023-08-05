<?php

namespace App\Http\Controllers;

use App\Models\training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainings = training::all();
        return view('admin.training', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_training');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('cover_img')) {
            $imageName = $request->file('cover_img')->getClientOriginalName();
            $image = $request->file('cover_img')->storeAs('./trainings', $imageName, 'pictures');
            Training::create([
                'title' => $request->title,
                'desc' => $request->title,
                'location' => $request->location,
                'diration' => $request->diration,
                'start_on' => $request->start_on,
                'cover_img' => $imageName,
                'cover_title' => $request->cover_title,
                'goals' => $request->goals,
                'training_for' => $request->training_for,
                'how_learn' => $request->how_learn
            ]);
        }
        return redirect(route('trainings.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\training  $training
     * @return \Illuminate\Http\Response
     */
    public function show(training $training)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit(training $training)
    {
        $edit_training = training::findorfail($training->id);
        return view('admin.edit_training', compact('edit_training'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $training = training::find($id);

        $training->title = $request->title;
        $training->desc = $request->title;
        $training->location = $request->location;
        $training->diration =  $request->diration;
        $training->start_on = $request->start_on;
        if ($request->hasFile('cover_img')) {


            $imagePath = 'trainings/' . $training->cover_img;

            // Delete the file from the 'pictures' disk
            Storage::disk('pictures')->delete($imagePath);

            // Delete the file from the default disk (e.g., 'public')
            Storage::delete($imagePath);


            $imageName = $request->file('cover_img')->getClientOriginalName();
            $image = $request->file('cover_img')->storeAs('./trainings', $imageName, 'pictures');
            $training->cover_img = $imageName;
        }
        $training->cover_title = $request->cover_title;
        $training->goals = $request->goals;
        $training->training_for = $request->training_for;
        $training->how_learn = $request->how_learn;

        $training->save();
        return redirect(route('trainings.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $training =  training::findorfail($id);
        if ($training) {
            $imagePath = 'trainings/' . $training->cover_img;

            // Delete the file from the 'pictures' disk
            Storage::disk('pictures')->delete($imagePath);

            // Delete the file from the default disk (e.g., 'public')
            Storage::delete($imagePath);

            // Delete the record from the database
            $training->delete();

            // Optionally, you can display a success message or perform any additional actions
            return redirect(route('trainings.index'))->with('success', 'Picture deleted successfully.');
        } else {
            // Event not found, handle the error accordingly
            return redirect()->back()->with('error', 'Event not found.');
        }
    }
}
