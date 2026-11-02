<?php

namespace App\Http\Controllers;

use App\Models\TimetableEntry;
use Illuminate\Http\Request;

class TimetableEntryController extends Controller
{
    // 曜日の数字（day 列）を画面に出す文字に変換するための表
    private const DAY_NAMES = [
        1 => '月',
        2 => '火',
        3 => '水',
        4 => '木',
        5 => '金',
    ];

    public function index()
    {
        // 登録済みの授業を、曜日順 → 同じ曜日の中では時限順に並べて取り出す
        $entries = TimetableEntry::orderBy('day')
            ->orderBy('period')
            ->get();

        return view('entries.index', [
            'entries' => $entries,
            'dayNames' => self::DAY_NAMES,
        ]);
    }

    // 授業を登録するフォームを表示する
    public function create()
    {
        return view('entries.create', [
            'dayNames' => self::DAY_NAMES,
        ]);
    }

    // フォームから送られた授業を保存し、一覧ページに戻る
    public function store(Request $request)
    {
        TimetableEntry::create($request->only(['day', 'period', 'title', 'room']));

        return redirect('/entries');
    }
}
