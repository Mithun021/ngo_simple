<?= $this->extend("admin/layouts/master") ?>

<?=  $this->section("body-content"); ?>

<!-- start page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">About ARV History </h4>
            </div>
            <div class="card-body">
                <?php
                    if(session()->getFlashdata('msg')){
                        echo session()->getFlashdata('msg');
                    }
                ?>
                <form action="<?= base_url() ?>admin/web-history" method="post">
                    
                    <div class="form-group">
                        <span for="">Heading</span>
                        <input type="text" class="form-control form-control-sm" name="arv_heading" value="<?= $historyArv['heading'] ?>">
                    </div>
                    
                    <div class="form-group">
                        <span for="">Long Description</span>
                        <textarea class="form-control form-control-sm"  id="cke-editor" name="arv_description" style="height: 300px;"><?= $historyArv['history_content'] ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary" id="submitBtn">Save</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>