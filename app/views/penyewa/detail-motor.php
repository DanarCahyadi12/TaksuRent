<?php require_once "../app/views/templates/Header.php";?>

<section class='container-fluid'>
<?php require_once '../app/views/partials/navbar.php'; ?>
    <div class='w-75  m-auto mt-5'>
        <div class="row">
            <div class='col d-flex gap-3'>
                <img src='<?= $datas['motocycle']['url'] ?>' class='rounded-3 w-25'>
                <div>
                    <h3 class="fw-bold"><?= $datas['motocycle']['nama'] ?></h3>          
                    <table>
                        <tr>
                            <td>CC</td>
                            <td>: </td>
                            <td><?= $datas['motocycle']['cc'] ?> </td>
                        </tr>
                        <tr>
                            <td>Merk</td>
                            <td>: </td>
                            <td><?= $datas['motocycle']['merk'] ?> </td>
                        </tr>
                        <tr>
                            <td>Transmisi</td>
                            <td>: </td>
                            <td><?= $datas['motocycle']['transmisi'] ?> </td>
                        </tr>
                        <tr>
                            <td>Tipe</td>
                            <td>: </td>
                            <td><?= $datas['motocycle']['tipe'] ?> </td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>: </td>
                            <?php 
                                $status = $datas['motocycle']['status'] ? "disewa" : "belum disewa";
                            ?>
                            <td><?= $status ?> </td>
                        </tr>
                    </table>
                </div> 
            </div>
            <div>
                <h2 class='fw-bold'>Ketentuan</h2>
                <h6 class='fw-bold'>Kehilangan kunci :</h6>
                <ul>
                    <li>Biasa: 50rb</li>
                    <li>Kyles: 200rb</li>
                </ul>
                <h6 class='fw-bold'>Kehilangan jas hujan : 100rb</h6>
                <ul>
                    <li>Serah terima motor tidak bisa diwakilkan</li>
                    <li>Tidak memindahtangankan kendaraan kepada pihak lain dengan alasan apapun. </li>
                    <li>Tidak menggunakan kendaraan di area banjir.</li>
                    <li>Penggunaan motor tidak diperkenankan di luar bali</li>
                    <li>Telat mengembalikan motor 1 hari denda 80rb</li>
                    <li>Kerusakan sebagian atau seluruhnya yg disebabkan kelalaian penyewa, ban bocor karena paku atau faktor lain, dan kecelakaan menjadi tanggung jawab penuh penyewa. Penggantian part kendaraan wajib konfirmasi terlebih dahulu. </li>
                    <li>Kehilangan kendaraan, pihak penyewa harus mengganti unit dengan spesifikasi minimal sama, atau dalam bentuk uang, seharga kendaraan menurut harga pasaran, yang nominalnya akan ditentukan oleh penyedia</li>
                </ul>
                <div>
                    <form method="POST" action="<?= url('motor/sewa') ?>" enctype="multipart/form-data">
                        <h4>Pilih lama sewa</h4>
                        <div class="d-flex gap-3">
                            <select id='opsi' name="opsi">
                                <option value="hari">Harian</option>
                                <option value="minggu">Mingguan</option>
                                <option value="bulan">Bulanan</option>
                            </select>
                            <select id='lama-sewa' name="lama_sewa"></select>
                            <input type="text" id='price' disabled>
                        </div>
                        <div class='mt-5'>
                            <h3>Input data diri</h3>
                            <input type='text' name='nama_lengkap' placeholder="Nama lengkap" class='p-2' style='width:100%;'>
                            <div class='mt-3 d-flex flex-column'>
                                <label>Jaminan (KTP)</label>
                                <input type='file' name="ktp">
                            </div>
                            <div class='mt-3 d-flex flex-column'>
                                <label>SIM</label>
                                <input type='file' name="sim">
                            </div>
                        </div>
                        <button type='submit' class='btn btn-dark mt-3'>Sewa</button>
                    </form>
                </div>
            </div> 
        </div>
    </div>
</section>
<script src="../../js/detail-motor.js"> </script>
<?php require_once "../app/views/templates/Footer.php";?>