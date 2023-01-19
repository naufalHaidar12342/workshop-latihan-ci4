<?= $this->extend("components/Layout") ?>
<?= $this->section("konten-website") ?>
<div class="w-100 p-5">
    <h3 class="text-center my-5">Tambah Produk</h3>
    <form action="/product-management/simpanProduk" method="POST">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama Produk</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nama-produk" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Harga Produk</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="harga-produk" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Stok</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="stok-produk" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Upload gambar produk</label>
            <div class="col-sm-10">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="file-gambar-produk" name="gambar-produk" onclick="">
                    <label class="custom-file-label" for="files">Choose file</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Kategori produk</label>
            <div class="col-sm-10">
                <select class="custom-select" id="kategori" name="kategori" required>
                    <option selected>Pilih kategori produk</option>
                    <?php foreach ($kategoriProduk as $key => $kategori) : ?>
                        <option value="<?= $kategori->id ?>"><?= $kategori->nama ?></option>
                    <?php endforeach ?>

                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>