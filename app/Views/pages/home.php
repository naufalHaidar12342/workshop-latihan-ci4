<?= $this->extend("components/Layout"); ?>
<?= $this->section("konten-website"); ?>
<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="hero-items owl-carousel">
        <?php foreach ($promos as $key => $promoSatuan) : ?>
            <div class="single-hero-items set-bg" data-setbg="/img/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>All Product</span>
                            <h1><?= $promoSatuan->kode_voucher; ?></h1>
                            <p>
                                Use promo code
                                <strong><?= $promoSatuan->kode_voucher; ?></strong>
                                , valid from
                                <strong><?= date_format(date_create($promoSatuan->tanggal_mulai_berlaku), "d F Y") ?></strong>
                                up to
                                <strong><?= date_format(date_create($promoSatuan->tanggal_akhir_berlaku), "d F Y"); ?></strong> !
                            </p>
                            <a href="<?= site_url("shop"); ?>" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale
                            <span>
                                <?= $promoSatuan->besar_diskon; ?>%
                            </span>
                        </h2>
                    </div>
                </div>
            </div>
        <?php endforeach ?>

    </div>
</section>
<!-- Hero Section End -->
<?= $this->include("components/banner"); ?>
<?= $this->include("components/womanBanner"); ?>
<?= $this->include("components/dealOfWeek"); ?>
<?= $this->include("components/manBanner"); ?>
<?= $this->include("components/socialMedia"); ?>
<?= $this->include("components/latestBlog"); ?>
<?= $this->endSection(); ?>