<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('timetable_entries', function (Blueprint $table) {
            $table->id();
            // 曜日（1 = 月曜日 〜 5 = 金曜日）
            $table->smallInteger('day');
            // 時限（1 〜 6）
            $table->smallInteger('period');
            // 授業名
            $table->string('title');
            // 教室（空でもよい）
            $table->string('room')->nullable();
            $table->timestamps();

            // 同じ曜日・同じ時限に授業を2つ入れられないようにする
            $table->unique(['day', 'period']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timetable_entries');
    }
};
