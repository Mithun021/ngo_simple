<?= $this->extend("layouts/master") ?>

<?=  $this->section("body-content"); ?>

<?= view('layouts/breadcumbs') ?>

<!-- ==========Blog Section Starts Here========== -->
<div class="blog-section padding-top padding-bottom">
    <div class="container">
        <div class="row mb--50 justify-content-center">
            <div class="col-lg-12 mb-50">
                <div class="class-single-item mb-30">
                    <div class="class-single-inner">
                        <div class="class-single-thumb">
                            <img src="<?= base_url() ?>public/assets/images/about/about-bg.png" alt="class">
                        </div>
                        <div class="class-single-content">
                            <h3 class="mb-3"><?= $whoWeAre['heading']  ?></h3>
                            <p><?= $whoWeAre['description']  ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>