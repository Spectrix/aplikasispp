<?php
include 'config.php';
include 'header.php';

if(isset($_GET['nisn'])){
$nisn = $_GET['nisn'];
$query = "SELECT siswa.*, angkatan. *, jurusan.*, kelas.* 
FROM siswa, angkatan, jurusan, kelas 
WHERE siswa.id_angkatan = angkatan.id_angkatan
AND siswa.id_jurusan=jurusan.id_jurusan
AND siswa.id_kelas = kelas.id_kelas AND siswa.nisn ='$nisn' ";
$exec = mysqli_query($db, $query);
$siswa = mysqli_fetch_assoc($exec);
$id_siswa = $siswa['id_siswa'];
$nisn = $siswa['nisn'];
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Biodata Siswa</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <td>NISN</td>
                    <td><?= $siswa[ 'nisn'] ?></td>
                </tr>
                <tr>
                    <td>Nama Siswa</td>
                    <td><?= $siswa[ 'nama'] ?></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td><?= $siswa['nama_kelas'] ?></td>
                </tr>
                <tr>
                    <td>Tahun Ajaran</td>
                    <td><?= $siswa['nama_angkatan'] ?></td>
                </tr>
                </table>
        </div>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTables" width="100%" cellspacing="10">
                <thead>
                    <tr>
                        <td>NO</td>
                        <td>Bulan</td>
                        <td>Jatuh Tempo</td>
                        <td>No Bayar</td>
                        <td>Tanggal Bayar</td>
                        <td>Jumlah</td>
                        <td>Keterangan</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
            <?php
            $no=1;
//menampilkan data pembayaran berdasarkan id_siswa
//dan diurutkan berdasarkan jatuh tempo
$query = "SELECT * FROM pembayaran WHERE id_siswa = '$id_siswa'
ORDER BY jatuhtempo ASC";
$exec = mysqli_query($db, $query);
while($res = mysqli_fetch_assoc($exec)) {
?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $res['bulan'] ?></td>
                        <td><?= $res['jatuhtempo'] ?></td>
                        <td><?= $res['nobayar'] ?></td>
                        <td><?= $res['tglbayar'] ?></td>
                        <td><?= $res['jumlah'] ?></td>
                        <td><?= $res['ket'] ?></td>
                        <td>
                           <?php
                           if ($res['nobayar'] == ''){
                            echo "<a href='proses_pembayaran.php?nisn=$nisn&act=bayar&id=$res[idspp]'></a>";
                            echo "<a class='btn btn-primary btn-sm' href='proses_pembayaran.php?nisn=$nisn&act=bayar&id=$res[idspp]'>Bayar</a>";
                           }else{
                            echo "</a>";
                            echo "<a class='btn btn-danger btn-sm' href='proses_pembayaran.php?nisn=$nisn&act=batal&id=$res[idspp]'>Batal</a>";
                           }
                           ?>
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
<?php } ?>