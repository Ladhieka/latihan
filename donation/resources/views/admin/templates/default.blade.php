<!DOCTYPE html>
<html>

    @include('admin.templates.partials.head')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
    @include('admin.templates.partials.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    @include('admin.templates.partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.templates.partials.header')
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      @yield('content')
      <h1>test</h1>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    @include('admin.templates.partials.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
    @include('admin.templates.partials.scripts')
</body>
</html>
