<?php include 'config.php';

if(isset($_POST['id_jurusan'])) {
    $id_jurusan= $_POST['id_jurusan'];
    $exec = mysqli_query($db,"SELECT * FROM jurusan WHERE 
    id_jurusan='$id_jurusan'");
    $res = mysqli_fetch_assoc ($exec);
    ?>
    <form action="editdatajurusan.php" method="POST">
        <div class="form-group">
            <input type="hidden" class="form-control" name="id_jurusan" value="<?=
            $res ['id_jurusan'] ?>">
        </div>
        <div class="form-group">
            <label>nama jurusan </label>
            <input type="text" class="form-control" name="nama_jurusan" value="<?=
            $res ['nama_jurusan'] ?>">
            </div>
            
            <div class="modal-footer">
                <button type="button"  onClick="self.history.back()" class="btn btn-secondary" data-bs-dismiss="modal">
                    Batal </button>
                    <button type="submit" name="Update" class="btn btn-warning">
                        Update</button>
</div>
</form>


 <?php } ?>
