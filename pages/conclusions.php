<div class="min-h-screen pt-20 pb-24">
  <div class="max-w-4xl mx-auto px-6">

    <!-- Header -->
    <div class="fade-in-up text-center mb-20">
      <p class="text-xs uppercase mb-3 font-medium" style="letter-spacing:0.4em;color:#c9a227;">Итоги исследования</p>
      <h1 class="font-serif font-black text-3xl md:text-5xl mb-6 text-gray-100">
        Выводы и <span class="gold-text">временная шкала</span>
      </h1>
      <p class="text-gray-400 mx-auto leading-relaxed" style="max-width:672px;">
        Пять Олимпиад XX века сформировали современный образ Игр.
        Вот главные уроки, которые они оставили истории.
      </p>
    </div>

    <!-- Vertical timeline -->
    <div class="v-timeline-container">
      <div class="v-timeline-line hidden md:block"></div>

      <?php foreach (CONCLUSIONS as $i => $item):
        $isLeft = ($i % 2 === 0);
      ?>
        <div class="fade-in-up relative mb-16">
          <!-- Timeline dot -->
          <div class="absolute z-10 rounded-full"
               style="width:14px;height:14px;background:<?= $item['color'] ?>;border:3px solid #0a0f1e;left:calc(50% - 7px);top:20px;"></div>

          <!-- Desktop: alternating left/right -->
          <div class="hidden md:flex items-start">
            <div style="width:50%;<?= $isLeft ? 'padding-right:40px;' : '' ?>">
              <?php if ($isLeft): ?>
                <div class="rounded-xl p-6" style="background:rgba(255,255,255,0.04);border:1px solid <?= $item['color'] ?>45;">
                  <h3 class="font-serif font-bold text-lg mb-3" style="color:<?= $item['color'] ?>;"><?= htmlspecialchars($item['title']) ?></h3>
                  <p class="text-gray-400 leading-relaxed text-base"><?= htmlspecialchars($item['body']) ?></p>
                </div>
              <?php endif; ?>
            </div>
            <div style="width:1px;"></div>
            <div style="width:50%;<?= !$isLeft ? 'padding-left:40px;' : '' ?>">
              <?php if (!$isLeft): ?>
                <div class="rounded-xl p-6" style="background:rgba(255,255,255,0.04);border:1px solid <?= $item['color'] ?>45;">
                  <h3 class="font-serif font-bold text-lg mb-3" style="color:<?= $item['color'] ?>;"><?= htmlspecialchars($item['title']) ?></h3>
                  <p class="text-gray-400 leading-relaxed text-base"><?= htmlspecialchars($item['body']) ?></p>
                </div>
              <?php endif; ?>
            </div>
          </div>

          <!-- Mobile: full width -->
          <div class="md:hidden rounded-xl p-5 ml-8"
               style="background:rgba(255,255,255,0.04);border:1px solid <?= $item['color'] ?>45;">
            <h3 class="font-serif font-bold text-base mb-2" style="color:<?= $item['color'] ?>;"><?= htmlspecialchars($item['title']) ?></h3>
            <p class="text-gray-400 leading-relaxed text-sm"><?= htmlspecialchars($item['body']) ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</div>
