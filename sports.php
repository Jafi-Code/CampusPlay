<?php
$pageTitle = 'Sports';
include 'includes/header.php';

$sportImageBasePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\') . '/assets/images/sports/';

$sports = [
    ['name' => 'Rugby',           'cat' => 'team',         'img' => 'sport-rugby.jpg',      'desc' => 'Men\'s and women\'s teams competing at USSA level.'],
    ['name' => 'Soccer',          'cat' => 'team',         'img' => 'sport-soccer.jpg',     'desc' => 'Competitive and recreational teams. Three floodlit fields.'],
    ['name' => 'Netball',         'cat' => 'team',         'img' => 'sport-netball.jpg',    'desc' => 'Fast-paced team sport. Beginner sessions available.'],
    ['name' => 'Hockey',          'cat' => 'team',         'img' => 'sport-hockey.jpg',     'desc' => 'Astro turf and grass fields, all floodlit for evening practice.'],
    ['name' => 'Cricket',         'cat' => 'team',         'img' => 'sport-cricket.jpg',    'desc' => 'Full programme affiliated with the Gauteng Cricket Board.'],
    ['name' => 'Basketball',      'cat' => 'team',         'img' => 'sport-basketball.jpg', 'desc' => 'Men\'s and women\'s teams in Basketball SA leagues.'],
    ['name' => 'Volleyball',      'cat' => 'team',         'img' => 'sport-volleyball.jpg', 'desc' => 'Indoor and beach volleyball. All skill levels welcome.'],
    ['name' => 'Softball',        'cat' => 'team',         'img' => 'sport-softball.jpg',   'desc' => 'Inclusive club with a strong team culture.'],
    ['name' => 'Athletics',       'cat' => 'individual',   'img' => 'sport-athletics.jpg',  'desc' => 'Track and field, throws, and cross-country.'],
    ['name' => 'Track and Field', 'cat' => 'individual',   'img' => 'sport-track.jpg',      'desc' => 'Sprints, distance, jumps, and throws. Floodlit track.'],
    ['name' => 'Tennis',          'cat' => 'individual',   'img' => 'sport-tennis.jpg',     'desc' => 'Three floodlit courts at the residences.'],
    ['name' => 'Table Tennis',    'cat' => 'individual',   'img' => 'sport-tt.jpg',         'desc' => 'Competitive and recreational play for all students.'],
    ['name' => 'Karate',          'cat' => 'individual',   'img' => 'sport-karate.jpg',     'desc' => 'Traditional training with graded belt progression.'],
    ['name' => 'Body Building',   'cat' => 'individual',   'img' => 'sport-bodybuild.jpg',  'desc' => 'Strength and conditioning with physique coaching.'],
    ['name' => 'Chess',           'cat' => 'individual',   'img' => 'sport-chess.jpg',      'desc' => 'Weekly meets with provincial competition opportunities.'],
    ['name' => 'Dance',           'cat' => 'recreational', 'img' => 'sport-dance.jpg',      'desc' => 'Contemporary, hip-hop, and traditional styles.'],
    ['name' => 'Aerobics',        'cat' => 'recreational', 'img' => 'sport-aerobics.jpg',   'desc' => 'Fitness and flexibility sessions for all levels.'],
];
?>

<section class="page-hero">
    <div class="container">
        <h1>Sport Codes at VUT</h1>
        <p>All 17 sport codes available at Vaal University of Technology. Open to full-time, part-time, and non-students.</p>
    </div>
</section>

<section class="section">
    <div class="container">

        <label for="sportSearch" class="sr-only">Search sports</label>
        <input
            type="search"
            id="sportSearch"
            class="search-input"
            placeholder="<?php echo t('search_placeholder'); ?>"
            aria-label="Search sports">

        <div class="filter-bar">
            <button class="filter-btn active" data-filter="all"><?php echo t('filter_all'); ?></button>
            <button class="filter-btn" data-filter="team"><?php echo t('filter_team'); ?></button>
            <button class="filter-btn" data-filter="individual"><?php echo t('filter_individual'); ?></button>
            <button class="filter-btn" data-filter="recreational"><?php echo t('filter_recreational'); ?></button>
        </div>

        <div class="card-grid" id="sportsGrid">
            <?php foreach ($sports as $sport): ?>
                <article
                    class="card sport-card"
                    data-category="<?php echo $sport['cat']; ?>"
                    data-name="<?php echo strtolower($sport['name']); ?>">
                    <figure class="card-img">
                        <img
                            src="<?php echo htmlspecialchars($sportImageBasePath . $sport['img'], ENT_QUOTES, 'UTF-8'); ?>"
                            alt="<?php echo htmlspecialchars($sport['name']); ?> at VUT"
                            loading="lazy">
                    </figure>
                    <div class="card-body">
                        <span class="badge badge-open"><?php echo t('badge_open'); ?></span>
                        <h3><?php echo htmlspecialchars($sport['name']); ?></h3>
                        <p><?php echo htmlspecialchars($sport['desc']); ?></p>
                        <button
                            type="button"
                            class="btn btn-ghost btn-join-sport"
                            data-sport="<?php echo htmlspecialchars($sport['name']); ?>">
                            <?php echo t('btn_join_sport'); ?>
                        </button>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <div id="emptyState" class="empty-state" hidden>
            <h3>No sports match your search</h3>
            <p>Try a different search term or select a different category.</p>
        </div>

    </div>
</section>

<dialog id="joinModal" class="join-modal" aria-labelledby="joinModalTitle">
    <div class="join-modal-inner">
        <button class="join-modal-close" aria-label="Close dialog">
            <i class="fa-solid fa-xmark" aria-hidden="true"></i>
        </button>

        <span class="badge badge-open"><?php echo t('badge_open'); ?></span>
        <h2 id="joinModalTitle">Join <span id="joinSportName">this sport</span></h2>

        <ol class="join-steps">
            <li>Check training times on <a href="https://www.tiktok.com/@vut.sports" target="_blank" rel="noopener noreferrer">@vut.sports</a> to see when the team trains.</li>
            <li>Visit the Sport Academy office at the Isak Steyl Stadium. The office is open during weekday working hours.</li>
            <li>Ask for the coach or team manager for this sport. They will confirm the next training session and any requirements.</li>
            <li>Bring your student card. Registration is open to full-time, part-time, and non-students.</li>
        </ol>

        <p class="join-note">
            Once registered, the club will add you to the sport's WhatsApp group for training times, fixtures, and updates.
        </p>

        <div class="join-actions">
            <a href="https://www.tiktok.com/@vut.sports" target="_blank" rel="noopener noreferrer" class="btn btn-outline">
                <i class="fa-brands fa-tiktok" aria-hidden="true"></i> View on TikTok
            </a>
            <a href="contact.php" id="joinContactBtn" class="btn">
                <?php echo t('nav_contact'); ?>
            </a>
        </div>
    </div>
</dialog>

<?php include 'includes/footer.php'; ?>