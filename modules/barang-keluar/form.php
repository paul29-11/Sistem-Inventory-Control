<script type="text/javascript">
  function tampil_barang(input){
    var num = input.value;

    $.post("modules/barang-keluar/barang.php", {
      dataidbarang: num,
    }, function(response) {
      $('#stok').html(response)

      document.getElementById('jumlah_keluar').focus();
    });
  }

  function cek_jumlah_keluar(input) {
    jml = document.formBarangKeluar.jumlah_keluar.value;
    var jumlah = eval(jml);
    if(jumlah < 1){
      alert('Jumlah Keluar Tidak Boleh Nol !!');
      input.value = input.value.substring(0,input.value.length-1);
    }
  }

  function hitung_total_stok() {
    bil1 = document.formBarangKeluar.stok.value;
    bil2 = document.formBarangKeluar.jumlah_keluar.value;

    if (bil2 == "") {
      var hasil = "";
    }
    else {
      var hasil = eval(bil1) - eval(bil2);
    }

    document.formBarangKeluar.total_stok.value = (hasil);
  }
</script>

<?php
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?>
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Data Barang Keluar
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-dashboard"></i> Dashboard </a></li>
      <li><a href="?module=barang_keluar"> Barang Keluar </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/barang-keluar/proses.php?act=insert" method="POST" name="formBarangKeluar">
            <div class="box-body">
              <?php
              // fungsi untuk membuat kode barang keluar
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(kode_transaksi,7) as kode FROM barang_keluar
                                                ORDER BY kode_transaksi DESC LIMIT 1")
                                                or die('Ada kesalahan pada query tampil kode_transaksi : '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
                  // mengambil data kode barang keluar
                  $data_id = mysqli_fetch_assoc($query_id);
                  $kode    = $data_id['kode']+1;
              } else {
                  $kode = 1;
              }

              // buat kode_barang_keluar
              $tahun          = date("Y");
              $buat_id        = str_pad($kode, 7, "0", STR_PAD_LEFT);
              $kode_transaksi = "TK-$tahun-$buat_id";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">Kode Barang keluar</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kode_transaksi" value="<?php echo $kode_transaksi; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_keluar" autocomplete="off" value="<?php echo date("d-m-Y"); ?>" required>
                </div>
              </div>

              <hr>

              <div class="form-group">
                <label class="col-sm-2 control-label">Barang</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="kode_barang" data-placeholder="-- Pilih Barang --" onchange="tampil_barang(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                      $query_barang = mysqli_query($mysqli, "SELECT kode_barang, nama_barang FROM barang ORDER BY nama_barang ASC")
                                                            or die('Ada kesalahan pada query tampil barang: '.mysqli_error($mysqli));
                      while ($data_barang = mysqli_fetch_assoc($query_barang)) {
                        echo"<option value=\"$data_barang[kode_barang]\"> $data_barang[kode_barang] | $data_barang[nama_barang] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>

              <span id='stok'>
              <div class="form-group">
                <label class="col-sm-2 control-label">Stok</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="stok" name="stok" readonly required>
                </div>
              </div>
              </span>

              <div class="form-group">
                <label class="col-sm-2 control-label">Jumlah Keluar</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="jumlah_keluar" name="jumlah_keluar" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" onkeyup="hitung_total_stok(this)&cek_jumlah_keluar(this)" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Total Stok</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="total_stok" name="total_stok" readonly required>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=barang_keluar" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
?>
