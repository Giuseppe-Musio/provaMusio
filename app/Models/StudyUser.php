<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyUser extends Model
{
    protected $table = 'study_user';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

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

    public function attrakdiffQuestionary()
    {
        return $this->hasOne(AttrakdiffQuestionary::class);
    }

    public function npsQuestionary()
    {
        return $this->hasOne(NpsQuestionary::class);
    }

    public function susQuestionary()
    {
        return $this->hasOne(susQuestionary::class);
    }

    public function umuxQuestionary()
    {
        return $this->hasOne(UmuxQuestionary::class);
    }
}
