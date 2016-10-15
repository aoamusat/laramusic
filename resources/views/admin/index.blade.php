@extends('admin.master')

@section('content')
	<div class="row">
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-music"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">{{ $musics }} Musics</p>
                    <p class="text-muted">All musics</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-globe"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">50 visits</p>
                    <p class="text-muted">Total number visits</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-users"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">{{ $mods }} Moderator</p>
                    <p class="text-muted">Moderators</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-music"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">120 Musics</p>
                    <p class="text-muted">Others musics</p>
                </div>
            </div>
        </div>
    </div>
@endsection