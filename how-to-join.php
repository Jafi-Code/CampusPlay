<?php
require_once __DIR__ . '/includes/lang.php';

$pageTitle = t('page_join');
include 'includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1><?php echo t('join_title'); ?></h1>
        <p><?php echo t('join_intro'); ?></p>
    </div>
</section>

<section class="section">
    <div class="container content-block">

        <h2><?php echo t('join_pathway'); ?></h2>
        <p>
            <?php echo t('join_pathway_desc'); ?>
        </p>

        <div class="info-grid">
            <div class="info-card">
                <div class="step-num">01</div>
                <h3><?php echo t('join_check_times'); ?></h3>
                <p><?php echo t('join_check_times_desc'); ?> <a href="https://www.tiktok.com/@vut.sports" target="_blank" rel="noopener noreferrer">@vut.sports</a> <?php echo t('join_schedule'); ?></p>
            </div>
            <div class="info-card">
                <div class="step-num">02</div>
                <h3><?php echo t('join_visit'); ?></h3>
                <p><?php echo t('join_visit_desc'); ?></p>
            </div>
            <div class="info-card">
                <div class="step-num">03</div>
                <h3><?php echo t('join_register'); ?></h3>
                <p><?php echo t('join_register_desc'); ?></p>
            </div>
        </div>

        <h2><?php echo t('join_bring_title'); ?></h2>
        <ul>
            <li><?php echo t('join_bring_1'); ?></li>
            <li><?php echo t('join_bring_2'); ?></li>
            <li><?php echo t('join_bring_3'); ?></li>
            <li><?php echo t('join_bring_4'); ?></li>
        </ul>
        <p>
            <?php echo t('join_bring_note'); ?>
        </p>

        <h2><?php echo t('join_faq'); ?></h2>

        <details class="accordion">
            <summary><?php echo t('join_faq_exp_q'); ?></summary>
            <p><?php echo t('join_faq_exp_a'); ?></p>
        </details>

        <details class="accordion">
            <summary><?php echo t('join_faq_fee_q'); ?></summary>
            <p><?php echo t('join_faq_fee_a'); ?></p>
        </details>

        <details class="accordion">
            <summary><?php echo t('join_faq_student_q'); ?></summary>
            <p><?php echo t('join_faq_student_a'); ?></p>
        </details>

        <details class="accordion">
            <summary><?php echo t('join_faq_time_q'); ?></summary>
            <p><?php echo t('join_faq_time_a'); ?></p>
        </details>

        <details class="accordion">
            <summary><?php echo t('join_faq_choose_q'); ?></summary>
            <p><?php echo t('join_faq_choose_a'); ?> <a href="sports.php"><?php echo t('join_sports_link'); ?></a>. <?php echo t('join_faq_choose_b'); ?></p>
        </details>

        <details class="accordion">
            <summary><?php echo t('join_faq_contact_q'); ?></summary>
            <p><?php echo t('join_faq_contact_a'); ?> <a href="contact.php"><?php echo t('join_contact_link'); ?></a> <?php echo t('join_faq_contact_b'); ?></p>
        </details>

        <h2><?php echo t('join_unsure'); ?></h2>
        <p>
            <?php echo t('join_unsure_desc'); ?>
        </p>

        <div class="info-grid">
            <div class="info-card">
                <h3><?php echo t('join_need_checklist'); ?></h3>
                <p><?php echo t('join_checklist_desc'); ?></p>
                <a href="checklist.php" class="btn btn-ghost"><?php echo t('join_view_checklist'); ?></a>
            </div>
            <div class="info-card">
                <h3><?php echo t('join_have_question'); ?></h3>
                <p><?php echo t('join_question_desc'); ?></p>
                <a href="contact.php" class="btn btn-ghost"><?php echo t('cta_contact_us'); ?></a>
            </div>
        </div>

    </div>
</section>

<?php include 'includes/footer.php'; ?>