<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class Volunteer_model extends Model
    {
        protected $table         = 'volunteers';
        protected $primaryKey = 'id';
        protected $allowedFields = [
            'name',
            'phone',
            'image',
            'district',
            'state',
            'address',
            'status',
            'left_in'
        ];
        protected $createdField  = 'created_at';
        
    }
?>