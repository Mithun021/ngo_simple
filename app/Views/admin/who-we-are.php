<?= $this->extend("admin/layouts/master") ?>

<?=  $this->section("body-content"); ?>

<!-- start page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">We ARV Are </h4>
            </div>
            <div class="card-body">
                <?php
                    if(session()->getFlashdata('msg')){
                        echo session()->getFlashdata('msg');
                    }
                ?>
                <form id="sliderForm" action="<?= base_url() ?>admin/who-we-are" method="post">
                    
                    <div class="form-group">
                        <span for="">Heading</span>
                        <input type="text" class="form-control form-control-sm" name="heading" value="<?= $arvdata['heading'] ?>">
                    </div>
                    
                    <div class="form-group">
                        <span for="">Long Description</span>
                        <textarea class="form-control form-control-sm snow-editor2" name="arv_desc" id="cke-editor" style="height: 300px;"><?= $arvdata['description'] ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary" id="submitBtn">Save</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>