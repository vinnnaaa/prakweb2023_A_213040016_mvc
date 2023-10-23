<div class="container mt-3">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah Data Kendaraan
            </button>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/kendaraan/cari" method="post">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari model, merek, tahun..." name="keyword" id="keyword" autocomplete="off">
                <button class="btn btn-outline-primary" type="submit" id="cari">Cari</button>
            </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <h3>Daftar Kendaraan</h3>
            <ul class="list-group">
                <?php foreach($data['kendaraan'] as $mhs) : ?>
                    <li class="list-group-item">
                        <?= $mhs['merek']; ?> <?= $mhs['model']; ?> <?= $mhs['tahun']; ?>
                        <a href="<?= BASEURL; ?>/kendaraan/hapus/<?= $mhs['id'] ?>" class="badge text-bg-danger float-end ms-1" onclick="return confirm('yakin?');">Hapus</a>
                        <a href="<?= BASEURL; ?>/kendaraan/ubah/<?= $mhs['id'] ?>" class="badge text-bg-success float-end ms-1 tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $mhs['id'] ?>">Ubah</a>
                        <a href="<?= BASEURL; ?>/kendaraan/detail/<?= $mhs['id'] ?>" class="badge text-bg-primary float-end ms-1">Detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="formModalLabel">Tambah Data Kendaraan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/kendaraan/tambah" method="post">
            <input type="hidden" name="id" id="id">
            <div class="mb-3 form-group">
                <label for="model" class="form-label">Model</label>
                <input type="text" class="form-control" id="model" name="model">
            </div>
            <div class="mb-3 form-group">
                <label for="merek" class="form-label">Merek</label>
                <input type="text" class="form-control" id="merek" name="merek">
            </div>
            <div class="mb-3 form-group">
                <label for="tahun" class="form-label">Tahun</label>
                <input type="number" class="form-control" id="tahun" name="tahun" placeholder="2019">
            </div>
            <div class="mb-3 form-group">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Pemakaian keseharian"></textarea>
            </div>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>