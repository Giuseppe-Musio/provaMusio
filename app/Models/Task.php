<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    public function study()
    {
        return $this->belongsTo(Study::class);
    }

    public function studyUserTask()
    {
        return $this->hasMany(StudyUserTask::class);
    }

    public function nasatlxQuestionaries()
    {
        return $this->hasMany(NasatlxQuestionary::class);
    }

    public function medias()
    {
        return $this->hasMany(Media::class);
    }
}
