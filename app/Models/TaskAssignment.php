<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskAssignment extends Model
{
    protected $fillable = ['task_id', 'manager_id', 'employee_id'];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
//$assignment->task->title

    public function manager()
    {
        return $this->belongsTo(User::class,'manager_id','id');
    }

    public function employee()
    {
        return $this->belongsTo(User::class,'employee_id','id');

    }
     //$assignment->assignable->user->name  // if it's an Employee
     //$assignment->assignable->name        // if it's a Team

}
