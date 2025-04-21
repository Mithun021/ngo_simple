<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class Histor_model extends Model
    {
        protected $table         = 'arv_history';
        protected $primaryKey = 'id';
        protected $allowedFields = [
            'heading',
            'history_content'
        ];
        
    }
?>