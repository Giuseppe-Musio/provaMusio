<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NpsQuestionary extends Model
{
    protected $table = 'questionaries_nps';

    public function studyUser()
    {
        return $this->belongsTo(StudyUser::class);
    }
}
