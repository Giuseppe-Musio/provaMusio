<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'medias';

    public function studyUser()
    {
        return $this->belongsTo(StudyUser::class);
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
