<?php
// Helper: render img with fallback via data-srcs
function imgFallback(array $srcs, string $alt, string $class = '', string $style = ''): string {
  $src = htmlspecialchars($srcs[0] ?? '');
  return "<img src=\"{$src}\" alt=\"" . htmlspecialchars($alt) . "\" class=\"{$class}\" style=\"{$style}\">";
}

$delays = ['fade-delay-1','fade-delay-2','fade-delay-3','fade-delay-4'];
$vi = $data['visualIdentity'] ?? [];
$viItems = [
  ['label' => 'Медаль', 'text' => $vi['medal']  ?? '', 'srcs' => $vi['medalSrcs']  ?? []],
  ['label' => 'Факел',  'text' => $vi['torch']  ?? '', 'srcs' => $vi['torchSrcs']  ?? []],
  ['label' => 'Плакат', 'text' => $vi['poster'] ?? '', 'srcs' => $vi['posterSrcs'] ?? []],
];
$viItems = array_filter($viItems, fn($x) => !empty($x['text']));
$accent = $data['colorAccent'];
$isMoscow = ($data['id'] === 'moscow');
?>
<div style="--accent:<?= $accent ?>;">

  <!-- ── Hero ── -->
  <section class="relative flex flex-col justify-end min-h-screen overflow-hidden"
           style="background:linear-gradient(135deg,<?= $accent ?>18 0%,rgba(10,15,30,1) 65%),#0a0f1e;">
    <!-- Background image -->
    <div class="absolute inset-0">
      <?= imgFallback($data['heroSrcs'] ?? [], $data['city'], 'w-full h-full object-cover', 'opacity:0.14;filter:sepia(60%) blur(2px);') ?>
    </div>
    <!-- Watermark year -->
    <div class="hero-year" style="--accent:<?= $accent ?>;"><?= $data['year'] ?></div>
    <!-- Top accent bar -->
    <div class="absolute top-0 left-0 right-0 z-10" style="height:4px;background:<?= $accent ?>;"></div>
    <!-- Content -->
    <div class="relative z-10 max-w-6xl mx-auto w-full px-6 pb-20 pt-28">
      <p class="text-xs uppercase mb-3 font-medium" style="letter-spacing:0.4em;color:<?= $accent ?>;"><?= htmlspecialchars($data['country']) ?></p>
      <h1 class="font-serif font-black mb-3 text-gray-100" style="font-size:clamp(3rem,10vw,7rem);line-height:1;"><?= htmlspecialchars($data['city']) ?></h1>
      <div class="font-serif font-bold text-2xl md:text-4xl mb-5" style="color:<?= $accent ?>;"><?= $data['year'] ?></div>
      <p class="font-serif italic text-gray-400 text-lg mb-10"><?= htmlspecialchars($data['slogan']) ?></p>

      <div class="flex flex-wrap gap-3">
        <a href="?page=home" class="text-xs uppercase tracking-widest px-4 py-2 rounded border transition-all"
           style="border-color:rgba(201,162,39,0.4);color:#c9a227;text-decoration:none;">← Главная</a>
        <?php foreach (OLYMPICS_LIST as $o):
          if ($o['id'] === $data['id']) continue;
          $od = OLYMPICS_DATA[$o['id']]; ?>
          <a href="?page=<?= $o['id'] ?>" class="text-xs uppercase tracking-widest px-4 py-2 rounded border transition-all"
             style="border-color:<?= $od['colorAccent'] ?>60;color:<?= $od['colorAccent'] ?>;text-decoration:none;">
            <?= $o['year'] ?> <?= htmlspecialchars($o['city']) ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── До Олимпиады ── -->
  <section class="max-w-4xl mx-auto px-6 py-20">
    <div class="fade-in-up">
      <h2 class="font-serif font-bold text-2xl md:text-3xl mb-8" style="color:<?= $accent ?>;">До Олимпиады</h2>
      <div class="space-y-5">
        <?php foreach ($data['contextBefore'] as $i => $p): ?>
          <p class="text-gray-300 leading-relaxed<?= $i === 0 ? ' drop-cap' : '' ?>"><?= htmlspecialchars($p) ?></p>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── Во время Олимпиады ── -->
  <section class="max-w-4xl mx-auto px-6 pb-20">
    <div class="fade-in-up">
      <h2 class="font-serif font-bold text-2xl md:text-3xl mb-8" style="color:<?= $accent ?>;">Во время Олимпиады</h2>
      <div class="space-y-5">
        <?php foreach ($data['contextDuring'] as $i => $p): ?>
          <p class="text-gray-300 leading-relaxed<?= $i === 0 ? ' drop-cap' : '' ?>"><?= htmlspecialchars($p) ?></p>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── Итоги ── -->
  <section class="max-w-4xl mx-auto px-6 pb-20">
    <div class="fade-in-up">
      <h2 class="font-serif font-bold text-2xl md:text-3xl mb-8" style="color:<?= $accent ?>;">Итоги</h2>
      <div class="space-y-5">
        <?php foreach ($data['contextAfter'] as $i => $p): ?>
          <p class="text-gray-300 leading-relaxed<?= $i === 0 ? ' drop-cap' : '' ?>"><?= htmlspecialchars($p) ?></p>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ── Key Facts ── -->
  <section class="max-w-6xl mx-auto px-6 pb-20">
    <div class="fade-in-up mb-8 text-center">
      <h2 class="font-serif font-bold text-xl uppercase tracking-widest" style="color:<?= $accent ?>;">Интересные факты</h2>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
      <?php foreach ($data['keyFacts'] as $i => $f): ?>
        <div class="fade-in-up <?= $delays[$i % 4] ?> rounded-xl p-5"
             style="background:rgba(255,255,255,0.03);border:1px solid <?= $accent ?>25;">
          <div class="flex items-center gap-3 mb-3">
            <span style="font-size:1.5rem;"><?= $f['icon'] ?></span>
            <span class="text-xs uppercase tracking-widest font-medium" style="color:<?= $accent ?>;"><?= htmlspecialchars($f['label']) ?></span>
          </div>
          <div class="font-serif font-bold text-lg text-gray-100"><?= htmlspecialchars($f['value']) ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- ── Photo Gallery ── -->
  <?php if (!empty($data['photos'])): ?>
  <section class="max-w-6xl mx-auto px-6 pb-20">
    <div class="fade-in-up mb-8 text-center">
      <h2 class="font-serif font-bold text-xl uppercase tracking-widest" style="color:<?= $accent ?>;">Архивная галерея</h2>
    </div>
    <div class="photo-grid">
      <?php foreach ($data['photos'] as $i => $ph): ?>
        <figure class="fade-in-up aged-frame <?= $delays[$i % 4] ?>">
          <div class="aged-photo-wrap" style="height:220px;">
            <?= imgFallback($ph['srcs'], $ph['alt'], 'w-full h-full object-cover') ?>
          </div>
          <?php if (!empty($ph['caption'])): ?>
            <figcaption class="mt-2 text-center font-serif italic text-xs"
                        style="color:#b09050;padding:0 4px 4px;">
              <?= htmlspecialchars($ph['caption']) ?>
            </figcaption>
          <?php endif; ?>
        </figure>
      <?php endforeach; ?>
    </div>
  </section>
  <?php endif; ?>

  <!-- ── Iconic Moment ── -->
  <section class="max-w-4xl mx-auto px-6 pb-20">
    <div class="space-y-6">
    <!-- Iconic Moment -->
    <?php $im = $data['iconicMoment']; if (true): ?>
    <div class="fade-in-up rounded-xl overflow-hidden"
         style="border-left:4px solid <?= $accent ?>;background:rgba(255,255,255,0.03);">
      <div class="p-6">
        <p class="text-xs uppercase tracking-widest mb-2 font-medium" style="color:<?= $accent ?>;">Знаковый момент</p>
        <h3 class="font-serif font-bold text-xl mb-4 text-gray-100"><?= htmlspecialchars($im['title']) ?></h3>
        <p class="text-gray-400 leading-relaxed mb-4"><?= htmlspecialchars($im['body']) ?></p>
        <?php if (!empty($im['srcs'])): ?>
          <div class="aged-frame" style="max-width:400px;">
            <div class="aged-photo-wrap" style="min-height:240px;">
              <?= imgFallback($im['srcs'], $im['title'], 'w-full h-full object-contain') ?>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <?php endif; ?>
    </div>
  </section>

  <!-- ── Map ── -->
  <?php if (!empty($data['mapSrc'])): ?>
  <section class="max-w-4xl mx-auto px-6 pb-20">
    <div class="fade-in-up">
      <h2 class="font-serif font-bold text-xl uppercase tracking-widest mb-8 text-center" style="color:<?= $accent ?>;">Страны-участницы</h2>
      <div class="rounded-xl overflow-hidden" style="border:1px solid <?= $accent ?>30;">
        <img src="<?= htmlspecialchars($data['mapSrc']) ?>" alt="Карта стран-участниц" class="w-full">
      </div>
      <div class="mt-4 flex flex-wrap gap-4 justify-center text-xs">
        <div class="flex items-center gap-2">
          <span class="inline-block rounded-sm shrink-0" style="width:16px;height:16px;background:#3a7d44;"></span>
          <span class="text-gray-400">Участвовали ранее</span>
        </div>
        <div class="flex items-center gap-2">
          <span class="inline-block rounded-sm shrink-0" style="width:16px;height:16px;background:#2a6fb5;"></span>
          <span class="text-gray-400">Первый раз</span>
        </div>
        <?php if ($isMoscow): ?>
        <div class="flex items-center gap-2">
          <span class="inline-block rounded-sm shrink-0" style="width:16px;height:16px;background:#90c97a;"></span>
          <span class="text-gray-400">Под олимпийским флагом</span>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- ── Visual Identity ── -->
  <?php if (!empty($viItems) || !empty($vi['mascot'])): ?>
  <section class="max-w-5xl mx-auto px-6 pb-20">
    <div class="fade-in-up">
      <h2 class="font-serif font-bold text-xl uppercase tracking-widest mb-8 text-center" style="color:<?= $accent ?>;">Визуальная идентичность</h2>
      <div class="flex flex-col gap-6">
        <?php foreach ($viItems as $item):
          $hasSrcs = !empty($item['srcs']);
          $isMedal = ($item['label'] === 'Медаль');
          $isTorch = ($item['label'] === 'Факел');
          $isPost  = ($item['label'] === 'Плакат');
          $padImg   = ($isTorch || $isMedal) ? '30px 16px' : '16px';
          $alignImg = 'center';
          $imgW     = $isMedal ? '100%' : 'auto';
          $imgH     = ($isMoscow && $isPost) ? '' : 'min-height:220px;';
          $imgStyle = ($isMoscow && $isPost)
            ? 'object-fit:contain;max-height:147px;width:auto;'
            : "object-fit:contain;width:{$imgW};";
        ?>
          <div class="rounded-xl overflow-hidden flex flex-col sm:flex-row"
               style="background:rgba(255,255,255,0.03);border:1px solid <?= $accent ?>30;">
            <?php if ($hasSrcs): ?>
              <div style="width:340px;flex-shrink:0;background:#ffffff;display:flex;align-items:<?= $alignImg ?>;justify-content:center;padding:<?= $padImg ?>;<?= $imgH ?>">
                <?= imgFallback($item['srcs'], $item['label'], 'max-h-full max-w-full', $imgStyle) ?>
              </div>
            <?php endif; ?>
            <div class="p-6 flex flex-col justify-center">
              <div class="text-xs uppercase tracking-widest mb-3 font-medium" style="color:<?= $accent ?>;"><?= $item['label'] ?></div>
              <p class="text-gray-400 text-sm leading-relaxed"><?= htmlspecialchars($item['text']) ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Mascot -->
    <?php if (!empty($vi['mascot'])): $mascot = $vi['mascot']; ?>
    <div class="fade-in-up mt-8">
      <div class="rounded-xl overflow-hidden flex flex-col sm:flex-row"
           style="background:rgba(255,255,255,0.05);border:2px solid <?= $accent ?>60;box-shadow:0 4px 24px <?= $accent ?>18;">
        <div class="sm:w-64 shrink-0" style="min-height:240px;">
          <div style="width:100%;height:100%;min-height:240px;background:#ffffff;display:flex;align-items:center;justify-content:center;padding:16px;">
            <?= imgFallback($mascot['srcs'], $mascot['name'], 'w-full h-full', 'object-fit:contain;filter:sepia(10%) contrast(1.02);min-height:240px;') ?>
          </div>
        </div>
        <div class="p-6 flex flex-col justify-center">
          <div class="text-xs uppercase tracking-widest mb-2 font-medium" style="color:<?= $accent ?>;">Талисман</div>
          <h3 class="font-serif font-bold text-2xl text-gray-100 mb-3"><?= htmlspecialchars($mascot['name']) ?></h3>
          <p class="text-gray-400 text-sm leading-relaxed"><?= htmlspecialchars($mascot['description']) ?></p>
        </div>
      </div>
    </div>
    <?php endif; ?>
  </section>
  <?php endif; ?>

  <!-- Bottom accent bar -->
  <div class="h-1 w-full" style="background:linear-gradient(to right,transparent,<?= $accent ?>,transparent);"></div>
</div>
