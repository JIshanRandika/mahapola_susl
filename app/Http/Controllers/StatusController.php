<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        Status::create($request->all());
        return back()->with('success','New Process added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {

        $test = $status->id;


        $value=Status::query()->find((int)$status->id,'level');

//        echo 'a';

        print $test;



        $levelzero= '{"level":"0"}';
        $levelone = '{"level":"1"}';
        $leveltwo = '{"level":"2"}';
        $levelthree = '{"level":"3"}';
        $levelfour = '{"level":"4"}';

//        if($value==$levelone){
//            print $value;
//        }





        if($value==$levelzero){
            $status->update(
                [
                    'status'=>'Verifying list by Student Affairs Division before send to the Assistant Registrar',
                    'level'=>'1']
            );
            return back()->with('success','System updated successfully');

        }
        if($value==$levelone){
            $status->update(
                [
                    'status'=>'Verifyied by the Student Affairs Division and Moved to the Assistant Registrar of the Faculty',
                    'level'=>'2']
            );
            return back()->with('success','System updated successfully');

        }
        if ($value==$leveltwo) {
            $status->update(
                [
                    'status' => 'Assistant Registrar of the Faculty send the Finalized List to Studenet Affirs Division',
                    'level' => '3']
            );
            return back()->with('success','System updated successfully');
        }
        if ($value==$levelthree) {
            $status->update(
                [
                    'status' => 'Send the Finalized List to the UGC by the Student Affirs Division',
                    'level' => '4']
            );
            return back()->with('success','System updated successfully');
        }

        if ($value==$levelfour) {
            $status->update(
                [
                    'status' => 'Process Finished',
                    'level' => '0']
            );
            return back()->with('success','System updated successfully');
        }


        return back()->with('success','System updated successfully');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        //
    }
}
