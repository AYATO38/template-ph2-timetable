<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>わたしの時間割 | POSSE大学</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 text-slate-800 min-h-screen">
  <header class="bg-[#1f3a5f] text-white">
    <div class="max-w-5xl mx-auto px-4 py-4">
      <p class="text-xs tracking-widest text-blue-100">POSSE大学 学務ポータル</p>
      <h1 class="mt-1 text-xl font-bold">わたしの時間割</h1>
    </div>
  </header>

  <main class="max-w-5xl mx-auto px-4 py-6">
    <section class="min-w-0 bg-white border border-slate-200 rounded-lg">
      <div class="px-5 pt-4 pb-3 border-b border-slate-200">
        <h2 class="text-base font-bold text-slate-800">登録した授業</h2>
        <p class="mt-1 text-xs text-slate-500">曜日順・時限順に並べています。</p>
      </div>

      {{-- 1件も登録されていないときは、表の代わりにメッセージを出す --}}
      @if ($entries->isEmpty())
        <p class="px-5 py-6 text-sm text-slate-500">まだ授業が登録されていません。</p>
      @else
        <div class="overflow-x-auto">
          <table class="w-full text-sm text-left text-slate-700">
            <thead class="bg-slate-50 text-slate-600">
              <tr>
                <th class="px-4 py-2 font-medium whitespace-nowrap">曜日</th>
                <th class="px-4 py-2 font-medium whitespace-nowrap">時限</th>
                <th class="px-4 py-2 font-medium whitespace-nowrap">授業名</th>
                <th class="px-4 py-2 font-medium whitespace-nowrap">教室</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($entries as $entry)
                <tr class="border-t border-slate-200">
                  <td class="px-4 py-2 whitespace-nowrap">{{ $dayNames[$entry->day] }}</td>
                  <td class="px-4 py-2 whitespace-nowrap">{{ $entry->period }}</td>
                  <td class="px-4 py-2 whitespace-nowrap">{{ $entry->title }}</td>
                  {{-- 教室は空のこともあるので、そのときは「-」を出す --}}
                  <td class="px-4 py-2 whitespace-nowrap">{{ $entry->room ?? '-' }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif
    </section>
  </main>
</body>
</html>
