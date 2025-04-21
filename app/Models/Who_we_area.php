<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class Who_we_area extends Model
    {
        protected $table         = 'who_we_are';
        protected $primaryKey = 'id';
        protected $allowedFields = [
            'heading',
            'description'
        ];
        
    }
?>