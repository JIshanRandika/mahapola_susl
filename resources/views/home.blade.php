@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Manage Permission</div>


                    <div class="panel-body">


                        @if(checkPermission(['vice_chancellor','registrar','assistant_registrar_of_the_faculty','student_affairs_division_clerk','finance_division_clerk','student']))
{{--                            <button>Vice Chancellor</button>--}}
{{--                            <button>Registrar</button>--}}
{{--                            <button>Assistant Registrar Of The Faculty</button>--}}
{{--                            <button>Student Affairs Division Clerk</button>--}}
{{--                            <button>Finance Division Clerk</button>--}}
{{--                            <button>Student</button>--}}
                            <h1>See Status</h1>
                        @endif


                        @if(checkPermission(['assistant_registrar_of_the_faculty']))
                                <h1>Edit access for assistant registrar</h1>
                            @endif


                        @if(checkPermission(['student_affairs_division_clerk']))
                                <h1>Edit access for student affairs division</h1>
                            @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
