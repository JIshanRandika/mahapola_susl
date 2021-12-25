@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
{{--                    <div class="panel-heading">Manage Permission</div>--}}


                    <div class="panel-body">


                        @if(checkPermission(['vice_chancellor','registrar','finance_division_clerk','student']))
{{--                            <button>Vice Chancellor</button>--}}
{{--                            <button>Registrar</button>--}}
{{--                            <button>Assistant Registrar Of The Faculty</button>--}}
{{--                            <button>Student Affairs Division Clerk</button>--}}
{{--                            <button>Finance Division Clerk</button>--}}
{{--                            <button>Student</button>--}}
{{--                            <h1>See Status</h1>--}}

                        @foreach($status as $s)
                                <strong>Installment:</strong>
                                {{ $s->mahalpola_name }}
                            <h1></h1>
                                <strong>Status:</strong>
                                {{ $s->status }}
                            @endforeach
                        @endif


                        @if(checkPermission(['assistant_registrar_of_the_faculty']))

                                @foreach($status as $s)
                                    <strong>Installment:</strong>
                                    {{ $s->mahalpola_name }}
                                    <h1></h1>
                                    <strong>Status:</strong>
                                    {{ $s->status }}

                                    @if($s->level=='2')
                                        <form action="{{ route('statuses.update',1) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="row">

                                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                    <button type="submit" class="btn btn-primary">
                                                        Recommended the List and send to Student Affairs Division
                                                    </button>
                                                </div>
                                            </div>

                                        </form>
                                    @endif


                                @endforeach

                            @endif


                        @if(checkPermission(['student_affairs_division_clerk']))

{{--                                <h1>See Status</h1>--}}

                                @foreach($status as $s)
                                    <strong>Installment:</strong>
                                    {{ $s->mahalpola_name }}
                                    <h1></h1>
                                    <strong>Status:</strong>
                                    {{ $s->status }}

                                    @if($s->level=='0')
                                        <form action="{{ route('statuses.update',1) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="row">

                                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                    <button type="submit" class="btn btn-primary">Start New Progress</button>
                                                </div>
                                            </div>

                                        </form>
                                    @endif

                                    @if($s->level=='1')
                                        <form action="{{ route('statuses.update',1) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="row">

                                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                    <button type="submit" class="btn btn-primary">
                                                        Send to Assistant Registrar
                                                    </button>
                                                </div>
                                            </div>

                                        </form>
                                    @endif

                                    @if($s->level=='3')
                                        <form action="{{ route('statuses.update',1) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="row">

                                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                    <button type="submit" class="btn btn-primary">
                                                        Send the Finalized List to the UGC
                                                    </button>
                                                </div>
                                            </div>

                                        </form>
                                    @endif

                                    @if($s->level=='4')
                                        <form action="{{ route('statuses.update',1) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="row">

                                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                    <button type="submit" class="btn btn-danger">
                                                        Finished the current progress
                                                    </button>
                                                </div>
                                            </div>

                                        </form>
                                    @endif


                                @endforeach




                            @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
