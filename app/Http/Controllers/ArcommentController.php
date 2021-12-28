<?php

namespace App\Http\Controllers;

use App\Models\arcomment;
use Illuminate\Http\Request;

class ArcommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $arcomment = arcomment::all();

        return view('home',compact('arcomment'));
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
        arcomment::create($request->all());
        return back()->with('success','New Process added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\arcomment  $arcomment
     * @return \Illuminate\Http\Response
     */
    public function show(arcomment $arcomment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\arcomment  $arcomment
     * @return \Illuminate\Http\Response
     */
    public function edit(arcomment $arcomment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\arcomment  $arcomment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, arcomment $arcomment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\arcomment  $arcomment
     * @return \Illuminate\Http\Response
     */
    public function destroy(arcomment $arcomment)
    {
        //
    }
}
