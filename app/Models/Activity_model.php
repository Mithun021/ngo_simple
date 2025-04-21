<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class Activity_model extends Model
    {
        protected $table         = 'activities';
        protected $primaryKey = 'id';
        protected $allowedFields = [
            'cultural_activity_heading',
            'cultural_activity_desc',
            'sports_activity_heading',
            'sports_activity_desc'
        ];
        
    }
?>