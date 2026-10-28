<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>授業を登録する | POSSE大学</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 text-slate-800 min-h-screen">
  <header class="bg-[#1f3a5f] text-white">
    <div class="max-w-5xl mx-auto px-4 py-4">
      <p class="text-xs tracking-widest text-blue-100">POSSE大学 学務ポータル</p>
      <h1 class="mt-1 text-xl font-bold">授業を登録する</h1>
    </div>
  </header>

  <main class="max-w-5xl mx-auto px-4 py-6">
    <section class="bg-white border border-slate-200 rounded-lg p-5">
      {{-- 送信すると POST /entries に送られ、コントローラの store が保存する --}}
      <form method="POST" action="/entries" class="space-y-4">
        {{-- 他のサイトからの勝手な送信を防ぐための合言葉（CSRF トークン）。Laravel のフォームには必ず入れる --}}
        @csrf

        <div>
          <label for="day" class="block text-sm font-medium text-slate-700">曜日</label>
          <select id="day" name="day" required class="mt-1 w-full border border-slate-300 rounded px-3 py-2">
            @foreach ($dayNames as $number => $name)
              <option value="{{ $number }}">{{ $name }}</option>
            @endforeach
          </select>
        </div>

        <div>
          <label for="period" class="block text-sm font-medium text-slate-700">時限</label>
          <select id="period" name="period" required class="mt-1 w-full border border-slate-300 rounded px-3 py-2">
            @for ($period = 1; $period <= 6; $period++)
              <option value="{{ $period }}">{{ $period }}限</option>
            @endfor
          </select>
        </div>

        <div>
          <label for="title" class="block text-sm font-medium text-slate-700">授業名</label>
          <input id="title" type="text" name="title" required class="mt-1 w-full border border-slate-300 rounded px-3 py-2">
        </div>

        <div>
          <label for="room" class="block text-sm font-medium text-slate-700">教室（空でもよい）</label>
          <input id="room" type="text" name="room" class="mt-1 w-full border border-slate-300 rounded px-3 py-2">
        </div>

        <button type="submit" class="bg-[#1f3a5f] text-white text-sm font-medium rounded px-4 py-2">登録する</button>
      </form>
    </section>
  </main>
</body>
</html>
