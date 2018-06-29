<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttrakdiffQuestionary extends Model
{
    protected $table = 'questionaries_attrakdiff';

    public function studyUser()
    {
        return $this->belongsTo(StudyUser::class);
    }
}
