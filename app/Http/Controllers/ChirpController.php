<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Models\Chirp;

class ChirpController extends Controller
{

    // allow controller to use authorize method
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $chirps = Chirp::with('user')
            ->latest()
            ->take(50)
            ->get();
        return view('home', ['chirps' => $chirps]);
    }

    public function login()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //first validate the request
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ], [
            'message.required' => 'Please write something to chirp!',
            'message.max' => 'Chirps must be 255 characters or less.',
        ]);

        // second create the chirp (no user for now - auth not implemented yet)

        // chirp::create([
        //     'message' => $validated['message'],
        //     'user_id' => null,
        // ]);

        auth()->user()->chirps()->create($validated);



        return redirect('/')->with('success', 'Your chirp has been posted!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     *      * Update the specified resource in storage.

     */
    public function update(request $request, Chirp $chirp)
    {
        $this->authorize('update', $chirp);
        //first validate the request
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ], [
            'message.required' => 'Please write something to chirp!',
            'message.max' => 'Chirps must be 255 characters or less.',
        ]);

        // second create the chirp (no user for now - auth not implemented yet)

        $chirp->update($validated);

        return redirect('/')->with('success', 'Your chirp has been updated!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        $this->authorize('edit', $chirp);
        // return the view
        return view('chirps.edit', compact('chirp'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        $this->authorize('delete', $chirp);
        $chirp->delete();

        return redirect('/')->with('success', 'Chirp deleted!');
    }
}
