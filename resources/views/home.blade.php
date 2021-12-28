@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">


                    <div class="panel-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        @if(checkPermission(['vice_chancellor','registrar','finance_division_clerk','student']))

                        @foreach($status as $s)

                                @if($s->level!=='0')
                                    <div class="card text-center m-5">
                                        <div class="card-header">
                                            Installment for: {{ $s->mahapola_year }} {{ $s->mahapola_month }}
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $s->faculty }} {{ $s->batch }}</h5>
                                            <h6 class="card-text">{{ $s->status }}</h6>
                                            <p class="card-text">{{ $s->mahalpola_description }}</p>


                                        </div>
                                        <div class="card-footer text-muted">
                                            Last update: {{ $s->updated_at }}
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif


                        @if(checkPermission(['assistant_registrar_of_the_faculty']))

                                @foreach($status as $s)
                                    @if($s->level!=='0')
                                        <div class="card text-center m-5">
                                            <div class="card-header">
                                                Installment for: {{ $s->mahapola_year }} {{ $s->mahapola_month }}
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $s->faculty }} {{ $s->batch }}</h5>
                                                <h6 class="card-text">{{ $s->status }}</h6>
                                                <p class="card-text">{{ $s->mahalpola_description }}</p>


                                                @if($s->level=='2')

                                                    <form action="{{ route('arcomments.store') }}" method="POST">
                                                        @csrf

                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    <strong>Comment:</strong>
                                                                    <input type="text" name="ar_comment" class="form-control" placeholder="Comment">
                                                                </div>
                                                            </div>


                                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center m-1">
                                                                <button name="status_id" value="{{$s->id}}" type="submit" class="btn btn-info">Add Comment</button>
                                                            </div>
                                                        </div>

                                                    </form>


                                                    <form action="{{ route('statuses.update',$s->id) }}" method="POST">
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



                                            </div>
                                            <div class="card-footer text-muted">
                                                Last update: {{ $s->updated_at }}
                                            </div>
                                        </div>

                                    @endif


                                @endforeach

                            @endif


                        @if(checkPermission(['student_affairs_division_clerk']))

                                <div class="row">
                                    <div class="col-lg-12 margin-tb">
                                        <div class="pull-left">
                                            <h2>Add New Process</h2>
                                        </div>
                                    </div>
                                </div>

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('statuses.store') }}" method="POST">
                                    @csrf

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Batch:</strong>
                                                <input type="text" name="batch" class="form-control" placeholder="Batch">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Faculty:</strong>
                                                <input type="text" name="faculty" class="form-control" placeholder="Faculty">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Installment year:</strong>
                                                <input type="text" name="mahapola_year" class="form-control" placeholder="Installment year">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Installment month:</strong>
                                                <input type="text" name="mahapola_month" class="form-control" placeholder="Installment month">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Installment Description:</strong>
                                                <input type="text" name="mahalpola_description" class="form-control" placeholder="Installment Description">
                                            </div>
                                        </div>


                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>

                                </form>



                                @foreach($status as $s)


                                    @if($s->level!=='0')



                                        <div class="card text-center m-5">
                                            <div class="card-header">
                                                Installment for: {{ $s->mahapola_year }} {{ $s->mahapola_month }}
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $s->faculty }} {{ $s->batch }}</h5>
                                                <h6 class="card-text">{{ $s->status }}</h6>
                                                <p class="card-text">{{ $s->mahalpola_description }}</p>

                                                <h6 class="card-text">Comments by Assistant Registrar:</h6>
                                                @foreach($arcomment as $arc)
                                                    @if($s->id==$arc->status_id)
                                                        <p>{{$arc->ar_comment}}</p>
                                                    @endif
                                                @endforeach

                                                @if($s->level=='1')
                                                    <form action="{{ route('statuses.update',$s->id) }}" method="POST">
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
                                                    <form action="{{ route('statuses.update',$s->id) }}" method="POST">
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
                                                    <form action="{{ route('statuses.update',$s->id) }}" method="POST">
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

                                            </div>
                                            <div class="card-footer text-muted">
                                                Last update: {{ $s->updated_at }}
                                            </div>
                                        </div>



                                    @endif

                                @endforeach




                            @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
