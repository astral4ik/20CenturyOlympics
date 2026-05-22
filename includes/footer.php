<footer style="background:#060a16;border-top:1px solid rgba(201,162,39,0.12);padding:48px 24px 32px;">
  <div class="max-w-6xl mx-auto">
    <div style="display:flex;justify-content:space-between;align-items:flex-start;flex-wrap:wrap;gap:32px;margin-bottom:32px;">
      <div>
        <div class="font-serif font-bold text-xl gold-text mb-2">Олимпиады XX века</div>
        <p class="text-gray-500 text-sm" style="max-width:280px;">Пять Олимпиад, пять эпох, пять поворотных моментов истории.</p>
      </div>
      <div>
        <div class="text-xs uppercase tracking-widest mb-3 font-medium" style="color:#c9a227;">Олимпиады</div>
        <div style="display:flex;flex-wrap:wrap;gap:8px 24px;">
          <?php foreach (OLYMPICS_LIST as $o): ?>
            <a href="?page=<?= $o['id'] ?>" class="text-sm text-gray-400 nav-link" style="text-decoration:none;white-space:nowrap;">
              <?= $o['year'] ?> — <?= htmlspecialchars($o['city']) ?>
            </a>
          <?php endforeach; ?>
        </div>
        <div class="text-xs uppercase tracking-widest font-medium" style="color:#c9a227;margin-top:20px;margin-bottom:12px;">Разделы</div>
        <div style="display:flex;gap:24px;">
          <a href="?page=comparison" class="text-sm text-gray-400 nav-link" style="text-decoration:none;">Сравнение</a>
          <a href="?page=conclusions" class="text-sm text-gray-400 nav-link" style="text-decoration:none;">Выводы</a>
        </div>
      </div>
    </div>
  </div>
</footer>
<script src="/app.js"></script>
</body>
</html>
