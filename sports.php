<?php
require_once __DIR__ . '/includes/lang.php';

$pageTitle = t('page_sports');
include 'includes/header.php';

$sportImageBasePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\') . '/assets/images/sports/';

$sports = [
    ['name' => 'Rugby',           'cat' => 'team',         'img' => 'sport-rugby.jpg',      'desc' => t('sport_desc_rugby')],
    ['name' => 'Soccer',          'cat' => 'team',         'img' => 'sport-soccer.jpg',     'desc' => t('sport_desc_soccer')],
    ['name' => 'Netball',         'cat' => 'team',         'img' => 'sport-netball.jpg',    'desc' => t('sport_desc_netball')],
    ['name' => 'Hockey',          'cat' => 'team',         'img' => 'sport-hockey.jpg',     'desc' => t('sport_desc_hockey')],
    ['name' => 'Cricket',         'cat' => 'team',         'img' => 'sport-cricket.jpg',    'desc' => t('sport_desc_cricket')],
    ['name' => 'Basketball',      'cat' => 'team',         'img' => 'sport-basketball.jpg', 'desc' => t('sport_desc_basketball')],
    ['name' => 'Volleyball',      'cat' => 'team',         'img' => 'sport-volleyball.jpg', 'desc' => t('sport_desc_volleyball')],
    ['name' => 'Softball',        'cat' => 'team',         'img' => 'sport-softball.jpg',   'desc' => t('sport_desc_softball')],
    ['name' => 'Athletics',       'cat' => 'individual',   'img' => 'sport-athletics.jpg',  'desc' => t('sport_desc_athletics')],
    ['name' => 'Track and Field', 'cat' => 'individual',   'img' => 'sport-track.jpg',      'desc' => t('sport_desc_track')],
    ['name' => 'Tennis',          'cat' => 'individual',   'img' => 'sport-tennis.jpg',     'desc' => t('sport_desc_tennis')],
    ['name' => 'Table Tennis',    'cat' => 'individual',   'img' => 'sport-tt.jpg',         'desc' => t('sport_desc_table_tennis')],
    ['name' => 'Karate',          'cat' => 'individual',   'img' => 'sport-karate.jpg',     'desc' => t('sport_desc_karate')],
    ['name' => 'Body Building',   'cat' => 'individual',   'img' => 'sport-bodybuild.jpg',  'desc' => t('sport_desc_body_building')],
    ['name' => 'Chess',           'cat' => 'individual',   'img' => 'sport-chess.jpg',      'desc' => t('sport_desc_chess')],
    ['name' => 'Dance',           'cat' => 'recreational', 'img' => 'sport-dance.jpg',      'desc' => t('sport_desc_dance')],
    ['name' => 'Aerobics',        'cat' => 'recreational', 'img' => 'sport-aerobics.jpg',   'desc' => t('sport_desc_aerobics')],
];
?>

<section class="page-hero">
    <div class="container">
        <h1><?php echo t('sports_title'); ?></h1>
        <p><?php echo t('sports_intro'); ?></p>
    </div>
</section>

<section class="section">
    <div class="container">

        <label for="sportSearch" class="sr-only"><?php echo t('sports_search_label'); ?></label>
        <input
            type="search"
            id="sportSearch"
            class="search-input"
            placeholder="<?php echo t('search_placeholder'); ?>"
            aria-label="<?php echo t('sports_search_aria'); ?>">

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
                            alt="<?php echo htmlspecialchars($sport['name'] . ' ' . t('sports_alt_suffix'), ENT_QUOTES, 'UTF-8'); ?>"
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
            <h3><?php echo t('sports_empty_title'); ?></h3>
            <p><?php echo t('sports_empty_desc'); ?></p>
        </div>

    </div>
</section>

<dialog id="joinModal" class="join-modal" aria-labelledby="joinModalTitle">
    <div class="join-modal-inner">
        <button class="join-modal-close" aria-label="<?php echo t('sports_close_dialog'); ?>">
            <i class="fa-solid fa-xmark" aria-hidden="true"></i>
        </button>

        <span class="badge badge-open"><?php echo t('badge_open'); ?></span>
        <h2 id="joinModalTitle"><?php echo t('sports_join_prefix'); ?> <span id="joinSportName"><?php echo t('sports_this_sport'); ?></span></h2>

        <ol class="join-steps">
            <li><?php echo t('sports_join_step1'); ?> <a href="https://www.tiktok.com/@vut.sports" target="_blank" rel="noopener noreferrer">@vut.sports</a> <?php echo t('sports_join_step1b'); ?></li>
            <li><?php echo t('sports_join_step2'); ?></li>
            <li><?php echo t('sports_join_step3'); ?></li>
            <li><?php echo t('sports_join_step4'); ?></li>
        </ol>

        <p class="join-note">
            <?php echo t('sports_join_note'); ?>
        </p>

        <div class="join-actions">
            <a href="https://www.tiktok.com/@vut.sports" target="_blank" rel="noopener noreferrer" class="btn btn-outline">
                <i class="fa-brands fa-tiktok" aria-hidden="true"></i> <?php echo t('sports_view_tiktok'); ?>
            </a>
            <a href="contact.php" id="joinContactBtn" class="btn">
                <?php echo t('nav_contact'); ?>
            </a>
        </div>
    </div>
</dialog>

<?php include 'includes/footer.php'; ?>