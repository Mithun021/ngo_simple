<?= $this->extend("layouts/master") ?>

<?=  $this->section("body-content"); ?>
<?= view('layouts/breadcumbs') ?>

<!-- ==========volunteer Section Starts Here========== -->
<section class="volunteer-section padding-top padding-bottom bg_img" data-background="<?= base_url() ?>public/assets/images/bg/volunteer-bg.jpg">
        <div class="container">
            <div class="row justify-content-start mb-30-none">
            <?php foreach ($teamMembers as $key => $value) { ?>
                
                <div class="col-xl-4 col-sm-6">
                    <div class="volunteer-item-2">
                        <div class="volunteer-thumb">
                            <div class="thumb">
                                <a href="javascript:void(0)">
                                    <img src="<?= base_url() ?>public/assets/images/team_members/<?= $value['image'] ?>" alt="Team Members">
                                </a>
                            </div>
                            <div class="content pos-rel">
                                <h5 class="title"><a href="javascript:void(0)"><?= $value['name'] ?></a></h5>
                                <span>Team Member</span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php  }  ?>
                
            </div>
        </div>
    </section>
    <!-- ==========volunteer Section Ends Here========== -->

<?= $this->endSection() ?>