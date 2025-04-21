<?= $this->extend("admin/layouts/master") ?>

<?=  $this->section("body-content"); ?>

<style>
    .activity_files {
        position: relative;
        display: flex;
        flex-wrap: wrap; /* Allow wrapping of items */
        justify-content: space-around; /* Adjust spacing between items */
    }

    .activity_files #images{
        flex: 1 1 auto; /* Grow and shrink as needed, auto width */
        margin: 10px;
        background-color: lightblue;
        padding: 10px;
        text-align: center;
    }
    
    .activity_files #images img{
        position: relative;
        width: 100%;
        height: 80px;
    }
    .activity_files #images i{
        font-size: 14px;
        height: 20px;
        width: 20px;
        background-color: #000;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #FFF;
        cursor: pointer;
    }
    
</style>

<!-- start page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">Cultural Activities </h4>
            </div>
            <div class="card-body">
                <?php
                    if(session()->getFlashdata('msg')){
                        echo session()->getFlashdata('msg');
                    }
                ?>
                <form id="sliderForm" method="post" action="<?= base_url() ?>admin/cultural-activities" enctype="multipart/form-data">

                    <div class="form-group">
                        <span for="">Heading</span>
                        <input type="text" class="form-control form-control-sm" name="heading" value="<?= $arvActivity['cultural_activity_heading'] ?>">
                    </div>
                    
                    <div class="form-group">
                        <span for="">Long Description</span>
                        <textarea class="form-control form-control-sm snow-editor2" id="cke-editor" name="culture_activity_desc" style="height: 300px;"><?= $arvActivity['cultural_activity_desc'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <span for="">Upload File(JPG,PNG) <span class="error">Size - 500X500 (Multipe Files can be uploaded Simultaneously)</span></span>
                        <input type="file" class="form-control form-control-sm" name="activity_file[]" accept=".jpg, .png, .jpeg" multiple>
                    </div>
                    <div class="activity_files">
                        <?php
                            foreach ($arvActivityFiles as $key => $files) {
                        ?>
                        <div id="images">
                            <img src="<?= base_url() ?>public/activityImage/<?= $files['activity_files'] ?>" alt="">
                            <i class="fa fa-times" onclick="deleteActivityFile('<?= $files['id'] ?>')"></i>
                        </div>
                        <?php
                            }
                        ?>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary" id="submitBtn">Save</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function deleteActivityFile(id) { 
        if(confirm('Are you sure__!')){
            $.ajax({
                type: "post",
                url: "deleteActivityFile",
                data: {iactivityd:id},
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
