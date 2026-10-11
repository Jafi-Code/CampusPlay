<?php
/**
 * CampusPlay — Language System
 * English (en) + Sesotho (st)
 * Session-persisted, switches via ?lang= query parameter.
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Toggle language
if (isset($_GET['lang'])) {
    $requested = $_GET['lang'] === 'st' ? 'st' : 'en';
    $_SESSION['lang'] = $requested;
}

$currentLang = $_SESSION['lang'] ?? 'en';

$translations = [
    'en' => [
        'site_name'         => 'CampusPlay',
        'site_tagline'      => 'Find your game. Find your people.',
        'nav_home'          => 'Home',
        'nav_about'         => 'About',
        'nav_sports'        => 'Sports',
        'nav_involved'      => 'Get Involved',
        'nav_contact'       => 'Contact',
        'hero_title'        => 'Find Your Game. Find Your People.',
        'hero_sub'          => 'Discover the 17 sport codes available at Vaal University of Technology, and find out exactly how to join.',
        'cta_explore'       => 'Explore Sports',
        'cta_join'          => 'How to Join',
        'search_placeholder'=> 'Search sports…',
        'filter_all'        => 'All Sports',
        'filter_team'       => 'Team',
        'filter_individual' => 'Individual',
        'filter_recreational'=> 'Recreational',
        'btn_view'          => 'View Details',
        'btn_join_sport'    => 'Join This Sport',
        'badge_open'        => 'Open for Registration',
        'badge_beginner'    => 'Beginner-Friendly',
        'form_name'         => 'Full Name',
        'form_email'        => 'Email Address',
        'form_sport'        => 'Sport of Interest',
        'form_message'      => 'Message',
        'form_send'         => 'Send Enquiry',
        'form_success'      => 'Thank you! Your enquiry has been received.',
        'footer_address'    => 'Vaal University of Technology, Private Bag X021, Vanderbijlpark, 1900',
        'footer_phone'      => '+27 16 950 9917',
        'footer_follow'     => 'Follow Us',
        'footer_rights'     => 'All Rights Reserved.',
        'lang_switch'       => 'ST',
        'lang_label'        => 'Sesotho',
    ],
    'st' => [
        'site_name'         => 'CampusPlay',
        'site_tagline'      => 'Fumana Papadi ea Hau. Fumana Batho ba Hau.',
        'nav_home'          => 'Lehae',
        'nav_about'         => 'Mabapi le Rona',
        'nav_sports'        => 'Dipapadi',
        'nav_involved'      => 'Kenella',
        'nav_contact'       => 'Ikopanye le Rona',
        'hero_title'        => 'Fumana Papadi ea Hau. Fumana Batho ba Hau.',
        'hero_sub'          => "Fumana dipapadi tse 17 tse fumanehang Vaal University of Technology. U tsebe hore na u ka kenella joang.",
        'cta_explore'       => 'Hlahloba Dipapadi',
        'cta_join'          => 'Mokhoa oa ho Kenella',
        'search_placeholder'=> 'Batla dipapadi…',
        'filter_all'        => 'Dipapadi Tsohle',
        'filter_team'       => 'Sehlopha',
        'filter_individual' => 'Motho ka Mong',
        'filter_recreational'=> 'Boithabiso',
        'btn_view'          => 'Sheba Dintlha',
        'btn_join_sport'    => 'Kenella Papading Ena',
        'badge_open'        => 'Ngoliso e Butsoe',
        'badge_beginner'    => 'E Loketse Ba Qalang',
        'form_name'         => 'Lebitso le Feletseng',
        'form_email'        => 'Aterese ea Imeile',
        'form_sport'        => 'Papadi eo u e Ratang',
        'form_message'      => 'Molaetsa',
        'form_send'         => 'Romela Potso',
        'form_success'      => 'Kea leboha! Potso ea hau e amohetsoe.',
        'footer_address'    => 'Vaal University of Technology, Private Bag X021, Vanderbijlpark, 1900',
        'footer_phone'      => '+27 16 950 9917',
        'footer_follow'     => 'Latela Rona',
        'footer_rights'     => 'Ditokelo Tsohle di Sireleditswe.',
        'lang_switch'       => 'EN',
        'lang_label'        => 'English',
    ],
];

/**
 * Translate a key into the current language.
 * Falls back to the English string if the key is missing.
 */
function t(string $key): string
{
    global $translations, $currentLang;

    if (isset($translations[$currentLang][$key])) {
        return $translations[$currentLang][$key];
    }

    return $translations['en'][$key] ?? $key;
}

/**
 * Returns the code of the other language — used by the toggle button.
 */
function otherLang(): string
{
    global $currentLang;
    return $currentLang === 'en' ? 'st' : 'en';
}