<?php

namespace App\Http\Controllers;

use App\Album;
use App\Photo;
use Illuminate\Http\Request;

class AlbumController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::Select('*')->get();
        return view('albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->user()->authorizeRoles('Admin')) ;
        {
            return view('albums.create');
        }
        abort(401, 'Sorry, this action is not authorized');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Album $album)
    {
        if ($request->user()->authorizeRoles('Admin')) {
            $album->albumName = $request->get('albumName');
            $album->save();

           return redirect('/album');
        } else {
            abort(401, 'Sorry, this action is not authorized');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Album $album)
    {
        if ($request->user()->authorizeRoles('Admin')) {
            $albums = $album;
            return view('albums.edit', compact('albums'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        $album->albumName = $request->albumName;
        $album->save();

        return redirect('/album');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album, Photo $photo)
    {
        $albums = Album::find($album->id);
        $albums->delete();

        return redirect('/album');
    }
}
