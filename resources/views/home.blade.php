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

                                            @if($s->level!=='1')
                                                <h6 class="card-text">Comments by Assistant Registrar:</h6>
                                                @foreach($arcomment as $arc)
                                                    @if($s->id==$arc->status_id)
                                                        <p>{{$arc->ar_comment}}</p>
                                                    @endif
                                                @endforeach
                                            @endif

                                        </div>
                                        <div class="card-footer text-muted">
                                            Last update: {{ $s->updated_at }}
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif


{{--                            Assistant Registrar of The Faculty of Graduate Studies--}}

                        @if(checkPermission(['graduate_studies_assistant_registrar']))

                            @foreach($status as $s)
                                @if($s->level!=='0' && $s->faculty=='Graduate Studies')
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
                                                                <input type="text" name="ar_comment"
                                                                       class="form-control" placeholder="Comment">
                                                            </div>
                                                        </div>


                                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center m-1">
                                                            <button name="status_id" value="{{$s->id}}" type="submit"
                                                                    class="btn btn-info">Add Comment
                                                            </button>
                                                        </div>
                                                    </div>

                                                </form>


                                                <form action="{{ route('statuses.update',$s->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="row">

                                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                            <button type="submit" class="btn btn-primary">
                                                                Recommended the List and send to Student Affairs
                                                                Division
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


{{--                            Assistant Registrar of The Faculty of Agriculture Science--}}
                            @if(checkPermission(['agriculture_science_assistant_registrar']))

                                @foreach($status as $s)
                                    @if($s->level!=='0' && $s->faculty=='Agriculture Science')
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
                                                                    <input type="text" name="ar_comment"
                                                                           class="form-control" placeholder="Comment">
                                                                </div>
                                                            </div>


                                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center m-1">
                                                                <button name="status_id" value="{{$s->id}}" type="submit"
                                                                        class="btn btn-info">Add Comment
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </form>


                                                    <form action="{{ route('statuses.update',$s->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="row">

                                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                                <button type="submit" class="btn btn-primary">
                                                                    Recommended the List and send to Student Affairs
                                                                    Division
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

{{--                            Assistant Registrar of The Faculty of Applied Sciences--}}

                            @if(checkPermission(['applied_sciences_assistant_registrar']))

                                @foreach($status as $s)
                                    @if($s->level!=='0' && $s->faculty=='Applied Sciences')
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
                                                                    <input type="text" name="ar_comment"
                                                                           class="form-control" placeholder="Comment">
                                                                </div>
                                                            </div>


                                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center m-1">
                                                                <button name="status_id" value="{{$s->id}}" type="submit"
                                                                        class="btn btn-info">Add Comment
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </form>


                                                    <form action="{{ route('statuses.update',$s->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="row">

                                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                                <button type="submit" class="btn btn-primary">
                                                                    Recommended the List and send to Student Affairs
                                                                    Division
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
{{--                            Assistant Registrar of The Faculty of Geomatics--}}
                            @if(checkPermission(['geomatics_assistant_registrar']))

                                @foreach($status as $s)
                                    @if($s->level!=='0' && $s->faculty=='Geomatics')
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
                                                                    <input type="text" name="ar_comment"
                                                                           class="form-control" placeholder="Comment">
                                                                </div>
                                                            </div>


                                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center m-1">
                                                                <button name="status_id" value="{{$s->id}}" type="submit"
                                                                        class="btn btn-info">Add Comment
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </form>


                                                    <form action="{{ route('statuses.update',$s->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="row">

                                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                                <button type="submit" class="btn btn-primary">
                                                                    Recommended the List and send to Student Affairs
                                                                    Division
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

{{--                            Assistant Registrar of The Faculty of Management Studies--}}
                            @if(checkPermission(['management_studies_assistant_registrar']))

                                @foreach($status as $s)
                                    @if($s->level!=='0' && $s->faculty=='Management Studies')
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
                                                                    <input type="text" name="ar_comment"
                                                                           class="form-control" placeholder="Comment">
                                                                </div>
                                                            </div>


                                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center m-1">
                                                                <button name="status_id" value="{{$s->id}}" type="submit"
                                                                        class="btn btn-info">Add Comment
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </form>


                                                    <form action="{{ route('statuses.update',$s->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="row">

                                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                                <button type="submit" class="btn btn-primary">
                                                                    Recommended the List and send to Student Affairs
                                                                    Division
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

{{--                            Assistant Registrar of The Faculty of Medicine--}}
                            @if(checkPermission(['medicine_assistant_registrar']))

                                @foreach($status as $s)
                                    @if($s->level!=='0' && $s->faculty=='Medicine')
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
                                                                    <input type="text" name="ar_comment"
                                                                           class="form-control" placeholder="Comment">
                                                                </div>
                                                            </div>


                                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center m-1">
                                                                <button name="status_id" value="{{$s->id}}" type="submit"
                                                                        class="btn btn-info">Add Comment
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </form>


                                                    <form action="{{ route('statuses.update',$s->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="row">

                                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                                <button type="submit" class="btn btn-primary">
                                                                    Recommended the List and send to Student Affairs
                                                                    Division
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
{{--                            Assistant Registrar of The Faculty of Social Sciences & Languages--}}

                            @if(checkPermission(['social_sciences_assistant_registrar']))

                                @foreach($status as $s)
                                    @if($s->level!=='0' && $s->faculty=='Social Sciences & Languages')
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
                                                                    <input type="text" name="ar_comment"
                                                                           class="form-control" placeholder="Comment">
                                                                </div>
                                                            </div>


                                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center m-1">
                                                                <button name="status_id" value="{{$s->id}}" type="submit"
                                                                        class="btn btn-info">Add Comment
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </form>


                                                    <form action="{{ route('statuses.update',$s->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="row">

                                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                                <button type="submit" class="btn btn-primary">
                                                                    Recommended the List and send to Student Affairs
                                                                    Division
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
{{--                            Assistant Registrar of The Faculty of Technology--}}
                            @if(checkPermission(['technology_assistant_registrar']))

                                @foreach($status as $s)
                                    @if($s->level!=='0' && $s->faculty=='Technology')
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
                                                                    <input type="text" name="ar_comment"
                                                                           class="form-control" placeholder="Comment">
                                                                </div>
                                                            </div>


                                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center m-1">
                                                                <button name="status_id" value="{{$s->id}}" type="submit"
                                                                        class="btn btn-info">Add Comment
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </form>


                                                    <form action="{{ route('statuses.update',$s->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="row">

                                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                                <button type="submit" class="btn btn-primary">
                                                                    Recommended the List and send to Student Affairs
                                                                    Division
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

                                            <select name="faculty" class="custom-select" id="inputGroupSelect01" >
                                                <option selected>Choose...</option>
                                                <option value="Graduate Studies">Graduate Studies</option>
                                                <option value="Agriculture Science">Agriculture Science</option>
                                                <option value="Applied Sciences">Applied Sciences</option>
                                                <option value="Geomatics">Geomatics</option>
                                                <option value="Management Studies">Management Studies</option>
                                                <option value="Medicine">Medicine</option>
                                                <option value="Social Sciences & Languages">Social Sciences & Languages</option>
                                                <option value="Technology">Technology</option>
                                            </select>

{{--                                            <input type="text" name="faculty" class="form-control"--}}
{{--                                                   placeholder="Faculty">--}}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Installment year:</strong>
                                            <input type="text" name="mahapola_year" class="form-control"
                                                   placeholder="Installment year">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Installment month:</strong>
                                            <input type="text" name="mahapola_month" class="form-control"
                                                   placeholder="Installment month">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Installment Description:</strong>
                                            <input type="text" name="mahalpola_description" class="form-control"
                                                   placeholder="Installment Description">
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

                                            @if($s->level!=='1')
                                            <h6 class="card-text">Comments by Assistant Registrar:</h6>
                                            @foreach($arcomment as $arc)
                                                @if($s->id==$arc->status_id)
                                                    <p>{{$arc->ar_comment}}</p>
                                                @endif
                                            @endforeach
                                            @endif

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
