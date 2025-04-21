<?= $this->extend("layouts/master") ?>
<?=  $this->section("body-content"); ?>
<?= view('layouts/breadcumbs') ?>

<style>
    .causes-thumb img{
        width: 100%;
        height: 450px;
        object-fit: cover;
    }
</style>

<!-- ==========Blog Section Starts Here========== -->
<div class="causes-single-section padding-top padding-bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-12">
                <article>
                    <div class="causes-item mb-30">
                        <div class="causes-inner">
                            <div class="causes-thumb">
                                <img src="<?= base_url() ?>public/assets/images/project/<?= $projects['image'] ?>" alt="causes">
                            </div>
                            <div class="causes-content bg-white">
                                <div class="causes-progress">
                                    <div class="d-flex flex-wrap justify-content-center justify-content-sm-between align-items-center">
                                        <div class="causes-pro-left text-center">
                                            <h6><i class="fas fa-hand-holding-heart mr-2"></i>Raised: <span><?= "Rs. ".$projects['fund_raised'] ?></span></h6>
                                        </div>
                                        <div class="causes-pro-mid">
                                            <div class="text-center skill-item">
                                                <div class="pie"
                                                    data-pie='{ "index": 1, "round": true, "percent": 60, "colorSlice": "#EE463B", "size": 80, "fontWeight": 700 }'>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="donate-amount">-->
                                    <div class="custom-donate mt-30 mb-30">
                                        <center><img src="<?= base_url() ?>public/assets/images/bg/qr.png" id="qr-image" ></center>
                                    </div>
                                </div>
                                <!--<div class="donate-amount">-->
                                <!--    <div class="custom-donate mt-30 mb-30">-->
                                <!--        <span><span>Rs</span></span>-->
                                <!--        <input type="text" placeholder="Rs. 200">-->
                                <!--    </div>-->
                                <!--    <ul class="amount mb-30">-->
                                <!--        <li>Rs. 100.00</li>-->
                                <!--        <li class="active">Rs. 250.00</li>-->
                                <!--        <li>Rs. 500.00</li>-->
                                <!--        <li>Rs. 1000.00</li>-->
                                <!--        <li>Custom Amount</li>-->
                                <!--    </ul>-->
                                <!--    <div class="amount-notifications mb-30">-->
                                <!--        <p>-->
                                <!--            <span>?</span>-->
                                <!--            <b>Notice:</b> Test mode is enabled. While in test mode no live-->
                                <!--            donations are processed.-->
                                <!--        </p>-->
                                <!--    </div>-->
                                <!--    <div class="payment-mathod mb-30">-->
                                <!--        <div class="d-flex flex-wrap align-items-center justify-content-between">-->
                                <!--            <div class="payment-left">-->
                                <!--                <h5>Select Payment Method :</h5>-->
                                <!--            </div>-->
                                <!--            <div class="payment-right">-->
                                <!--                <img src="<?= base_url() ?>public/assets/images/causes/payment.jpg" alt="payment mathod">-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--    <div class="personal-info mb-30">-->
                                <!--        <form class="comment-form">-->
                                <!--            <div class="form-group">-->
                                <!--                <input type="text" placeholder="First Name" name="fnme">-->
                                <!--            </div>-->
                                <!--            <div class="form-group">-->
                                <!--                <input type="text" placeholder="Last Name" name="lname">-->
                                <!--            </div>-->
                                <!--            <div class="form-group w-100">-->
                                <!--                <input type="email" placeholder="Your Email" name="email">-->
                                <!--            </div>-->
                                <!--            <div-->
                                <!--                class="form-group d-flex flex-wrap align-items-center justify-content-between w-100">-->
                                <!--                <button type="submit" class="custom-button"><span>Donate Now<i class="fas fa-heart ml-2"></i></span></button>-->
                                <!--                <span class="total-donate"><b>Donation Total :</b> Rs. 250.00</span>-->
                                <!--            </div>-->
                                <!--        </form>-->
                                <!--    </div>-->
                                <!--</div>-->
                                <h3><?= $projects['title'] ?></h3>
                                <?php
                                // Example usage
                                    echo $projects['description'];
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>