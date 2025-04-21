<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class Team_member_modal extends Model
    {
        protected $table         = 'team_members';
        protected $primaryKey = 'id';
        protected $allowedFields = [
            'name',
            'phoneno',
            'image',
            'leave_date',
            'status'
        ];
        
    }
?>