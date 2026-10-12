# CampusPlay

A student sport discovery platform. Find your game. Find your people.

CampusPlay is a web application that helps students discover which sports are available on their campus, understand what each sport requires, and find out exactly how to join. It is currently operating at Vaal University of Technology as its pilot campus.

## Live Site

[Insert live URL here after deployment]

## Project Overview

This project was built for the Web Development 3.2 final assignment. The brief required a fully functional website using HTML, CSS, PHP, and JavaScript, with responsive design, bilingual support, and a documented style guide.

CampusPlay was chosen as the subject because it solves a real problem: many students do not know which of the seventeen VUT sport codes exist, which ones are open to beginners, or how to join. Information is fragmented across notice boards, word of mouth, and social media.

## Features

- **Sport discovery directory** with all seventeen VUT sport codes
- **Live search and category filtering** (Team, Individual, Recreational)
- **Join modal** that explains the actual joining pathway for each sport
- **Bilingual interface** in English and Sesotho, with session-persisted language state
- **Responsive layout** that works on mobile, tablet, and desktop
- **Progressive Web App** support with service worker, manifest, and offline fallback
- **Contact form** with both client-side and server-side validation
- **Printable joining checklist** with dedicated print styles
- **Dropdown navigation** with keyboard and touch accessibility

## Technology

- **HTML5** for semantic structure, including figure, figcaption, details, summary, video, time, and address elements
- **CSS3** for the design system, responsive layout, hover states, and print styles
- **PHP 8** for reusable includes, session-based language switching, and form handling
- **JavaScript** (vanilla, no frameworks) for navigation, filtering, modal, PWA install, and form validation

## Project Structure

campusplay/
├── index.php
├── about.php
├── sports.php
├── how-to-join.php
├── resources.php
├── checklist.php
├── contact.php
├── manifest.json
├── sw.js
├── offline.html
├── includes/
│ ├── header.php
│ ├── footer.php
│ └── lang.php
├── assets/
│ ├── css/style.css
│ ├── js/main.js
│ ├── icons/
│ ├── images/
│ └── video/
└── docs/

## Setup Instructions

1. Install XAMPP (or any Apache and PHP environment)
2. Place the `campusplay` folder inside the `htdocs` directory
3. Start Apache from the XAMPP control panel
4. Visit `http://localhost/campusplay/`

The site requires PHP 8.0 or higher. No database is required.

## Demonstration Data

The sport directory, facilities information, and bursary details are drawn from VUT public information and are presented as demonstration data for this project. The contact form is fully functional on the server side but does not send email in this prototype. The joining pathway described in the modal reflects the actual process used by VUT Sport.

## Licence

This project was created for academic purposes. The CampusPlay brand is an independent concept. No affiliation with or endorsement by Vaal University of Technology is implied.
