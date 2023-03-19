<?php include 'config.php';

if(isset($_POST['id_kelas'])) {
    $id_kelas= $_POST['id_kelas'];
    $exec = mysqli_query($db,"SELECT * FROM kelas WHERE 
    id_kelas='$id_kelas'");
    $res = mysqli_fetch_assoc ($exec);
    ?>
    <form action="editdatakelas.php" method="POST">
        <div class="form-group">
            <input type="hidden" class="form-control" name="id_kelas" value="<?=
            $res ['id_kelas'] ?>">
        </div>
        <div class="form-group">
            <label>nama kelas </label>
            <input type="text" class="form-control" name="nama_kelas" value="<?=
            $res ['nama_kelas'] ?>">
            </div>
            
            <div class="modal-footer">
                <button type="button"  onClick="self.history.back()" class="btn btn-secondary" data-bs-dismiss="modal">
                    Batal </button>
                    <button type="submit" name="Update" class="btn btn-warning">
                        Update</button>
</div>
</form>


 <?php } ?>
