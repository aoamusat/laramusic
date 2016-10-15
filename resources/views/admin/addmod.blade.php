@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-user"></i>
                    Add a new moderator
                </div>
                <div class="panel-body">
                    {{--Display errors here--}}
                    <form role="form" action="{{ url('admin/dashboard/adduser') }}" method="post">
                        {{ csrf_field() }}
                        @if(Session::get('success'))
                            <div class="alert alert-success alert-dismissable" role="alert">
                                <button type="button" class="close" data-dismiss="alert" arial-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>{{ $success }}
                            </div>
                        @endif
                        @if(count($errors) > 0)
                            <div class="alert alert-danger alert-dismissable" role="alert">
                                <button type="button" class="close" data-dismiss="alert" arial-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <ul>
                                    @foreach($errors as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <br>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input required type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input required type="password" class="form-control" name="pass" placeholder="Password">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-refresh"></i></span>
                            <input required type="password" class="form-control" name="repass" placeholder="Retype password">
                        </div>
                        <div class="form-group input-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus"></i>&nbsp;Add user
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection