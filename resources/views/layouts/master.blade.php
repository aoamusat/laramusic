<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" href="{{ asset('img/favicon.ico') }}">
        <title>TAI KE CHI | Online Music Store</title>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta name="key" content="">
        {{-- INCLUDE BOOTSTRAP --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome-4.5.0/css/font-awesome.min.css') }}">
        <style>
            .center
            {
                margin-left: auto;
                margin-right: auto;
            }

            #logo_text
            {
                font-family: "Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
                font-size: 15px;
            }
            .search{
                width: 400px;
            }
        </style>
    </head>
    <body id="vue-app">
    {{--Facebook sharing SDK--}}

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

    {{--End facebook sharing sdk--}}

    {{--Navigation bar here --}}
    <div class="navbar navbar-default navbar-fixed-top" style="">
        <div class="container">
            <div class="navbar-header">
                <a href="{{ url('/') }}" class="navbar-brand">
                    <img src="{{ URL::asset('img/logo_nav.png') }}" class="img-responsive" />
                </a>
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse" id="navbar-main">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="">Contact Us</a>
                    </li>
                    <li>
                        <a href="">About Us</a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="https://facebook.com/username" class=""><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com" class=""><i class="fa fa-twitter"></i></a></li>
                    <li><a href="https://plus.google.com" class=""><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="https://instagram.com/username" class=""><i class="fa fa-instagram"></i></a></li>
                </ul>

            </div>
        </div>
    </div>

    {{--Navigation bar code ends here--}}
        <div class="container" style="margin-top: 90px;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="center"  style="text-align: center">
                        <img src="{{ asset('img/logo_ps.png') }}" class="center img-responsive"/>
                        <p class="center" id="logo_text">Welcome, download any music by searching</p>
                        {{-- SEARCH FORM --}}
                        <form id="search_form" class="center form-inline" role="form" method="get" action="{{ url('/search') }}">
                            {{ csrf_field() }}
                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                <input type="text" style="width: 450px;" placeholder="Type in artist,song,title to search"
                                       name="query" class="form-control search" autocomplete="off"/>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                        {{-- END SEARCH --}}
                    </div>
                </div>
            </div>
            {{-- RESULT SECTION BELOW --}}
            <div class="row" style="margin-top:70px">
                <div class="col-lg-12" style="text-align: center">
                    @yield('search_result')
                </div>
            </div>

            {{--END RESULT SECTION--}}
        </div>


        <div class="container footer"
             style="width: inherit;background-color:#37474f;padding:20px;color: #f5f5f5;margin-top:100px;">
            <!-- <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="word-wrap: break-word">
                    <h4 style="">About US</h4>
                    <hr>
                    <h4>
                        Write your about us here.
                        Mike combines an expert technical knowledge with a real eye for design.
                        Working with clients from a wide range of industries,
                        he fully understands client objectives when working on a project, large or small.
                    </h4>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="word-wrap: break-word">
                    <h4 style="">Contact US</h4>
                    <hr>
                    <h4><span class="fa fa-envelope"></span>&nbsp;&nbsp;
                        <a href="mailto:info@taikechi.com">info@taikechi.com</a>
                    </h4>
                    <h4><span class="fa fa-phone"></span>&nbsp;&nbsp;
                        +2348130297487
                    </h4>
                    <h4><span class="fa fa-map-marker"></span>&nbsp;&nbsp;
                        AA34, Federal Low Cost Housing, Shagari, Alimosho, Lagos.
                    </h4>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="word-wrap: break-word">
                    <h4 style="">Follow us on: </h4>
                    <hr>
                    <h4><i class="fa fa-facebook"></i>&nbsp;
                        <a href="http://facebook.com/username" target="_blank">Facebook</a>
                    </h4>
                    <h4><i class="fa fa-twitter"></i>&nbsp;
                        <a href="http://twitter.com/username" target="_blank">Twitter</a>
                    </h4>
                    <h4><i class="fa fa-instagram"></i>&nbsp;
                        <a href="http://instagram.com/username" target="_blank">Instagram</a>
                    </h4>
                    <h4><i class="fa fa-google-plus"></i>&nbsp;
                        <a href="http://plus.google.com/account_url" target="_blank">Google+</a>
                    </h4>
                </div>
            </div> -->
            <div class="row" style="text-align: center">
                <p>Copyright &copy; 2017. All rights reserved. TAI KE CHI Music company [RC902346] .</p>
            </div>
        </div>

        {{-- SCRIPTS GOES HERE TO MAKE PAGE LOAD FASTER --}}
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/typeahead.bundle.min.js') }}"></script>
        <script src="{{ asset('js/bloodhound.min.js') }}"></script>
        <script src="{{ asset('js/Vue.js') }}"></script>
        <script>
            /*$(document).ready(function(){
                $('input[name=query]').typeahead({
                    hint:true,
                    highlight:true,
                    minLength:2
                });

                // Set the Options for "Bloodhound" suggestion engine

                var engine = new Bloodhound({
                    remote:{
                        url:'/search',
                        wildcard:'%'+$('input[name=query]')+'%'
                    },
                    datumTokenizer:Bloodhound.tokenizers.whitespace('q'),
                    queryTokenizer:Bloodhound.tokenizers.whitespace
                });
            });*/
        </script>
    </body>
</html>