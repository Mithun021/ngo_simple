<?= $this->extend("admin/layouts/master") ?>

<?=  $this->section("body-content"); ?>

<!-- start page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title m-0">Skill Development List</h4>
                <a href="<?= base_url() ?>admin/skillsDevelopment" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="basic-datatable">
                        <thead>
                            <tr>
                                <td>SN</td>
                                <td>Title</td>
                                <td>Description</td>
                                <td>Category</td>
                                <td>Thumbnail</td>
                                <!-- <td>Create at</td> -->
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                          foreach ($skillDevelopment as $key => $value) {
                            $status = $value['status'];
                            if ($status == 0) {
                                $status_type = '<span class="badge badge-warning">Active</span>';
                            }else if ($status == 1) {
                                $status_type = '<span class="badge badge-danger">Inactive</span>';
                            }
                        ?>
                            <tr>
                                <td><?= ++$key ?></td>
                                <td><?= $value['name'] ?></td>
                                <td><?= $value['description'] ?></td>
                                <td><?= $value['project_category'] ?></td>
                                <td><img src="<?= base_url() ?>public/assets/images/skillDevelopment/<?= $value['thumbnail'] ?>" alt="" height="40px"></td>
                                <!-- <td><?= $value['created_at'] ?></td> -->
                                <td>
                                <span onclick="deleteSkillDevelopment('<?= $value['id'] ?>')"><i class="far fa-trash-alt"></i></span>
                                </td>
                            </tr>
                        <?php
                          }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function deleteSkillDevelopment(id) { 
        if(confirm('Are you sure__!')){
            $.ajax({
                type: "post",
                url: "deleteSkillDevelopment",
                data: {projectId:id},
                success: function (response) {
                    if (response == true) {
                        alert('data successful delete');
                        window.location.reload();
                    }else{
                        alert(response);
                    }
                }
            });
        }
     }
</script>

<?= $this->endSection() ?>