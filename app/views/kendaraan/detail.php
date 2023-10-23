<div class="container mt-5">
    <div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?= $data['kendaraan']['model']; ?> (<?= $data['kendaraan']['tahun']; ?>)</h5>
        <h6 class="card-subtitle mb-2 text-body-secondary"><?= $data['kendaraan']['merek']; ?></h6>
        <p class="card-text"><?= $data['kendaraan']['deskripsi']; ?></p>
        <a href="<?= BASEURL; ?>/kendaraan" class="card-link">Card link</a>
    </div>
    </div>
</div>