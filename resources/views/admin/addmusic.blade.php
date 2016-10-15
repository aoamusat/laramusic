@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-music"></i>
                    Add a new music
                </div>
                <div class="panel-body">
                    {{--Display success message here--}}

                    @if(Session::get('upload_success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Success!</strong> {{ Session::get('upload_success') }}.
                        </div>
                    @endif

                    {{--Display error message here--}}  
                    
                    @if(Session::get('upload_err'))
                        <div class="alert alert-warning">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Success!</strong> {{ Session::get('upload_err') }}.
                        </div>
                    @endif

                    <form id="music_form" role="form" action="{{ url('admin/dashboard/addmusic') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="MAX_FILE_SIZE" value="8388608">
                        <br>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                            <input required type="text" class="form-control" name="title" placeholder="Title">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input required type="text" class="form-control" name="artist" placeholder="Artists (Separate multiple artists with comma)">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-pied-piper-alt"></i></span>
                            <input required type="text" class="form-control" name="album" placeholder="Album">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                            <input required type="text" class="form-control" name="genre" placeholder="Genre">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-file-audio-o"></i></span>
                            <input required type="file" class="form-control" name="file">
                        </div>
                        <span>Allowed extensions: mp3,ogg,m4a,wma. Max. file size is 8Mb.</span><br><br>
                        {{--<div class="alert alert-warning">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Warning!</strong> Best check yo self, you're not looking too good.
                        </div>--}}
                        <div class="form-group input-group">
                            <br>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-music"></i>&nbsp;Add music
                            </button>&nbsp;
                            <button type="reset" class="btn btn-primary">
                                <i class="fa"></i>&nbsp;Clear
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection