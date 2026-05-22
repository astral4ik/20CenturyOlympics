<?php
$page = $_GET['page'] ?? 'home';

require __DIR__ . '/data/olympics.php';
require __DIR__ . '/data/conclusions.php';

$isOlympicPage = isset(OLYMPICS_DATA[$page]);
$data = $isOlympicPage ? OLYMPICS_DATA[$page] : null;
?>
<?php require __DIR__ . '/includes/head.php'; ?>
<?php require __DIR__ . '/includes/nav.php'; ?>

<main style="<?= $page === 'home' ? '' : 'padding-top:56px;' ?>">
<?php
if ($page === 'home') {
  require __DIR__ . '/pages/home.php';
} elseif ($isOlympicPage) {
  require __DIR__ . '/pages/olympics.php';
} elseif ($page === 'comparison') {
  require __DIR__ . '/pages/comparison.php';
} elseif ($page === 'conclusions') {
  require __DIR__ . '/pages/conclusions.php';
} else {
  require __DIR__ . '/pages/home.php';
}
?>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
