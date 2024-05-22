<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('menu.publisher.index', [
            'title'         => 'Publisher',
            'publishers'    => Publisher::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.publisher.create', [
            'title'     => 'Add New Publisher'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'publisher_image'   => 'required',
            'publisher_name'    => 'required',
            'address'           => 'required'
        ]);

        Publisher::create($request->all());
        return redirect()->route('publisher.index')->with('success', 'Publisher created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $publisher)
    {
        return view('menu.publisher.edit', [
            'title'     => 'Edit Publisher',
            'publisher' => $publisher
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publisher $publisher)
    {
        $request->validate([
            'publisher_image'   => 'required',
            'publisher_name'    => 'required',
            'address'           => 'required'
        ]);

        $publisher->update($request->except(['_token']));
        return redirect()->route('publisher.index')->with('success', 'Publisher updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
        return redirect()->route('publisher.index')->with('success', 'Publisher deleted successfully');
    }
}
