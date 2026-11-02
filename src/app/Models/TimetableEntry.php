<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimetableEntry extends Model
{
    // create() でまとめて保存してよい列（ここにない列は、フォームから送られても保存しない）
    protected $fillable = [
        'day',
        'period',
        'title',
        'room',
    ];
}
