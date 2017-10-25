<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class PhotoController extends Controller{
    private $table = 'photos';
    //Create Portfolio
    public function create($gallery_id){
         //Check logged id
        if (!Auth::check()) {
            return \Redirect::route('gallery.index');
        }

    	//Render the view
        return view('photo/create', compact('gallery_id'));
    }

    //Store Photo
    public function store(Request $request){
        $gallery_id = $request->input('gallery_id');
    	$title = $request->input('title');
        $description = $request->input('description');
        $location = $request->input('location');
        $image = $request->file('image');
        $owner_id = 1;

        //Image Upload
        if ($image) {
            $image_filename = $image->getClientOriginalName();
            $image->move(public_path('images'), $image_filename);
        } else {
            $image_filename = 'noimage.jpg'; 
        }

        //Insert Gallery Image
        DB::table($this->table)->insert(
            [
                'gallery_id' => $gallery_id,
                'title' => $title,
                'description' => $description,
                'location' => $location,
                'image' => $image_filename,
                'owner_id' => $owner_id
            ]
        );

        //Set Message
        \Session::flash('message', 'Portfolio Created');

        //Redirect
        return \Redirect::route('gallery.show', array('id' => $gallery_id));
    }

    //Show Portfolio photo
    public function details($id){
    	//Get Photos
        $photo = DB::table($this->table)->where('id', $id)->first();
        //Render the view
        return view('photo/details', compact('photo'));
    }

    public function destroy($id, $gallery_id){
        $photo = DB::table($this->table)->where('id', $id)->delete();
        //Set Message
        \Session::flash('message', 'Portfolio Deleted Successfully');

        //Redirect
        return \Redirect::route('gallery.show', array('id' => $gallery_id));
    }

    public function edit($id){
         //Get Photos
        $photo = DB::table($this->table)->where('id', $id)->first();
        //Render the view
        return view('photo/edit', compact('photo'));
    }

    public function update(Request $request){
        $id = $request->input('id');
        $gallery_id = $request->input('gallery_id');
        $title = $request->input('title');
        $description = $request->input('description');
        $location = $request->input('location');
        $image = $request->file('image');
        $owner_id = 1;

        //Image Upload
        if ($image) {
            $image_filename = $image->getClientOriginalName();
            $image->move(public_path('images'), $image_filename);
             //Insert Gallery Image
            DB::table($this->table)->where('id', $id)->update(
            [
                'gallery_id' => $gallery_id,
                'title' => $title,
                'description' => $description,
                'location' => $location,
                'image' => $image_filename,
                'owner_id' => $owner_id
            ]
        );

        } else {
            //Insert Gallery Image
            DB::table($this->table)->where('id', $id)->update(
            [
                'gallery_id' => $gallery_id,
                'title' => $title,
                'description' => $description,
                'location' => $location,
                'owner_id' => $owner_id
            ]
           );

        }


        //Set Message
        \Session::flash('message', 'Portfolio Updated');

        //Redirect
        return \Redirect::route('gallery.show', array('id' => $gallery_id));
    }
}
