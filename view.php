<?php include 'config.php';

if(isset($_POST['id_angkatan'])) {
    $id_angkatan= $_POST['id_angkatan'];
    $exec = mysqli_query($db,"SELECT * FROM angkatan WHERE 
    id_angkatan='$id_angkatan'");
    $res = mysqli_fetch_assoc ($exec);
    ?>
    <form action="editdataangkatan.php" method="POST">
        <div class="form-group">
            <input type="hidden" class="form-control" name="id_angkatan" value="<?=
            $res ['id_angkatan'] ?>">
        </div>
        <div class="form-group">
            <label>nama Angkatan </label>
            <input type="text" class="form-control" name="nama_angkatan" value="<?=
            $res ['nama_angkatan'] ?>">
            </div>
            <div class="form-group">
            <label>Biaya </label>
            <input type="text" class="form-control" name="biaya" value="<?=
            $res ['biaya'] ?>">
            </div>
            <div class="modal-footer">
                <button type="button" onClick="self.history.back()" class="btn btn-secondary" data-bs-dismiss="modal">
                    Batal </button>
                    <button type="submit" name="Update" class="btn btn-warning">
                        Update</button>
</div>
</form>


 <?php } ?>
