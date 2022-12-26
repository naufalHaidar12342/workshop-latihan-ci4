<?= $this->extend("components/Layout"); ?>
<?= $this->section("konten-website"); ?>
<?php

$session = session();

$id_barang = [
    'name' => 'id_barang',
    'id' => 'id_barang',
    'value' => $barangs->id,
    'type' => 'hidden'
];

$id_pembeli = [
    'name' => 'id_pembeli',
    'id' => 'id_pembeli',
    'value' => session()->get('id'),
    'type' => 'hidden'
];
$jumlah = [
    'name' => 'jumlah',
    'id' => 'jumlah',
    'value' => 1,
    'min' => 1,
    'type' => 'number',
    'max' => $barangs->stok,
    'class' => 'form-control',
];
$total_harga = [
    'name' => 'total_harga',
    'id' => 'total_harga',
    'value' => null,
    'readonly' => true,
    'class' => 'form-control',
];
$ongkir = [
    'name' => 'ongkir',
    'id' => 'ongkir',
    'value' => null,
    'readonly' => true,
    'class' => 'form-control',
];
$alamat = [
    'name' => 'alamat',
    'id' => 'alamat',
    'value' => null,
    'class' => 'form-control',
];
$kode_voucher = [
    'name' => 'voucher',
    'id' => 'voucher',
    'value' => null,
    'class' => 'form-control',
];

$submit = [
    'name' => 'submit',
    'id' => 'submit',
    'type' => 'submit',
    'value' => 'Beli',
    'class' => 'primary-btn pd-cart'
];
$diskonInRupiah = [
    'name' => 'diskon_ribu',
    'id' => 'diskon_ribu',
    'value' => null,
    'readonly' => true,
    'class' => 'form-control',
];
?>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="<?= site_url("/") ?>">
                        <i class="fa fa-home"></i>
                        Home
                    </a>
                    <a href="<?= site_url("shop") ?>">Shop</a>
                    <span>Detail</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Product Shop Section Begin -->
<section class="product-shop spad page-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="filter-widget">
                    <h4 class="fw-title">Categories</h4>
                    <ul class="filter-catagories">
                        <?php foreach ($kategoris as $index => $kategori) : ?>
                            <li>
                                <a href="<?= site_url("shop/category/{$kategori->id}") ?>">
                                    <?= $kategori->nama ?>
                                </a>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <div class="filter-widget">
                    <h4 class="fw-title">Brand</h4>
                    <div class="fw-brand-check">
                        <div class="bc-item">
                            <label for="bc-calvin">
                                Calvin Klein
                                <input type="checkbox" id="bc-calvin">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="bc-item">
                            <label for="bc-diesel">
                                Diesel
                                <input type="checkbox" id="bc-diesel">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="bc-item">
                            <label for="bc-polo">
                                Polo
                                <input type="checkbox" id="bc-polo">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="bc-item">
                            <label for="bc-tommy">
                                Tommy Hilfiger
                                <input type="checkbox" id="bc-tommy">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="filter-widget">
                    <h4 class="fw-title">Price</h4>
                    <div class="filter-range-wrap">
                        <div class="range-slider">
                            <div class="price-input">
                                <input type="text" id="minamount">
                                <input type="text" id="maxamount">
                            </div>
                        </div>
                        <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="33" data-max="98">
                            <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                        </div>
                    </div>
                    <a href="#" class="filter-btn">Filter</a>
                </div>
                <div class="filter-widget">
                    <h4 class="fw-title">Color</h4>
                    <div class="fw-color-choose">
                        <div class="cs-item">
                            <input type="radio" id="cs-black">
                            <label class="cs-black" for="cs-black">Black</label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" id="cs-violet">
                            <label class="cs-violet" for="cs-violet">Violet</label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" id="cs-blue">
                            <label class="cs-blue" for="cs-blue">Blue</label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" id="cs-yellow">
                            <label class="cs-yellow" for="cs-yellow">Yellow</label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" id="cs-red">
                            <label class="cs-red" for="cs-red">Red</label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" id="cs-green">
                            <label class="cs-green" for="cs-green">Green</label>
                        </div>
                    </div>
                </div>
                <div class="filter-widget">
                    <h4 class="fw-title">Size</h4>
                    <div class="fw-size-choose">
                        <div class="sc-item">
                            <input type="radio" id="s-size">
                            <label for="s-size">s</label>
                        </div>
                        <div class="sc-item">
                            <input type="radio" id="m-size">
                            <label for="m-size">m</label>
                        </div>
                        <div class="sc-item">
                            <input type="radio" id="l-size">
                            <label for="l-size">l</label>
                        </div>
                        <div class="sc-item">
                            <input type="radio" id="xs-size">
                            <label for="xs-size">xs</label>
                        </div>
                    </div>
                </div>
                <div class="filter-widget">
                    <h4 class="fw-title">Tags</h4>
                    <div class="fw-tags">
                        <a href="#">Towel</a>
                        <a href="#">Shoes</a>
                        <a href="#">Coat</a>
                        <a href="#">Dresses</a>
                        <a href="#">Trousers</a>
                        <a href="#">Men's hats</a>
                        <a href="#">Backpack</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-pic-zoom">
                            <img class="product-big-img" src="<?= base_url("/img/products/{$barangs->gambar}") ?>" alt="">
                            <div class="zoom-icon">
                                <i class="fa fa-search-plus"></i>
                            </div>
                        </div>
                        <div class="product-thumbs">
                            <div class="product-thumbs-track ps-slider owl-carousel">
                                <div class="pt active" data-imgbigurl="<?= base_url("/img/products/{$barangs->gambar}") ?>">
                                    <img src="<?= base_url("/img/products/{$barangs->gambar}") ?>" alt="">
                                </div>

                                <div class="pt" data-imgbigurl="<?= base_url("/img/products/'.$barangs->gambar.'") ?>">
                                    <img src="<?= base_url("/img/products/{$barangs->gambar}") ?>" alt="">
                                </div>

                                <div class="pt" data-imgbigurl="<?= base_url("/img/products/{$barangs->gambar}") ?>">
                                    <img src="<?= base_url("/img/products/{$barangs->gambar}") ?>" alt="">
                                </div>

                                <div class="pt" data-imgbigurl="<?= base_url("/img/products/{$barangs->gambar}") ?>">
                                    <img src="<?= base_url("/img/products/{$barangs->gambar}") ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-details">
                            <div class="pd-title">
                                <span><?= $barangs->nama ?></span>
                                <h3><?= $barangs->nama ?></h3>
                                <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                            </div>
                            <div class="pd-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <span>(5)</span>
                            </div>
                            <div class="pd-desc">
                                <h4>Rp. <?= $barangs->harga ?></h4>
                                <hr>
                                <?php if ($session->get("isLoggedIn")) : ?>
                                    <h4>Pengiriman</h4>
                                    <div class="form-group">
                                        <label for="provinsi">Pilih Provinsi</label>
                                        <select class="form-control" id="provinsi">
                                            <option>Select Provinsi</option>
                                            <?php foreach ($provinsi as $p) : ?>
                                                <option value="<?= $p->province_id ?>"><?= $p->province ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="kabupaten">Pilih Kabupaten/Kota</label>
                                        <select class="form-control" id="kabupaten">
                                            <option>Select Kabupaten/kota</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="service">Pilih Service</label>
                                        <select class="form-control" id="service">
                                            <option>Select Service</option>
                                        </select>
                                    </div>
                                    <strong>Estimasi : <span id="estimasi"></span></strong>
                                    <hr>
                                    <?= form_open('buy') ?>
                                    <?= form_input($id_barang) ?>
                                    <?= form_input($id_pembeli) ?>
                                    <div class="form-group">
                                        <?= form_label('Jumlah Pembelian', 'jumlah') ?>
                                        <?= form_input($jumlah) ?>
                                    </div>
                                    <div class="form-group">
                                        <?= form_label('Ongkir', 'ongkir') ?>
                                        <?= form_input($ongkir) ?>
                                    </div>
                                    <div class="form-group">
                                        <?= form_label('Kode Voucher', 'voucher') ?>
                                        <?= form_input($kode_voucher) ?>
                                    </div>
                                    <div class="form-group">
                                        <?= form_label('Diskon (Rp.)', 'diskon_ribu') ?>
                                        <?= form_input($diskonInRupiah) ?>
                                    </div>
                                    <div class="form-group">
                                        <?= form_label('Total Harga', 'total_harga') ?>
                                        <?= form_input($total_harga) ?>
                                    </div>
                                    <div class="form-group">
                                        <?= form_label('Alamat', 'alamat') ?>
                                        <?= form_input($alamat) ?>
                                    </div>
                                    <div class="text-right">
                                        <?= form_submit($submit) ?>
                                    </div>
                                    <?= form_close() ?>
                                <?php endif ?>
                            </div>

                            <div class="pd-share">
                                <div class="p-code">Sku : 00012</div>
                                <div class="pd-social">
                                    <a href="#"><i class="ti-facebook"></i></a>
                                    <a href="#"><i class="ti-twitter-alt"></i></a>
                                    <a href="#"><i class="ti-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-tab">
                    <div class="tab-item">
                        <ul class="nav" role="tablist">
                            <li>
                                <a data-toggle="tab" href="#tab-3" role="tab">
                                    Customer Reviews (<?= count($komentars) ?>)
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-item-content">
                        <div class="tab-content">
                            <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                <div class="customer-review-option">
                                    <h4>
                                        <?= count($komentars) ?> Comments
                                    </h4>
                                    <div class="comment-option">
                                        <div class="co-item">
                                            <?php foreach ($komentars as $index => $komentar) : ?>
                                                <div class="avatar-pic">
                                                    <img src="<?= base_url("/img/product-single/avatar-2.png") ?>" alt="avatar">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <h5> <?= $komentar->username ?>
                                                        <span><?= $komentar->created_date ?></span>
                                                    </h5>
                                                    <div class="at-reply">
                                                        <?= $komentar->komentar ?>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- Product Shop Section End -->
<?= $this->endSection(); ?>
<?= $this->section('script') ?>
<script>
    $('document').ready(function() {
        var jumlah_pembelian = 1;
        var harga = <?= $barangs->harga ?>;
        let ongkir = 0;
        let discountedTotalPrice = 0
        $("#provinsi").on('change', function() {
            $("#kabupaten").empty();
            var id_province = $(this).val();
            $.ajax({
                url: "<?= site_url('shop/getcity') ?>",
                type: 'GET',
                data: {
                    'id_province': id_province,
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    var results = data["rajaongkir"]["results"];
                    for (var i = 0; i < results.length; i++) {
                        $("#kabupaten").append($('<option>', {
                            value: results[i]["city_id"],
                            text: results[i]['city_name']
                        }));
                    }
                },

            });
        });

        $("#kabupaten").on('change', function() {
            var id_city = $(this).val();
            $.ajax({
                url: "<?= site_url('shop/getcost') ?>",
                type: 'GET',
                data: {
                    'origin': 154,
                    'destination': id_city,
                    'weight': 1000,
                    'courier': 'jne'
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    var results = data["rajaongkir"]["results"][0]["costs"];
                    for (var i = 0; i < results.length; i++) {
                        var text = results[i]["description"] + "(" + results[i]["service"] + ")";
                        $("#service").append($('<option>', {
                            value: results[i]["cost"][0]["value"],
                            text: text,
                            etd: results[i]["cost"][0]["etd"]
                        }));
                    }
                },

            });
        });

        $("#service").on('change', function() {
            var estimasi = $('option:selected', this).attr('etd');
            ongkir = parseInt($(this).val());
            $("#ongkir").val(ongkir);
            $("#estimasi").html(estimasi + " Hari");
            var total_harga = (jumlah_pembelian * harga) + ongkir;
            $("#total_harga").val(total_harga);
        });

        $("#jumlah").on("change", function() {
            jumlah_pembelian = $("#jumlah").val();
            var total_harga = (jumlah_pembelian * harga) + ongkir;
            $("#total_harga").val(total_harga);
        });

        $("#voucher").on("input", () => {
            let voucherInputted = $("#voucher").val()
            console.log(voucherInputted);
            $.ajax({
                url: "<?= site_url('shop/getdiscount') ?>",
                type: 'GET',
                data: {
                    'voucher_code': voucherInputted,

                },
                dataType: 'json',
                success: function(data) {
                    if (!data) {
                        console.log("Voucher diskon tidak ditemukan. Coba lagi dengan kode voucher lain.")
                    } else {
                        console.log("ongkir=" + ongkir);
                        console.log("harga=" + harga);
                        console.log("barangnya berapa=" + jumlah_pembelian);
                        console.log("data=" + data);

                        let discountPercentage = data["besar_diskon"] / 100
                        console.log("discount in percent" + discountPercentage);

                        discountedTotalPrice = harga * discountPercentage
                        $("#diskon_ribu").val(discountedTotalPrice)

                        let totalHarga = (jumlah_pembelian * (harga - discountedTotalPrice)) + ongkir
                        console.log("total harga" + totalHarga)
                        $("#total_harga").val(totalHarga);
                    }
                }
            })

        })
    });
</script>
<?= $this->endSection() ?>