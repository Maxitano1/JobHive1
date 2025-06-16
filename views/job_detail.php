<?php
require_once __DIR__ . '/../config/db.php';

// Kiểm tra ID có tồn tại không
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  echo "<p class='text-danger'>⚠️ Không tìm thấy công việc.</p>";
  return;
}

$id = (int) $_GET['id'];
$stmt = db_query("SELECT * FROM jobs WHERE id = ?", [$id]);
$job = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$job) {
  echo "<p class='text-danger'>❌ Công việc không tồn tại.</p>";
  return;
}
?>


<section class="section-box pt-50">
  <div class="container bg-white p-3 mb-4 shadow rounded border ">
    <h2><?= htmlspecialchars($job['title']) ?></h2>
    

    <div class="row mb-3">
      <div class="col-md-4 d-flex align-items-center">
        <i class="bi bi-building me-2"></i> <strong>Company</strong>
      </div>
      <div class="col-md-8"><?= htmlspecialchars($job['company']) ?></div>
    </div>
    <div class="row mb-3">
      <div class="col-md-4 d-flex align-items-center">
        <i class="bi bi-currency-dollar me-2"></i> <strong>Salary</strong>
      </div>
      <div class="col-md-8 text-danger fw-bold"><?= htmlspecialchars($job['salary']) ?></div>
    </div>
    <div class="row mb-3">
      <div class="col-md-4 d-flex align-items-center">
        <i class="bi bi-geo-alt me-2"></i> <strong>Location</strong>
      </div>
      <div class="col-md-8"><?= htmlspecialchars($job['location']) ?></div>
    </div>
    <div class="row mb-3">
      <div class="col-md-4 d-flex align-items-center">
        <i class="bi bi-person-workspace me-2"></i> <strong>Description</strong>
      </div>
      <div class="col-md-8"><?= htmlspecialchars($job['description']) ?></div>
    </div>
    <div class="text-muted mb-3">
      <i class="bi bi-calendar-event me-2"></i> <strong>Created at</strong> <?= htmlspecialchars($job['created_at']) ?>
    </div>

    <div class="d-flex gap-3">
      <button class="btn btn-primary px-4">Apply Now</button>
      <button class="btn btn-outline-danger px-4">Save Job</button>
    </div>
    <a href="./" class="btn btn-secondary mt-3">⬅️ Back to home page</a>
  </div>
</section>