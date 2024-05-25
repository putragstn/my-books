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
            'publisher_image'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',  // filename
            'publisher_name'    => 'required',
            'address'           => 'required'
        ]);

        $input = $request->all();

        if ($image = $request->file('publisher_image')) {
            $destinationPath = 'img/publisher-image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['publisher_image'] = "$profileImage";
        }

        Publisher::create($input);
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
            'publisher_image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000',  // filename image
            'publisher_name'    => 'required',
            'address'           => 'required'
        ]);

        $input = $request->all();

        // get data by ID
        $publisherById = Publisher::find($publisher->id);

        // cek apakah gambar tersedia
        if (request()->hasFile('publisher_image')) {

            // jika gambar tersedia, upload gambar baru
            if ($image = $request->file('publisher_image')) {
                $destinationPath = 'img/publisher-image/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['publisher_image'] = "$profileImage";
            }

            // hapus gambar lama
            $image_path = public_path('img/publisher-image/' . $publisherById->publisher_image);
            unlink($image_path);
        }

        $publisherById->update($input);

        // $publisher->update($request->except(['_token']));
        return redirect()->route('publisher.index')->with('success', 'Publisher updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        $image_path = public_path('img/publisher-image/' . $publisher->publisher_image);

        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $publisher->delete();
        return redirect()->route('publisher.index')->with('success', 'Publisher deleted successfully');
    }
}
