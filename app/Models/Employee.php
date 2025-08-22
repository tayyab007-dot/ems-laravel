<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class Employee extends Model
// {
//     //
// }


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_title',
        'experties',
        'job_contract_type',
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function user(){
        return $this->belongsTo(User::class);
    }
}


