<?php

use App\Models\SkillsCategory_model;
use App\Models\UserModel;
    $userModel = new UserModel();
    $user_data = $userModel->find(1);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?= $title ?></title>

    <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/animate.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/nice-select.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/slick.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/slick-theme.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/odometer.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/main.css">
      <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="shortcut icon" href="<?= base_url() ?>public/assets/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        @media (min-width: 1200px) {
            .feature-section.style-2 .bg-shape {
                left: calc(0% - 240px);
            }
        }
        .menu li a {
            display: block;
            padding: 10px 15px;
            font-size: 14px;
        }
        @media (min-width: 992px) {
            .footer-top {
                padding: 0 0 0px;
            }
        }
        .volunteer-item-2 .volunteer-thumb .thumb img {
            width: 100%;
            height: 270px !important;
            object-fit: cover;
        }
        img#qr-image{
            height : auto;
            width : 60%;
        }
        @media(max-width : 552px){
            img#qr-image{
                width : 90%;   
            }
        }
    </style>
</head>

<body>


    <!-- ==========Preloader Overlay Starts Here========== -->
    <!-- <div class="overlayer">
        <div class="loader">
            <div class="loader-inner"></div>
        </div>
    </div>
    <div class="scrollToTop"><i class="fas fa-angle-up"></i></div>
    <div class="overlay"></div>
    <div class="overlayTwo"></div> -->
    <!-- ==========Preloader Overlay Ends Here========== -->

    <!-- ==========Header Section Starts Here========== -->
    <header>
        <div class="header-top">
            <div class="container">
                <div class="header-top-area">
                    <ul class="left">
                        <li>
                            <i class="far fa-envelope"></i> <?= $user_data['web_email'] ?>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-phone-alt"></i><?= "+91-".$user_data['web_contact'] ?></a>
                        </li>
                        <!--<li>-->
                        <!--    <i class="fas fa-map-marker-alt"></i> <?= $user_data['web_address'] ?>-->
                        <!--</li>-->
                    </ul>
                    <ul class="social-icons">
                        <li>
                            <a href="<?= $user_data['facebook_link'] ?>"><i class="fab fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="<?= $user_data['twitter_link'] ?>"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="<?= $user_data['instagram_link'] ?>"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="<?= $user_data['youtube_link'] ?>"><i class="fab fa-youtube"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="header-wrapper">
                    <div class="logo">
                        <a href="<?= base_url() ?>">
                            <img src="<?= base_url() ?>public/assets/images/logo/<?= $user_data['web_logo'] ?>" alt="logo">
                        </a>
                    </div>
                    <div class="menu-area">
                        <ul class="menu">
                            <li><a href="<?= base_url() ?>">Home</a></li>
                            <li>
                                <a href="#0">About</a>
                                <ul class="submenu">
                                    <li><a href="<?= base_url() ?>about-us">About Us</a></li>
                                    <li><a href="<?= base_url() ?>history">History</a></li>
                                    <li><a href="<?= base_url() ?>who-we-are">Who we are ?</a></li>
                                    <li><a href="<?= base_url() ?>team-member">Our Team</a></li>
                                    <li><a href="<?= base_url() ?>mission-vision">Mission Vision</a></li>
                                </ul>
                            </li>
                            <li><a href="<?= base_url() ?>projects">Projects</a></li>
                            <!-- <li>
                                <a href="#0">Our Works</a>
                                <ul class="submenu">
                                    <li><a href="<?= base_url() ?>what-we-do">What We Do</a></li>
                                    <li><a href="<?= base_url() ?>success-story">Success Stories</a></li>
                                </ul>
                            </li> -->
                            <li>
                                <a href="#0">Skill Development</a>
                                <ul class="submenu">
                                <?php
                                    $skillsCategory_model = new SkillsCategory_model();
                                    $skillsCategory = $skillsCategory_model->orderBy('name','ASC')->findAll();
                                    foreach ($skillsCategory as $key => $value) {
                                ?>
                                    <li><a href="<?= base_url() ?>skillDevelopments/<?= $value['id'] ?>"><?= $value['name'] ?></a></li>
                                <?php
                                    }
                                ?>
                                </ul>
                            </li>
                            <li>
                                <a href="#0">Activities</a>
                                <ul class="submenu">
                                    <li><a href="<?= base_url() ?>cultural-activities">Cultural Activities</a></li>
                                    <li><a href="<?= base_url() ?>sports-activities">Sports Activities</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#0">Join Us</a>
                                <ul class="submenu">
                                    <li><a href="<?= base_url() ?>volunteer">Volunteer</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#0">Gallery</a>
                                <ul class="submenu">
                                    <li><a href="<?= base_url() ?>photo-gallery">Photo Gallery</a></li>
                                    <!-- <li><a href="<?= base_url() ?>video-gallery">Video Gallery</a></li> -->
                                    <li><a href="<?= base_url() ?>media-gallery">Media Gallery</a></li>
                                </ul>
                            </li>
                            <li><a href="<?= base_url() ?>contact">Contact</a></li>
                        </ul>
                        
                        <div class="header-bar d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="ellepsis-bar d-lg-none">
                            <i class="fas fa-ellipsis-h"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ==========Header Section Ends Here========== -->
