<?= $this->extend("admin/layouts/master") ?>

<?=  $this->section("body-content"); ?>

<!-- start page title -->
<div class="row">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">Social Media Info </h4>
            </div>
            <div class="card-body">
                <?php
                    if(session()->getFlashdata('msg')){
                        echo session()->getFlashdata('msg');
                    }
                ?>
                <form id="sliderForm" action="<?= base_url() ?>admin/social-media" method="post">
                    
                    <div class="form-group">
                        <span for="">Facebook</span>
                        <input type="text" class="form-control form-control-sm" name="facebook_link" value="<?= $socialInfo['facebook_link'] ?>" required>
                    </div>
                    <div class="form-group">
                        <span for="">Instagram</span>
                        <input type="text" class="form-control form-control-sm" name="instagram_link" value="<?= $socialInfo['instagram_link'] ?>" required>
                    </div>

                    <div class="form-group">
                        <span for="">Twitter</span>
                        <input type="text" class="form-control form-control-sm" name="twitter_link" value="<?= $socialInfo['twitter_link'] ?>" required>
                    </div>

                    <div class="form-group">
                        <span for="">Youtube</span>
                        <input type="text" class="form-control form-control-sm" name="youtube_link" value="<?= $socialInfo['youtube_link'] ?>" required>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary" id="submitBtn">Save</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>