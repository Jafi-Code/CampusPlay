<?php
require_once __DIR__ . '/includes/lang.php';

$pageTitle = t('page_home');
include 'includes/header.php';
?>

<!-- Hero -->
<section class="hero">
    <div class="container hero-grid">
        <div>
            <h1><?php echo t('hero_title'); ?></h1>
            <p><?php echo t('hero_sub'); ?></p>
            <div class="hero-actions">
                <a href="sports.php" class="btn btn-lg"><?php echo t('cta_explore'); ?></a>
                <a href="how-to-join.php" class="btn btn-outline btn-lg"><?php echo t('cta_join'); ?></a>
            </div>
            <button id="pwaInstall" class="pwa-install" hidden>
                <i class="fa-solid fa-download" aria-hidden="true"></i>
                <?php echo t('home_install'); ?>
            </button>
        </div>
        <div class="hero-media">
            <video
                autoplay
                muted
                loop
                playsinline
                poster="assets/images/hero-sports.jpg"
                aria-label="<?php echo t('home_video_alt'); ?>">
                <source src="assets/video/campusplay-highlight.mp4" type="video/mp4">
                <img src="assets/images/hero-sports.jpg" alt="<?php echo t('home_video_alt'); ?>">
            </video>
        </div>
    </div>
</section>

<!-- Featured sports -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <h2><?php echo t('home_featured'); ?></h2>
            <p><?php echo t('home_featured_sub'); ?></p>
        </div>

        <div class="card-grid">
            <article class="card">
                <figure class="card-img">
                    <img src="assets/images/sports/sport-rugby.jpg" alt="<?php echo t('home_rugby_alt'); ?>" loading="lazy">
                </figure>
                <div class="card-body">
                    <span class="badge badge-open"><?php echo t('badge_open'); ?></span>
                    <h3>Rugby</h3>
                    <p><?php echo t('home_rugby_desc'); ?></p>
                    <a href="sports.php" class="btn btn-ghost"><?php echo t('btn_view'); ?></a>
                </div>
            </article>

            <article class="card">
                <figure class="card-img">
                    <img src="assets/images/sports/sport-soccer.jpg" alt="<?php echo t('home_soccer_alt'); ?>" loading="lazy">
                </figure>
                <div class="card-body">
                    <span class="badge badge-open"><?php echo t('badge_open'); ?></span>
                    <h3>Soccer</h3>
                    <p><?php echo t('home_soccer_desc'); ?></p>
                    <a href="sports.php" class="btn btn-ghost"><?php echo t('btn_view'); ?></a>
                </div>
            </article>

            <article class="card">
                <figure class="card-img">
                    <img src="assets/images/sports/sport-netball.jpg" alt="<?php echo t('home_netball_alt'); ?>" loading="lazy">
                </figure>
                <div class="card-body">
                    <span class="badge badge-beginner"><?php echo t('badge_beginner'); ?></span>
                    <h3>Netball</h3>
                    <p><?php echo t('home_netball_desc'); ?></p>
                    <a href="sports.php" class="btn btn-ghost"><?php echo t('btn_view'); ?></a>
                </div>
            </article>
        </div>

        <div style="text-align:center; margin-top: var(--space-lg);">
            <a href="sports.php" class="btn"><?php echo t('cta_explore'); ?></a>
        </div>
    </div>
</section>

<!-- How it works -->
<section class="section section-alt">
    <div class="container">
        <div class="section-header">
            <h2><?php echo t('home_how'); ?></h2>
            <p><?php echo t('home_how_sub'); ?></p>
        </div>

        <div class="steps">
            <div class="step">
                <div class="step-num">01</div>
                <h3><?php echo t('home_discover'); ?></h3>
                <p><?php echo t('home_discover_desc'); ?></p>
            </div>
            <div class="step">
                <div class="step-num">02</div>
                <h3><?php echo t('home_understand'); ?></h3>
                <p><?php echo t('home_understand_desc'); ?></p>
            </div>
            <div class="step">
                <div class="step-num">03</div>
                <h3><?php echo t('home_connect'); ?></h3>
                <p><?php echo t('home_connect_desc'); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Training in action -->
<section class="section section-alt">
    <div class="container">
        <div class="section-header">
            <h2><?php echo t('home_training'); ?></h2>
            <p><?php echo t('home_training_sub'); ?></p>
        </div>

        <div class="vertical-video-grid">
            <article class="vertical-video">
                <div class="vertical-video-frame">
                    <video autoplay muted loop playsinline preload="metadata" poster="assets/images/sports/sport-rugby.jpg">
                        <source src="assets/video/vut-rugby.mp4" type="video/mp4">
                        <?php echo t('home_video_alt'); ?>
                    </video>
                </div>
                <h3><?php echo t('home_rugby_training'); ?></h3>
                <p><?php echo t('home_rugby_training_desc'); ?></p>
            </article>

            <article class="vertical-video">
                <div class="vertical-video-frame">
                    <video autoplay muted loop playsinline preload="metadata" poster="assets/images/sports/sport-soccer.jpg">
                        <source src="assets/video/vut-soccer.mp4" type="video/mp4">
                        Your browser does not support the video element.
                    </video>
                </div>
                <h3><?php echo t('home_soccer_training'); ?></h3>
                <p><?php echo t('home_soccer_training_desc'); ?></p>
            </article>

            <article class="vertical-video">
                <div class="vertical-video-frame">
                    <video autoplay muted loop playsinline preload="metadata" poster="assets/images/sports/sport-netball.jpg">
                        <source src="assets/video/vut-netball.mp4" type="video/mp4">
                        Your browser does not support the video element.
                    </video>
                </div>
                <h3><?php echo t('home_netball_training'); ?></h3>
                <p><?php echo t('home_netball_training_desc'); ?></p>
            </article>
        </div>

        <p class="video-attribution">
            <?php echo t('home_video_credit'); ?>
            <?php echo t('home_video_follow'); ?> <a href="https://www.tiktok.com/@vut.sports" target="_blank" rel="noopener noreferrer">@vut.sports</a> <?php echo t('home_video_more'); ?>
        </p>
    </div>
</section>

<!-- Final CTA -->
<section class="cta-band">
    <div class="container" style="text-align:center;">
        <h2><?php echo t('home_cta_title'); ?></h2>
        <p><?php echo t('home_cta_desc'); ?></p>
        <a href="contact.php" class="btn btn-lg"><?php echo t('cta_started'); ?></a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>