<?php
require 'includes/lang.php';
echo '<h1>' . t('hero_title') . '</h1>';
echo '<p>' . t('hero_sub') . '</p>';
echo '<a href="?lang=' . otherLang() . '">' . t('lang_switch') . '</a>';