<div>
  <!-- ── Hero ── -->
  <section class="relative flex flex-col items-center justify-center min-h-screen text-center px-4"
           style="background: radial-gradient(ellipse at 60% 40%, rgba(201,162,39,0.07) 0%, transparent 70%), #0a0f1e;">

    <!-- Decorative vertical lines -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
      <div style="position:absolute;top:15%;left:8%;width:1px;height:60%;background:linear-gradient(to bottom,transparent,rgba(201,162,39,0.25),transparent);"></div>
      <div style="position:absolute;top:15%;right:8%;width:1px;height:60%;background:linear-gradient(to bottom,transparent,rgba(201,162,39,0.25),transparent);"></div>
    </div>

    <div class="relative z-10 max-w-4xl mx-auto">
      <!-- Olympic rings SVG -->
      <div class="flex justify-center mb-8">
        <svg viewBox="0 18 178 80" xmlns="http://www.w3.org/2000/svg" style="width:192px;" class="md:w-64">
          <circle cx="32"  cy="48" r="24" fill="none" stroke="#0085C7" stroke-width="5" class="ring ring-1"/>
          <circle cx="88"  cy="48" r="24" fill="none" stroke="#F4C300" stroke-width="5" class="ring ring-2"/>
          <circle cx="144" cy="48" r="24" fill="none" stroke="#009F3D" stroke-width="5" class="ring ring-3"/>
          <circle cx="60"  cy="68" r="24" fill="none" stroke="#CF0A2C" stroke-width="5" class="ring ring-4"/>
          <circle cx="116" cy="68" r="24" fill="none" stroke="#e8e0d0" stroke-width="5" class="ring ring-5"/>
        </svg>
      </div>


      <h1 class="font-serif font-black mb-6 text-gray-100" style="font-size:clamp(2.2rem,6vw,4.5rem);line-height:1.1;">
        Самые уникальные<br>
        <span class="gold-text">Олимпийские игры</span><br>
        XX века
      </h1>

      <p class="text-gray-400 mx-auto leading-relaxed mb-10 text-base" style="max-width:672px;">
        Пять Олимпиад, пять эпох, пять поворотных моментов истории.
        Политика, технологии, бойкоты, трагедии и триумфы - на примере
        Берлина, Мехико, Мюнхена, Москвы и Лос-Анджелеса.
      </p>

    </div>
  </section>

  <!-- ── Intro text ── -->
  <section class="max-w-3xl mx-auto px-6 py-20">
    <div class="fade-in-up text-center">
      <h2 class="font-serif font-bold text-2xl md:text-3xl mb-6" style="color:#c9a227;">Почему именно эти пять?</h2>
      <p class="text-gray-400 leading-relaxed mb-4">
        Из десятков Олимпиад XX века именно Берлин 1936, Мехико 1968, Мюнхен 1972,
        Москва 1980 и Лос-Анджелес 1984 сформировали современный облик Игр —
        с их политической нагруженностью, медиа-индустрией, вопросами безопасности
        и коммерческой логикой.
      </p>
      <p class="text-gray-400 leading-relaxed">
        Каждая из них — не просто спортивное событие, а исторический перелом,
        проявивший главные противоречия своего времени.
      </p>
    </div>
  </section>

  <!-- ── Horizontal Timeline ── -->
  <section style="padding-bottom:96px;padding-left:16px;padding-right:16px;">
    <div class="fade-in-up max-w-7xl mx-auto">
      <h2 class="font-serif text-center text-xl uppercase tracking-widest mb-10" style="color:#c9a227;">
        Выбери Олимпиаду
      </h2>
      <div class="timeline-scroll">
        <div class="inline-flex gap-5" style="min-width:max-content;padding:0 16px 8px;position:relative;">
          <!-- Connector line -->
          <div class="absolute pointer-events-none"
               style="top:72px;left:48px;right:48px;height:1px;background:linear-gradient(to right,transparent,rgba(201,162,39,0.35),transparent);"></div>

          <?php foreach (OLYMPICS_LIST as $o):
            $d = OLYMPICS_DATA[$o['id']];
            $heroSrc = $d['heroSrcs'][0] ?? '';
          ?>
            <a href="?page=<?= $o['id'] ?>"
               class="card-hover relative z-10 flex flex-col items-center rounded-xl overflow-hidden text-left"
               style="width:210px;background:#111827;border:2px solid <?= $d['colorAccent'] ?>50;text-decoration:none;">
              <div class="w-full relative overflow-hidden" style="height:128px;">
                <img src="<?= htmlspecialchars($d['heroSrcs'][0] ?? '') ?>" alt="<?= htmlspecialchars($d['city']) ?>"
                     class="w-full h-full object-cover"
                     style="filter:sepia(40%) brightness(0.65);">
                <div class="absolute inset-0" style="background:linear-gradient(to top,#111827 0%,transparent 55%);"></div>
              </div>
              <div class="p-4 w-full">
                <div class="font-serif font-black text-3xl mb-1" style="color:<?= $d['colorAccent'] ?>;"><?= $d['year'] ?></div>
                <div class="text-white font-medium text-sm mb-0\.5"><?= htmlspecialchars($d['city']) ?></div>
                <div class="text-xs text-gray-500"><?= htmlspecialchars($d['country']) ?></div>
              </div>
              <div class="w-full h-1" style="background:<?= $d['colorAccent'] ?>;"></div>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>
</div>
