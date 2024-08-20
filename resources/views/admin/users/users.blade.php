@include('admin/sections.t_inicio')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('plugins/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        @include('admin/sections.header')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('admin/sections.menu')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Users</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <!-- Main content -->
            <style>
                th {
                    background-color: blue;
                    color: white;
                }
            </style>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h3 class="mb-0">Lista de Usuarios</h3>
                                    <a href="#" class="btn btn-primary btn-sm ml-auto" data-toggle="modal" data-target="#modal-InsertUser" title="Nuevo Registro Usuario">
                                        <i class="fa fa-plus"></i> Nuevo
                                    </a>
                                </div>
                                <div class="card-body">
                                    <table id="example" class="table table-striped table-bordered table-hover dt-responsive" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th class="all text-center">Nro.</th>
                                                <th class="none text-center">Cuenta</th>
                                                <th class="text-center">Nombre</th>
                                                <th class="all text-center">Apellido Paterno</th>
                                                <th class="none text-center">Apellido Materno</th>
                                                <th class="all text-center">Documento</th>
                                                <th class="none text-center">Email</th>
                                                <th class="all text-center">Género</th>
                                                <th class="text-center">Estado</th>
                                                <th class="none text-center">Registrado</th>
                                                <th class="all text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i = 1; @endphp
                                            @foreach($users as $user)
                                                @if($user->id !== Auth::user()->id)
                                                    <tr class="odd">
                                                        <td class="text-center">{{ $i }}</td>
                                                        <td class="text-center">{{ $user->id }}</td>
                                                        <td class="text-center">{{ $user->name }}</td>
                                                        <td class="text-center">{{ $user->surName }}</td>
                                                        <td class="text-center">{{ $user->surNameM }}</td>
                                                        <td class="text-center">{{ $user->Surdni }}</td>
                                                        <td class="text-center">{{ $user->email }}</td>
                                                        <td class="text-center">
                                                            @if($user->gender == 'M')
                                                                <label class="label btn-primary"><i class="fa fa-male"></i> Masculino</label>
                                                            @else
                                                                <label class="label btn-danger"><i class="fa fa-female"></i> Femenino</label>
                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                            @if($user->stateUser == 0)
                                                                <label class="label btn-danger"><i class="fa fa-times"></i> Inactivo</label>
                                                            @else
                                                                <label class="label btn-success"><i class="fa fa-check"></i> Activo</label>
                                                            @endif
                                                        </td>
                                                        <td class="text-center">{{ $user->created_at }}</td>
                                                        <td class="text-center">
                                                            <div class="btn-group btn-group-xs">
                                                                <a href="#" title="Edit User" class="btn btn-success {{ $user->stateUser == 0 ? 'disabled' : '' }}">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <a href="#" title="View Details" class="btn btn-info {{ $user->stateUser == 0 ? 'disabled' : '' }}">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                                <a href="#" title="Delete User" class="btn btn-danger {{ $user->stateUser == 0 ? 'disabled' : '' }}">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @php $i++; @endphp
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
        </div>
        <!-- /.content-wrapper -->

        @include('admin/sections.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('admin/sections.script')

    <link href="{{ asset('plugins/assets/template/datatables/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/assets/template/datatables/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('plugins/assets/template/datatables/datatable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/assets/template/datatables/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/assets/template/datatables/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/assets/template/datatables/table-datatables-responsive.js') }}" type="text/javascript"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true
            });
        });
    </script>

    <!-- MODAL PARA INSERTAR USUARIO -->
    <div class="modal fade" id="modal-InsertUser">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Insertar Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frm-InsertUser" class="form-horizontal form-bordered" action="{{ url('user/insertUser') }}" method="POST">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-4 text-center">
                                <input type="text" class="form-control txtFirstName" name="txtFirstName" placeholder="Ingrese Nombre">
                                <label class="control-label">Nombre</label>
                            </div>
                            <div class="col-md-4 text-center">
                                <input type="text" class="form-control txtSurName" name="txtSurName" placeholder="Ingrese Apellido Paterno">
                                <label class="control-label">Apellido Paterno</label>
                            </div>
                            <div class="col-md-4 text-center">
                                <input type="text" class="form-control txtSurNameM" name="txtSurNameM" placeholder="Ingrese Apellido Materno">
                                <label class="control-label">Apellido Materno</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="form-group form-actions">
                    <div class="col-md-12 text-center">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" onclick="sendFrmUserInsert();">Registrar datos</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal -->

    @section('js')
        <script src="{{ asset('viewresources/user/insertUser.js?=19082024') }}"></script>
    @endsection
</body>
