<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class About_model extends Model
    {
        protected $table         = 'about_arv';
        protected $primaryKey = 'id';
        protected $allowedFields = [
            'heading',
            'short_description',
            'long_description',
            'mission',
            'vision',
            'about_image',
            'mission_image',
            'vision_image'
        ];
        
    }
?>