  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-dashboard icon-title"></i> Dashboard
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <div class="alert alert-info alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <p style="font-size:15px">
            <i class="icon fa fa-user"></i> Selamat datang <strong><?php echo $_SESSION['nama_user']; ?></strong> di Aplikasi Inventory Control.
          </p>
        </div>
      </div>
    </div>

    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div style="background: -webkit-linear-gradient(left, #8A2BE2, #6495ED);;color:#fff" class="small-box">
          <div class="inner">
            <?php
            // fungsi query untuk menampilkan data dari tabel barang
            $query = mysqli_query($mysqli, "SELECT COUNT(kode_barang) as jumlah FROM barang")
                                            or die('Ada kesalahan pada query tampil Data Barang: '.mysqli_error($mysqli));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>Data Barang</p>
          </div>
          <div class="icon">
            <i class="fa fa-folder"></i>
          </div>
          <?php
          if ($_SESSION['hak_akses']!='Manajer') { ?>
            <a href="?module=form_barang&form=add" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
          <?php
          } else { ?>
            <a class="small-box-footer"><i class="fa"></i></a>
          <?php
          }
          ?>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div style="background: -webkit-linear-gradient(left, #1E90FF, #0000FF);color:#fff" class="small-box">
          <div class="inner">
            <?php
            // fungsi query untuk menampilkan data dari tabel barang masuk
            $query = mysqli_query($mysqli, "SELECT COUNT(kode_transaksi) as jumlah FROM barang_masuk")
                                            or die('Ada kesalahan pada query tampil Data Barang Masuk: '.mysqli_error($mysqli));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>Data Barang Masuk</p>
          </div>
          <div class="icon">
            <i class="fa fa-arrow-circle-left"></i>
          </div>
          <?php
          if ($_SESSION['hak_akses']!='Manajer') { ?>
            <a href="?module=form_barang_masuk&form=add" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
          <?php
          } else { ?>
            <a class="small-box-footer"><i class="fa"></i></a>
          <?php
          }
          ?>
        </div>
      </div>
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div style="background: -webkit-linear-gradient(left, #BA55D3, #FF69B4);color:#fff" class="small-box">
          <div class="inner">
            <?php
            // fungsi query untuk menampilkan data dari tabel barang masuk
            $query = mysqli_query($mysqli, "SELECT COUNT(kode_transaksi) as jumlah FROM barang_keluar")
                                            or die('Ada kesalahan pada query tampil Data barang Keluar: '.mysqli_error($mysqli));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>Data Barang Keluar</p>
          </div>
          <div class="icon">
            <i class="fa fa-arrow-circle-right"></i>
          </div>
          <?php
          if ($_SESSION['hak_akses']!='Manajer') { ?>
            <a href="?module=form_barang_keluar&form=add" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
          <?php
          } else { ?>
            <a class="small-box-footer"><i class="fa"></i></a>
          <?php
          }
          ?>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div style="background: -webkit-linear-gradient(left, #EE82EE, #FF0000); color:#fff" class="small-box">
          <div class="inner">
            <?php
            // fungsi query untuk menampilkan data dari tabel barang
            $query = mysqli_query($mysqli, "SELECT COUNT(kode_barang) as jumlah FROM barang")
                                            or die('Ada kesalahan pada query tampil Data Barang: '.mysqli_error($mysqli));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>Laporan Stok Barang</p>
          </div>
          <div class="icon">
            <i class="fa fa-file-text-o"></i>
          </div>
          <a href="?module=lap_stok" class="small-box-footer" title="Cetak Laporan" data-toggle="tooltip"><i class="fa fa-print"></i></a>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div style="background: -webkit-linear-gradient(left, #FF4500, #FFA500);color:#fff" class="small-box">
          <div class="inner">
            <?php
            // fungsi query untuk menampilkan data dari tabel barang masuk
            $query = mysqli_query($mysqli, "SELECT COUNT(kode_transaksi) as jumlah FROM barang_masuk")
                                            or die('Ada kesalahan pada query tampil Data Barang Masuk: '.mysqli_error($mysqli));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>Laporan Barang Masuk</p>
          </div>
          <div class="icon">
            <i class="fa fa-file-text-o"></i>
          </div>
          <a href="?module=lap_barang_masuk" class="small-box-footer" title="Cetak Laporan" data-toggle="tooltip"><i class="fa fa-print"></i></a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div style="background: -webkit-linear-gradient(left, #FFFF00, #98FB98);color:#fff" class="small-box">
          <div class="inner">
            <?php
            // fungsi query untuk menampilkan data dari tabel barang masuk
            $query = mysqli_query($mysqli, "SELECT COUNT(kode_transaksi) as jumlah FROM barang_keluar")
                                            or die('Ada kesalahan pada query tampil Data Barang Keluar: '.mysqli_error($mysqli));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>Laporan Barang Keluar</p>
          </div>
          <div class="icon">
            <i class="fa fa-file-text-o"></i>
          </div>
          <a href="?module=lap_barang_keluar" class="small-box-footer" title="Cetak Laporan" data-toggle="tooltip"><i class="fa fa-print"></i></a>
        </div>
      </div><!-- ./col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
