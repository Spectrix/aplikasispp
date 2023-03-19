<?php

include 'header.php';

include 'config.php';

?>

<!-- Data Siswa untuk menuju proses pembayaran SPP -->

<div class="card shadow mb-4">

    <div class="card-header py-3">

        <h6 class="m- font-weight-bold text-primary">Data Siswa</h6>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">

                <thead>

                    <tr class="text-center">

                        <th>NIS</th>

                        <th>Nama Siswa</th>

                        <th>Angkatan</th>

                        <th>Kelas</th>

                        <th>Jurusan</th>

                        <th>Alamat</th>

                        <th>Aksi</th>

                    </tr>

                </thead>
                <tbody>

                    <?php

$query = "SELECT siswa.*, angkatan.*, jurusan.*, kelas.*

FROM siswa, angkatan, jurusan, kelas

WHERE siswa.id_angkatan=angkatan.id_angkatan 

AND siswa.id_jurusan=jurusan.id_jurusan 

AND siswa.id_kelas = kelas.id_kelas ORDER BY id_siswa";

$exec = mysqli_query($db, $query);

while($res = mysqli_fetch_assoc($exec)) :

?>

                    <tr>

                        <td>
                            <?= $res['nisn'] ?>
                        </td>

                        <td>
                            <?= $res ['nama'] ?>
                        </td>

                        <td>
                            <?= $res ['nama_angkatan'] ?>
                        </td>
                        <td>
                            <?= $res ['nama_kelas'] ?>
                        </td>

                        <td>
                            <?= $res [ 'nama_jurusan'] ?>
                        </td>

                        <td>
                            <?= $res['alamat'] ?>
                        </td>

                        <td class="text-center">

                            <!-- Tombol aksi pembayaran spp siswa -->

                            <a href="pembayaran.php?nisn=<?= $res['nisn'] ?>"
                                class="btn btn-sm btn-primary">Pembayaran</a>

                        </td>

                    </tr>
                    <?php endwhile; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php include 'footer.php'; ?>