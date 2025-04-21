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
                            <img src="<?= base_url() ?>public/assets/images/about/<?= $aboutUs['about_image'] ?>" alt="class">
                        </div>
                        <div class="class-single-content">
                            <h3 class="mb-3"><?= $aboutUs['heading']  ?></h3>
                            <p><?= $aboutUs['short_description']  ?></p>
                            <p><?= $aboutUs['long_description']  ?></p>
                        </div>
                        <div class="class-single-content">
                            <h3 class="mb-3">Our Mission</h3>
                            <p><?= $aboutUs['mission']  ?></p>
                            <div class="class-single-thumb">
                                <img src="<?= base_url() ?>public/assets/images/about/<?= $aboutUs['mission_image'] ?>" alt="class">
                            </div>
                        </div>
                        <div class="class-single-content">
                            <h3 class="mb-3">Our Vision</h3>
                            <p><?= $aboutUs['vision']  ?></p>
                            <div class="class-single-thumb">
                                <img src="<?= base_url() ?>public/assets/images/about/<?= $aboutUs['vision_image'] ?>" alt="class">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>