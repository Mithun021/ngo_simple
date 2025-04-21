<?= $this->extend("admin/layouts/master") ?>

<?=  $this->section("body-content"); ?>

<!-- start page title -->
<div class="row">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">Web Contact Info </h4>
            </div>
            <div class="card-body">
                <?php
                    if(session()->getFlashdata('msg')){
                        echo session()->getFlashdata('msg');
                    }
                ?>
                <form id="sliderForm" action="<?= base_url() ?>admin/contact-info" method="post">
                    
                    <div class="form-group">
                        <span for="">Phone Number</span>
                        <input type="tel" class="form-control form-control-sm" name="phone_number" pattern="[6-9]{1}[0-9]{9}" value="<?= $contactInfo['web_contact'] ?>" required>
                    </div>
                    <div class="form-group">
                        <span for="">Email  Address</span>
                        <input type="email" class="form-control form-control-sm" name="email_address" value="<?= $contactInfo['web_email'] ?>" required>
                    </div>

                    <div class="form-group">
                        <span for="">Address Info.</span>
                        <textarea class="form-control form-control-sm" name="address_info" required><?= $contactInfo['web_address'] ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary" id="submitBtn">Save</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>