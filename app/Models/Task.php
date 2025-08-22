<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Task extends Model
// {
//     use HasFactory;

//     // Mass assignable fields
//     protected $fillable = [
//         'title',
//         'description',
//         'due_date',
//         'status',
//         'created_by',
//     ];

//     // A task belongs to a user (creator)
//     // public function creator()
//     // {
//     //     return $this->belongsTo(User::class, 'created_by');
//     // }

//     public function creator(){
//         return $this->belongsTo(User::class, 'created_by');
//     }
// }







namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'due_date',
        'status',
        'created_by',
    ];

    public function creator(){
        return $this->belongsTo(User::class, 'created_by');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    // ADD THIS CRITICAL RELATIONSHIP
    public function assignments()
    {
        return $this->hasMany(TaskAssignment::class);
    }
}