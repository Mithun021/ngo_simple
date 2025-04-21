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

    class BackendControllers extends BaseController{
        public function adminLogin(){
            $admin_model = new UserModel();
            if ($this->request->is("get")) {

                // Check Session Status

                if (isset($_SESSION['adminLoginned'])) {
                    $data = [
                        'title' => 'Home'
                    ];
                    return view("admin/index",$data); 
                }


                return view('admin/login');
            }
            else if ($this->request->is("post")) {
                $userId = $this->request->getPost('userId');
                $userPassword = $this->request->getVar('userPassword');

                $data = $admin_model->where('email',$userId)
                                    ->orWhere('phoneNumber',$userId)->first();
                if($data){
                    $session_data = [
                        'loggeduserFirstName' => $data['firstName'],
                        'loggeduserPhone' => $data['phoneNumber'],
                        'loggeduseremail' => $data['email'],
                        'loggeduserId' => $data['userId']
                    ];
                    $userPhone = $data['phoneNumber'];
                    if (password_verify($userPassword, $data['password'])) {
                        $this->session->set('loggedUserData',$session_data);
                        $this->session->set('adminLoginned',"adminLoginned");
                        echo "dataMatch";
                    } else {
                    echo 'User ID or Password Mismatch';
                    }
                }
                else{
                    echo "Given Username or Phone Number not found";
                }
            }
           
        }
        public function adminDashboard(){
            $data = [
                'title' => 'Home'
            ];
            return view('admin/index',$data);
        }

        public function projectsList(){
            $projects_model = new Projects_model();
            $projectList = $projects_model->orderBy('id','desc')->findAll();
            $data = [
                'title' => 'Project List',
                'projectList' => $projectList
            ];
            return view('admin/projectsList',$data);
        }
        public function add_project(){
            $projects_model = new Projects_model();
            $projectCatList = new ProjectCategory_model();
            $data = [
                'title' => 'Add project',
                'projectCatList' => $projectCatList->orderBy('name','ASC')->findAll(),
            ];
            if ($this->request->is("get")) {
                return view('admin/add-project',$data);
            }else if ($this->request->is("post")) {
                $profile_image = $this->request->getFile('thumbnail');
                if ($profile_image->isValid() && ! $profile_image->hasMoved()) {
                    $imageName = $profile_image->getRandomName();
                    $profile_image->move(ROOTPATH . 'public/assets/images/project', $imageName);    
                }else{
                 $imageName = "invalidImage.png";
                }
                
                $data = [
                    'title' => $this->request->getPost('title'),
                    'description' => $this->request->getPost('description'),
                    'project_category' => $this->request->getPost('projectCategory'),
                    'image' => $imageName,
                    'fund_raised' => $this->request->getPost('fund'),
                    'status' => $this->request->getPost('project_status')
                ];
                $save = $projects_model->save($data);
                if ($save) {
                    return redirect()->to('admin/add-project/')->with('msg','<div class="alert alert-success" role="alert"> Update Successful </div>');
                }
                else{
                    return redirect()->to('admin/add-project/')->with('msg','<div class="alert alert-danger" role="alert"> Failed to update </div>');
                }
            }
        }

        public function update_project($id){
            $projects_model = new Projects_model();
            $projectCatList = new ProjectCategory_model();
            $project = $projects_model->find($id);
            $data = [
                'title' => 'Edit project',
                'project' => $project,
                'projectCatList' => $projectCatList->orderBy('name','ASC')->findAll(),
            ];
            if ($this->request->is("get")) {
                return view('admin/update-project',$data);
            }else if ($this->request->is("post")) {
                $new_image = $this->request->getFile('thumbnail');
                // Fetch Old Image
               $projectrData = $projects_model->find($id);
               $old_image = $projectrData['image'];
               if ($new_image->isValid() && !$new_image->hasMoved()) {
               
                   if(file_exists("public/assets/images/project/".$old_image)){
                       unlink("public/assets/images/project/".$old_image);
                   }
                   $new_image_name = $new_image->getRandomName();
                   $new_image->move(ROOTPATH.'public/assets/images/project', $new_image_name);
               }
               else{
                   $new_image_name = $old_image;
               }

               $data = [
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
                'project_category' => $this->request->getPost('projectCategory'),
                'image' => $new_image_name,
                'fund_raised' => $this->request->getPost('fund'),
                'status' => $this->request->getPost('project_status')
                ];
                //print_r($data);
               // die;
                $save = $projects_model->update($id, $data);
                if ($save) {
                    return redirect()->to('admin/projectsList/')->with('msg','<div class="alert alert-success" role="alert"> Update Successful </div>');
                }
                else{
                    return redirect()->to('admin/projectsList/')->with('msg','<div class="alert alert-danger" role="alert"> Failed to update </div>');
                }

            }
        }

        public function deleteProject(){
            $projects_model = new Projects_model();
            $teamid = $this->request->getPost('projectId');

            $data = $projects_model->find($teamid);
            $old_image_name =  $data['image'];

            if(file_exists("public/assets/images/project/".$old_image_name)){
                unlink("public/assets/images/project/".$old_image_name);
            }

            $delete = $projects_model->delete($teamid);
            if ($delete) {
                echo true;
            }
            else{
                echo "Failed to delete";
            }
        
        }


        public function volunteersList(){
            $volunteer_model = new Volunteer_model();
            $data = [
                'title' => 'Volunteers List'
            ];
            if ($this->request->is("get")) {
                $data['volunteers'] = $volunteer_model->findAll();
                return view('admin/volunteersList',$data);
            }else if ($this->request->is("post")) {
                $profile_image = $this->request->getFile('profile_image');
                if ($profile_image->isValid() && ! $profile_image->hasMoved()) {
                    $imageName = $profile_image->getRandomName();
                    $profile_image->move(ROOTPATH . 'public/assets/images/volunteer', $imageName);    
                }else{
                 $imageName = "invalidImage.png";
                }
                
                $data = [
                    'name' => $this->request->getPost('user_name'),
                    'phone' => $this->request->getPost('phone_number'),
                    'image' => $imageName,
                    'district' => $this->request->getPost('discrict'),
                    'state' => $this->request->getPost('state'),
                    'address' => $this->request->getPost('user_address'),
                    'status' => $this->request->getPost('account_status')
                ];
                $save = $volunteer_model->save($data);
                if ($save) {
                    return redirect()->to('admin/volunteersList/')->with('msg','<div class="alert alert-success" role="alert"> Update Successful </div>');
                }
                else{
                    return redirect()->to('admin/volunteersList/')->with('msg','<div class="alert alert-danger" role="alert"> Failed to update </div>');
                }

            }
        }

        public function updateVolunteers($val1){
            $volunteer_model = new Volunteer_model();
            $data = [
                'title' => 'Volunteers List'
            ];
            if ($this->request->is("get")) {
                $data['volunteersfetch'] = $volunteer_model->find($val1);
                $data['volunteers'] = $volunteer_model->findAll();
                return view('admin/updateVolunteer',$data);
            }else if ($this->request->is("post")) {
                $new_image = $this->request->getFile('profile_image');
                 // Fetch Old Image
                $volunteerData = $volunteer_model->find($val1);
                $old_image = $volunteerData['image'];
                if ($new_image->isValid() && !$new_image->hasMoved()) {
                
                    if(file_exists("public/assets/images/volunteer/".$old_image)){
                        unlink("public/assets/images/volunteer/".$old_image);
                    }
                    $new_image_name = $new_image->getRandomName();
                    $new_image->move(ROOTPATH.'public/assets/images/volunteer', $new_image_name);
                }
                else{
                    $new_image_name = $old_image;
                }

                $data = [
                    'name' => $this->request->getPost('user_name'),
                    'phone' => $this->request->getPost('phone_number'),
                    'image' => $new_image_name,
                    'district' => $this->request->getPost('discrict'),
                    'state' => $this->request->getPost('state'),
                    'address' => $this->request->getPost('user_address'),
                    'status' => $this->request->getPost('account_status')
                ];

                $update = $volunteer_model->update($val1, $data);
                if ($update) {
                    return redirect()->to('admin/volunteersList/')->with('msg','<div class="alert alert-success" role="alert"> Save Successful </div>');
                }
                else{
                    return redirect()->to('admin/volunteersList/')->with('msg','<div class="alert alert-danger" role="alert"> Failed to save </div>');
                }

            }
        }

        public function deleteVolunteer(){
            $volunteer_model = new Volunteer_model();
            $teamid = $this->request->getPost('volunteerId');

            $data = $volunteer_model->find($teamid);
            $old_image_name =  $data['image'];

            if(file_exists("public/assets/images/volunteer/".$old_image_name)){
                unlink("public/assets/images/volunteer/".$old_image_name);
            }

            $delete = $volunteer_model->delete($teamid);
            if ($delete) {
                echo true;
            }
            else{
                echo "Failed to delete";
            }
        
        }


        public function webslider(){
            $webslider_model = new Webslider_model();
            $data = [
                'title' => 'Slider List'
            ];
            if ($this->request->is("get")) {
                $data['webslider'] = $webslider_model->findAll();
                return view('admin/webslider',$data);
            }else if ($this->request->is("post")) {
                $galleryimage = $this->request->getFiles();
                if ($galleryimage) {
                    foreach ($galleryimage['slider_file'] as $file) {
                        // Check if the file is valid
                        if ($file->isValid() && !$file->hasMoved()) {
                            // Generate a new file name
                            $newName = $file->getRandomName();
                            // Move the file to the desired location
                            $file->move(ROOTPATH . 'public/assets/images/banner', $newName);
                
                            // Save to database
                            $data = [
                                'slider_image' => $newName,
                            ];
                
                            $save = $webslider_model->save($data);
                        }
                    }
                }
                if ($save) {
                    return redirect()->to('admin/webslider/')->with('msg','<div class="alert alert-success" role="alert"> Update Successful </div>');
                }
                else{
                    return redirect()->to('admin/webslider/')->with('msg','<div class="alert alert-danger" role="alert"> Failed to update </div>');
                }
            }
        }

        public function deleteSlider(){
            $webslider_model = new Webslider_model();
            $sliderId = $this->request->getPost('sliderId');

            $data = $webslider_model->find($sliderId);
            $old_image_name =  $data['slider_image'];

            if(file_exists("public/assets/images/banner/".$old_image_name)){
                unlink("public/assets/images/banner/".$old_image_name);
            }

            $delete = $webslider_model->delete($sliderId);
            if ($delete) {
                echo true;
            }
            else{
                echo "Failed to delete";
            }
        
        }


        public function contactInfo(){
            $admin_model = new UserModel();
            if ($this->request->is("get")) {
                $data = [
                    'title' => 'Contact Info'
                ];
                $data['contactInfo'] = $admin_model->first();
                return view('admin/contact-info',$data);
            }else if ($this->request->is("post")) {
               $data = [
                'web_contact' => $this->request->getPost('phone_number'),
                'web_email' => $this->request->getPost('email_address'),
                'web_address' => $this->request->getPost('address_info')
               ];
               $update = $admin_model->update(1,$data);
               if ($update) {
                    return redirect()->to('admin/contact-info/')->with('msg','<div class="alert alert-success" role="alert"> Update Successful </div>');
                }
                else{
                    return redirect()->to('admin/contact-info/')->with('msg','<div class="alert alert-danger" role="alert"> Failed to update </div>');
                }
            }
        }
        public function socialMedia(){
            $admin_model = new UserModel();
            if ($this->request->is("get")) {
                $data = [
                    'title' => 'Social Media'
                ];
                $data['socialInfo'] = $admin_model->first();
                return view('admin/social-media',$data);
            }else if ($this->request->is("post")) {
                $data = [
                'facebook_link' => $this->request->getPost('facebook_link'),
                'instagram_link' => $this->request->getPost('instagram_link'),
                'twitter_link' => $this->request->getPost('twitter_link'),
                'youtube_link' => $this->request->getPost('youtube_link')
                ];
                $update = $admin_model->update(1,$data);
                if ($update) {
                    return redirect()->to('admin/social-media/')->with('msg','<div class="alert alert-success" role="alert"> Update Successful </div>');
                }
                else{
                    return redirect()->to('admin/social-media/')->with('msg','<div class="alert alert-danger" role="alert"> Failed to update </div>');
                }
            }
            
        }

        public function aboutWeb(){
            $about_model = new About_model();
            $data = [
                'title' => 'About ARV'
            ];
            if ($this->request->is("get")) {
                $data['aboutArv'] = $about_model->find(1);
                return view('admin/about-web',$data);
            }
            else if ($this->request->is("post")) {
                $about = $about_model->find(1);
                $heading = $this->request->getPost('heading');
                $avout_short_desc = $this->request->getVar('avout_short_desc');
                $description = $this->request->getVar('about_desc');
                
                $new_event_file = $this->request->getFile('about_image');
                $old_image_name =  $about['about_image'];
                if ($new_event_file->isValid() && !$new_event_file->hasMoved()) {
                    if(file_exists("public/assets/images/about/".$old_image_name)){
                        unlink("public/assets/images/about/".$old_image_name);
                    }
                    $new_image_name = $new_event_file->getRandomName();
                    $new_event_file->move(ROOTPATH.'public/assets/images/about/', $new_image_name);
                }
                else{
                    $new_image_name = $old_image_name;
                } 

                $data = [
                    'heading' => $heading,
                    'short_description' => $avout_short_desc,
                    'long_description' => $description,
                    'about_image' => $new_image_name
                ];
                $update = $about_model->update(1,$data);

                if ($update) {
                    return redirect()->to('admin/about-web/')->with('msg','<div class="alert alert-success" role="alert"> Update Successful </div>');
                }
                else{
                    return redirect()->to('admin/about-web/')->with('msg','<div class="alert alert-danger" role="alert"> Failed to update </div>');
                }

            }
        }
        public function webHistory(){
            $history_model = new Histor_model();
            $data = [
                'title' => 'ARV History'
            ];
            if ($this->request->is("get")) {
                $data['historyArv'] = $history_model->find(1);
                return view('admin/web-history',$data);
            }
            else if ($this->request->is("post")) {
                $heading = $this->request->getPost('arv_heading');
                $desc = $this->request->getVar('arv_description');

                $data = [
                    'heading' => $heading,
                    'history_content' => $desc
                ];
                $update = $history_model->update(1,$data);

                if ($update) {
                    return redirect()->to('admin/web-history/')->with('msg','<div class="alert alert-success" role="alert"> Update Successful </div>');
                }
                else{
                    return redirect()->to('admin/web-history/')->with('msg','<div class="alert alert-danger" role="alert"> Failed to update </div>');
                }
            }
        }
        public function who_we_are(){
            $whoweare_model = new Who_we_area();
            $data = [
                'title' => 'Who we are'
            ];
            if ($this->request->is("get")) {
                $data['arvdata'] = $whoweare_model->find(1);
                return view('admin/who-we-are',$data);
            }
            else if ($this->request->is("post")) {
                $heading = $this->request->getPost('heading');
                $desc = $this->request->getVar('arv_desc');

                $data = [
                    'heading' => $heading,
                    'description' => $desc
                ];
                $update = $whoweare_model->update(1,$data);

                if ($update) {
                    return redirect()->to('admin/who-we-are/')->with('msg','<div class="alert alert-success" role="alert"> Update Successful </div>');
                }
                else{
                    return redirect()->to('admin/who-we-are/')->with('msg','<div class="alert alert-danger" role="alert"> Failed to update </div>');
                }
            }
        }
        public function team_members(){
            $team_member_modal = new Team_member_modal();
            $data = [
                'title' => 'Team Members'
            ];
            if ($this->request->is("get")) {
                $data['teamMembers'] = $team_member_modal->orderBy('id','desc')->findAll();
                return view('admin/team-members',$data);
            }
            else if ($this->request->is("post")) {
                $profile_image = $this->request->getFile('profile_image');
                if ($profile_image->isValid() && ! $profile_image->hasMoved()) {
                    $imageName = $profile_image->getRandomName();
                    $profile_image->move(ROOTPATH . 'public/assets/images/team_members', $imageName);    
                }else{
                 $imageName = "invalidImage.png";
                }
                $data = [
                    'name'=>$this->request->getPost('user_name'),
                    'phoneno'=>$this->request->getPost('phone_number'),
                    'image'=>$imageName,
                    'status'=>$this->request->getPost('account_status')
                ];
                $save = $team_member_modal->save($data);
                if ($save) {
                    return redirect()->to('admin/team-members/')->with('msg','<div class="alert alert-success" role="alert"> Save Successful </div>');
                }
                else{
                    return redirect()->to('admin/team-members/')->with('msg','<div class="alert alert-danger" role="alert"> Failed to save </div>');
                }
            }
        }

        public function upldateTeamMembers(){
            $team_member_modal = new Team_member_modal();
            $teamid = $this->request->getPost('user_id');
            // Get Update Image by Post
            $new_image = $this->request->getFile('profile_image');
             // Fetch Old Image
            $teamData = $team_member_modal->find($teamid);
            $old_image = $teamData['image'];

            if ($new_image->isValid() && !$new_image->hasMoved()) {
                
                if(file_exists("public/assets/images/team_members/".$old_image)){
                    unlink("public/assets/images/team_members/".$old_image);
                }
                $new_image_name = $new_image->getRandomName();
                $new_image->move(ROOTPATH.'public/assets/images/team_members', $new_image_name);
            }
            else{
                $new_image_name = $old_image;
            }
            $data = [
                'name'=>$this->request->getPost('user_name'),
                'phoneno'=>$this->request->getPost('phone_number'),
                'image'=>$new_image_name,
                'status'=>$this->request->getPost('account_status')
            ];
            

            $update = $team_member_modal->update($teamid, $data);
            if ($update) {
                return redirect()->to('admin/team-members/')->with('msg','<div class="alert alert-success" role="alert"> Save Successful </div>');
            }
            else{
                return redirect()->to('admin/team-members/')->with('msg','<div class="alert alert-danger" role="alert"> Failed to save </div>');
            }

        }

        public function deleteTeamMember(){
            $team_member_modal = new Team_member_modal();
            $teamid = $this->request->getPost('teamid');

            $data = $team_member_modal->find($teamid);
            $old_image_name =  $data['image'];

            if(file_exists("public/assets/images/team_members/".$old_image_name)){
                unlink("public/assets/images/team_members/".$old_image_name);
            }

            $delete = $team_member_modal->delete($teamid);
            if ($delete) {
                echo true;
            }
            else{
                echo "Failed to delete";
            }
        
        }


        public function mission_vision(){
            $about_model = new About_model();
            $data = [
                'title' => 'Mission Vision'
            ];
            if ($this->request->is("get")) {
                $data['aboutArv'] = $about_model->find(1);
                return view('admin/mission-vision',$data);
            }
            else if ($this->request->is("post")) {
                $about = $about_model->find(1);
                
                $mission = $this->request->getPost('mission');
                $vision = $this->request->getVar('vision');
                
                $new_event_file = $this->request->getFile('mission_image');
                $old_image_name =  $about['mission_image'];
                if ($new_event_file->isValid() && !$new_event_file->hasMoved()) {
                    if(file_exists("public/assets/images/about/".$old_image_name)){
                        unlink("public/assets/images/about/".$old_image_name);
                    }
                    $new_image_name = $new_event_file->getRandomName();
                    $new_event_file->move(ROOTPATH.'public/assets/images/about/', $new_image_name);
                }
                else{
                    $new_image_name = $old_image_name;
                } 
                
                $new_event_file2 = $this->request->getFile('vision_image');
                $old_image_name2 =  $about['vision_image'];
                if ($new_event_file2->isValid() && !$new_event_file2->hasMoved()) {
                    if(file_exists("public/assets/images/about/".$old_image_name2)){
                        unlink("public/assets/images/about/".$old_image_name2);
                    }
                    $new_image_name2 = $new_event_file2->getRandomName();
                    $new_event_file2->move(ROOTPATH.'public/assets/images/about/', $new_image_name2);
                }
                else{
                    $new_image_name2 = $old_image_name2;
                }

                $data = [
                    'mission' => $mission,
                    'vision' => $vision,
                    'mission_image' => $new_image_name,
                    'vision_image' => $new_image_name2,
                ];
                $update = $about_model->update(1,$data);

                if ($update) {
                    return redirect()->to('admin/mission-vision/')->with('msg','<div class="alert alert-success" role="alert"> Update Successful </div>');
                }
                else{
                    return redirect()->to('admin/mission-vision/')->with('msg','<div class="alert alert-danger" role="alert"> Failed to update </div>');
                }

            }
        }
        public function photo_gallery(){
            $gallery_model = new Gallery_model();
            $data = [
                'title' => 'Photo Gallery'
            ];
            if ($this->request->is("get")) {
                $data['gallery'] = $gallery_model->where('gallery_type','photo_gallery')->findAll();
                return view('admin/photo-gallery',$data);
            }else if ($this->request->is("post")) {
                $galleryimage = $this->request->getFiles();
                if ($galleryimage) {
                    foreach ($galleryimage['photo_gallery'] as $file) {
                        // Check if the file is valid
                        if ($file->isValid() && !$file->hasMoved()) {
                            // Generate a new file name
                            $newName = $file->getRandomName();
                            // Move the file to the desired location
                            $file->move(ROOTPATH . 'public/assets/images/gallery', $newName);
                
                            // Save to database
                            $data = [
                                'gallery_type' => 'photo_gallery',
                                'image_files' => $newName,
                            ];
                
                            $save = $gallery_model->save($data);
                        }
                    }
                }
                if ($save) {
                    return redirect()->to('admin/photo-gallery/')->with('msg','<div class="alert alert-success" role="alert"> Save Successful </div>');
                }
                else{
                    return redirect()->to('admin/photo-gallery/')->with('msg','<div class="alert alert-danger" role="alert"> Failed to save </div>');
                }
            }
        }


        public function deleteGallery(){
            $gallery_model = new Gallery_model();
            $galleryId = $this->request->getPost('galleryId');

            $data = $gallery_model->find($galleryId);
            $old_image_name =  $data['image_files'];

            if(file_exists("public/assets/images/gallery/".$old_image_name)){
                unlink("public/assets/images/gallery/".$old_image_name);
            }

            $delete = $gallery_model->delete($galleryId);
            if ($delete) {
                echo true;
            }
            else{
                echo "Failed to delete";
            }
        
        }




        public function media_gallery(){
            $gallery_model = new Gallery_model();
            $data = [
                'title' => 'Media Gallery'
            ];
            // return view('admin/media-gallery',$data);
            
            if ($this->request->is("get")) {
                $data['gallery'] = $gallery_model->where('gallery_type','media_gallery')->findAll();
                return view('admin/media-gallery',$data);
            }else if ($this->request->is("post")) {
                $galleryimage = $this->request->getFiles();
                if ($galleryimage) {
                    foreach ($galleryimage['media_gallery'] as $file) {
                        // Check if the file is valid
                        if ($file->isValid() && !$file->hasMoved()) {
                            // Generate a new file name
                            $newName = $file->getRandomName();
                            // Move the file to the desired location
                            $file->move(ROOTPATH . 'public/assets/images/gallery', $newName);
                
                            // Save to database
                            $data = [
                                'gallery_type' => 'media_gallery',
                                'image_files' => $newName,
                            ];
                
                            $save = $gallery_model->save($data);
                        }
                    }
                }
                if ($save) {
                    return redirect()->to('admin/media-gallery/')->with('msg','<div class="alert alert-success" role="alert"> Save Successful </div>');
                }
                else{
                    return redirect()->to('admin/media-gallery/')->with('msg','<div class="alert alert-danger" role="alert"> Failed to save </div>');
                }
            }


        }
        public function cultural_activities(){
            $activity_model = new Activity_model();
            $activity_files_model = new Activity_files_model();
            $data = [
                'title' => 'Cultural Activities'
            ];
            if ($this->request->is("get")) {
                $data['arvActivity'] = $activity_model->find(1);
                $data['arvActivityFiles'] = $activity_files_model->where('activity_id',1)->findAll();
                return view('admin/cultural-activities',$data);
            }
            else if ($this->request->is("post")) {
                $galleryimage = $this->request->getFiles();
                $heading = $this->request->getPost('heading');
                $culture_activity_desc = $this->request->getVar('culture_activity_desc');
                
                $data = [
                    'cultural_activity_heading' => $heading,
                    'cultural_activity_desc' => $culture_activity_desc
                ];
                $update = $activity_model->update(1,$data);

                // Add Gallery 
                
                if ($galleryimage) {
                    foreach ($galleryimage['activity_file'] as $file) {
                        // Check if the file is valid
                        if ($file->isValid() && !$file->hasMoved()) {
                            // Generate a new file name
                            $newName = $file->getRandomName();
                            // Move the file to the desired location
                            $file->move(ROOTPATH . 'public/activityImage', $newName);

                            // Save to database
                            $data = [
                                'activity_id' => 1,
                                'activity_files' => $newName,
                            ];

                            $activity_files_model->save($data);
                        }
                    }
                }


                if ($update) {
                    return redirect()->to('admin/cultural-activities/')->with('msg','<div class="alert alert-success" role="alert"> Update Successful </div>');
                }
                else{
                    return redirect()->to('admin/cultural-activities/')->with('msg','<div class="alert alert-danger" role="alert"> Failed to update </div>');
                }
            }
        }

        public function deleteActivityFile(){
            $activity_files_model = new Activity_files_model();
            $bannerId = $this->request->getPost('iactivityd');

            $data = $activity_files_model->find($bannerId);
            $old_image_name =  $data['activity_files'];

            if(file_exists("public/activityImage/".$old_image_name)){
                unlink("public/activityImage/".$old_image_name);
            }

            $delete = $activity_files_model->delete($bannerId);
            if ($delete) {
                echo true;
            }
            else{
                echo "Failed to delete";
            }
        
        }




        public function sports_activities(){
            $activity_model = new Activity_model();
            $activity_files_model = new Activity_files_model();
            $data = [
                'title' => 'Sports Activities'
            ];
            
            
            if ($this->request->is("get")) {
                $data['arvActivity'] = $activity_model->find(1);
                $data['arvActivityFiles'] = $activity_files_model->where('activity_id',2)->findAll();
                return view('admin/sports-activities',$data);
            }
            else if ($this->request->is("post")) {
                $galleryimage = $this->request->getFiles();
                $heading = $this->request->getPost('heading');
                $culture_activity_desc = $this->request->getVar('culture_activity_desc');
                
                $data = [
                    'sports_activity_heading' => $heading,
                    'sports_activity_desc' => $culture_activity_desc
                ];
                $update = $activity_model->update(1,$data);

                // Add Gallery 
                
                if ($galleryimage) {
                    foreach ($galleryimage['activity_file'] as $file) {
                        // Check if the file is valid
                        if ($file->isValid() && !$file->hasMoved()) {
                            // Generate a new file name
                            $newName = $file->getRandomName();
                            // Move the file to the desired location
                            $file->move(ROOTPATH . 'public/activityImage', $newName);

                            // Save to database
                            $data = [
                                'activity_id' => 2,
                                'activity_files' => $newName,
                            ];

                            $activity_files_model->save($data);
                        }
                    }
                }


                if ($update) {
                    return redirect()->to('admin/sports-activities/')->with('msg','<div class="alert alert-success" role="alert"> Update Successful </div>');
                }
                else{
                    return redirect()->to('admin/sports-activities/')->with('msg','<div class="alert alert-danger" role="alert"> Failed to update </div>');
                }
            }
            
            //return view('admin/sports-activities',$data);
        }
        public function web_logo(){
            $user_model = new UserModel();
            $sessionData = session()->get('loggedUserData');
            if ($sessionData) {
                $loggeduserId = $sessionData['loggeduserId'];
            }

            $data = [
                'title' => 'ARV Logo'
            ];
            if ($this->request->is("get")) {
                $data['weblogo'] = $user_model->first($loggeduserId);
                return view('admin/web-logo',$data);
            }
            else if ($this->request->is("post")) {
                // Find Category Image
                $imageFile = $this->request->getFile('web_logo');

                $web_logo = $user_model->find($loggeduserId);
                $old_image_name =  $web_logo['web_logo'];

                if ($imageFile->isValid() && !$imageFile->hasMoved()) {
                    
                    if(file_exists("public/assets/images/logo/".$old_image_name)){
                        unlink("public/assets/images/logo/".$old_image_name);
                    }
                    $new_image_name = $imageFile->getRandomName();
                    $imageFile->move(ROOTPATH.'public/assets/images/logo/', $new_image_name);
                }
                else{
                    $new_image_name = $old_image_name;
                }

                $updatedata = [
                    'web_logo' =>$new_image_name
                ];
                $update = $user_model->update($loggeduserId,$updatedata);

                if ($update) {
                    return redirect()->to('admin/web-logo/')->with('msg','<div class="alert alert-success" role="alert"> Update Successful </div>');
                }
                else{
                    return redirect()->to('admin/web-logo/')->with('msg','<div class="alert alert-danger" role="alert"> Failed to update </div>');
                }
            }
        }


        public function projectsCategoryList(){
            $projects_cat_model = new ProjectCategory_model();
            $projectCatList = $projects_cat_model->orderBy('id','desc')->findAll();
            if ($this->request->is("get")) {
                $data = [
                    'title' => 'Project List',
                    'projectCatList' => $projectCatList
                ];
                return view('admin/projectsCategoryList',$data);
            }
            if ($this->request->is("post")) {
                //echo "ok";
                //die;
                $name = $this->request->getPost('cat_name');
                $data = [
                    'name' => $name
                ];
                $insert = $projects_cat_model->save($data);
                if ($insert) {
                    return redirect()->to('admin/projectsCategoryList')->with('msg','<div class="alert alert-success" role="alert"> Successful Save </div>');
                }
                else{
                    return redirect()->to('admin/projectsCategoryList')->with('msg','<div class="alert alert-danger" role="alert"> Failed to save </div>');
                }
            }
        }

        public function deleteProjectCategory(){
            $projects_cat_model = new ProjectCategory_model();
            $categoryId = $this->request->getPost('categoryId');

            $delete = $projects_cat_model->delete($categoryId);
            if ($delete) {
                echo true;
            }
            else{
                echo "Failed to delete";
            }
        
        }

        public function skillsDevelopment(){
            $skillDevelopment_model = new SkillDevelopment();
            if ($this->request->is("get")) {
                $data = [
                    'title' => 'Skill Development'
                ];
                return view('admin/skillsDevelopment',$data);
            }
            else if ($this->request->is("post")){
                $profile_image = $this->request->getFile('thumbnail');
                if ($profile_image->isValid() && ! $profile_image->hasMoved()) {
                    $imageName = $profile_image->getRandomName();
                    $profile_image->move(ROOTPATH . 'public/assets/images/skillDevelopment', $imageName);    
                }else{
                 $imageName = "invalidImage.png";
                }
                
                $data = [
                    'name' => $this->request->getPost('title'),
                    'description' => $this->request->getPost('description'),
                    'project_category' => $this->request->getPost('projectCategory'),
                    'thumbnail' => $imageName,
                    'status' => $this->request->getPost('project_status')
                ];
                //print_r($data);die;
                $save = $skillDevelopment_model->save($data);
                if ($save) {
                    return redirect()->to('admin/skillsDevelopment/')->with('msg','<div class="alert alert-success" role="alert"> Add Successful </div>');
                }
                else{
                    return redirect()->to('admin/skillsDevelopment/')->with('msg','<div class="alert alert-danger" role="alert"> Failed to add </div>');
                }
            }
        }
        public function skillsDevelopmentCategory(){
            $data = ['title' => 'Skill Dev Category'];
            $skills_category_model = new SkillsCategory_model();
            $data['skills_category'] = $skills_category_model->findAll();
            if ($this->request->is("get")) {
            return view('admin/skillsDevelopmentCategory',$data);
            }else if ($this->request->is("post")) {
                $data = [
                    'name' => $this->request->getPost('cat_name')
                ];
                //print_r($data);die;
                $save = $skills_category_model->save($data);
                if ($save) {
                    return redirect()->to('admin/skillsDevelopmentCategory/')->with('msg','<div class="alert alert-success" role="alert"> Add Successful </div>');
                }
                else{
                    return redirect()->to('admin/skillsDevelopmentCategory/')->with('msg','<div class="alert alert-danger" role="alert"> Failed to add </div>');
                }
            }
        }
        public function deleteSkillCategory(){
            $skills_category_model = new SkillsCategory_model();
            $categoryId = $this->request->getPost('categoryId');

            $delete = $skills_category_model->delete($categoryId);
            if ($delete) {
                echo true;
            }
            else{
                echo "Failed to delete";
            }
        
        }
        public function addSkillCategory(){
            $skills_category_model = new SkillsCategory_model();
            $name = $this->request->getPost('skillcategory');
            $data = [
                'name' => $name
            ];
            $insert = $skills_category_model->save($data);
            if ($insert) {
                echo true;
            }
            else{
                echo "Data not save";
            }
        }

        public function fetchSkillCategory(){
            $skills_category_model = new SkillsCategory_model();
            $data = $skills_category_model->findAll();
            return $this->response->setJSON($data);
            
        }
        public function deleteSkillDevelopment(){
            $skillDevelopment_model = new SkillDevelopment();
            $teamid = $this->request->getPost('projectId');

            $data = $skillDevelopment_model->find($teamid);
            $old_image_name =  $data['thumbnail'];

            if(file_exists("public/assets/images/skillDevelopment/".$old_image_name)){
                unlink("public/assets/images/skillDevelopment/".$old_image_name);
            }

            $delete = $skillDevelopment_model->delete($teamid);
            if ($delete) {
                echo true;
            }
            else{
                echo "Failed to delete";
            }
        
        }

        public function skillDevelopmentList(){
            $skillDevelopment_model = new SkillDevelopment();
            $data = [
                'skillDevelopment' => $skillDevelopment_model->findAll(),
                'title' => 'Skill Development List'
            ];
            return view('admin/skillDevelopmentList',$data);
        }

        public function logout(){
            $session = session();
            session_unset();
            session_destroy();
            return redirect()->to(base_url('admin/login'));
        }


    }