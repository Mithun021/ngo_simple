<?= $this->extend("admin/layouts/master") ?>

<?=  $this->section("body-content"); ?>

<!-- start page title -->
<div class="row">
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">Upload Image </h4>
            </div>
            <div class="card-body">
                <?php
                    if(session()->getFlashdata('msg')){
                        echo session()->getFlashdata('msg');
                    }
                ?>
                <form id="sliderForm" method="post" action="<?= base_url() ?>admin/media-gallery" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <span for="">Upload File(JPG,PNG,JPEG) <span class="error">Size - 500x500</span></span>
                        <input type="file" class="form-control form-control-sm" name="media_gallery[]" accept=".jpg, .png, .jpeg" multiple required>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary" id="submitBtn">Save</button>
                    
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">Media Gallery List</h4>
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
                    foreach ($gallery as $key => $value) {
                    ?>
                        <tr>
                            <td><?= ++$key ?></td>
                            <td><img src="<?= base_url() ?>public/assets/images/gallery/<?= $value['image_files'] ?>" alt="" height="40px"></td>
                            <td><span onclick="deleteGallery('<?= $value['id'] ?>')"><i class="far fa-trash-alt"></i></span></td>
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
    function deleteGallery(id) { 
        if(confirm('Are you sure__!')){
            $.ajax({
                type: "post",
                url: "deleteGallery",
                data: {galleryId:id},
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