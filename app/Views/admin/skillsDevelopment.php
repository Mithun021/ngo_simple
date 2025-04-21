<?= $this->extend("admin/layouts/master") ?>

<?=  $this->section("body-content"); ?>

<!-- start page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title m-0">Add Skill Development</h4>
                <a href="<?= base_url() ?>admin/skillDevelopmentList" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> View All</a>
            </div>
            <div class="card-body">
                <?php
                    if(session()->getFlashdata('msg')){
                        echo session()->getFlashdata('msg');
                    }
                ?>
                <form action="<?= base_url() ?>admin/skillsDevelopment" method="post" enctype="multipart/form-data">
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
                                <span>Skill Category</span>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary text-white" id="addSkillsCategory" onclick="openSkillsCatModal()">+</span>
                                    </div>
                                    <select name="projectCategory" id="projectCategory" class="form-control">
                                        <option value="">Select Category</option>
                                    
                                    </select>
                                </div>
                                
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
                                <span for="">Project Status <span class="error">*</span></span>
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

<div class="modal fade" tabindex="-1" role="dialog" id="SkillCatModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Skills Catefory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addSkillCarForm">
      <div class="modal-body">
        <div class="form-group">
            <span>Category Name</span>
            <input type="text" class="form-control" name="skillcategory">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>


<script>
    function openSkillsCatModal() { 
        $('#SkillCatModal').modal('show');
     }
</script>

<?= $this->endSection() ?>