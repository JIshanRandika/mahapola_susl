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

//        $flight = Status::where('legs', '>', 3)->firstOrFail();

        $value=Status::query()->find(1,'level');


        $levelzero= '{"level":"0"}';
        $levelone = '{"level":"1"}';
        $leveltwo = '{"level":"2"}';
        $levelthree = '{"level":"3"}';
        $levelfour = '{"level":"4"}';

        if($value==$levelone){
            print $value;
        }





        if($value==$levelzero){
            $status->update(
                ['mahalpola_name'=>'Next installment is in progress',
                    'status'=>'Verifying list by Student Affairs Division before send to the Assistant Registrar',
                    'level'=>'1']
            );

        }
        if($value==$levelone){
            $status->update(
                ['mahalpola_name'=>'Next installment is in progress',
                    'status'=>'Verifyied by the Student Affairs Division and Moved to the Assistant Registrar of the Faculty',
                    'level'=>'2']
            );
        }
        if ($value==$leveltwo) {
            $status->update(
                ['mahalpola_name' => 'Next installment is in progress',
                    'status' => 'Assistant Registrar of the Faculty send the Finalized List to Studenet Affirs Division',
                    'level' => '3']
            );
            return back();
        }
        if ($value==$levelthree) {
            $status->update(
                ['mahalpola_name' => 'Next installment is in progress',
                    'status' => 'Send the Finalized List to the UGC by the Student Affirs Division',
                    'level' => '4']
            );
            return back();
        }

        if ($value==$levelfour) {
            $status->update(
                ['mahalpola_name' => 'Expect the next installment soon',
                    'status' => 'Not in progress',
                    'level' => '0']
            );
            return back();
        }


//        else{
//            $status->update(
//                ['mahalpola_name' => 'Expect the next installment soon',
//                    'status' => 'Not in progress',
//                    'level' => '0']
//            );
//        }
        return back();



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
