<?php
    use App\Models\UserModel;
    $userModel = new UserModel();
    $user_data = $userModel->find(1);

?>
 
 <!-- ==========Footer Section Starts Here========== -->
 <footer>
        <div class="footer-top">
            <div class="ft-top">
                <div class="container">
                    <div class="row no-gutters justify-content-center">
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="ftt-item">
                                <div class="ftt-inner">
                                    <div class="ftt-thumb">
                                        <img src="<?= base_url() ?>/public/assets/images/footer/icon/01.png" alt="footer-icon">
                                    </div>
                                    <div class="ftt-content">
                                        <p class="mb-0">Phone Number : <?= "+91-".$user_data['web_contact'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="ftt-item">
                                <div class="ftt-inner">
                                    <div class="ftt-thumb">
                                        <img src="<?= base_url() ?>/public/assets/images/footer/icon/02.png" alt="footer-icon">
                                    </div>
                                    <div class="ftt-content">
                                        <p class="mb-0">Email : <?= $user_data['web_email'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="ftt-item">
                                <div class="ftt-inner">
                                    <div class="ftt-thumb">
                                        <img src="<?= base_url() ?>/public/assets/images/footer/icon/03.png" alt="footer-icon">
                                    </div>
                                    <div class="ftt-content">
                                        <p class="mb-0">Address : <?= $user_data['web_address'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="ft-bottom">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="footer-widget widget-about">
                                        <h5 class="title text-uppercase">About LONELY PRO</h5>
                                        <p>
                                            Energistically coordinate highly efficient procesr
                                            partnerships befor revolutionar growth strategie 
                                            improvement viaing awesome
                                        </p>
                                        <div class="ftb-map">
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.227736756104!2d90.38698295091588!3d23.73925698451917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b85c740f17d1%3A0xdd3daab8c90eb11f!2sCodexCoder!5e0!3m2!1sen!2sbd!4v1633410430100!5m2!1sen!2sbd" allowfullscreen=""></iframe>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="footer-widget widget-blog">
                                        <h5 class="title text-uppercase">our Recent news</h5>
                                        <ul class="footer-blog">
                                            <li>
                                                <div class="thumb">
                                                    <a href="blog-single.html">
                                                        <img src="<?= base_url() ?>/public/assets/images/footer/blog1.png" alt="footer">
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <a href="blog-single.html">Enable Seamin Matera Forin And Our Orthonal Create Vortals.</a>
                                                    <span>July 23, 2021</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="thumb">
                                                    <a href="blog-single.html">
                                                        <img src="<?= base_url() ?>/public/assets/images/footer/blog2.png" alt="footer">
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <a href="blog-single.html">Dynamca Network Otuitive Catays For Plagiarize Mindshare After</a>
                                                    <span>July 23, 2021</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 pl-xl-4">
                                    <div class="footer-widget widgt-form">
                                        <h5 class="title text-uppercase">our NEWSLETTER</h5>
                                        <p>Lonelypro is a nonproﬁt organization supported by community leaders</p>
                                        <form class="footer-form">
                                            <input type="email" placeholder="Enter your email" name="email">
                                            <button type="submit">
                                                <span>send massage<i class="far fa-paper-plane ml-2"></i></span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="text-center">
                    <p class="mb-0">&copy; 2024 <a href="<?= base_url() ?>">AR Vision Foundation</a> | All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- ==========Footer Section Ends Here========== -->
    
    <script src="<?= base_url() ?>public/assets/js/jquery.js"></script>
    <script src="<?= base_url() ?>public/assets/js/modernizr-3.6.0.min.js"></script>
    <script src="<?= base_url() ?>public/assets/js/plugins.js"></script>
    <script src="<?= base_url() ?>public/assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>public/assets/js/circularProgressBar.min.js"></script>
    <script src="<?= base_url() ?>public/assets/js/isotope.pkgd.min.js"></script>
    <script src="<?= base_url() ?>public/assets/js/magnific-popup.min.js"></script>
    <script src="<?= base_url() ?>public/assets/js/wow.min.js"></script>
    <script src="<?= base_url() ?>public/assets/js/viewport.jquery.js"></script>
    <script src="<?= base_url() ?>public/assets/js/odometer.min.js"></script>
    <script src="<?= base_url() ?>public/assets/js/nice-select.js"></script>
    <script src="<?= base_url() ?>public/assets/js/slick.min.js"></script>
    <script src="<?= base_url() ?>public/assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
      <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
      <script>
        AOS.init();
      </script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper.bannerslider", {
        centeredSlides: true,
        autoplay: {
            delay: 3500,
            disableOnInteraction: false,
        },
        loop : true,
        pagination: {
            el: ".swiper-pagination",
            type: "progressbar",
        },
        /*navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },*/
        });
</script>
</body>
</html>