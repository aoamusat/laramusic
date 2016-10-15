<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | Login</title>
	  <!-- BOOTSTRAP STYLES-->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
     <!-- FONT-AWESOME STYLES-->
    <link href="{{ asset('css/font-awesome-4.5.0/css/font-awesome.min.css') }}" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
     <!-- GOOGLE FONTS
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />-->

</head>
<body style="background-color:#424242;" id="vue-app">
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2> Welcome Admin : Please Login</h2>
                <h4>@if(Session::get('truelogin')) {{ $truelogin }} @endif</h4>

                 <br />
            </div>
        </div>
         <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <strong>Enter Details To Login </strong>  
                </div>
                <div class="panel-body">
                  <form method="post" action="{{ url('admin/login') }}">
                  <br/>
                      <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <input type="text" class="form-control" placeholder="Your Username " v-model="username" required name="username" />
                      </div>
                      <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                          <input type="password" class="form-control"  placeholder="Your Password" v-model="password" required name="password" />
                      </div>
                      <div class="form-group">
                        <label class="checkbox-inline">
                          <input type="checkbox" /> Remember me
                        </label>
                        <span class="pull-right"><a href="javascript:void(0);" >Forget password ?</a></span>
                      </div>
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <button type="submit" class="btn btn-primary" v-show="setLoginActive">Login Now</button>
                      <hr />
                      <span class="center-block">Copyright &copy; 2016. BigBang Inc.</span>
                 </form>
              </div>            
          </div>
        </div>        
      </div>
    </div>


    <!-- SCRIPTS -AT THE BOTTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- METIS MENU SCRIPTS -->
    <script src="{{ asset('js/jquery.metisMenu.js') }}"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/Vue.js') }}"></script>

    <script type="text/javascript">
    /*
      Create a new Vue Instance
     */

    Vue.component('alert-component',{
        template:"#alert-template",
        props:['name','id']
    });
      new Vue({
        'el':'#vue-app',
        data:{
            username:'',
            password:''
        },

        methods:{
            test:function(){
              console.log('Vue is working');
            }
        },
        components:{

        },
        computed:{
          setLoginActive:function()
          {
            return this.username.length!=0 && this.password.length!=0;
          }
        }
      });
    </script>
   
</body>
</html>
