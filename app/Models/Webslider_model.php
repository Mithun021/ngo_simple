<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class Webslider_model extends Model
    {
        protected $table         = 'slider';
        protected $primaryKey = 'id';
        protected $allowedFields = [
            'slider_image'
        ];
        
    }
?>