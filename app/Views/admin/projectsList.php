<?= $this->extend("admin/layouts/master") ?>

<?=  $this->section("body-content"); ?>

<!-- start page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title m-0">Projects List</h4>
                <a href="<?= base_url() ?>admin/add-project" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <div class="card-body">
                <?php
                    if(session()->getFlashdata('msg')){
                        echo session()->getFlashdata('msg');
                    }
                ?>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="basic-datatable">
                        <thead>
                            <tr>
                                <td>SN</td>
                                <td>Title</td>
                                <td>Category</td>
                                <td>Fund Raised</td>
                                <td>Thumbnail</td>
                                <td>Create at</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                          foreach ($projectList as $key => $value) {
                            $status = $value['status'];
                            if ($status == 0) {
                                $status_type = '<span class="badge badge-warning">Running</span>';
                            }else if ($status == 1) {
                                $status_type = '<span class="badge badge-danger">Complete</span>';
                            }
                        ?>
                            <tr>
                                <td><?= ++$key ?></td>
                                <td><?= $value['title'] ?></td>
                                <td><?= $value['project_category'] ?></td>
                                <td><?= $value['fund_raised'] ?></td>
                                <td><img src="<?= base_url() ?>public/assets/images/project/<?= $value['image'] ?>" alt="" height="40px"></td>
                                <td><?= $value['created_at'] ?></td>
                                <td>
                                <a href="<?= base_url() ?>admin/update-project/<?= $value['id'] ?>"><i class="fas fa-pen"></i></a> &nbsp;&nbsp;&nbsp;
                                <span onclick="deleteProject('<?= $value['id'] ?>')"><i class="far fa-trash-alt"></i></span>
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
    function deleteProject(id) { 
        if(confirm('Are you sure__!')){
            $.ajax({
                type: "post",
                url: "deleteProject",
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