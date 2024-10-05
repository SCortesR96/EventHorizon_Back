<?php

namespace App\Http\Controllers\Booking;

use Illuminate\Http\Request;
use App\Http\Controllers\MainController;

class BookingController extends MainController
{
    /**
     * Plan | Index
     *
     * Display a listing of the resource.
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function index() {}

    /**
     * Plan | Store
     *
     * Store a newly created resource in storage.
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Plan | Show
     *
     * Display the specified resource.
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Plan | Update
     *
     * Update the specified resource in storage.
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Plan | Delete
     *
     * Remove the specified resource from storage.
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function destroy(string $id)
    {
        //
    }
}
