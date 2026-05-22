<?php
$navPages = array_merge(
  [['id' => 'home', 'label' => 'Главная']],
  array_map(fn($o) => ['id' => $o['id'], 'label' => $o['year'].' '.$o['city']], OLYMPICS_LIST),
  [['id' => 'comparison', 'label' => 'Сравнение'], ['id' => 'conclusions', 'label' => 'Выводы']]
);
?>
<nav style="position:fixed;top:0;left:0;right:0;z-index:50;background:rgba(10,15,30,0.93);backdrop-filter:blur(14px);border-bottom:1px solid rgba(201,162,39,0.18);">
  <div class="max-w-7xl mx-auto px-4 flex items-center justify-between h-14">
    <a href="?page=home" class="font-serif font-bold text-lg gold-text shrink-0" style="text-decoration:none;">Олимпиады XX века</a>

    <!-- Desktop links -->
    <div class="hidden xl:flex items-center gap-1">
      <?php foreach ($navPages as $p): ?>
        <a href="?page=<?= $p['id'] ?>"
           class="nav-link px-3 py-1 text-xs font-medium whitespace-nowrap <?= ($page === $p['id']) ? 'active-link text-yellow-400' : 'text-gray-400' ?>"
           style="text-decoration:none;">
          <?= htmlspecialchars($p['label']) ?>
        </a>
      <?php endforeach; ?>
    </div>

    <!-- Hamburger -->
    <button id="hamburger-btn" class="xl:hidden p-2 text-gray-300" aria-label="Меню" style="color:#d1d5db;">
      <svg id="icon-open" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2">
        <line x1="3" y1="6" x2="19" y2="6"/><line x1="3" y1="11" x2="19" y2="11"/><line x1="3" y1="16" x2="19" y2="16"/>
      </svg>
      <svg id="icon-close" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" style="display:none;">
        <line x1="4" y1="4" x2="18" y2="18"/><line x1="18" y1="4" x2="4" y2="18"/>
      </svg>
    </button>
  </div>

  <!-- Mobile drawer -->
  <div id="mobile-drawer" class="mobile-drawer xl:hidden"
       style="position:fixed;top:56px;right:0;bottom:0;width:288px;z-index:50;overflow-y:auto;background:#0d1221;border-left:1px solid rgba(201,162,39,0.2);padding:20px 16px;">
    <?php foreach ($navPages as $p): ?>
      <a href="?page=<?= $p['id'] ?>"
         style="display:block;width:100%;text-align:left;padding:12px 16px;margin-bottom:4px;border-radius:8px;font-size:0.875rem;text-decoration:none;transition:background 0.2s,color 0.2s;
                <?= ($page === $p['id']) ? 'color:#facc15;background:rgba(250,204,21,0.1);' : 'color:#9ca3af;' ?>">
        <?= htmlspecialchars($p['label']) ?>
      </a>
    <?php endforeach; ?>
  </div>
</nav>
