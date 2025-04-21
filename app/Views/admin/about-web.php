<?= $this->extend("admin/layouts/master") ?>

<?=  $this->section("body-content"); ?>

<!-- start page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">About ARV Foundation </h4>
            </div>
            <div class="card-body">
                <?php
                    if(session()->getFlashdata('msg')){
                        echo session()->getFlashdata('msg');
                    }
                ?>
                <form method="post" action="<?= base_url() ?>admin/about-web" enctype="multipart/form-data">
                    <div class="form-group">
                        <span for="">Heading</span>
                        <input type="text" class="form-control form-control-sm" name="heading" value="<?= $aboutArv['heading'] ?>">
                    </div>
                    <div class="form-group">
                        <span for="">Short Description</span>
                        <textarea class="form-control form-control-sm snow-editor" id="cke-editor" name="avout_short_desc" style="height: 200px;">
                        <?= $aboutArv['short_description'] ?>
                        </textarea>
                    </div>

                    <div class="form-group">
                        <span for="">Long Description</span>
                        <textarea class="form-control form-control-sm snow-editor2" id="cke-editor2" name="about_desc" style="height: 300px;">
                        <?= $aboutArv['long_description'] ?>
                        </textarea>
                    </div>
                    
                    <div class="form-group">
                        <input type="file" class="form-control form-control-sm" name="about_image" >
                        <img src="<?= base_url() ?>public/assets/images/about/<?= $aboutArv['about_image'] ?>" height="80px" />
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary" id="submitBtn">Save</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>