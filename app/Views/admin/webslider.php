<?= $this->extend("admin/layouts/master") ?>

<?=  $this->section("body-content"); ?>

<!-- start page title -->
<div class="row">
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">Upload Slider Image </h4>
            </div>
            <div class="card-body">
                <?php
                    if(session()->getFlashdata('msg')){
                        echo session()->getFlashdata('msg');
                    }
                ?>
                <form id="sliderForm" method="post" action="<?= base_url() ?>admin/webslider" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <span for="">Upload File(JPG,PNG,JPEG) <span class="error">Size - 1600X750</span></span>
                        <input type="file" class="form-control form-control-sm" name="slider_file[]" accept=".jpg, .png, .jpeg" multiple required>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary" id="submitBtn">Save</button>
                    
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">Slider List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <td>SN</td>
                            <td>File</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($webslider as $key => $value) {
                    ?>
                        <tr>
                            <td><?= ++$key ?></td>
                            <td><img src="<?= base_url() ?>public/assets/images/banner/<?= $value['slider_image'] ?>" alt="" height="40px"></td>
                            <td><span onclick="deleteSlider('<?= $value['id'] ?>')"><i class="far fa-trash-alt"></i></span></td>
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
    function deleteSlider(id) { 
        if(confirm('Are you sure__!')){
            $.ajax({
                type: "post",
                url: "deleteSlider",
                data: {sliderId:id},
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