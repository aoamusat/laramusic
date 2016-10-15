<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | Dashboard</title>
    <!--  BOOTSTRAP STYLES -->
	<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="{{ asset('css/font-awesome-4.5.0/css/font-awesome.min.css') }}" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body id="vue-app">
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('admin/dashboard') }}">Administrator</a>
            </div>
          <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;"> Time : {{ date('l jS \of F Y h:i:s A') }} &nbsp;
              <a href="{{ route('logout') }}" class="btn btn-danger square-btn-adjust"><span class="fa fa-arrow-left"></span>&nbsp;Logout</a>
          </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="{{  asset('img/find_user.png')  }}" class="user-image img-responsive"/>
					</li>
                    <li>
                        <a  href="{{ url('admin/dashboard') }}"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                      <li>
                        <a  href="{{ url('/admin/dashboard/view_all_music') }}"><i class="fa fa-music fa-3x"></i>View all Music</a>
                    </li>
                    <li>
                        <a  href="{{ url('/admin/dashboard/addmusic') }}"><i class="fa fa-plus fa-3x"></i>Add Music</a>
                    </li>
						   <li  >
                        <a  href="{{ url('/admin/dashboard/adduser') }}"><i class="fa fa-user fa-3x"></i>Add User</a>
                    </li>	
                      <li  >
                        <a  href="table.html"><i class="fa fa-lock fa-3x"></i>Change Password</a>
                    </li>
                    <li  >
                        <a  href="form.html"><i class="fa fa-edit fa-3x"></i> Forms </a>
                    </li>
                    <li>
                        <a class="active-menu"  href="blank.html"><i class="fa fa-square-o fa-3x"></i> Blank Page</a>
                    </li>	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->


        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>{{ Session::get('title') ? $title : "Summary" }}</h2>
                        <h5>Welcome Admin , Love to see you back. </h5> 
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
                 @yield('content') 
            </div>
             <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. MAIN WRAPPER  -->


    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="{{ asset('js/jquery.metisMenu.js') }}"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/Vue.js') }}"></script>
    <script>
        Vue.component('tect',{
            props:arrow()
        });
        new Vue({
           el:'#vue-app',
            data:{

            },
            methods:{

            },
            computed:{

            }
        });

        /*
        * jQuery code below
        * All codes for jQuery goes here*/
        $(document).ready(function () {
            $('#music_form').on('submit',function () {
                //add spinner or loading bar

                $.post($(this).prop('action'),{
                    "_token":$(this).find('input[name=_token]').val(),
                    'title':$(this).find('input[name=title]').val(),
                    'album':$(this).find('input[name=album]').val(),
                    'artist':$(this).find('input[name=artist]').val(),
                    'genre':$(this).find('input[name=genre]').val(),
                    'file':$(this).find('input[name=file]').val()},
                        function (data) {

                        },
                        'json'
                );

                //Do something after the completing the request
                return false;
            });
        });
    </script>
    
   
</body>
</html>
