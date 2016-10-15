@extends('admin.master')

@section('content')
    <div class="row" style="margin-top: 10px">
        <div class="col-md-12">
            @if(count($musics) > 0)
                <table class="table table-striped table-responsive">
                    <tr style="background-color: #424242; color: whitesmoke">
                        <td>Name</td>
                        <td>Artists</td>
                        <td>Album</td>
                        <td>Genre</td>
                        <td>Actions</td>
                    </tr>
                    @foreach($musics as $music)
                        <tr>
                            <td>{{ $music->title }}</td>
                            <td>{{ $music->artist }}</td>
                            <td>{{ $music->album }}</td>
                            <td>{{ $music->genre }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-trash"></i>&nbsp;Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div>{!! $musics->render() !!}</div>
            @endif
        </div>
    </div>
@endsection