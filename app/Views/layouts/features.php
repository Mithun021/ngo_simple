 <?php
    use App\Models\About_model;
    $aboutModel = new About_model();
    $about_data = $aboutModel->find(1);
    
?>

<style>
    .about-content,.aboutBg{
        position : relative;
    }
    .about-content p{
        text-align : justify;
    }
    .aboutBg img{
        position : relative;
        width : 100%;
        height : 440px;
        object-fit : cover;
    }
</style>
 
 <!-- ==========Feature Section Start Here========== -->
 <div class="feature-section style-2 padding-bottom padding-top">
        
        <div class="container">
            <div class="row justify-content-center g-0">
                <div class="col-lg-6">
                    <div class="aboutBg">
                        <img src="<?= base_url() ?>public/assets/images/about/<?= $about_data['about_image'] ?>" alt="class">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <h4>About Us</h4>
                        <?= $about_data['short_description'] ?>
                        
                        <a href="<?= base_url() ?>about-us" class="btn btn-danger"><i class="fa fa-arrow-right" aria-hidden="true"></i> About Us</a>
                    </div>
                </div>
            </div>
            
            <div class="row justify-content-center g-0 my-4">
                <div class="col-lg-6">
                    <div class="about-content">
                        <h4>Our Vision</h4>
                        <?= $about_data['vision'] ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="aboutBg">
                        <img src="<?= base_url() ?>public/assets/images/about/<?= $about_data['mission_image'] ?>" alt="class">
                    </div>
                </div>
            </div>
            
            <div class="row justify-content-center g-0 my-4">
                <div class="col-lg-6">
                    <div class="aboutBg">
                        <img src="<?= base_url() ?>public/assets/images/about/<?= $about_data['vision_image'] ?>" alt="class">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <h4>Our Mission</h4>
                        <?= $about_data['mission'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ==========Feature Section Ends Here========== -->
