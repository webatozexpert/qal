<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class branchpermission extends Model
{
     protected $fillable = [
        'user_id', 
        'branch_id', 
        'branch_default', 
    ];
}
