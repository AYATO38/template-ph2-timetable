<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class TimetableController extends Controller
{
    // 区画1で表示する曜日（1 = 月曜日）
    private const MONDAY = 1;

    public function index()
    {
        // 区画1：月曜日の授業（時限の早い順。同じ時限は科目コードの順）
        $mondayCourses = DB::select(
            'SELECT period, name, teacher, room FROM courses WHERE day = ? ORDER BY period, code',
            [self::MONDAY]
        );

        // 区画2：必修科目（科目コードの順）
        $requiredCourses = DB::select(
            'SELECT name, credits FROM courses WHERE required = true ORDER BY code'
        );

        return view('timetable', [
            'mondayCourses' => $mondayCourses,
            'requiredCourses' => $requiredCourses,
        ]);
    }
}
