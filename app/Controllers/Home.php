<?php

namespace App\Controllers;

use App\Models\Projects_model;
use App\Models\Webslider_model;

class Home extends BaseController
{
    public function index(): string
    {
        $webslider_model = new Webslider_model();
        $projects_model = new Projects_model();
        $data = [
            'title' => "ARV Foundation",
            'webslider' => $webslider_model->findAll(),
            'projects' => $projects_model->where('status',1)->orderBy('id','DESC')->findAll(),
        ];
        return view('index',$data);
    }
}
