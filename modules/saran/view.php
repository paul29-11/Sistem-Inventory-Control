<!-- Content Header (Page header) -->
<section class="content-header">
 <h1>
   <i class="fa fa-folder-o icon-title"></i> Data Saran
 </h1>

</section>

<!-- Main content -->
<section class="content">
 <div class="row">
   <div class="col-md-12">

     <div class="box box-primary">
       <div class="box-body">
         <!-- tampilan tabel Barang -->
         <table id="dataTables1" class="table table-bordered table-striped table-hover">
           <!-- tampilan tabel header -->
           <thead>
             <tr>
               <th class="center">No.</th>
               <th class="center">Nama</th>
               <th class="center">Email</th>
               <th class="center">Subjek</th>
               <th class="center">Saran</th>
             </tr>
           </thead>
           <!-- tampilan tabel body -->
           <tbody>
           <?php
           $no = 1;
           // fungsi query untuk menampilkan data dari tabel Barang
           $query = mysqli_query($mysqli, "SELECT * FROM masukan")
                                           or die('Ada kesalahan pada query tampil Data Saran: '.mysqli_error($mysqli));

           // tampilkan data
           while ($data = mysqli_fetch_assoc($query)) {
             // menampilkan isi tabel dari database ke tabel di aplikasi
             echo "<tr>
                     <td width='30' class='center'>$no</td>
                     <td width='100' align='left'>$data[nama]</td>
                     <td width='100' align='left'>$data[email]</td>
                     <td width='100' align='left'>$data[subjek]</td>
                     <td width='200' align='left'>$data[saran]</td>
                   </tr>";
             $no++;
           }
           ?>
           </tbody>
         </table>
       </div><!-- /.box-body -->
     </div><!-- /.box -->
   </div><!--/.col -->
 </div>   <!-- /.row -->
</section><!-- /.content
