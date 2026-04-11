<section class="card">
  <h2>Ladder Progression</h2>

  <?php
  $totalGames = count($ladder['tiers']) * count($ladder['games']);
  $completedGames = 0;

  foreach ($ladder['tiers'] as $tier) {
      $tierName = $tier['name'];
      $tierProgress = $ladder['progress'][$tierName] ?? [];

      foreach ($ladder['games'] as $game) {
          $entry = $tierProgress[$game] ?? ['status' => 'LOCKED', 'run_link' => ''];
          $status = $entry['status'] ?? 'LOCKED';

          if ($status === 'COMPLETED') {
              $completedGames++;
          }
      }
  }

  $progressPercent = $totalGames > 0
      ? round(($completedGames / $totalGames) * 100)
      : 0;
  ?>

  <div class="progress-wrap">
    <div class="progress-meta">
      <span>Overall Progress</span>
      <span><?= $completedGames ?>/<?= $totalGames ?> cleared (<?= $progressPercent ?>%)</span>
    </div>
    <div class="progress-bar">
      <div class="progress-fill" style="width: <?= $progressPercent ?>%;"></div>
    </div>
  </div>

  <?php foreach ($ladder['tiers'] as $tier): ?>
    <?php
      $tierName = $tier['name'];
      $tierProgress = $ladder['progress'][$tierName] ?? [];
    ?>

    <div class="season">
      <div class="season-head">
        <div>
          <h3><?= htmlspecialchars($tierName) ?></h3>
          <p class="season-tag"><?= htmlspecialchars($tier['tag']) ?></p>
        </div>
        <span class="pill">Planned</span>
      </div>

      <div class="game-list">
        <?php foreach ($ladder['games'] as $game): ?>
          <?php
            $entry = $tierProgress[$game] ?? ['status' => 'LOCKED', 'run_link' => ''];
            $status = $entry['status'] ?? 'LOCKED';
            $runLink = $entry['run_link'] ?? '';
            $rowClass = ($status === 'IN_PROGRESS') ? 'game-row active' : 'game-row';
          ?>

          <div class="<?= htmlspecialchars($rowClass) ?>">
            <div>
              <div class="game-name"><?= htmlspecialchars($game) ?></div>

              <?php if (!empty($ladder['notes'][$game])): ?>
                <div class="game-note"><?= htmlspecialchars($ladder['notes'][$game]) ?></div>
              <?php endif; ?>

              <?php if ($status === 'COMPLETED' && !empty($runLink)): ?>
                <div class="game-link">
                  <a href="<?= htmlspecialchars($runLink) ?>" target="_blank" rel="noreferrer">Winning Run</a>
                </div>
              <?php endif; ?>
            </div>

            <span class="status <?= htmlspecialchars(strtolower($status)) ?>">
              <?= htmlspecialchars(str_replace('_', ' ', $status)) ?>
            </span>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endforeach; ?>
</section>