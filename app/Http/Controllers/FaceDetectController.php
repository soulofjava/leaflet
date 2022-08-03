<?php

namespace App\Http\Controllers;

use App\Models\FaceDetect;
use Illuminate\Http\Request;

class FaceDetectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('face');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FaceDetect  $faceDetect
     * @return \Illuminate\Http\Response
     */
    public function show(FaceDetect $faceDetect)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FaceDetect  $faceDetect
     * @return \Illuminate\Http\Response
     */
    public function edit(FaceDetect $faceDetect)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FaceDetect  $faceDetect
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FaceDetect $faceDetect)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FaceDetect  $faceDetect
     * @return \Illuminate\Http\Response
     */
    public function destroy(FaceDetect $faceDetect)
    {
        //
    }
}
