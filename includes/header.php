<?php
require_once __DIR__ . '/lang.php';

$pageTitle = $pageTitle ?? t('nav_home');
?>
<!DOCTYPE html>
<html lang="<?php echo $currentLang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CampusPlay — discover campus sports and learn how to join.">
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

<a class="skip-link" href="#main">Skip to content</a>
<div class="pilot-bar">
    CampusPlay is currently live at <strong>Vaal University of Technology</strong>. More campuses coming soon.
</div>
<header class="site-header">
    <div class="container header-inner">

        <a href="index.php" class="logo-link" aria-label="CampusPlay home">
            <img src="assets/images/campusplay-logo-icon.svg" alt="" class="logo-icon" width="40" height="40">
            <span class="logo-text">Campus<span class="logo-accent">Play</span></span>
        </a>

        <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation" aria-expanded="false" aria-controls="mainNav">
            <i class="fa-solid fa-bars" aria-hidden="true"></i>
        </button>

        <nav class="main-nav" id="mainNav" aria-label="Main navigation">
            <ul>
                <li><a href="index.php"<?php echo $pageTitle === t('nav_home') ? ' class="active"' : ''; ?>><?php echo t('nav_home'); ?></a></li>
                <li><a href="about.php"<?php echo $pageTitle === t('nav_about') ? ' class="active"' : ''; ?>><?php echo t('nav_about'); ?></a></li>

                <li class="has-dropdown">
                    <a href="sports.php"<?php echo $pageTitle === t('nav_sports') ? ' class="active"' : ''; ?>>
                        <?php echo t('nav_sports'); ?> <i class="fa-solid fa-chevron-down" aria-hidden="true"></i>
                    </a>
                    <ul class="dropdown">
                        <li><a href="sports.php"><?php echo t('filter_all'); ?></a></li>
                        <li><a href="sports.php?filter=team"><?php echo t('filter_team'); ?></a></li>
                        <li><a href="sports.php?filter=individual"><?php echo t('filter_individual'); ?></a></li>
                        <li><a href="sports.php?filter=recreational"><?php echo t('filter_recreational'); ?></a></li>
                    </ul>
                </li>

                <li class="has-dropdown">
                    <a href="how-to-join.php"<?php echo $pageTitle === t('nav_involved') ? ' class="active"' : ''; ?>>
                        <?php echo t('nav_involved'); ?> <i class="fa-solid fa-chevron-down" aria-hidden="true"></i>
                    </a>
                    <ul class="dropdown">
                        <li><a href="how-to-join.php"><?php echo t('cta_join'); ?></a></li>
                        <li><a href="resources.php">Resources</a></li>
                        <li><a href="checklist.php">Checklist</a></li>
                    </ul>
                </li>

                <li><a href="contact.php"<?php echo $pageTitle === t('nav_contact') ? ' class="active"' : ''; ?>><?php echo t('nav_contact'); ?></a></li>

                <li class="lang-switch">
                    <a href="?lang=<?php echo otherLang(); ?>" aria-label="Switch to <?php echo t('lang_label'); ?>">
                        <i class="fa-solid fa-globe" aria-hidden="true"></i> <?php echo t('lang_switch'); ?>
                    </a>
                </li>
            </ul>
        </nav>

    </div>
</header>

<main id="main">