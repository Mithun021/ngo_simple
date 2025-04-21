<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class Activity_files_model extends Model
    {
        protected $table         = 'activities_files';
        protected $primaryKey = 'id';
        protected $allowedFields = [
            'activity_id',
            'activity_files'
        ];
        
    }
?>