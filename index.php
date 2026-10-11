<?php
$pageTitle = 'Home';
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
                Install CampusPlay
            </button>
        </div>
        <div class="hero-media">
            <video
                autoplay
                muted
                loop
                playsinline
                poster="assets/images/hero-sports.jpg"
                aria-label="Students playing sport on campus">
                <source src="assets/video/campusplay-highlight.mp4" type="video/mp4">
                <img src="assets/images/hero-sports.jpg" alt="Students playing sport on campus">
            </video>
        </div>
    </div>
</section>

<!-- Featured sports -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <h2>Featured Sports</h2>
            <p>A sample of what is waiting for you on campus. Seventeen sport codes in total.</p>
        </div>

        <div class="card-grid">
            <article class="card">
                <figure class="card-img">
                    <img src="assets/images/sports/sport-rugby.jpg" alt="Rugby players in a scrum" loading="lazy">
                </figure>
                <div class="card-body">
                    <span class="badge badge-open"><?php echo t('badge_open'); ?></span>
                    <h3>Rugby</h3>
                    <p>Men's and women's teams competing at USSA level, with dedicated training facilities on campus.</p>
                    <a href="sports.php" class="btn btn-ghost"><?php echo t('btn_view'); ?></a>
                </div>
            </article>

            <article class="card">
                <figure class="card-img">
                    <img src="assets/images/sports/sport-soccer.jpg" alt="Soccer player in action" loading="lazy">
                </figure>
                <div class="card-body">
                    <span class="badge badge-open"><?php echo t('badge_open'); ?></span>
                    <h3>Soccer</h3>
                    <p>Competitive and recreational teams. Three floodlit fields available for evening practice.</p>
                    <a href="sports.php" class="btn btn-ghost"><?php echo t('btn_view'); ?></a>
                </div>
            </article>

            <article class="card">
                <figure class="card-img">
                    <img src="assets/images/sports/sport-netball.jpg" alt="Netball player passing the ball" loading="lazy">
                </figure>
                <div class="card-body">
                    <span class="badge badge-beginner"><?php echo t('badge_beginner'); ?></span>
                    <h3>Netball</h3>
                    <p>One of our fastest growing sports. Open to beginners and experienced players alike.</p>
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
            <h2>How It Works</h2>
            <p>From curiosity to your first session in three steps.</p>
        </div>

        <div class="steps">
            <div class="step">
                <div class="step-num">01</div>
                <h3>Discover</h3>
                <p>Browse the sport codes on offer and find one that fits your interest, schedule and experience level.</p>
            </div>
            <div class="step">
                <div class="step-num">02</div>
                <h3>Understand</h3>
                <p>Read what each sport requires: training times, equipment, fees and what happens at a first session.</p>
            </div>
            <div class="step">
                <div class="step-num">03</div>
                <h3>Connect</h3>
                <p>Use the contact form to reach the right club. You will hear back within two working days.</p>
            </div>
        </div>
    </div>
</section>

<!-- Video -->
<section class="section">
    <div class="container content-narrow" style="text-align:center;">
        <div class="section-header">
            <h2>Life on Campus</h2>
            <p>A short look at what training and match days feel like at CampusPlay.</p>
        </div>

        <video
            class="feature-video"
            controls
            playsinline
            preload="metadata"
            poster="assets/images/hero-sports.jpg">
            <source src="assets/video/campusplay-highlight.mp4" type="video/mp4">
            Your browser does not support the video element.
            <a href="assets/video/campusplay-highlight.mp4">Download the video</a>.
        </video>
    </div>
</section>

<!-- Final CTA -->
<section class="cta-band">
    <div class="container" style="text-align:center;">
        <h2>Ready to find your game?</h2>
        <p>Seventeen sport codes. One form. Start training this semester.</p>
        <a href="contact.php" class="btn btn-lg">Get Started</a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>