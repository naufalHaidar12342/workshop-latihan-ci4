<?= $this->extend("components/Layout") ?>
<?= $this->section("konten-website") ?>

<div class=" w-100 p-5">
    <div class="text-center font-weight-bolder">
        <h3>Atur Produk </h3>
    </div>
    <div class="d-flex justify-content-end py-5">
        <a href="<?= site_url("/product-management/tambah") ?>" class="btn btn-primary btn-lg font-weight-bold">Tambah Produk</a>
    </div>
    <table class="table p-5" style="font-size: 20px;">
        <thead class="thead-dark ">
            <tr>
                <th scope="col">Nomer</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Stok</th>
                <th scope="col">Gambar Produk</th>
                <th scope="col">Kategori</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomerUrut = 1; ?>
            <?php foreach ($daftarProduk as $key => $produk) : ?>
                <tr>
                    <th scope="row" class="align-middle">
                        <?= $nomerUrut++ ?>
                    </th>
                    <td class="align-middle">
                        <?= $produk->nama ?>
                    </td>
                    <td class="align-middle">
                        Rp. <?= $produk->harga ?>
                    </td>
                    <td class="align-middle">
                        <?= $produk->stok ?> unit
                    </td>
                    <td class="align-middle">
                        <img src="<?= base_url("/img/products/{$produk->gambar}") ?>" alt="Gambar dari produk" class="rounded-lg" width="180px" height="180px">
                    </td>
                    <td class="align-middle">
                        <?= $produk->kategori ?>
                    </td>
                    <td class="align-middle">
                        <div class="d-flex flex-column">
                            <a href="<?= site_url("product-management/edit/{$produk->id}") ?>" class="btn btn-large btn-warning mb-2 font-weight-bold">Edit</a>
                            <a href="<?= site_url("product-management/hapus/{$produk->id}") ?>" class="btn btn-large btn-danger mb-2 font-weight-bold">Hapus</a>
                        </div>
                    </td>
                <?php endforeach ?>
        </tbody>
    </table>


</div>

<?= $this->endSection() ?>