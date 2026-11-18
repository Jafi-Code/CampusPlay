<?php
require_once __DIR__ . '/lang.php';

$pageTitle = $pageTitle ?? t('nav_home');
?>
<!DOCTYPE html>
<html lang="<?php echo $currentLang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo htmlspecialchars(t('meta_description'), ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="theme-color" content="#17243B">
    <title><?php echo htmlspecialchars($pageTitle); ?> | <?php echo t('site_name'); ?></title>

    <link rel="icon" href="assets/icons/favicon.ico" sizes="any">
    <link rel="icon" type="image/svg+xml" href="assets/icons/favicon.svg">
    <link rel="apple-touch-icon" href="assets/icons/apple-touch-icon.png">
    <link rel="manifest" href="manifest.json">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<a class="skip-link" href="#main"><?php echo t('skip_content'); ?></a>
<div class="pilot-bar">
    <?php echo t('pilot_notice'); ?>
</div>
<header class="site-header">
    <div class="container header-inner">

        <a href="index.php" class="logo-link" aria-label="<?php echo t('aria_home'); ?>">
            <img src="assets/images/campusplay-logo-icon.svg" alt="" class="logo-icon" width="40" height="40">
            <span class="logo-text">Campus<span class="logo-accent">Play</span></span>
        </a>

        <button class="nav-toggle" id="navToggle" aria-label="<?php echo t('aria_toggle_nav'); ?>" aria-expanded="false" aria-controls="mainNav">
            <i class="fa-solid fa-bars" aria-hidden="true"></i>
        </button>

        <nav class="main-nav" id="mainNav" aria-label="<?php echo t('aria_main_nav'); ?>">
            <ul>
                <li><a href="index.php"<?php echo $pageTitle === t('nav_home') ? ' class="active"' : ''; ?>><?php echo t('nav_home'); ?></a></li>
                <li><a href="about.php"<?php echo $pageTitle === t('nav_about') ? ' class="active"' : ''; ?>><?php echo t('nav_about'); ?></a></li>
                <li><a href="sports.php"<?php echo $pageTitle === t('nav_sports') ? ' class="active"' : ''; ?>><?php echo t('nav_sports'); ?></a></li>

                <li class="has-dropdown">
                    <a href="how-to-join.php"<?php echo $pageTitle === t('nav_involved') ? ' class="active"' : ''; ?>>
                        <?php echo t('nav_involved'); ?> <i class="fa-solid fa-chevron-down" aria-hidden="true"></i>
                    </a>
                    <ul class="dropdown">
                        <li><a href="how-to-join.php"><?php echo t('cta_join'); ?></a></li>
                        <li><a href="resources.php"><?php echo t('nav_resources'); ?></a></li>
                        <li><a href="checklist.php"><?php echo t('nav_checklist'); ?></a></li>
                    </ul>
                </li>

                <li><a href="contact.php"<?php echo $pageTitle === t('nav_contact') ? ' class="active"' : ''; ?>><?php echo t('nav_contact'); ?></a></li>

                <li class="lang-switch">
                    <a href="?lang=<?php echo otherLang(); ?>" aria-label="<?php echo t('aria_switch_lang'); ?> <?php echo t('lang_label'); ?>">
                        <i class="fa-solid fa-globe" aria-hidden="true"></i> <?php echo t('lang_switch'); ?>
                    </a>
                </li>
            </ul>
        </nav>

    </div>
</header>

<main id="main">