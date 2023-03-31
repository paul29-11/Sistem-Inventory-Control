<?php
  session_start();
  include"config/database.php";
  if(isset($_POST['send'])):
    if($_SESSION['catcha_text'] != $_POST['captcha']){
      echo "<script>alert('Kode capcha salah');</script>";
    }else{
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $subjek = $_POST['subjek'];
        $saran = $_POST['saran'];

  $mysqli->query("insert into masukan set
  nama ='$nama',
  email ='$email',
  subjek ='$subjek',
  saran ='$saran'");
  echo "<script>alert('Terimakasi telah mengirim masukan');</script>";

}

endif;
  echo "<meta http-equiv='refresh' content='1;url=index.php'>";
?>
