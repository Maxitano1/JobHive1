<?php
require_once __DIR__ . '/../controllers/JobController.php';
$controller = new JobController();
$data = $controller->index();
$jobs = $data['jobs'];
$totalPages = $data['totalPages'];
$currentPage = $data['currentPage'];
?>

<section class="section-box pt-50 pb-50">
  <div class="container">
    <h2 class="mb-4 text-primary">Danh sách việc làm</h2>

    <div class="row">
      <?php foreach ($jobs as $job): ?>
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="card mb-30 p-20 border rounded shadow-sm">
            <div class="card-body">
              <a href="?page=job_detail&id=<?= $job['id'] ?>" class="text-decoration-none">
                <h4 class="class="card-title text-primary""><?= htmlspecialchars($job['title']) ?></h4>
              </a>
              <p class="card-text mb-1"><strong>Company:</strong> <?= htmlspecialchars($job['company']) ?></p>
              <p class="card-text mb-1"><strong>Location:</strong> <?= htmlspecialchars($job['location']) ?></p>
              <p class="card-text mb-1"><strong>Salary:</strong> <?= htmlspecialchars($job['salary']) ?></p>
              <p class="card-text mt-2 text-muted"><?= nl2br(htmlspecialchars($job['description'])) ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

      <?php if (count($jobs) === 0): ?>
        <div class="col-12">
          <div class="alert alert-warning text-center">Hiện chưa có công việc nào.</div>
        </div>
      <?php endif; ?>
    </div>
    <!-- Phân trang tại inddexx -->
    <?php if ($totalPages > 1): ?>
      <nav class="mt-4">
        <ul class="pagination justify-content-center">
          <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?= ($i === $currentPage) ? 'active' : '' ?>">
              <a class="page-link" href="?page=home&p=<?= $i ?>"><?= $i ?></a>
            </li>
          <?php endfor; ?>
        </ul>
      </nav>
    <?php endif; ?>
  </div>
</section>