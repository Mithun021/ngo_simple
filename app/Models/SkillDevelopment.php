<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class SkillDevelopment extends Model
    {
        protected $table         = 'skills_developement';
        protected $primaryKey = 'id';
        protected $allowedFields = [
            'name',
            'description',
            'project_category',
            'thumbnail',
            'status'
        ];
        protected $createdField  = 'created_at';
        
    }
?>