<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->match(['get','post'],'admin/login', 'BackendControllers::adminLogin');

// Admin Dashboard
$routes->group('admin',['filter'=>'adminLogin'], static function($routes){
    $routes->get('/', 'BackendControllers::adminDashboard');
    $routes->get('projectsList', 'BackendControllers::projectsList');
    $routes->match(['get','post'],'add-project', 'BackendControllers::add_project');
    $routes->match(['get','post'],'update-project/(:num)', 'BackendControllers::update_project/$1');
    $routes->post('deleteProject', 'BackendControllers::deleteProject');
    $routes->match(['get','post'],'projectsCategoryList', 'BackendControllers::projectsCategoryList');
    $routes->post('deleteProjectCategory', 'BackendControllers::deleteProjectCategory');
    $routes->match(['get','post'],'skillsDevelopment', 'BackendControllers::skillsDevelopment');
     $routes->match(['get','post'],'skillsDevelopmentCategory', 'BackendControllers::skillsDevelopmentCategory');
     $routes->post('deleteSkillCategory', 'BackendControllers::deleteSkillCategory');
    $routes->post('addSkillCategory', 'BackendControllers::addSkillCategory');
    $routes->get('fetchSkillCategory', 'BackendControllers::fetchSkillCategory');
    $routes->get('skillDevelopmentList', 'BackendControllers::skillDevelopmentList');
    $routes->post('deleteSkillDevelopment', 'BackendControllers::deleteSkillDevelopment');
    $routes->match(['get','post'],'volunteersList', 'BackendControllers::volunteersList');
    $routes->match(['get','post'],'updateVolunteer/(:num)', 'BackendControllers::updateVolunteers/$1');
    $routes->post('deleteVolunteer', 'BackendControllers::deleteVolunteer');
    $routes->match(['get','post'],'webslider', 'BackendControllers::webslider');
    $routes->post('deleteSlider', 'BackendControllers::deleteSlider');
    $routes->match(['get','post'],'contact-info', 'BackendControllers::contactInfo');
    $routes->match(['get','post'],'social-media', 'BackendControllers::socialMedia');
    $routes->match(['get','post'],'about-web', 'BackendControllers::aboutWeb');
    $routes->match(['get','post'],'web-history', 'BackendControllers::webHistory');
    $routes->match(['get','post'],'who-we-are', 'BackendControllers::who_we_are');
    $routes->match(['get','post'],'team-members', 'BackendControllers::team_members');
    $routes->post('upldate-team-members',"BackendControllers::upldateTeamMembers");
    $routes->post('deleteTeamMember', 'BackendControllers::deleteTeamMember');
    $routes->match(['get','post'],'mission-vision', 'BackendControllers::mission_vision');
    $routes->match(['get','post'],'photo-gallery', 'BackendControllers::photo_gallery');
    $routes->post('deleteGallery', 'BackendControllers::deleteGallery');
    $routes->match(['get','post'],'media-gallery', 'BackendControllers::media_gallery');
    $routes->match(['get','post'],'cultural-activities', 'BackendControllers::cultural_activities');
    $routes->match(['get','post'],'sports-activities', 'BackendControllers::sports_activities');
    $routes->post('deleteActivityFile', 'BackendControllers::deleteActivityFile');
    $routes->match(['get','post'],'web-logo', 'BackendControllers::web_logo');
    $routes->get('logout',"BackendControllers::logout");
});


$routes->get('about-us', 'FrontendController::aboutUs');
$routes->get('history', 'FrontendController::history');
$routes->get('who-we-are', 'FrontendController::whoWeAre');
$routes->get('team-member', 'FrontendController::team_member');
$routes->get('mission-vision', 'FrontendController::mission_vision');
$routes->get('projects', 'FrontendController::projects');
$routes->get('project-details/(:num)', 'FrontendController::project_details/$1');
$routes->get('skillDevelopments/(:any)', 'FrontendController::skillDevelopments/$1');
$routes->get('cultural-activities', 'FrontendController::culturalActivities');
$routes->get('sports-activities', 'FrontendController::sportsActivities');
$routes->get('volunteer', 'FrontendController::volunteer');
$routes->get('photo-gallery', 'FrontendController::photo_gallery');
$routes->get('media-gallery', 'FrontendController::media_gallery');
$routes->get('contact', 'FrontendController::contact');
$routes->get('error', 'FrontendController::error');