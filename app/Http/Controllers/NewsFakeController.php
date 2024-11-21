<?php

namespace App\Http\Controllers;

use App\Models\NewsFake;
use Illuminate\Http\Request;

class NewsFakeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function checkKey($apiKey)
    {
        $keys = array('lweiouhfhscmslughjdshaj');
        if (in_array($apiKey, $keys)) {
            return true;
        } else {
            return false;
        }

    }
    public function index(Request $request)
    {

        if (!$this->checkKey($request->header('x-api-key'))) {
            return response()->json([
                'status' => 401,
                'message' => 'Unauthorized',
            ]);

        }

        $data = NewsFake::orderBy('id', 'ASC')->get();
        return $data;
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(NewsFake $newsFake)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewsFake $newsFake)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NewsFake $newsFake)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsFake $newsFake)
    {
        //
    }
}
