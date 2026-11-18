<?php
require_once __DIR__ . '/includes/lang.php';

$pageTitle = t('page_join');
include 'includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1><?php echo t('checklist_title'); ?></h1>
        <p><?php echo t('checklist_intro'); ?></p>
    </div>
</section>

<section class="section">
    <div class="container content-block">

        <div class="checklist-actions no-print">
            <button type="button" onclick="window.print()" class="btn">
                <i class="fa-solid fa-print" aria-hidden="true"></i> <?php echo t('checklist_print'); ?>
            </button>
            <a href="sports.php" class="btn btn-outline"><?php echo t('checklist_back'); ?></a>
        </div>

        <div class="checklist" id="printable">

            <header class="checklist-header">
                <img src="assets/images/campusplay-logo-icon.svg" alt="" width="48" height="48">
                <div>
                    <h2><?php echo t('checklist_heading'); ?></h2>
                    <p>Vaal University of Technology</p>
                </div>
            </header>

            <section class="checklist-block">
                <h3><?php echo t('checklist_before'); ?></h3>
                <ul class="check-list">
                    <li><span class="check-box"></span> <?php echo t('checklist_before_1'); ?> <a href="sports.php"><?php echo t('checklist_sports_link'); ?></a> <?php echo t('checklist_before_2'); ?></li>
                    <li><span class="check-box"></span> <?php echo t('checklist_before_3'); ?> <a href="https://www.tiktok.com/@vut.sports" target="_blank" rel="noopener noreferrer">@vut.sports</a>.</li>
                    <li><span class="check-box"></span> <?php echo t('checklist_before_4'); ?></li>
                    <li><span class="check-box"></span> <?php echo t('checklist_before_5'); ?></li>
                </ul>
            </section>

            <section class="checklist-block">
                <h3><?php echo t('checklist_bring'); ?></h3>
                <ul class="check-list">
                    <li><span class="check-box"></span> <?php echo t('checklist_bring_1'); ?></li>
                    <li><span class="check-box"></span> <?php echo t('checklist_bring_2'); ?></li>
                    <li><span class="check-box"></span> <?php echo t('checklist_bring_3'); ?></li>
                    <li><span class="check-box"></span> <?php echo t('checklist_bring_4'); ?></li>
                    <li><span class="check-box"></span> <?php echo t('checklist_bring_5'); ?></li>
                </ul>
            </section>

            <section class="checklist-block">
                <h3><?php echo t('checklist_ask'); ?></h3>
                <ul class="check-list">
                    <li><span class="check-box"></span> <?php echo t('checklist_ask_1'); ?></li>
                    <li><span class="check-box"></span> <?php echo t('checklist_ask_2'); ?></li>
                    <li><span class="check-box"></span> <?php echo t('checklist_ask_3'); ?></li>
                    <li><span class="check-box"></span> <?php echo t('checklist_ask_4'); ?></li>
                    <li><span class="check-box"></span> <?php echo t('checklist_ask_5'); ?></li>
                </ul>
            </section>

            <section class="checklist-block">
                <h3><?php echo t('checklist_after'); ?></h3>
                <ul class="check-list">
                    <li><span class="check-box"></span> <?php echo t('checklist_after_1'); ?></li>
                    <li><span class="check-box"></span> <?php echo t('checklist_after_2'); ?></li>
                    <li><span class="check-box"></span> <?php echo t('checklist_after_3'); ?></li>
                    <li><span class="check-box"></span> <?php echo t('checklist_after_4'); ?> <a href="https://www.tiktok.com/@vut.sports" target="_blank" rel="noopener noreferrer">@vut.sports</a> <?php echo t('checklist_match_updates'); ?></li>
                </ul>
            </section>

            <section class="checklist-block">
                <h3><?php echo t('checklist_contact'); ?></h3>
                <address>
                    <p><strong><?php echo t('sport_office'); ?></strong></p>
                    <p>Isak Steyl Stadium, Vaal University of Technology</p>
                    <p>Private Bag X021, Vanderbijlpark, 1900</p>
                    <p><?php echo t('contact_phone'); ?> +27 16 950 9917</p>
                    <p><?php echo t('contact_email'); ?> hello@campusplay.co.za</p>
                </address>
            </section>

            <footer class="checklist-footer">
                <p><?php echo t('footer_note'); ?></p>
                <p><?php echo t('checklist_footer'); ?></p>
            </footer>

        </div>

    </div>
</section>

<?php include 'includes/footer.php'; ?>