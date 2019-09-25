<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studentFeedback extends Model
{
    protected $table = 'student_feedback';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'feedback',
        'telephone',
        'created_at',
        'updated_at'
    ];
}
