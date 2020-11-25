<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SystemInvt Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="/adminlte/dist/css/bootstrap-select.min.css">
</head>
<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{URL::to('/')}}" class="nav-link">Home</a>
        </li>

      </ul>

      <!-- SEARCH FORM  BUSCADOR
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>-->

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <!-- Notifications Dropdown Menu 
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>-->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle btn btn-success btn-lg btn-block" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          {{ Auth::user()->name }}{{-- <i class="fas fa-arrow-alt-circle-down"></i> --}}
        </a>
        <div class="dropdown-menu " aria-labelledby="navbarDropdown">
          <a class="dropdown-item btn btn-danger btn-lg btn-block" href=" {{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->

      <a href="#" class="brand-link">
        <span class="brand-text font-weight-bold pl-5">SystemInvt</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="/adminlte/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info mr-2">
            <a href="#" class="d-block "> {{ Auth::user()->name }}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library   <i class="nav-icon fas fa-th"></i>produc 
                <i class="nav-icon fas fa-book"></i> facturas  
            <i class="nav-icon fas fa-file"></i> reportes 
             <i class="fas fa-users mr-2"></i>gestion usuarios-->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-handshake"></i>
                <p>
                  PROVEEDORES
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview ml-3">
                <li class="nav-item">
                  <a href="{{route('proveedor.create')}}" class="nav-link">
                    <i class="nav-icon far fa-plus-square"></i>
                    <p>Crear Proveedor</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('proveedor.index')}}" class="nav-link">
                    <i class="fas fa-list-ol m-1"></i>
                    <p>Listar Proveedores</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-bars"></i>
                <p>
                  CATEGORIAS
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview ml-3">
                <li class="nav-item">
                  <a href="{{route('categoria.create')}}" class="nav-link">
                    <i class="nav-icon far fa-plus-square"></i>
                    <p>Crear Categoria</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('categoria.index')}}" class="nav-link">
                    <i class="fas fa-list-ol m-1"></i>
                    <p>Listar Categorias</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-building"></i>
                <p>
                  ALMACENES
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview ml-3">
                <li class="nav-item">
                  <a href="{{route('almacen.create')}}" class="nav-link">
                    <i class="nav-icon far fa-plus-square"></i>
                    <p>Crear Almacen</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('almacen.index')}}" class="nav-link">
                    <i class="fas fa-list-ol m-1"></i>
                    <p>Listar Almacenes</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  PRODUCTOS
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview ml-3">
                <li class="nav-item">
                  <a href="{{route('producto.create')}}" class="nav-link">
                    <i class="nav-icon far fa-plus-square"></i>
                    <p>Crear Producto</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('producto.index')}}" class="nav-link">
                    <i class="fas fa-list-ol m-1"></i>
                    <p>Listar Productos</p>
                  </a>
                </li>
                <!-- <li class="nav-item">
                <a href="../../index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>  </p>
                </a>
              </li>-->
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                  COMPRAS
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview ml-3">
                <li class="nav-item">
                  <a href="{{route('compra.create')}}" class="nav-link">
                    <i class="nav-icon fas fa-cart-plus "></i>
                    <p>Crear Compra</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('compra.index')}}" class="nav-link">
                    <i class="fas fa-list-ol m-1"></i>
                    <p>Listar Compras</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/grafico" class="nav-link">
                    <i  class="fas fa-chart-pie mr-1"></i>
                    <p>GRAFICO</p>
                   
                  </a>
                </li>
              </ul>
            </li>
            
            {{-- <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="fas fa-user m-1"></i>
                <p>
                  GESTION USUARIOS
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview ml-3">
                <li class="nav-item">
                  <a href="/../../index.html" class="nav-link">
                    <i class="fas fa-male m-2"></i>
                    <p> Usuarios</p>
                  </a>
                </li>


              </ul>
            </li> --}}
            
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper bg-white">

      <!-- Main content -->
      <section class="content bg-white">
        
        @yield('contenido')

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.5
      </div>
      <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
      reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="/adminlte/plugins/jquery/jquery.min.js"></script>

  <!-- Bootstrap 4 -->
  <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DATA TABLE -->
  <script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="/adminlte/dist/js/bootstrap-select.min.js"> </script>
   

  <!-- AdminLTE App -->
  <script src="/adminlte/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="/adminlte/dist/js/demo.js"></script>
</body>

</html>