<?= $this->extend("admin/layouts/master") ?>

<?=  $this->section("body-content"); ?>

<!-- start page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">ARV Mission Vision </h4>
            </div>
            <div class="card-body">
                <?php
                    if(session()->getFlashdata('msg')){
                        echo session()->getFlashdata('msg');
                    }
                ?>
                <form action="<?= base_url() ?>admin/mission-vision" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <span for="">Mission</span>
                        <textarea class="form-control form-control-sm snow-editor" id="cke-editor" name="mission" style="height: 300px;"><?= $aboutArv['mission'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control form-control-sm" name="mission_image" >
                        <img src="<?= base_url() ?>public/assets/images/about/<?= $aboutArv['mission_image'] ?>" height="80px" />
                    </div>

                    <div class="form-group">
                        <span for="">Vision</span>
                        <textarea class="form-control form-control-sm snow-editor2" name="vision" id="cke-editor2" style="height: 300px;"><?= $aboutArv['vision'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control form-control-sm" name="vision_image" >
                        <img src="<?= base_url() ?>public/assets/images/about/<?= $aboutArv['vision_image'] ?>" height="80px" />
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary" id="submitBtn">Save</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>