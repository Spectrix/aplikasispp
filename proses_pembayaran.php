<?php
session_start();
include 'config.php';
if(isset($_GET['act'])){
    if($_GET['act']=='bayar'){
        $idspp = $_GET['id'];
        $nisn = $_GET['nisn'];
        $tglbayar = date('Y-m-d');
//nomor bayar di generate berdasarkan waktu pembayaran
        $nobayar = date('dmYHisis');
/*
id_admin untuk menentukan admin aktif (logged in) yang melakukan 
pendataan pembayaran spp siswa
*/
        $id_admin = $_SESSION['admin'];
/*
variabel $byr untuk proses query pembaruan data jika spp dibayarkan,
maka akan tercatat lunas
*/
        $byr = mysqli_query($db , "UPDATE pembayaran SET nobayar = '$nobayar',
        tglbayar = '$tglbayar', ket = 'LUNAS',id_admin = '$id_admin'
        WHERE idspp = '$idspp'");
        if($byr){
            header('location: pembayaran.php?nisn='.$nisn);
        }else{
            echo "<script>alert('gagal')</script>";
        }
    }else if($_GET['act']=='batal'){
        $idspp = $_GET['id'];
        $nisn = $_GET['nisn'];
/*
variabel $batal 

*/
        $batal = mysqli_query($db ,"UPDATE pembayaran SET nobayar = null,
        tglbayar = null, ket = null, id_admin = null WHERE idspp = '$idspp'");
        if ($batal){
            header('location: pembayaran.php?nisn='.$nisn);
        }
    }
}
?>