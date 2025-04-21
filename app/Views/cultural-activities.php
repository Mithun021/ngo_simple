<?= $this->extend("layouts/master") ?>

<?=  $this->section("body-content"); ?>
<?= view('layouts/breadcumbs') ?>

<style>
    .activity-files{
        position: relative;
    }
    .activity-files img{
        position: relative;
        width: 22%;
        height: 300px;
        object-fit: cover;
        float: left;
        margin: 10px;
    }
    @media(max-width : 552px){
        .activity-files img{
            width: 47%;
        }
    }
</style>

<!-- ==========Blog Section Starts Here========== -->
<div class="blog-section padding-top padding-bottom">
    <div class="container">
        <div class="row mb--50 justify-content-center">
            <div class="col-lg-12 mb-50">
                <div class="class-single-item mb-30">
                    <div class="class-single-inner">
                        <div class="class-single-content">
                            <h3 class="mb-3"><?= $activity['cultural_activity_heading']  ?></h3>
                            <p><?= $activity['cultural_activity_desc']  ?></p>
                        </div>


                        <div class="activity-files">
                        <?php
                            foreach ($arvActivityFiles as $key => $files) {
                        ?>
                            <img src="<?= base_url() ?>public/activityImage/<?= $files['activity_files'] ?>" alt="">
                        <?php
                            }
                        ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>