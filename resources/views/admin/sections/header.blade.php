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
  
  <style>
  .custom-modal-width {
    max-width: 45%; /* Puedes ajustar este valor según tus necesidades */
  }
  </style>
<!-- MODAL PARA CAMBIAR CONTRASEÑA -->
<div class="modal fade" id="modal-perfil" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
  <div class="modal-dialog custom-modal-width" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editUserModalLabel">Editar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editForm">
          <div class="form-group row">
            <div class="col-md-12 text-center">
              <input type="file" name="foto"  class="form-control" accept="image/jpg, image/png, image/gif, image/jpeg" >
              <label for="txtFirstName">Foto de Perfil</label>
            </div> 
            <div class="col-md-4">
              <label for="txtFirstName">Nombres</label>
              <input type="text" name="nombre" class="form-control" placeholder="Ingrese el Nombre">
            </div>
            <div class="col-md-4">
              <label for="txtSurName">Apellido Paterno</label>
              <input type="txtSurName" name="txtSurName" class="form-control" placeholder="Ingrese el apellido Paterno">
            </div>
            <div class="col-md-4">
              <label for="txtSurNameM">Apellido Materno</label>
              <input type="txtSurNameM" name="txtSurNameM" class="form-control" placeholder="Ingrese el apellido Materno">
            </div>
            <div class="col-md-4">
              <label for="txtSurDni">Documento</label>
              <input type="txtSurDni" name="txtSurDni" class="form-control" placeholder="Ingrese el apellido Materno">
            </div>
            <div class="col-md-4">
              <label for="txtCorreo">Correo Electronico</label>
              <input type="email" name="txtPassword" class="form-control" placeholder="Ingrese Nueva Contraseña">
            </div>
            <div class="col-md-4">
            <label for="txtCorreo">Genero del usuario</label>
              <div class="form-check form-check-inline">
                <input type="radio" name="sex" value="M" class="form-check-input" > Masculino
                <input type="radio" name="sex" value="F" class="form-check-input" > Feminino
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="updateUser($('#modal-perfil').data('idUser'));">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-password">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
        <form id="editForm">
          <div class="form-group row">
            <div class="col-md-12 text-center">
              <input type="file" name="foto"  class="form-control" accept="image/jpg, image/png, image/gif, image/jpeg" >
              <label for="txtFirstName">Foto de Perfil</label>
            </div> 
            <div class="col-md-4">
              <label for="txtFirstName">Nombres</label>
              <input type="text" name="nombre" class="form-control" placeholder="Ingrese el Nombre">
            </div>
            <div class="col-md-4">
              <label for="txtSurName">Apellido Paterno</label>
              <input type="txtSurName" name="txtSurName" class="form-control" placeholder="Ingrese el apellido Paterno">
            </div>
            <div class="col-md-4">
              <label for="txtSurNameM">Apellido Materno</label>
              <input type="txtSurNameM" name="txtSurNameM" class="form-control" placeholder="Ingrese el apellido Materno">
            </div>
            <div class="col-md-4">
              <label for="txtSurDni">Documento</label>
              <input type="txtSurDni" name="txtSurDni" class="form-control" placeholder="Ingrese el apellido Materno">
            </div>
            <div class="col-md-4">
              <label for="txtCorreo">Correo Electronico</label>
              <input type="email" name="txtPassword" class="form-control" placeholder="Ingrese Nueva Contraseña">
            </div>
            <div class="col-md-4">
            <label for="txtCorreo">Genero del usuario</label>
              <div class="form-check form-check-inline">
                <input type="radio" name="sex" value="M" class="form-check-input" > Masculino
                <input type="radio" name="sex" value="F" class="form-check-input" > Feminino
              </div>
            </div>
          </div>
        </form>
      </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


