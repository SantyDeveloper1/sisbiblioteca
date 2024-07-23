<!DOCTYPE html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <title>TEMPLATE ADMIN - LMACH</title>
    <meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">
    <meta name="author" content="lmach">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">
    <link rel="shortcut icon" href="{{ asset('plugins/login/img/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('plugins/login/img/icon57.png') }}" sizes="57x57">
    <link rel="apple-touch-icon" href="{{ asset('plugins/login/img/icon72.png') }}" sizes="72x72">
    <link rel="apple-touch-icon" href="{{ asset('plugins/login/img/icon76.png') }}" sizes="76x76">
    <link rel="apple-touch-icon" href="{{ asset('plugins/login/img/icon114.png') }}" sizes="114x114">
    <link rel="apple-touch-icon" href="{{ asset('plugins/login/img/icon120.png') }}" sizes="120x120">
    <link rel="apple-touch-icon" href="{{ asset('plugins/login/img/icon144.png') }}" sizes="144x144">
    <link rel="apple-touch-icon" href="{{ asset('plugins/login/img/icon152.png') }}" sizes="152x152">
    <link rel="apple-touch-icon" href="{{ asset('plugins/login/img/icon180.png') }}" sizes="180x180">
    <link rel="stylesheet" href="{{ asset('plugins/login/assets/template/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/login/assets/template/admin/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/login/assets/template/admin/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/login/assets/template/admin/css/themes.css') }}">
    <script src="{{ asset('plugins/login/assets/template/admin/js/vendor/modernizr.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('plugins/validations/pnotify/pnotify.custom.min.css') }}">
</head>
<body>
    <img src="{{ asset('plugins/login/img/placeholders/backgrounds/biblioteca.jpg') }}" alt="Login Full Background" class="full-bg animation-pulseSlow">
    <div id="login-container" class="animation-fadeIn">
        <div class="login-title text-center">
            <h1><i class="gi gi-flash"></i> <strong>UNAMBA</strong><br><small>Please <strong>Login</strong> or <strong>Register</strong></small></h1>
        </div>
        <div class="block push-bit">
            @yield('sectionGeneral')
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
        </div>
    </div>
    <script src="{{ asset('plugins/login/assets/template/admin/js/vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/login/assets/template/admin/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/login/assets/template/admin/js/plugins.js') }}"></script>
    <script src="{{ asset('plugins/login/assets/template/admin/js/app.js') }}"></script>
    <script src="{{ asset('plugins/login/assets/template/admin/js/pages/login.js') }}"></script>
    <script>$(function(){ Login.init(); });</script>
    <script src="{{ asset('plugins/validations/formvalidation/formValidation.min.js') }}"></script>
    <script src="{{ asset('plugins/validations/formvalidation/bootstrap.validation.min.js') }}"></script>
    <script src="{{ asset('plugins/validations/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('plugins/validations/pnotify/pnotify.custom.min.js') }}"></script>
    <script>
        var _urlBase = '{{ url('/') }}';
        @if(Session::has('listMessage'))
            @foreach(Session::pull('listMessage') as $value)
                new PNotify({
                    title: '{{ Session::get('typeMessage') == 'error' ? 'No se pudo proceder!' : 'Correcto!' }}',
                    text: '{{ $value }}',
                    type: '{{ Session::get('typeMessage') }}'
                });
            @endforeach
        @endif
        
        @if(isset($redirect) && $redirect === true)
        
            var homeUrl = '{{ url('/home') }}';
            window.location.replace(homeUrl);
        @endif
    </script>
    @yield('js')
</body>
</html>
