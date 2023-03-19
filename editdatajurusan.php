<?php
include 'header.php';
include 'config.php';
?>

<button type=" button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahJurusan">Tambah Data </button>

  
<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">data jurusan</h6>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr class="text-center">
                <th width="50">No</th>
                <th>Nama jurusan</th>
                <th width="150">Aksi</th>
            </tr>
</thead>
<tbody>

<?php
$no=1;
$query = "SELECT * FROM jurusan";
$exec =mysqli_query($db,$query);
while($res =mysqli_fetch_assoc($exec)):
?>
<tr>  

<td class="text-center"><?= $no++ ?></td>

<td><?= $res ['nama_jurusan'] ?></td>

<td class="text-center">
    <div class="btn-group mr-2" role="group" aria-label="Action group button">
    <a href="#" class="view_data btn btn-sm btn-warning" data-toggle="modal"
data-target="#editJurusan" id="<?php echo 
$res['id_jurusan']; ?>">Update</a>
    <a href="editdatajurusan.php?id_jurusan=<?= $res['id_jurusan']?>"
    class="btn btn-sm btn-danger" onclick="return confirm('Apakah Yakin ingin Menghapus data?')">delete</a>
</div>
</td>
</tr>
<?php endwhile; ?>
</tbody>
</table>
</div>
</div>
</div>

<?php include 'footer.php'; ?>
<!-- Modal -->
<div class="modal fade" id="tambahJurusan" tabindex="-1" aria-
labelledby="exampleModalLabel" aria-hidden="true"> 
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel"> Modal title</h5> 
<button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="editdatajurusan.php" method="POST">
<input type="text" name="nama_jurusan" placeholder="Nama jurusan" class="form-
control mb-2">

<div class="modal-footer">
<button type="button" onClick="self.history.back()" class="btn btn-secondary" data-bs-
dismiss="modal">Batal</button> <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
</div>
</form>
</div>
</div>
</div>
</div>
<?php
//Proses tambah data ke dalam tabel database 
if(isset($_POST['simpan'])) {
   
 
$nama_jurusan = htmlentities(strip_tags(strtoupper($_POST['nama_jurusan'])));
 
$query = "INSERT INTO jurusan (nama_jurusan) VALUES ('$nama_jurusan')";
$exec = mysqli_query($db, $query);
if($exec) {
echo "<script>alert('data jurusan berhasil disimpan') 
document.location = 'editdatajurusan.php';</script>";
}else {
echo "<script>alert('data jurusan gagal disimpan') 
document.location = 'editdatajurusan.php';</script>";
}
}
//

//<!------Proses hapus data pada tabel database---->
if(isset($_GET['id_jurusan'])){
	$id_jurusan = $_GET['id_jurusan'];
	$exec = mysqli_query($db,"DELETE FROM jurusan WHERE id_jurusan='$id_jurusan' ");
	if($exec){
			echo "<script>alert('data jurusan berhasil dihapus')
			document.location = 'editdatajurusan.php';</script>";
	}else{
			echo "<script>alert('data jurusan gagal dihapus')
			document.location = 'editdatajurusan.php';</script>";
	}
}
//update


if(isset($_POST['Update'])) {

$id_jurusan = $_POST ['id_jurusan'];
$nama_jurusan = $_POST ['nama_jurusan'];


	$query = "UPDATE jurusan SET nama_jurusan='$nama_jurusan'
	WHERE id_jurusan='$id_jurusan'";
	$exec = mysqli_query ($db,$query);
	if($exec){
			echo "<script>alert('data jurusan berhasil diedit')
			document.location = 'editdatajurusan.php'</script>;";
			}else {
					echo "<script>alert('data jurusan gagaldied it')
					document.location= 'editdatajurusan.php' </script>";
			}
	}

?>


<div class="modal fade" id="editJurusan" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Update Data jurusan</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body" id="datajurusan">
</div>
</div>
</div>
</div>
<script type="text/javascript">
  $('.view_data').click(function(){
    var id_jurusan= $(this).attr('id');
    $.ajax({
        url: 'view_jurusan.php',
        method:'POST',
        data:{id_jurusan:id_jurusan},
        success:function (data){
            $('#datajurusan').html(data)
            $('#editjurusan').modal('show')
        }
    })
})
</script>











    


