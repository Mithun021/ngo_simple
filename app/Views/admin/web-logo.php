<?= $this->extend("admin/layouts/master") ?>

<?=  $this->section("body-content"); ?>

<!-- start page title -->
<div class="row">
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">Upload ARV Logo </h4>
            </div>
            <div class="card-body">
                <?php
                    if(session()->getFlashdata('msg')){
                        echo session()->getFlashdata('msg');
                    }
                ?>
                <form method="post" action="<?= base_url() ?>admin/web-logo" enctype="multipart/form-data">
                    <div class="form-group">
                        <span for="">Upload File(JPG,PNG) <span class="error">Size - 1600X750</span></span>
                        <input type="file" class="form-control form-control-sm" name="web_logo" accept=".jpg, .png, .jpeg" required>
                        <img src="<?= base_url() ?>public/assets/images/logo/<?= $weblogo['web_logo'] ?>" alt="" height="40px" width="auto" class="mt-3">
                    </div>
                    
                    <button type="submit" class="btn btn-sm btn-primary" id="submitBtn">Save</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>