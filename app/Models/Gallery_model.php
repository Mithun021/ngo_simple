<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class Gallery_model extends Model
    {
        protected $table         = 'gallery';
        protected $primaryKey = 'id';
        protected $allowedFields = [
            'image_files',
            'gallery_type'
        ];
        
    }
?>