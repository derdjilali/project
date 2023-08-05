<?php

namespace App\Http\Controllers;

use App\Models\challenge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $challenges = Challenge::all();
        return view('admin.challenges',compact('challenges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_challenge');
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
            $image = $request->file('picture')->storeAs('./challenges',$imageName,'pictures');
            Challenge::create([
                 'title' => $request->title,
                 'link' => $request->link,
                 'description' => $request->desc,
                 'photo' => $imageName,
                 'start_date' => $request->start_date,
             ]);
        }
         return redirect(route('challenges.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $challenge =  Challenge::findorfail($id);
        return view('challenge', compact('challenge'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function edit(challenge $challenge)
    {
        $edit_challenge = Challenge::findorfail($challenge->id);
        return view('admin.edit_challenge', compact('edit_challenge'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, challenge $challenge)
    {
        $challenge->title = $request->title;
        $challenge->link = $request->link;
        $challenge->description = $request->desc;
        $challenge->start_date = $request->start_date;
        if ($request->hasFile('picture')) {
            $imagePath = 'challenges/' . $challenge->photo;

            // Delete the file from the 'pictures' disk
            Storage::disk('pictures')->delete($imagePath);

            // Delete the file from the default disk (e.g., 'public')
            Storage::delete($imagePath);

            $imageName = $request->file('picture')->getClientOriginalName();
            $image = $request->file('picture')->storeAs('./challenges',$imageName,'pictures');
            $challenge->photo = $imageName;
        }
        $challenge->save();


        return redirect(route('challenges.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $challenge =  Challenge::findorfail($id);
        if ($challenge) {
            $imagePath = 'challenges/' . $challenge->photo;

            // Delete the file from the 'pictures' disk
            Storage::disk('pictures')->delete($imagePath);

            // Delete the file from the default disk (e.g., 'public')
            Storage::delete($imagePath);

            // Delete the record from the database
            $challenge->delete();

            // Optionally, you can display a success message or perform any additional actions
            return redirect(route('challenges.index'))->with('success', 'Picture deleted successfully.');
        } else {
            // Event not found, handle the error accordingly
            return redirect()->back()->with('error', 'Event not found.');
        }
    }
}
