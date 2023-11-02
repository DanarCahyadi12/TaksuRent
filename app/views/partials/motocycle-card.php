
<?php foreach($datas['motocycles'] as $motocycle): ?>
    <?php $status = $motocycle['status'] ? 'Disewa' : 'Belum disewa'  ?>
    <div class="card" style="width: 13rem;">
      <img src="<?php echo $motocycle['url'] ?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?= $motocycle['nama'] ?></h5>
        <table>
            <tr>
                <td>CC </td>
                <td> :<?= $motocycle['cc'] ?> </td>
            </tr>
            <tr>
                <td>Status</td>
                <td> :<?= $status?> </td>
            </tr>
        </table>
        <a href="<?= url('motor/detail/' . $motocycle['id']) ?>" class='btn btn-sm btn-dark mt-3'>Detail</a>
    </div>
    </div>
<?php endforeach; ?>