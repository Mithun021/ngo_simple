<?= $this->extend("admin/layouts/master") ?>

<?=  $this->section("body-content"); ?>

<!-- start page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title m-0">Volunteers List</h4>
                <a href="javascript:void(0)" class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#addVolunteerModel"><i class="fa fa-plus"></i> Add New</a>
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
                                <td>Name</td>
                                <td>Phone</td>
                                <td>Status</td>
                                <td>District</td>
                                <td>State</td>
                                <td>Image</td>
                                <td>Create at</td>
                                <!-- <td>Left in</td> -->
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach ($volunteers as $key => $value) {
                                $status = $value['status'];
                                if($status == 1){
                                    $status_update = '<span class="badge badge-success">Active</span>';
                                }else if($status == 0){
                                    $status_update = '<span class="badge badge-danger">Left</span>';
                                }
                        ?>
                            <tr>
                                <td><?= ++$key ?></td>
                                <td><?= $value['name'] ?></td>
                                <td><?= $value['phone'] ?></td>
                                <td><?= $status_update ?></td>
                                <td><?= $value['district'] ?></td>
                                <td><?= $value['state'] ?></td>
                                <td><img src="<?= base_url() ?>public/assets/images/volunteer/<?= $value['image'] ?>" alt="" height="40px"></td>
                                <td><?= $value['created_at'] ?></td>
                                <!-- <td><?= $value['left_in'] ?></td> -->
                                <td>
                                <a href="<?= base_url() ?>admin/updateVolunteer/<?= $value['id'] ?>"><i class="fas fa-pen"></i></a> &nbsp;&nbsp;&nbsp;
                                <span onclick="deleteVolunteer('<?= $value['id'] ?>')"><i class="far fa-trash-alt"></i></span>
                           
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


<div class="modal fade" tabindex="-1" role="dialog" id="addVolunteerModel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New Volunteer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>admin/volunteersList" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="form-group">
            <span for="">Full Name <span class="error">*</span></span>
            <input type="text" class="form-control form-control-sm" name="user_name" required>
        </div> 
        <div class="form-group">
            <span for="">Phone Number <span class="error">*</span></span>
            <input type="tel" class="form-control form-control-sm" name="phone_number" pattern="[6-9]{1}[0-9]{9}" required>
        </div>
        
        <div class="form-group">
            <span for="">District <span class="error">*</span></span>
            <input type="text" class="form-control form-control-sm" name="discrict" required>
        </div>
        <div class="form-group">
            <span for="">State <span class="error">*</span></span>
            <input type="text" class="form-control form-control-sm" name="state" required>
        </div>

        <div class="form-group">
            <span for="">Address <span class="error">*</span></span>
            <textarea class="form-control form-control-sm" name="user_address" required></textarea>
        </div>
        
        <div class="form-group">
            <span for="">Upload File(JPG,PNG) <span class="error">Size - 500x500*</span></span>
            <input type="file" class="form-control form-control-sm" name="profile_image" accept=".jpg, .png, .jpeg" required>
        </div>
        <div class="form-group">
            <span for="">Account Activity <span class="error">*</span></span>
            <select class="form-control form-control-sm" name="account_status">
                <option value="1" selected>Active</option>
                <option value="0">Leave</option>
            </select>
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
    function deleteVolunteer(id) { 
        if(confirm('Are you sure__!')){
            $.ajax({
                type: "post",
                url: "deleteVolunteer",
                data: {volunteerId:id},
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