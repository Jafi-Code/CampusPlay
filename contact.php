<?php
require_once __DIR__ . '/includes/lang.php';
$pageTitle = t('nav_contact');

$sportOptions = [
    'Rugby', 'Soccer', 'Netball', 'Hockey', 'Cricket',
    'Basketball', 'Volleyball', 'Softball', 'Athletics',
    'Track and Field', 'Tennis', 'Table Tennis', 'Karate',
    'Body Building', 'Chess', 'Dance', 'Aerobics'
];
$sportOptions[] = 'Bursary Enquiry';

$prefillSport = isset($_GET['sport']) && is_string($_GET['sport'])
    ? trim($_GET['sport'])
    : '';
$formData = $_SESSION['contact_form_data'] ?? [];
unset($_SESSION['contact_form_data']);

if (!in_array($prefillSport, $sportOptions, true)) {
    $prefillSport = '';
}
$selectedSport = isset($formData['sport']) && in_array($formData['sport'], $sportOptions, true)
    ? $formData['sport']
    : $prefillSport;

if (empty($_SESSION['contact_csrf'])) {
    $_SESSION['contact_csrf'] = bin2hex(random_bytes(32));
}

$statusMessages = [
    'sent' => ['success', 'Thank you! Your enquiry has been sent.'],
    'invalid' => ['error', 'Please check the form fields and try again.'],
    'csrf' => ['error', 'This form session expired. Please try again.'],
    'failed' => ['error', 'We could not send your enquiry right now. Please try again or email hello@campusplay.co.za.'],
];
$status = is_string($_SESSION['contact_status'] ?? null) ? $_SESSION['contact_status'] : '';
unset($_SESSION['contact_status']);

include 'includes/header.php';
?>

<section class="section">
    <div class="container content-narrow">
        <div class="section-header">
            <h1>Contact CampusPlay at VUT</h1>
            <p>CampusPlay is currently live at Vaal University of Technology.</p>
        </div>

        <h2>VUT campus</h2>
        <address>
            <p>Vaal University of Technology, Private Bag X021, Vanderbijlpark, 1900</p>
            <p><a href="tel:+27169509917">+27 16 950 9917</a></p>
        </address>

        <h2>Send an enquiry</h2>
        <?php if (isset($statusMessages[$status])): ?>
            <?php [$alertType, $alertMessage] = $statusMessages[$status]; ?>
            <div class="alert alert-<?php echo $alertType; ?>" role="status" aria-live="polite">
                <?php echo htmlspecialchars($alertMessage, ENT_QUOTES, 'UTF-8'); ?>
            </div>
        <?php endif; ?>

        <div id="jsError" class="alert alert-error" role="alert" hidden></div>

        <form id="contactForm" action="forms/contact-handler.php" method="post">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['contact_csrf'], ENT_QUOTES, 'UTF-8'); ?>">

            <div class="form-group">
                <label for="name"><?php echo t('form_name'); ?></label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="<?php echo htmlspecialchars(is_string($formData['name'] ?? null) ? $formData['name'] : '', ENT_QUOTES, 'UTF-8'); ?>"
                    autocomplete="name"
                    required>
            </div>

            <div class="form-group">
                <label for="email"><?php echo t('form_email'); ?></label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="<?php echo htmlspecialchars(is_string($formData['email'] ?? null) ? $formData['email'] : '', ENT_QUOTES, 'UTF-8'); ?>"
                    autocomplete="email"
                    required>
            </div>

            <div class="form-group">
                <label for="sport"><?php echo t('form_sport'); ?></label>
                <select id="sport" name="sport" required>
                    <option value="">Select a sport</option>
                    <?php foreach (array_slice($sportOptions, 0, -1) as $option): ?>
                        <option value="<?php echo htmlspecialchars($option, ENT_QUOTES, 'UTF-8'); ?>"<?php echo $selectedSport === $option ? ' selected' : ''; ?>>
                            <?php echo htmlspecialchars($option, ENT_QUOTES, 'UTF-8'); ?>
                        </option>
                    <?php endforeach; ?>
                    <option value="Bursary Enquiry"<?php echo $selectedSport === 'Bursary Enquiry' ? ' selected' : ''; ?>>
                        Bursary Enquiry
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="message"><?php echo t('form_message'); ?></label>
                <textarea
                    id="message"
                    name="message"
                    rows="6"
                    required><?php echo htmlspecialchars(is_string($formData['message'] ?? null) ? $formData['message'] : '', ENT_QUOTES, 'UTF-8'); ?></textarea>
            </div>

            <button type="submit" class="btn"><?php echo t('form_send'); ?></button>
        </form>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
<?php
$pageTitle = 'Contact';
include 'includes/header.php';

/* --------------------------------------------------------------
   Form handling
   Validates on the server and returns clear success or error output.
   -------------------------------------------------------------- */
$errors  = [];
$success = false;
$values  = [
    'name'    => '',
    'email'   => '',
    'sport'   => '',
    'message' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $values['name']    = trim($_POST['name'] ?? '');
    $values['email']   = trim($_POST['email'] ?? '');
    $values['sport']   = trim($_POST['sport'] ?? '');
    $values['message'] = trim($_POST['message'] ?? '');

    if (mb_strlen($values['name']) < 2) {
        $errors[] = 'Please enter your full name.';
    }
    if (!filter_var($values['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }
    if ($values['sport'] === '') {
        $errors[] = 'Please select a sport.';
    }
    if (mb_strlen($values['message']) < 10) {
        $errors[] = 'Message must be at least 10 characters.';
    }

    if (empty($errors)) {
        $success = true;
        // In production, mail() or DB insert would run here.
        // For this project, the confirmation message is the deliverable.
        $values = ['name' => '', 'email' => '', 'sport' => '', 'message' => ''];
    }
}

/* Pre-fill sport from ?sport=Rugby query parameter */
$prefill = trim($_GET['sport'] ?? '');
if ($prefill && $values['sport'] === '') {
    $values['sport'] = $prefill;
}

$sportOptions = [
    'Rugby', 'Soccer', 'Netball', 'Hockey', 'Cricket',
    'Basketball', 'Volleyball', 'Softball', 'Athletics',
    'Track and Field', 'Tennis', 'Table Tennis', 'Karate',
    'Body Building', 'Chess', 'Dance', 'Aerobics',
    'Bursary Enquiry',
];
?>

<section class="page-hero">
    <div class="container">
        <h1>Contact CampusPlay</h1>
        <p>Questions about a sport, a club, or joining? We will route your enquiry to the right person.</p>
    </div>
</section>

<section class="section">
    <div class="container content-block">

        <div class="info-grid">
            <div class="info-card">
                <h3>Visit us</h3>
                <p>Sport Academy Office<br>Isak Steyl Stadium<br>Vaal University of Technology<br>Vanderbijlpark, 1900</p>
            </div>
            <div class="info-card">
                <h3>Office hours</h3>
                <p>Monday to Friday<br>08:00 to 16:30<br>Closed on public holidays</p>
            </div>
            <div class="info-card">
                <h3>Direct contact</h3>
                <p>Telephone: +27 16 950 9917<br>Email: hello@campusplay.co.za<br>TikTok: @vut.sports</p>
            </div>
        </div>

        <h2>Send us a message</h2>
        <p>Fill in the form below and we will respond within two working days.</p>

        <?php if ($success): ?>
            <div class="alert alert-success" role="status">
                Thank you, <?php echo htmlspecialchars($_POST['name'] ?? 'there'); ?>.
                Your enquiry has been received. We will be in touch shortly.
            </div>
        <?php endif; ?>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-error" role="alert">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo htmlspecialchars($error); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="alert alert-error" id="jsError" hidden></div>

        <form id="contactForm" method="post" action="contact.php" novalidate>
            <div class="form-group">
                <label for="name"><?php echo t('form_name'); ?> *</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="<?php echo htmlspecialchars($values['name']); ?>"
                    required
                    autocomplete="name">
            </div>

            <div class="form-group">
                <label for="email"><?php echo t('form_email'); ?> *</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="<?php echo htmlspecialchars($values['email']); ?>"
                    required
                    autocomplete="email">
            </div>

            <div class="form-group">
                <label for="sport"><?php echo t('form_sport'); ?> *</label>
                <select id="sport" name="sport" required>
                    <option value="">Select a sport</option>
                    <?php foreach ($sportOptions as $option): ?>
                        <option value="<?php echo htmlspecialchars($option); ?>"
                            <?php echo $values['sport'] === $option ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($option); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="message"><?php echo t('form_message'); ?> *</label>
                <textarea
                    id="message"
                    name="message"
                    rows="6"
                    required
                    minlength="10"><?php echo htmlspecialchars($values['message']); ?></textarea>
            </div>

            <button type="submit" class="btn btn-lg"><?php echo t('form_send'); ?></button>
        </form>

        <p class="form-note">
            We use your details only to respond to your enquiry. We do not share them with third parties.
        </p>

    </div>
</section>

<?php include 'includes/footer.php'; ?>