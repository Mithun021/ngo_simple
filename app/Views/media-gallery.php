<?= $this->extend("layouts/master") ?>

<?=  $this->section("body-content"); ?>
<?= view('layouts/breadcumbs') ?>

<style>
    .gallery-item-3 .gallery-thumb img{
        width: 100%;
        height: 330px !important;
        object-fit: cover;
    }
</style>

<!-- ==========Gallery Section Starts Here========== -->
<div class="gallery-section padding-top padding-bottom bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section-header">
                    <span class="cate">OUR PROJECT PHOTOS</span>
                    <h3 class="title text-uppercase">OUR RECENT MEDIA GALLERY</h3>
                </div>
            </div>
        </div>
        <div class="masonary-wrapper lg-three-items">
        <?php foreach ($gallery as $key => $value) { ?>
            <div class="masonary-item preschool programe">
                <div class="gallery-item-3">
                    <div class="gallery-thumb">
                        <a class="img-pop" href="<?= base_url() ?>public/assets/images/gallery/<?= $value['image_files'] ?>"><img src="<?= base_url() ?>public/assets/images/gallery/<?= $value['image_files'] ?>" alt="gallery"></a>
                    </div>
                    <div class="gallery-content">
                        <a href="<?= base_url() ?>public/assets/images/gallery/<?= $value['image_files'] ?>" class="img-pop"><i class="fas fa-expand"></i></a>
                        
                    </div>
                </div>
            </div>
        <?php } ?>

        </div>
    </div>
</div>

<?= $this->endSection() ?>