<?php

namespace App\Http\Controllers;

use App\Models\TvChannel;
use Illuminate\Http\Request;

class TvChannelController extends Controller
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

        $data = TvChannel::orderBy('date_time', 'ASC')->get();
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
    public function show(TvChannel $tvChannel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TvChannel $tvChannel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TvChannel $tvChannel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TvChannel $tvChannel)
    {
        //
    }
}
