<?php
require_once __DIR__ . '/includes/lang.php';

$pageTitle = t('page_about');
include 'includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1><?php echo t('about_title'); ?></h1>
        <p><?php echo t('about_subtitle'); ?></p>
    </div>
</section>

<section class="section">
    <div class="container content-block">

        <h2><?php echo t('about_problem'); ?></h2>
        <p>
            <?php echo t('about_problem_p1'); ?>
        </p>
        <p>
            <?php echo t('about_problem_p2'); ?>
        </p>

        <h2><?php echo t('about_what'); ?></h2>
        <p>
            <?php echo t('about_what_intro'); ?>
        </p>
        <ul>
            <li><?php echo t('about_what_1'); ?></li>
            <li><?php echo t('about_what_2'); ?></li>
            <li><?php echo t('about_what_3'); ?></li>
            <li><?php echo t('about_what_4'); ?></li>
        </ul>

        <h2><?php echo t('about_why'); ?></h2>
        <p>
            <?php echo t('about_why_p1'); ?>
        </p>
        <p>
            <?php echo t('about_why_p2'); ?>
        </p>

        <h2><?php echo t('about_how'); ?></h2>
        <p>
            <?php echo t('about_how_intro'); ?>
        </p>
        <ol>
            <li><strong><?php echo t('home_discover'); ?>.</strong> <?php echo t('about_step_discover'); ?></li>
            <li><strong><?php echo t('home_understand'); ?>.</strong> <?php echo t('about_step_understand'); ?></li>
            <li><strong><?php echo t('home_connect'); ?>.</strong> <?php echo t('about_step_connect'); ?></li>
        </ol>

        <h2><?php echo t('about_approach'); ?></h2>
        <p>
            <?php echo t('about_approach_p1'); ?>
        </p>
        <p>
            <?php echo t('about_approach_p2'); ?>
        </p>

    </div>
</section>

<section class="section section-alt">
    <div class="container content-block">
        <h2><?php echo t('about_questions'); ?></h2>
        <p>
            <?php echo t('about_questions_desc'); ?>
        </p>
        <a href="contact.php" class="btn"><?php echo t('cta_contact_us'); ?></a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>