<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Album;

class PhotoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        ;
        $photos = Photo::Select('*')->get();
        $albums = Album::Select('*')->get();
        return view('gallery.index', compact('photos', 'albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $albums = Album::Select('*')->get();
        return view('gallery.create',compact('albums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Photo $photo)
    {
        if ($request->user()->authorizeRoles('Admin')) {
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $imagetostore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('photo')->storeAS('public/images', $imagetostore);
            $request->photo->move(public_path($path), $imagetostore);


            $photo->name = $request->input('name');
            $photo->photo = $imagetostore;
            $photo->album_id = $request->input('album');
            $photo->save();

            return redirect('/photo');
        } else {
            abort(401, "sorry, that's something you can't do");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo, Request $request)
    {
        $photoa = Photo::Select('*')->get();
        $albums = Album::Select('*')->get();

        return view('gallery.show', compact('photoa', 'albums'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo, Request $request)
    {
        if ($request->user()->authorizeRoles('Admin')) {
            $photos = $photo;
            $album = Album::Select('*')->where("id", $photos->album_id)->get();
            $albums = $album;


            return view("gallery.edit", compact('photos', 'albums'));
        } else{
            abort(401, "sorry, that's something you can't do");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        if ($request->user()->authorizeRoles('Admin')) {
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $imagetostore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('photo')->storeAS('public/images', $imagetostore);
            $request->photo->move(public_path($path), $imagetostore);


            $photo->name = $request->input('name');
            $photo->photo = $imagetostore;
            $photo->album_id = $request->input('album');
            $photo->save();

            return redirect('/photo');
        } else{
            abort(401, "sorry, that's something you can't do");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo, Request $request)
{
        if ($request->user()->authorizeRoles('Admin')) {

            $photo->delete();

            return redirect('/photo');
        } else{
            abort(401, "sorry, that's something you can't do");
        }
    }


}
