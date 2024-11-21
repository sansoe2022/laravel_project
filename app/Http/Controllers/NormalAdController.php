<?php

namespace App\Http\Controllers;

use App\Models\NormalAd;
use Illuminate\Http\Request;

class NormalAdController extends Controller
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

        $data = NormalAd::orderBy('id', 'DESC')->get()->first();
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
    public function show(NormalAd $normalAd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NormalAd $normalAd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NormalAd $normalAd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NormalAd $normalAd)
    {
        //
    }
}
