<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SusQuestionary extends Model
{
    protected $table = 'questionaries_sus';

    public function studyUser()
    {
        return $this->belongsTo(StudyUser::class);
    }
}
