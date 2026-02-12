<?php

namespace App\Http\Controllers;

use App\Models\Duck;
use App\Http\Requests\StoreDuckRequest;
use App\Http\Requests\UpdateDuckRequest;

class DuckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDuckRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Duck $duck)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDuckRequest $request, Duck $duck)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Duck $duck)
    {
        //
    }
}
