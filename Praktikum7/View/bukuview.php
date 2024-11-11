<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Daftar Buku</h1>
            <?php session_start(); ?>
            
            <?php if (isset($_SESSION['message'])): ?>
                <div class="alert alert-success" role="alert">
                    <?= $_SESSION['message']; ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $_SESSION['error']; ?>
                </div>
            <?php endif; ?>

            <?php session_destroy(); ?>

            <div class="my-3">
                <button data-bs-toggle="modal" data-bs-target="#tambahModal" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Tambah
                </button>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Pengarang</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0; ?>
                    <?php foreach ($daftar_buku as $buku): ?>
                        <tr>
                            <td><?= ++$no; ?></td>
                            <td><?= htmlspecialchars($buku->getJudul()); ?></td>
                            <td><?= htmlspecialchars($buku->getPengarang()); ?></td>
                            <td><?= htmlspecialchars($buku->getPenerbit()); ?></td>
                            <td><?= htmlspecialchars($buku->getTahun()); ?></td>
                            <td>
                                <a href="/index.php/edit?id_buku=<?= $buku->getId(); ?>" class="btn btn-sm btn-success">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <button data-bs-toggle="modal" data-bs-target="#hapusModal" data-bs-id="<?= $buku->getId(); ?>" data-bs-judul="<?= $buku->getJudul(); ?>" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah Buku -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Form Tambah Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formTambah" action="/index.php/simpan" method="POST">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="pengarang" class="form-label">Pengarang</label>
                        <input type="text" name="pengarang" id="pengarang" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input type="text" name="penerbit" id="penerbit" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun</label>
                        <input type="text" name="tahun" id="tahun" class="form-control" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="formTambah" class="btn btn-primary">
                    <i class="bi bi-floppy"></i> Simpan
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Buku -->
<div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/index.php/hapus" id="formHapus" method="POST">
                    <input type="hidden" name="id_buku" id="id_buku">
                </form>
                <p>Apakah Anda yakin ingin menghapus data buku <span id="judul-buku"></span> ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="formHapus" class="btn btn-danger">
                    <i class="bi bi-trash"></i> Hapus
                </button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    const hapusModal = document.getElementById('hapusModal');
    if (hapusModal) {
        hapusModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-bs-id');
            const judul = button.getAttribute('data-bs-judul');

            // Update modal content
            const text_id = hapusModal.querySelector('#id_buku');
            const text_judul = hapusModal.querySelector('#judul-buku');

            text_id.value = id;
            text_judul.textContent = judul;
        });
    }
</script>

</body>
</html>
