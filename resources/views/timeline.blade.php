<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Timeline</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- AdminLTE css -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper" style="font-family:Arial, Helvetica, sans-serif">
  <!-- Navbar -->
  <nav class="navbar navbar-expand navbar-lightblue navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/galery" class="nav-link" style="font-weight: bold;">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" data-toggle="modal" data-target="#modalUpload" class="btn btn-light" style="font-weight: bold; font-family:Arial, Helvetica, sans-serif">Upload Galery <i class="fas fa-upload"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/logout') }}" role="button">
          <i class="fas fa-sign-out-alt fa-sm fa-sw"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Timeline</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Timeline</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Timelime example  -->
        <div class="row">
          @foreach ($galeris as $galeri)
          <div class="col-md-12">
            <!-- The time line -->
            <div class="timeline">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-info">{{ $galeri->tanggal }}</span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-envelope bg-blue"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i></span>
                  <h3 style="font-size: 17px; font-weight: bold; " class="timeline-header">{{ $galeri->judul }}</h3>

                  <div class="timeline-body">
                    <img src="{{ asset('images/'.$galeri->foto) }}" height="400" width="650" alt="photo"><br>
                    <p style="font-size: 16px; margin-bottom: -10px;">{{ $galeri->deskripsi }}</p>
                  </div>
                  <div class="timeline-footer">
                    <a style="font-weight: bold; font-size: 15px;" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalUpdate{{ $galeri->id }}">Edit</a>
                    <a style="font-weight: bold; font-size: 15px;" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusfoto{{ $galeri->id }}">Delete</a>
                    <a style="font-weight: bold;" class="btn btn-success btn-sm float-right" href="{{ asset('images/'.$galeri->foto) }}" download ><i class="fas fa-download"> </i></a>
                  </div>
                </div>
              </div>
              <!-- END timeline item -->

              <!-- END timeline item -->
              <div>
                <i class="fas fa-clock bg-gray"></i>
              </div>
            </div>
          </div>
          <div class="modal fade" id="modalUpdate{{ $galeri->id }}" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3>Upload Galery</h3>
                </div>
                <form action="{{ route('galery.update',$galeri->id) }}" method="post" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf
                  <div class="modal-body" >
                    <div class="form-group">
                      <label for="judul">Judul</label>
                      <input type="text" name="judul" value="{{ $galeri->judul }}" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="deskripsi">Deskripsi</label>
                      <input type="text" name="deskripsi" value="{{ $galeri->deskripsi }}" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="foto">Foto</label>
                      <input type="file" name="foto" class="form-control">
                      <img src="{{ asset('images/'.$galeri->foto) }}" height="150" width="150" alt="photo">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="modal fade" id="hapusfoto{{ $galeri->id }}" method="post">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3>Hapus Galery</h3>
                </div>
                <div class="modal-body">
                  <span>Yakin Ingin Dihapus?</span>
                </div>
                <div class="modal-footer">
                  <a href="{{ url('galery/'.$galeri->id) }}" type="submit" class="btn btn-danger">Hapus</a>
                  <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
          @endforeach
        </div>
      </div>
      <!-- /.timeline -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="modalUpload" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3>Upload Galery</h3>
        </div>
        <form action="/galery" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div>
              <!-- text input -->
              <div class="form-group">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control" placeholder="Enter ...">
              </div>
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi</label>
              <input type="text" name="deskripsi" class="form-control" placeholder="Enter ...">
            </div>
            <div class="form-group">
              <label for="foto">Foto</label>
              <input type="file" name="foto" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2022-2024 <a href="https://adminlte.io">AppGALERY</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>
</html>
