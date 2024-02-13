<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $media = Media::where('title', 'LIKE', "%$search%")->paginate(10);
        return view('media.index', compact('media'));
    }

    public function create()
    {
        return view('media.create');
    }

    public function store(Request $request)
    {
        // Validatie toevoegen
        Media::create($request->all());
        return redirect()->route('media.index');
    }

    public function show(Media $medium)
    {
        return view('media.show', compact('medium'));
    }

    public function edit(Media $medium)
    {
        return view('media.edit', compact('medium'));
    }

    public function update(Request $request, Media $medium)
    {
        // Validatie toevoegen
        $medium->update($request->all());
        return redirect()->route('media.index');
    }

    public function destroy(Media $medium)
    {
        $medium->delete();
        return redirect()->route('media.index');
    }
}
