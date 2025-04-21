<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class SkillsCategory_model extends Model
    {
        protected $table         = 'skills_category';
        protected $primaryKey = 'id';
        protected $allowedFields = [
            'name',
        ];
        
    }
?>