<?= $this->extend("admin/layouts/master") ?>

<?=  $this->section("body-content"); ?>

<!-- start page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title m-0">Add Project</h4>
            </div>
            <div class="card-body">
                <?php
                    if(session()->getFlashdata('msg')){
                        echo session()->getFlashdata('msg');
                    }
                ?>
                <form action="<?= base_url() ?>admin/add-project" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <span for="">Title</span>
                        <input type="text" name="title" id="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <span for="">Description</span>
                        <textarea name="description" id="cke-editor" class="form-control" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <span for="">Fund Raised</span>
                                <input type="text" name="fund" id="" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <span>Project Category</span>
                                <select name="projectCategory" id="" class="form-control">
                                    <option value="">Select Category</option>
                                    <?php
                                        foreach ($projectCatList as $key => $value) {
                                    ?>
                                    <option value="<?= $value['name'] ?>"><?= $value['name'] ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <span for="">Thumbnail</span>
                                <input type="file" name="thumbnail" id="" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <span for="">Project Activity <span class="error">*</span></span>
                                <select class="form-control form-control-sm" aria-invalid="project_status" name="project_status">
                                    <option value="0" >Inactive</option>
                                    <option value="1" selected>Active</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>