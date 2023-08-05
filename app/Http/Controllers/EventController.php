<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\event_gallery;
use Illuminate\Console\Scheduling\Event as SchedulingEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $events = Event::all();
        return view('admin.events',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_event');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        if ($request->hasFile('picture')) {
           $imageName = $request->file('picture')->getClientOriginalName();
            $image = $request->file('picture')->storeAs('./events',$imageName,'pictures');
            $event = Event::create([
                'title' => $request->title,
                'description' => $request->desc,
                'photo' => $imageName,
                'start_date' => $request->start_date,
                'type'=>$request->type,
            ]);
        }

        //
        if ($request->hasFile('images')) {
            $uploadedImages = [];
            foreach ($request->file('images') as $img) {
                // Store the file and get the path or perform any other necessary actions
                $imgname = $img->getClientOriginalName();
                $image = $request->file('picture')->storeAs('./events_gallery',$imgname,'pictures');
                $event->gallery()->create(['image' => $image]);
            }


        }
        DB::commit();


        return redirect(route('events.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show_event = Event::findOrFail($id); // Retrieve the event by its primary key

        // Retrieve the event_gallery records where 'event_id' matches the given $id
        $galleryImages = event_gallery::where('event_id', $id)->get();

        // Create an array to store the image paths
        $images = [];
        foreach ($galleryImages as $img) {
            $images[] = $img->image;
        }


        return view('showevent',compact(['show_event','images']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(event $event)
    {
        $edit_event = Event::findorfail($event->id);
        return view('admin.edit_event', compact('edit_event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, event $event)
    {

        $event->title = $request->title;
        $event->description = $request->desc;
        $event->start_date = $request->start_date;
        if ($request->hasFile('picture')) {
            $imagePath = 'events/' . $event->photo;

            // Delete the file from the 'pictures' disk
            Storage::disk('pictures')->delete($imagePath);

            // Delete the file from the default disk (e.g., 'public')
            Storage::delete($imagePath);

            $imageName = $request->file('picture')->getClientOriginalName();
            $image = $request->file('picture')->storeAs('./events',$imageName,'pictures');
            $event->photo = $imageName;
        }
        $event->save();


        return redirect(route('events.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $galleryImages =event_gallery::where('event_id',$id)->get();
        if ($event) {
            if($galleryImages){
                foreach ($galleryImages as $img){
                    $path= $img->image;
                    Storage::disk('pictures')->delete($path);
                    Storage::delete($path);
                }
            }
            $imagePath = 'events/' . $event->photo;
            // Delete the file from the 'pictures' disk
            Storage::disk('pictures')->delete($imagePath);

            // Delete the file from the default disk (e.g., 'public')
            Storage::delete($imagePath);

            // Delete the record from the database
            $event->delete();

            // Optionally, you can display a success message or perform any additional actions
            return redirect(route('events.index'))->with('success', 'Picture deleted successfully.');
        } else {
            // Event not found, handle the error accordingly
            return redirect()->back()->with('error', 'Event not found.');
        }
    }
}
