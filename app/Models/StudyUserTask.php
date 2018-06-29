<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyUserTask extends Model
{
    protected $table = 'study_user_task';

    public function studyUser()
    {
        return $this->belongsTo(StudyUser::class);
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    
}
