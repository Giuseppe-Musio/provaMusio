<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UmuxQuestionary extends Model
{
    protected $table = 'questionaries_umux';

    public function studyUser()
    {
        return $this->belongsTo(StudyUser::class);
    }
}
