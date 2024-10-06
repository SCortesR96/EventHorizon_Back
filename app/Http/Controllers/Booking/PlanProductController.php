<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;

class PlanProductController extends MainController
{
    /**
     * Plan Product | Index
     *
     * Display a listing of the resource.
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function index() {}

    /**
     * Plan Product | Store
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
     * Plan Product | Show
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
     * Plan Product | Update
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
     * Plan Product | Delete
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
