  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" >
          <strong> {{ date('d - m - Y') }}</strong>
        </a>
      </li>
  
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <!-- Right Header Navigation -->
      <ul class="nav navbar-nav-custom pull-right">
        <!-- User Dropdown -->
        <li class="nav-item dropdown">
          <a href="javascript:void(0)" class="" data-toggle="dropdown">
            <div class="media">
              <img src="{{asset('plugins/admin/dist/img/avatar3.png')}}" alt="User Avatar" class="user-avatar img-circle">
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">{{ Auth::user()->name }}</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-perfil">
              <i class="fas fa-envelope mr-2"></i> Perfil
            </a>
            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-password">
              <i class="fas fa-users mr-2"></i> Cambiar Contraseña
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa fa-ban mr-2"></i> Salir
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
                <button type="submit" style="display: none;"></button>
            </form>
          </div>
        </li>
      </ul>
      <style>
        .user-avatar {
          width: 40px; /* Ajusta el tamaño de la imagen según tus necesidades */
          height: 40px; /* Asegúrate de que la imagen sea cuadrada */
        }
      </style>
      <!-- END Right Header Navigation -->
    </ul>
  </nav>
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
  <!-- MODAL PARA ACTUALIZAR PERFIL -->
  <div class="modal fade" id="modal-perfil">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Perfil</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form id="form-user-update" class="form-horizontal form-bordered" action="{{ route('user.updateUser', ['id' => Auth::id()]) }}" method="POST">
                  @csrf
                  <!-- Asegúrate de que los nombres de los campos coincidan con los que esperas en el controlador -->
                  <input type="hidden" id="id" name="id" value="{{ Auth::user()->id }}">
                  <div class="row form-group">
                      <div class="col-md-4 text-center">
                          <input type="text" id="txtFirstName" name="txtFirstName" class="form-control" placeholder="Ingrese Nombre">
                          <label class="control-label">Nombre</label>
                      </div>
                      <div class="col-md-4 text-center">
                          <input type="text" id="txtSurName" name="txtSurName" class="form-control" placeholder="Ingrese Apellido Paterno">
                          <label class="control-label">Apellido Paterno</label>
                      </div>
                      <div class="col-md-4 text-center">
                          <input type="text" id="txtSurNameM" name="txtSurNameM" class="form-control" placeholder="Ingrese Apellido Materno">
                          <label class="control-label">Apellido Materno</label>
                      </div>
                      <div class="col-md-4 text-center">
                          <input type="text" id="txtDNIName" name="txtDNIName" class="form-control" placeholder="Ingrese DNI">
                          <label class="control-label">Documento de Identidad</label>
                      </div>
                      <div class="col-md-4 text-center">
                          <input type="text" id="txtEmail" name="txtEmail" class="form-control" placeholder="Ingrese Email">
                          <label class="control-label">Correo Electrónico</label>
                      </div>
                  </div>
              </form>
            </div>
            <div class="form-group form-actions">
                <div class="col-md-12 text-center">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="saveProfileBtn">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- /.modal -->

  <!-- MODAL PARA CAMBIAR CONTRASEÑA -->
  <div id="modal-password" class="modal fade" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h2 class="modal-title text-center text-danger">Cambiar Contraseña</h2>
              </div>
              <div class="modal-body">
                  <form id="form-password-update" class="form-horizontal form-bordered" action="{{ route('user.update', ['id' => Auth::id()]) }}" method="POST">
                      @csrf
                      <div class="form-group">
                          <label class="col-md-4 control-label">Contraseña Actual</label>
                          <div class="col-md-12">
                              <input type="password" id="txtPassword" name="txtPassword" class="form-control" placeholder="Ingrese Contraseña Actual">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-4 control-label">Contraseña Nueva</label>
                          <div class="col-md-12">
                              <input type="password" id="txtPassword1" name="txtPassword1" class="form-control" placeholder="Ingrese Contraseña Nueva">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-6 control-label">Repite la Contraseña</label>
                          <div class="col-md-12">
                              <input type="password" id="txtPassword2" name="txtPassword2" class="form-control" placeholder="Repite Contraseña Nueva">
                          </div>
                      </div>
                      <div class="form-group form-actions">
                          <div class="col-md-12 text-center">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                              <button type="button" class="btn btn-primary" onclick="sendFrmPassword();">Guardar</button>
                          </div>
                      </div>
                  </form>
              </div>                                
          </div>
      </div>
  </div>

@section('js')
<script src="{{ asset('viewresources/user/update.js?=30072024') }}"></script>
<script src="{{ asset('viewresources/user/updateUser.js?=2082024') }}"></script>
@endsection
