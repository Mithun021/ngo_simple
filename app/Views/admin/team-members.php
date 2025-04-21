<?= $this->extend("admin/layouts/master") ?>

<?=  $this->section("body-content"); ?>

<!-- start page title -->
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">ARV Team Members </h4>
            </div>
            <div class="card-body">
                <?php
                    if(session()->getFlashdata('msg')){
                        echo session()->getFlashdata('msg');
                    }
                ?>
                <form id="sliderForm" method="post" action="<?= base_url() ?>admin/team-members" enctype="multipart/form-data">
                    <div class="form-group">
                        <span for="">Full Name <span class="error">*</span></span>
                        <input type="text" class="form-control form-control-sm" name="user_name" required>
                    </div> 
                    <div class="form-group">
                        <span for="">Phone Number <span class="error">*</span></span>
                        <input type="tel" class="form-control form-control-sm" name="phone_number" pattern="[6-9]{1}[0-9]{9}" required>
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

                    <button type="submit" class="btn btn-sm btn-primary" id="submitBtn">Save</button>
                    
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">Team Members List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-striped table-hover" id="basic-datatable">
                    <thead>
                        <tr>
                            <td>SN</td>
                            <td>Name</td>
                            <td>Phone</td>
                            <td>Image</td>
                            <td>Status</td>
                            <td>Join Date</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($teamMembers as $key => $value) {
                            $status = $value['status'];
                            // $team_id = $value['id'];
                            // $name = $value['name'];
                            // $phoneno = $value['phoneno'];
                            // $image = $value['image'];
                        ?>
                        <tr>
                            <td><?= ++$key ?></td>
                            <td><?= $value['name'] ?></td>
                            <td><?= $value['phoneno'] ?></td>
                            <td><img src="<?= base_url() ?>public/assets/images/team_members/<?= $value['image'] ?>" alt="" height="30px"></td>
                            <td>
                                <?php
                                    if($status == 1){
                                        echo '<span class="badge badge-success">Active</span>';
                                    }
                                    else if($status == 0){
                                        echo '<span class="badge badge-danger">Leave</span>';
                                    }
                                ?>
                            </td>
                            <td><?= date("d-m-Y", strtotime($value['created_at'] )) ?></td>
                            <td>
                            <span onclick="editTeamMembers('<?= $value['id']  ?>','<?= $value['name']  ?>','<?= $value['phoneno']  ?>','<?= $value['image']  ?>','<?= $value['status']  ?>','<?= base_url() ?>')"><i class="fas fa-pen"></i></span> &nbsp;&nbsp;&nbsp;
                                <span onclick="deleteTeam('<?= $value['id'] ?>')"><i class="far fa-trash-alt"></i></span>
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


<!-- >>>>>>>>>>>>>>>>>>>> Edit Team Model <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< -->

<div class="modal fade" tabindex="-1" role="dialog" id="editTeamModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Team Members</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>admin/upldate-team-members" enctype="1">
        <div class="modal-body">
            <input type="text" class="form-control form-control-sm" id="user_id" name="user_id" required>         
            <div class="form-group">
                <span for="">Full Name <span class="error">*</span></span>
                <input type="text" class="form-control form-control-sm" id="user_name" name="user_name" required>
            </div> 
            <div class="form-group">
                <span for="">Phone Number <span class="error">*</span></span>
                <input type="tel" class="form-control form-control-sm" id="phone_number" name="phone_number" pattern="[6-9]{1}[0-9]{9}" required>
            </div>
            <div class="form-group">
                <span for="">Upload File(JPG,PNG) <span class="error">Size - 500x500*</span></span>
                <input type="file" class="form-control form-control-sm" name="profile_image" accept=".jpg, .png, .jpeg" >
                <div id="teamProfileImage"></div>
            </div>
            <div class="form-group">
                <span for="">Account Activity <span class="error">*</span></span>
                <select class="form-control form-control-sm" aria-invalid="account_status" name="account_status">
                    <option value="1" selected>Active</option>
                    <option value="0">Leave</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>


<?= $this->endSection() ?>
