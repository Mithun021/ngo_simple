<?= $this->extend("layouts/master") ?>
<?=  $this->section("body-content"); ?>
<?= view('layouts/breadcumbs') ?>

<?php
function limit_description($description, $limit = 20) {
    $words = explode(' ', $description);
    if (count($words) > $limit) {
        $words = array_slice($words, 0, $limit);
        return implode(' ', $words) . '...';
    } else {
        return $description;
    }
}

?>

<!-- ==========Causes Section Starts Here========== -->
<div class="causes-section padding-top padding-bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section-header">
                    <span class="cate">A help to those who need it</span>
                    <h3 class="title text-uppercase">Each donation is an essential help for everyone's life</h3>
                </div>
            </div>
        </div>
        <div class="row mb-30-none">
        <?php foreach ($projects as $key => $value) { ?>

            <div class="col-xl-4 col-sm-6 col-12">
                <div class="causes-item mb-30">
                    <div class="causes-inner">
                        <div class="causes-thumb">
                            <img src="<?= base_url() ?>public/assets/images/project/<?= $value['image'] ?>" alt="causes">
                            <div class="causes-progress">
                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                    <div class="causes-pro-left text-center">
                                        <h6>Raised</h6>
                                        <h6><span><?= "Rs. ".$value['fund_raised'] ?></span></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="causes-content bg-white">
                            <a href="<?= base_url() ?>project-details/<?= $value['id'] ?>" class="causes-catagiry mb-2 text-uppercase"><?= $value['project_category'] ?></a>
                            <h4 class="title mb-3"><a href="<?= base_url() ?>project-details/<?= $value['id'] ?>"><?= $value['title'] ?></a></h4>
                            <p>
                            <p>
                                <?php
                                // Example usage
                                    $description = $value['description'];
                                    $short_description = limit_description($description);
                                    echo $short_description;
                                ?>
                            </p>
                            <a href="<?= base_url() ?>project-details/<?= $value['id'] ?>" class="custom-button mt-2"><span>Donate Now<i class="fas fa-heart ml-2"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
            
        <?php } ?>   
        </div>
    </div>
</div>

<?= $this->endSection() ?>