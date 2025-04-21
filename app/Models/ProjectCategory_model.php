<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class ProjectCategory_model extends Model
    {
        protected $table         = 'project_category';
        protected $primaryKey = 'id';
        protected $allowedFields = [
            'name',
        ];
        
    }
?>