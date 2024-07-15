
<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="es"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="es"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>TEMPLATE ADMIN - LMACH</title>

        <meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">
        <meta name="author" content="lmach">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="{{ asset('plugins/login/img/favicon.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('plugins/login/img/icon57.png') }}" sizes="57x57">
        <link rel="apple-touch-icon" href="{{ asset('plugins/login/img/icon72.png') }}" sizes="72x72">
        <link rel="apple-touch-icon" href="{{ asset('plugins/login/img/icon76.png') }}" sizes="76x76">
        <link rel="apple-touch-icon" href="{{ asset('plugins/login/img/icon114.png') }}" sizes="114x114">
        <link rel="apple-touch-icon" href="{{ asset('plugins/login/img/icon120.png') }}" sizes="120x120">
        <link rel="apple-touch-icon" href="{{ asset('plugins/login/img/icon144.png') }}" sizes="144x144">
        <link rel="apple-touch-icon" href="{{ asset('plugins/login/img/icon152.png') }}" sizes="152x152">
        <link rel="apple-touch-icon" href="{{ asset('plugins/login/img/icon180.png') }}" sizes="180x180">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="{{ ('plugins/login/assets/template/admin/css/bootstrap.min.css') }}">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="{{ ('plugins/login/assets/template/admin/css/plugins.css') }}">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="{{ ('plugins/login/assets/template/admin/css/main.css') }}">

        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="{{ ('plugins/login/assets/template/admin/css/themes.css') }}">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) -->
        <script src="{{ ('plugins/login/assets/template/admin/js/vendor/modernizr.min.js') }}"></script>
        
        <link rel="stylesheet" href="{{ asset('plugins/validations/pnotify/pnotify.custom.min.css') }}">
    </head>
    <body>
        <!-- Login Full Background -->
        <!-- For best results use an image with a resolution of 1280x1280 pixels (prefer a blurred image for smaller file size) -->
        <img src="{{ ('plugins/login/img/placeholders/backgrounds/biblioteca.jpg') }}" alt="Login Full Background" class="full-bg animation-pulseSlow">
        <!-- END Login Full Background -->

        <!-- Login Container -->
        <div id="login-container" class="animation-fadeIn">
            <!-- Login Title -->
            <div class="login-title text-center">
                <h1><i class="gi gi-flash"></i> <strong>UNAMBA</strong><br><small>Please <strong>Login</strong> or <strong>Register</strong></small></h1>
            </div>
            <!-- END Login Title -->

            <!-- Login Block -->
            <div class="block push-bit">
                <!-- Login Form -->
                @yield('sectionGeneral')
                <!-- END Login Form -->

                <!-- Reminder Form -->
                <form action="login_full.html#reminder" method="post" id="form-reminder" class="form-horizontal form-bordered form-control-borderless display-none">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                <input type="text" id="reminder-email" name="reminder-email" class="form-control input-lg" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Reset Password</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 text-center">
                            <small>Did you remember your password?</small> <a href="javascript:void(0)" id="link-reminder"><small>Login</small></a>
                        </div>
                    </div>
                </form>

                <!-- END Reminder Form -->
            </div>
            <!-- END Login Block -->
        </div>
        <!-- END Login Container -->

        <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
        <script src="{{ ('plugins/login/assets/template/admin/js/vendor/jquery.min.js') }}"></script>
        <script src="{{ ('plugins/login/assets/template/admin/js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ ('plugins/login/assets/template/admin/js/plugins.js') }}"></script>
        <script src="{{ ('plugins/login/assets/template/admin/js/app.js') }}"></script>

        <!-- Load and execute javascript code used only in this page -->
        <script src="{{ ('plugins/login/assets/template/admin/js/pages/login.js') }}"></script>
        <script>$(function(){ Login.init(); });</script>
        
        <script src="{{ asset('plugins/validations/formvalidation/formValidation.min.js') }}"></script>
        <script src="{{ asset('plugins/validations/formvalidation/bootstrap.validation.min.js') }}"></script>
        <script src="{{ asset('plugins/validations/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('plugins/validations/pnotify/pnotify.custom.min.js') }}"></script>
        
        <script>
            var _urlBase = '{{url('/')}}';

            @if(Session::has('listMessage'))
                @foreach(Session::get('listMessage') as $value)
                    new PNotify(
                    {
                        title : '{{Session::get('typeMessage') == 'error' ? 'No se pudo proceder!' : 'Correcto!'}}',
                        text : '{{$value}}',
                        type : '{{Session::get('typeMessage')}}'
                    });
                @endforeach
            @endif
        </script>
        @yield('js')
    </body>
</html>