<?php
    namespace App\Controllers;

use App\Models\About_model;
use App\Models\Activity_files_model;
use App\Models\Activity_model;
use App\Models\Gallery_model;
use App\Models\Histor_model;
use App\Models\ProjectCategory_model;
use App\Models\Projects_model;
use App\Models\SkillDevelopment;
use App\Models\SkillsCategory_model;
use App\Models\Team_member_modal;
use App\Models\UserModel;
use App\Models\Volunteer_model;
use App\Models\Webslider_model;
use App\Models\Who_we_area;

    class FrontendController extends BaseController{
        public function aboutUs(){
            $about_model = new About_model();
            $data = [
                'title' => "About Us",
                'aboutUs' => $about_model->first(1),
            ];
            return view('about-us',$data);
        }
        public function history(){
            $history_model = new Histor_model();
            $data = [
                'title' => "ARV History",
                'history' => $history_model->first(1),
            ];
            return view('history',$data);
        }
        public function whoWeAre(){
            $Who_we_area = new Who_we_area();
            $data = [
                'title' => "Who We Are",
                'whoWeAre' => $Who_we_area->first(1),
            ];
            return view('who-we-are',$data);
        }
        public function team_member(){
            $Team_member_modal = new Team_member_modal();
            $data = [
                'title' => "Team Members",
                'teamMembers' => $Team_member_modal->findAll(),
            ];
            return view('team-member',$data);
        }
        public function mission_vision(){
            $about_model = new About_model();
            $data = [
                'title' => "Mission Vision",
                'mission_vision' => $about_model->first(1),
            ];
            return view('mission-vision',$data);
        }
        public function projects(){
            $projects_model = new Projects_model();
            $data = [
                'title' => "Our projects",
                'projects' => $projects_model->where('status',1)->orderBy('id','DESC')->findAll(),
            ];
            return view('projects',$data);
        }

        public function project_details($id){
            $projects_model = new Projects_model();
            $data = [
                'title' => "Project Detail",
                'projects' => $projects_model->where('id',$id)->first(),
            ];
            return view('project-details',$data);
        }

        public function culturalActivities(){
            $activity_model = new Activity_model();
            $activity_files_model = new Activity_files_model();
            $data = [
                'title' => "Cultural Activities",
                'activity' => $activity_model->find(1),
                'arvActivityFiles' => $activity_files_model->where('activity_id',1)->findAll(),
            ];
            return view('cultural-activities',$data);
        }
        public function sportsActivities(){
            $activity_model = new Activity_model();
            $activity_files_model = new Activity_files_model();
            $data = [
                'title' => "Sports Activities",
                'activity' => $activity_model->find(1),
                'arvActivityFiles' => $activity_files_model->where('activity_id',2)->findAll(),
            ];
            return view('sports-activities',$data);
        }
        public function volunteer(){
            $volunteer_model = new Volunteer_model();
            $data = [
                'title' => 'Volunteers'
            ];
            $data['volunteers'] = $volunteer_model->findAll();
            return view('volunteer',$data);
        }
        public function photo_gallery(){
            $gallery_model = new Gallery_model();
            $data = [
                'title' => 'Photo Gallery'
            ];
            $data['gallery'] = $gallery_model->where('gallery_type','photo_gallery')->findAll();
            return view('photo-gallery',$data);
        }
        public function media_gallery(){
            $gallery_model = new Gallery_model();
            $data = [
                'title' => 'Media Gallery'
            ];
            $data['gallery'] = $gallery_model->where('gallery_type','media_gallery')->findAll();
            return view('media-gallery',$data);
        }

        public function contact(){
            $userModel = new UserModel();
            $data = [
                'title' => "Contact Information"
            ];
            $data['contact_info'] = $userModel->find(1);
            return view('contact',$data);
        }

        public function skillDevelopments($category){
            $SkillDevelopment = new SkillDevelopment();
            $data = [
                'title' => "Skill Development"
            ];
            $skills = $SkillDevelopment->where('project_category',$category)->first();
            if (!empty($data)) {
                $data['skillDevelopment'] = $skills;
                return view('skillDevelopments',$data);
            } else {
                return false;
                return view('error');
            }
            
            
        }
    }
    ?>