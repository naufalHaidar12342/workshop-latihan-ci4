<?= $this->extend("components/Layout"); ?>
<?= $this->section("konten-website"); ?>
<?php $session = session(); ?>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> Home</a>
                    <span>History</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->
<!-- Faq Section Begin -->
<div class="faq-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="faq-accordin">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-heading active">
                                <a class="active" data-toggle="collapse" data-target="#collapseOne">
                                    Leave a Comment
                                </a>
                            </div>
                            <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="col-lg-6 offset-lg-1">
                                        <div class="contact-form">
                                            <div class="leave-comment">
                                                <p>Give me your opinion about our product.</p>
                                                <form action="komentar/create" class="comment-form" method="POST">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <select name="id_barang" class="sorting">
                                                                <?php foreach ($transaksis as $index => $transaksi) : ?>
                                                                    <option value="<?= $transaksi->id_barang ?>">Transaction <?= $transaksi->created_date ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <textarea placeholder="Your message" name="komentar"></textarea>
                                                            <input type="submit" class="site-btn" value="Send message">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-heading">
                                <a data-toggle="collapse" data-target="#collapseTwo">
                                    Transaction History
                                </a>
                            </div>
                            <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                                <div class="card-body">
                                    <?php foreach ($transaksis as $index => $transaksi) : ?>
                                        <p><a href="<?= site_url('invoice/' . $transaksi->id . '') ?>">Transaction <?= $transaksi->created_date ?></a></p>
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
<!-- Faq Section End -->
<?= $this->endSection() ?>