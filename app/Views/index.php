<?= $this->extend("layouts/master") ?>

<?=  $this->section("body-content"); ?>
<style>
    .bannerslider{
        position: relative;
    }
    .bannerslider .swiper-slide img{
        width: 100%;
        height: 90vh;
        object-fit: cover;
    }
    @media(max-width : 552px) {
        .bannerslider .swiper-slide img{
            height: 70vh;
            
        }
    }
    #donate-button{
        position : relative;
        height : 40px;
        width: 120px;
        outline : none;
        border : none;
        color : #FFF;
        font-weight : 500;
        background : #ee463b;
        margin-bottom : 10px;
    }
</style>

<section id="hero-banner">
    <!-- Swiper -->
    <div class="swiper mySwiper bannerslider">
        <div class="swiper-wrapper">
        <?php
            foreach ($webslider as $key => $value) {
        ?>
            <div class="swiper-slide"><img src="<?= base_url() ?>public/assets/images/banner/<?= $value['slider_image'] ?>" alt=""></div>
        <?php
            }
        ?>
            
        </div>
        <!--<div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>-->
        <div class="swiper-pagination"></div>
    </div>
</section>
<div class="causes-single-section">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12"><center><img src="<?= base_url() ?>public/assets/images/bg/qr.png"  id="qr-image" /></center></div>
        </div>
    </div>
</div>
<!-- ==========Fund Raise Section Starts Here========== -->
<!--<div class="causes-single-section">-->
<!--    <div class="container-fluid">-->
<!--        <div class="row justify-content-center">-->
<!--            <div class="col-lg-12 col-12">-->
<!--                <article>-->
<!--                    <div class="causes-item mb-30">-->
<!--                        <div class="causes-inner">-->
                            
<!--                            <div class="causes-content bg-white">-->
                                
<!--                                <div class="donate-amount">-->
<!--                                    <div class="custom-donate mt-30 mb-30">-->
<!--                                        <span><span>Rs</span></span>-->
<!--                                        <input type="text" placeholder="Rs. 200">-->
<!--                                    </div>-->
<!--                                    <ul class="amount mb-30">-->
<!--                                        <li>Rs. 100.00</li>-->
<!--                                        <li class="active">Rs. 250.00</li>-->
<!--                                        <li>Rs. 500.00</li>-->
<!--                                        <li>Rs. 1000.00</li>-->
<!--                                        <li>Custom Amount</li>-->
                                        
<!--                                    </ul>-->
<!--                                    <button type="button" id="donate-button">Donate</button>-->
<!--                                    <div class="amount-notifications mb-30">-->
<!--                                        <p>-->
<!--                                            <span>?</span>-->
<!--                                            <b>Notice:</b> Test mode is enabled. While in test mode no live-->
<!--                                            donations are processed.-->
<!--                                        </p>-->
<!--                                    </div>-->
<!--                                </div>-->
                                
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </article>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<?= view('layouts/features') ?>
<?= view('layouts/help') ?>
<?= view('layouts/cause') ?>
<?= view('layouts/testimonials') ?>
<?= ""//view('layouts/projects') ?>
<?= view('layouts/faq') ?>
<?= view('layouts/counters') ?>
<?= view('layouts/volunteers') ?>
<?= ""// view('layouts/blogs') ?>


<?=  $this->endSection() ?>