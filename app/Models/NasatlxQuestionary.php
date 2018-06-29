<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NasatlxQuestionary extends Model
{
    protected $table = 'questionaries_nasatlx';

    public function studyUser()
    {
        return $this->belongsTo(StudyUser::class);
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
