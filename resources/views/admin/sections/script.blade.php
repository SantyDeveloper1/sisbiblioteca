
<!-- jQuery -->
<script src="{{asset('plugins/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/admin/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/admin/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

<script src="{{asset('plugins/admin/dist/js/adminlte.js')}}"></script>
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

    @if(session('redirect'))
            var loginUrl = '{{ url('/login') }}';
            window.location.replace(loginUrl);
    @endif
</script>
@yield('js')
<!-- AdminLTE for demo purposes -->
<!--<script src="{{asset('plugins/admin/dist/js/demo.js')}}"></script>-->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="{{asset('plugins/admin/dist/js/pages/dashboard.js')}}"></script>-->
