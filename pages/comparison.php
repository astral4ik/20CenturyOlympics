<script>
const OLYMPICS_DATA = <?= json_encode(OLYMPICS_DATA, JSON_UNESCAPED_UNICODE) ?>;
const OLYMPICS_LIST = <?= json_encode(OLYMPICS_LIST, JSON_UNESCAPED_UNICODE) ?>;
const COMPARISON_CRITERIA = <?= json_encode(COMPARISON_CRITERIA, JSON_UNESCAPED_UNICODE) ?>;
</script>

<div class="min-h-screen pt-20 pb-24">
  <div class="max-w-3xl mx-auto px-6">

    <!-- Header -->
    <div class="fade-in-up text-center mb-12">
      <p class="text-xs uppercase mb-3 font-medium" style="letter-spacing:0.4em;color:#c9a227;">Интерактивное сравнение</p>
      <h1 class="font-serif font-black text-3xl md:text-5xl mb-4 text-gray-100">Сравнить Олимпиады</h1>
      <p class="text-gray-400 mx-auto" style="max-width:576px;">Выбери критерий, чтобы увидеть все Олимпиады рядом.</p>
    </div>

    <!-- Criterion tabs -->
    <div class="fade-in-up mb-10">
      <div class="flex gap-0 overflow-x-auto" style="border-bottom:1px solid rgba(201,162,39,0.15);">
        <?php foreach (COMPARISON_CRITERIA as $i => $c): ?>
          <button class="criterion-tab <?= $i === 0 ? 'active' : '' ?>" data-key="<?= $c['key'] ?>">
            <?= htmlspecialchars($c['label']) ?>
          </button>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Cards (rendered by JS) -->
    <div id="comparison-container" class="flex flex-col gap-4"></div>

  </div>
</div>
