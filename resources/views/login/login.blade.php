@extends('template.layout')
@section('titleGeneral', 'Registrar Persona...')
@section('sectionGeneral')
<form id="frmLoginSesion" action="{{ url('login') }}" method="POST" class="form-horizontal form-bordered form-control-borderless">
    @csrf
    <div class="form-group">
        <div class="col-xs-12">
            <div class="input-group">
                <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                <input type="text" id="txtCorreo" name="txtCorreo" class="form-control input-lg" placeholder="Email">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12">
            <div class="input-group">
                <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                <input type="password" id="txtPassword" name="txtPassword" class="form-control input-lg" placeholder="Password">
            </div>
        </div>
    </div>
    <div class="form-group form-actions">
        <div class="col-xs-4">
            <label class="switch switch-primary" data-toggle="tooltip" title="Remember Me?">
                <input type="checkbox" id="login-remember-me" name="login-remember-me" checked>
                <span></span>
            </label>
        </div>
        <div class="col-xs-8 text-right">
            <button type="button" class="btn btn-sm btn-primary" onclick="sendFrmLoginSesion();">
                <i class="fa fa-angle-right"></i> Login to Dashboard
            </button>
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12 text-center">
            <a href="javascript:void(0)" id="link-reminder-login"><small>Forgot password?</small></a>
        </div>
    </div>
</form>
@endsection

@section('js')
<script src="{{ asset('viewresources/login/login.js?=22072024') }}"></script>
@endsection