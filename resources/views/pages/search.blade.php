@extends('layouts.master')

@section('search_result')
    @if(count($musics) > 0)
        <h3 class="center-block">{{ count($musics) }} musics found.</h3>
        <table class="table table-hover table-responsive table-striped" style="border: none;">
            <tr style="background-color: #424242;color: whitesmoke;">
                <td>Music</td>
                <td>Artist</td>
                <td>Album</td>
                <td>Actions</td>
            </tr>
            @foreach($musics as $music)
                <tr>
                    <td>{{ $music->title }}</td>
                    <td>{{ $music->artist }}</td>
                    <td>{{ $music->album }}</td>
                    <td>
                        <a href="music/{{ $music->id }}/{{ $music->title }}/download"
                           class="btn btn-sm btn-primary">
                            <i class="fa fa-download"></i>&nbsp;Download
                        </a>&nbsp;&nbsp;
                        <button class="btn btn-sm btn-primary" data-toggle="modal"
                            data-target="#playmodal{{ $music->id }}"><i class="fa fa-play"></i>&nbsp;Play
                        </button>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#sharemodal{{ $music->id }}">
                            <i class="fa fa-share"></i>&nbsp;
                            Share
                        </button>
                        {{-- Modal for playing music --}}
                        <div style="margin-top:100px;border-radius:10px;" class="modal fade" id="playmodal{{ $music->id }}" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h5>{{ $music->artist }} - {{ $music->title }}</h5>
                                    </div>
                                    <div class="modal-body">
                                        <audio loop="loop">
                                            <source src="{{ url('uploads/'.$music->file_name) }}" type="audio/mpeg"/>
                                            Sorry, your browser cannot play this media. Try downloading the file.
                                        </audio>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--End modal for playing music--}}
                        {{-- Modal for sharing music --}}
                        <div style="margin-top:100px;border-radius:10px;" class="modal fade" id="sharemodal{{ $music->id }}" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h5>Share to social networks</h5>
                                    </div>
                                    <div class="modal-body">
                                        {{--Facebook share button--}}
                                        <div class="fb-share-button" data-href="http://gmusic.dev/music/{{ $music->id }}/{{ $music->title }}/download" data-layout="button_count"
                                             data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Ffacebook.com%2F&amp;src=sdkpreparse">
                                                Share</a>
                                        </div>
                                        {{--End facebook share button--}}
                                        {{--Twitter tweet button--}}
                                        <div><br>
                                            <a href="https://twitter.com/intent/tweet" class="twitter-mention-button" data-size="large"
                                               data-text="This music is downloaded from taikechimusic.com. Download link http://gmusic.dev/music/{{ $music->id }}/{{ $music->title }}/download" data-show-count="true">Tweet</a>
                                            <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                                        </div>
                                        {{--End tweet button--}}
                                        {{--Google plus--}}<br>
                                        <a href="https://plus.google.com/share?url={URL}" onclick="javascript:window.open(this.href,
                                            '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img
                                                    src="https://www.gstatic.com/images/icons/gplus-64.png" alt="Share on Google+"/>
                                        </a>
                                        {{--end google plus--}}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--End modal for sharing music--}}
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <h2>No music found.</h2>
    @endif
@endsection