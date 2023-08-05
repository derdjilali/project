<?php

namespace App\Http\Controllers;

use App\Models\Landingpage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LandingpageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Landingpage::all();
        return view('admin.landingpage',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_article_landingpage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('media')) {
            $imageName = $request->file('media')->getClientOriginalName();
            $image = $request->file('media')->storeAs('./Landingpage',$imageName,'pictures');
            Landingpage::create([
                 'title' => $request->title,
                 'type' => $request->type,
                 'desc' => $request->desc,
                 'media' => $imageName,
             ]);
             return redirect(route('Landingpage.index'));
         }
         else{
            return "error";
         }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Landingpage  $landingpage
     * @return \Illuminate\Http\Response
     */
    public function show(Landingpage $landingpage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Landingpage  $landingpage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_article = Landingpage::findorfail($id);
        return view('admin.edit_article',compact('edit_article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Landingpage  $landingpage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $landingpage = Landingpage::findorfail($id);
        $landingpage->title = $request->title;
        $landingpage->desc = $request->desc;
        if ($request->hasFile('media')) {
            $imagePath = 'Landingpage/' . $landingpage->media;

            // Delete the file from the 'pictures' disk
            Storage::disk('pictures')->delete($imagePath);

            // Delete the file from the default disk (e.g., 'public')
            Storage::delete($imagePath);

            $imageName = $request->file('media')->getClientOriginalName();
            $image = $request->file('media')->storeAs('./Landingpage',$imageName,'pictures');
            $landingpage->media = $imageName;
        }
        $landingpage->save();


        return redirect(route('Landingpage.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Landingpage  $landingpage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article =  Landingpage::findorfail($id);
        if ($article) {
            $imagePath = 'Landingpage/' . $article->media;

            // Delete the file from the 'pictures' disk
            Storage::disk('pictures')->delete($imagePath);

            // Delete the file from the default disk (e.g., 'public')
            Storage::delete($imagePath);

            // Delete the record from the database
            $article->delete();

            // Optionally, you can display a success message or perform any additional actions
            return redirect(route('Landingpage.index'));
        } else {
            // Event not found, handle the error accordingly
            return redirect()->back();
        }
    }
}
