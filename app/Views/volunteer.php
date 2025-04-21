<?= $this->extend("layouts/master") ?>

<?=  $this->section("body-content"); ?>
<?= view('layouts/breadcumbs') ?>

<!-- ==========volunteer Section Starts Here========== -->
<section class="volunteer-section padding-top padding-bottom bg_img" data-background="<?= base_url() ?>public/assets/images/bg/volunteer-bg.jpg">
        <div class="container">
            <div class="row justify-content-start mb-30-none">
            <?php foreach ($volunteers as $key => $value) { ?>
                
                <div class="col-xl-4 col-sm-6">
                    <div class="volunteer-item-2">
                        <div class="volunteer-thumb">
                            <div class="thumb">
                                <a href="javascript:void(0)">
                                    <img src="<?= base_url() ?>public/assets/images/volunteer/<?= $value['image'] ?>" alt="Team Members">
                                </a>
                            </div>
                            <div class="content pos-rel">
                                <h5 class="title"><a href="javascript:void(0)"><?= $value['name'] ?></a></h5>
                                <span>Volunteer</span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php  }  ?>


            <div class="col-xl-12 col-sm-12 card py-4">
                <form action="">
                    <h3 class="text-center">Join as a Volunteer</h3>
                    <p class="text-center">At AR Vision Foundation, we are committed to creating a brighter future for everyone. We
invite you to join us in our mission to uplift and empower communities. Whether you are
looking to volunteer, donate, or participate in our programs, your support can make a
significant difference. Together, we can create a more just and compassionate society.</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <span>Name</span>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <span>Phone</span>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <span>City</span>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <span>State</span>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <span>Profile Image</span>
                                <input type="file" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <span>Profile Image</span>
                                <textarea class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary">
                                <span>send <i class="far fa-paper-plane ml-2"></i></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
                
            </div>
        </div>
    </section>
    <!-- ==========volunteer Section Ends Here========== -->

<?= $this->endSection() ?>