<?php

namespace App\Http\Controllers;

use App\Models\HighLight;
use Illuminate\Http\Request;

class HighLightController extends Controller
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
        $data = HighLight::orderBy('date_time', 'ASC')->get();
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
    public function show(Request $request)
    {

        if (!$this->checkKey($request->header('x-api-key'))) {
            return response()->json([
                'status' => 401,
                'message' => 'Unauthorized',
            ]);

        }
        $liveLinks = HighLight::where('id', $request->id)
            ->with(['links' => function ($query) {
                // Customize the query for the links if needed
            }])
            ->first()
            ->links;

        return response()->json($liveLinks);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HighLight $highLight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HighLight $highLight)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HighLight $highLight)
    {
        //
    }
}
