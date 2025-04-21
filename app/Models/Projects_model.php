<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class Projects_model extends Model
    {
        protected $table         = 'projects';
        protected $primaryKey = 'id';
        protected $allowedFields = [
            'title',
            'description',
            'project_category',
            'fund_raised',
            'status',
            'image'
        ];
        protected $createdField  = 'created_at';
        
    }
?>