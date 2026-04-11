<section class="card">
  <div class="two-col">
    <div>
      <h2>What This Is</h2>

      <?php foreach ($site['intro'] as $paragraph): ?>
        <p><?= htmlspecialchars($paragraph) ?></p>
      <?php endforeach; ?>

      <div class="quote">
        <?= htmlspecialchars($site['core_quote']) ?>
      </div>
    </div>

    <div>
      <h2>How This Works</h2>

      <p><?= htmlspecialchars($site['health_intro']) ?></p>

      <ul>
        <?php foreach ($site['health_points'] as $point): ?>
          <li><?= htmlspecialchars($point) ?></li>
        <?php endforeach; ?>
      </ul>

      <h3>Project Rhythm</h3>
      <ul>
        <?php foreach ($site['operation_days'] as $day): ?>
          <li><?= htmlspecialchars($day) ?></li>
        <?php endforeach; ?>
      </ul>

      <p><?= htmlspecialchars($site['operation_note']) ?></p>

      <?php foreach ($site['progress_policy'] as $line): ?>
        <p><?= htmlspecialchars($line) ?></p>
      <?php endforeach; ?>

      <p><strong><?= htmlspecialchars($site['principle']) ?></strong></p>
    </div>
  </div>
</section>