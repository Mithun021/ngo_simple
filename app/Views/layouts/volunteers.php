<!-- ==========Clients Section Ends Here========== -->
<div class="clients-section volunteer padding-top padding-bottom mt-0 pos-rel">
        <div class="abs-clients-thumb">
            <img src="<?= base_url() ?>public/assets/images/bg/bg-shape2.png" alt="abs-clients-thumb">
        </div>
        <div class="container">
            <div class="section-wrapper">
                <div class="clents-left">
                    <div class="cl-content-area">
                        <div class="cl-content">
                            <h6 class="cate">Meet The Specialist Team</h6>
                            <h3 class="title">meet our volunter</h3>
                            <p>Our volunteers are passionate individuals committed to making a difference. They bring energy, dedication, and a wide range of skills to support our mission and help drive meaningful change.</p>
                            <a href="blog-grid.html" class="custom-button mt-2"><span>BECOME A VOLUNTEER <i class="fas fa-heart ml-2"></i></span></a>
                        </div>
                    </div>
                </div>
                <div class="clents-right">
                    <div class="cr-head">
                        <span class="clients-prev active"><i class="fas fa-arrow-left"></i></span>
                        <span class="clients-next"><i class="fas fa-arrow-right"></i></span>
                    </div>
                    <div class="cr-body mb-15-none">
                        <div class="clients-slider">
                        <?php

                        use App\Models\Volunteer_model;

                            $volunteer_model = new Volunteer_model();
                            $volunteer = $volunteer_model->orderBy('id','DESC')->findAll();
                            foreach ($volunteer as $key => $value) {
                        ?>

                            <div class="volunteer-item-2 m-3">
                                <div class="volunteer-thumb">
                                    <div class="thumb">
                                        <a href="javascript:void(0)">
                                            <img src="<?= base_url() ?>public/assets/images/volunteer/<?= $value['image'] ?>" alt="volunteer">
                                        </a>
                                    </div>
                                    <div class="content pos-rel">
                                        <h5 class="title"><a href="javascript:void(0)"><?= $value['name'] ?></a></h5>
                                        <span>Volunteer | <span class="text-primary"><?= $value['district'] ?></span></span>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>  
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ==========Clients Section Ends Here========== -->
