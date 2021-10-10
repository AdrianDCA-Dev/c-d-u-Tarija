<?php

namespace App\Http\Controllers;

use App\Models\Welcome;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::where('status', 2)->latest('id')->paginate(8);
        $welcomes = Welcome::all();

        return view('welcome', compact('posts', 'welcomes'));
    }

    public function indexWel()
    {

        $welcomes = Welcome::all();

        return view('admin.welcomes.index', compact( 'welcomes'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.welcomes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $welcomes = Welcome::create($request->all());

        if ($request->file('file')){
            //$url = Storage::put('public/portada', $request->file('file'));
            $url = '/img/portada_images/' . time() . 'portada_images.' . $request->file->extension();
            $welcomes->image()->create([
                'url' => $url
            ]);

        }
        $request->file->move(public_path('img/portada_images'), $url);
        Cache::flush();
        return redirect()->route('admin.welcomes.edit', $welcomes)->with('info', 'La Portada se creo con exito');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Welcome $welcome)
    {
        Cache::flush();
        return view('admin.welcomes.edit', compact('welcome'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Welcome $welcome)
    {
        $welcome->update($request->all());

        if ($request->file('file')) {
            //$url = Storage::put('public/portada', $request->file('file'));
            $url = '/img/portada_images/' . time() . 'portada_images.' . $request->file->extension();
            $request->file->move(public_path('img/portada_images'), $url);
            if ($welcome->image) {
                //Storage::delete($welcome->image->url);
                File::delete(public_path($welcome->image->url));
                $welcome->image->update(['url' => $url]);
            } else{
                $welcome->image()->create(['url' => $url]);
            }
        }
        Cache::flush();
        return redirect()->route('admin.welcomes.edit', $welcome)->with('info', 'La Portada se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Welcome $welcome)
    {
        $welcome->delete();
        Cache::flush();
        return redirect()->route('admin.welcomes.index')->with('info', 'La Portada se elimino con exito');;
    }
}
