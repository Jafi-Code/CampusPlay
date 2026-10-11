</main>

<footer class="site-footer">
    <div class="container footer-grid">

        <div class="footer-brand">
            <a href="index.php" class="footer-logo">
                <img src="assets/images/campusplay-logo-icon.svg" alt="" width="36" height="36">
                <span>Campus<span class="logo-accent">Play</span></span>
            </a>
            <p class="footer-tagline"><?php echo t('site_tagline'); ?></p>
        </div>

        <div class="footer-col">
            <h3><?php echo t('nav_contact'); ?></h3>
            <address>
                <p><i class="fa-solid fa-location-dot" aria-hidden="true"></i> <?php echo t('footer_address'); ?></p>
                <p><i class="fa-solid fa-phone" aria-hidden="true"></i> <a href="tel:+27169509917"><?php echo t('footer_phone'); ?></a></p>
                <p><i class="fa-solid fa-envelope" aria-hidden="true"></i> <a href="mailto:hello@campusplay.co.za">hello@campusplay.co.za</a></p>
            </address>
            <p class="footer-note">
                CampusPlay is operating at VUT as a pilot campus. The platform is independent.
            </p>
        </div>

        <div class="footer-col">
            <h3><?php echo t('footer_follow'); ?></h3>
            <div class="social-links">
                <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
                <a href="https://twitter.com" target="_blank" rel="noopener noreferrer" aria-label="X (Twitter)"><i class="fa-brands fa-x-twitter" aria-hidden="true"></i></a>
                <a href="https://www.youtube.com" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
            </div>
        </div>

        <div class="footer-col">
            <h3>Resources</h3>
            <ul class="footer-links">
                <li><a href="https://www.vut.ac.za" target="_blank" rel="noopener noreferrer">VUT Official Site</a></li>
                <li><a href="https://www.tiktok.com/@vut.sports" target="_blank" rel="noopener noreferrer">VUT Sport on TikTok</a></li>
                <li><a href="https://www.ussa.net" target="_blank" rel="noopener noreferrer">USSA</a></li>
                <li><a href="https://www.safa.net" target="_blank" rel="noopener noreferrer">SAFA</a></li>
            </ul>
        </div>

    </div>

    <div class="footer-bottom">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> <?php echo t('site_name'); ?>. <?php echo t('footer_rights'); ?></p>
        </div>
    </div>
</footer>

<button id="backToTop" class="back-to-top" aria-label="Back to top">
    <i class="fa-solid fa-arrow-up" aria-hidden="true"></i>
</button>

<script src="assets/js/main.js" defer></script>
</body>

<script>
if ('serviceWorker' in navigator) {
    window.addEventListener('load', function () {
        navigator.serviceWorker.register('sw.js').catch(function (error) {
            console.warn('Service worker registration failed:', error);
        });
    });
}
</script>
</html>