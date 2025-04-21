<?= $this->extend("layouts/master") ?>

<?=  $this->section("body-content"); ?>
<?= view('layouts/breadcumbs') ?>

<!-- ==========Contact Section Starts Here========== -->
<section class="contact-section padding-top padding-bottom">
        <div class="container">
            <div class="contact-form-area">
                <div class="row flex-row-reverse">
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <h4 class="title">Leave A Message</h4>
                        <form class="contact-form" id="contact_form_submit">
                            <div class="form-group">
                                <input type="text" placeholder="Your Name" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Your Email" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Phone" id="phone" name="phone">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Subject" id="subject" name="subject">
                            </div>
                            <div class="form-group w-100">
                                <textarea name="message" id="message" placeholder="Your Message"></textarea>
                            </div>
                            <div class="form-group w-100 text-center">
                                <button class="custom-button"><span>Send Message</span></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-wrapper">
                            <div class="contact-item">
                                <div class="contact-thumb">
                                    <img src="<?= base_url() ?>public/assets/images/contact/01.png" alt="contact">
                                </div>
                                <div class="contact-content">
                                    <h6 class="title">Office Address</h6>
                                    <p><?= $contact_info['web_address'] ?></p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-thumb">
                                    <img src="<?= base_url() ?>public/assets/images/contact/02.png" alt="contact">
                                </div>
                                <div class="contact-content">
                                    <h6 class="title">Phone number</h6>
                                    <p><?= "+91-".$contact_info['web_contact'] ?></p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-thumb">
                                    <img src="<?= base_url() ?>public/assets/images/contact/03.png" alt="contact">
                                </div>
                                <div class="contact-content">
                                    <h6 class="title">Send email </h6>
                                    <a href="mailto:<?= $contact_info['web_email'] ?>"><?= $contact_info['web_email'] ?></a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Contact Section Ends Here========== -->

<?= $this->endSection() ?>