<?php include 'config.php';

if(isset($_POST ['id_angkatan'])) {
    $id_angkatan = $_POST['id_angkatan'];
    $exec = mysqli_query ($db,"SELECT * FROM angkatan WHERE id_angkatan= '$id_angkatan'");
    $res = mysqli_fetch_assoc ($exec);
    ?>
    <form action="editdataangkatan.php" method="POST">
        <div class="form-group">
            <input type="hidden" class="form-control" name="id_angkatan" value=" <?= $res ['id_angkatan'] ?>">
            </div>
            <div class="form-group">
                <label>Nama Angkatan</label>
                <input type="text" class="form-control" name="nama_angkatan" value=" <?= $res ['nama_angkatan'] ?>">
             </div>
             <div class="form-group">
             <label>Biaya</label>
                <input type="text" class="form-control" name="biaya" value=" <?= $res ['biaya'] ?>">
             </div>
             <div class="model-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" name="update" class="btn btn-warning">Update</button>
</div>
</form>
<?php }

if(isset($_POST ['id_jurusan'])) {
    $id_jurusan = $_POST['id_jurusan'];
    $exec = mysqli_query ($db,"SELECT * FROM jurusan WHERE id_jurusan= '$id_jurusan'");
    $res = mysqli_fetch_assoc ($exec);
    ?>
    <form action="editdatajurusan.php" method="POST">
        <div class="form-group">
            <input type="hidden" class="form-control" name="id_jurusan" value=" <?= $res ['id_jurusan'] ?>">
            </div>
            <div class="form-group">
                <label>Nama Jurusan</label>
                <input type="text" class="form-control" name="nama_jurusan" value=" <?= $res ['nama_jurusan'] ?>">
             </div>
             <div class="model-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" name="update" class="btn btn-warning">Update</button>
</div>
</form>
<?php }

if(isset($_POST ['id_kelas'])) {
    $id_kelas = $_POST['id_kelas'];
    $exec = mysqli_query ($db,"SELECT * FROM kelas WHERE id_kelas='$id_kelas'");
    $res = mysqli_fetch_assoc ($exec);
    ?>
    <form action="editdatakelas.php" method="POST">
        <div class="form-group">
            <input type="hidden" class="form-control" name="id_kelas" value=" <?= $res ['id_kelas'] ?> ">
            </div>
            <div class="form-group">
                <label>Nama Kelas</label>
                <input type="text" class="form-control" name="nama_kelas" value=" <?=
            $res ['nama_kelas'] ?> ">
             </div>
             <div class="model-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" name="update"> class="btn btn-warning">Update</button>
</div>
</form>
<?php }
if(isset($_POST ['id_siswa'])) {
    $id_siswa = $_POST['id_siswa'];
    $query = "SELECT siswa.*,angkatan.*,jurusan.*,kelas.*
    FROM siswa,angkatan,jurusan,kelas WHERE siswa.id_angkatan = angkatan.id_angkatan
    AND siswa.id_jurusan = jurusan.id_jurusan AND siswa.id_kelas = kelas.id_kelas
    AND siswa.id_siswa = $id_siswa";
    $exec = mysqli_query($db,$query);
    $res = mysqli_fetch_assoc($exec);
    ?>
    <form action="editdatasiswa.php" method="POST">
        <div class="form-row">
            <input type="hidden" name="id_siswa" value="<?= $res['id_siswa'] ?>">
            <input type="hidden" name="nisn" value="<?= $res ['nisn']?>">
            <div class="form-group col-md-12">
                <label>Nama Siswa</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama Siswa" value="<?= $res['nama'] ?>">
</div>
<div class="form-group col-md-6">
    <label> NISN </label>
    <input type="text" class="form-control mb-2" name="nisn" value="<?= $res['nisn'] ?>">
</div>
<div class="form-group col-md-6">
    <label>Angkatan</label>
    <select class="form-control mb-2" name="id_angkatan">
    <option class="">-Plih Angkatan-<option>
        <?php
        $exec = mysqli_query($db,"SELECT * FROM angkatan order by id_angkatan");
        while ($angkatan=mysqli_fetch_assoc($exec)):
            if($res['id_angkatan'] == $angkatan['id_angkatan']) {
            $selected = 'selected';
            }else{
                $selected=""; 
            }  
            echo "<option  $selected value=".$angkatan['id_angkatan'] .">" .$angkatan ['nama_angkatan'] . "</option>";
        endwhile;
        ?>
        </select>
        </div>
        <div class="form-group col-md-6">
    <label>Nama Kelas</label>
    <select class="form-control mb-2" name="id_kelas">
    <option class="">-Plih Kelas-<option>
        <?php
        $exec = mysqli_query($db,"SELECT * FROM kelas order by id_kelas");
        while ($angkatan=mysqli_fetch_assoc($exec)):
            if($res['id_kelas'] == $angkatan['id_kelas']) {
            $selected = 'selected';
            }else{
                $selected=""; 
            }  
            echo "<option  $selected value=".$angkatan['id_kelas'] .">" .$angkatan ['nama_kelas'] . "</option>";
        endwhile;
        ?>
        </select>
        </div>
<div class="form-group col-md-6">
    <label>Nama jurusan</label>
    <select class="form-control mb-2" name="id_jurusan">
    <option class="">-Plih Jurusan-<option>
<?php
        $exec = mysqli_query($db,"SELECT * FROM jurusan order by id_jurusan");
        while ($angkatan=mysqli_fetch_assoc($exec)):
            if($res['id_jurusan'] == $angkatan['id_jurusan']) {
            $selected = 'selected';
            }else{
                $selected=""; 
            }  
            echo "<option  $selected value=".$angkatan['id_jurusan'] .">" .$angkatan ['nama_jurusan'] . "</option>";
        endwhile;
        ?>
        </select>
        </div>
        <textarea class="form-control mt-2" name="alamat" placeholder="Alamat Siswa"> <?= $res['alamat'] ?></textarea>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
    </form>
        </div>
    <?php }
    ?>
    