<?php
require_once __DIR__ . '/includes/lang.php';

$pageTitle = t('page_contact');
$sportOptions = [
    'Rugby', 'Soccer', 'Netball', 'Hockey', 'Cricket',
    'Basketball', 'Volleyball', 'Softball', 'Athletics',
    'Track and Field', 'Tennis', 'Table Tennis', 'Karate',
    'Body Building', 'Chess', 'Dance', 'Aerobics', 'Bursary Enquiry',
];
$values = [
    'name' => '',
    'email' => '',
    'sport' => '',
    'message' => '',
];
$errors = [];
$statusMessages = [
    'sent' => ['success', t('contact_sent')],
    'invalid' => ['error', t('contact_invalid')],
    'csrf' => ['error', t('contact_csrf')],
    'failed' => ['error', t('contact_failed')],
];
$status = '';

if (empty($_SESSION['contact_csrf'])) {
    $_SESSION['contact_csrf'] = bin2hex(random_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach (array_keys($values) as $field) {
        $values[$field] = is_string($_POST[$field] ?? null) ? trim($_POST[$field]) : '';
    }

    $csrfToken = is_string($_POST['csrf_token'] ?? null) ? $_POST['csrf_token'] : '';
    if (
        !is_string($_SESSION['contact_csrf'] ?? null)
        || $csrfToken === ''
        || !hash_equals($_SESSION['contact_csrf'], $csrfToken)
    ) {
        $status = 'csrf';
    } else {
        if (strlen($values['name']) < 2 || strlen($values['name']) > 200) {
            $errors[] = 'error_name';
        }
        if (strlen($values['email']) > 254 || filter_var($values['email'], FILTER_VALIDATE_EMAIL) === false) {
            $errors[] = 'error_email';
        }
        if (!in_array($values['sport'], $sportOptions, true)) {
            $errors[] = 'error_sport';
        }
        if (strlen($values['message']) < 10 || strlen($values['message']) > 10000) {
            $errors[] = 'error_message';
        }

        if (!$errors) {
            $subject = 'CampusPlay enquiry: ' . $values['sport'];
            $body = implode("\n", [
                'Name: ' . $values['name'],
                'Email: ' . $values['email'],
                'Sport: ' . $values['sport'],
                '',
                'Message:',
                str_replace(["\r\n", "\r"], "\n", $values['message']),
            ]);
            $headers = implode("\r\n", [
                'From: CampusPlay <hello@campusplay.co.za>',
                'Reply-To: ' . $values['email'],
                'Content-Type: text/plain; charset=UTF-8',
            ]);

            if (mail('hello@campusplay.co.za', $subject, $body, $headers)) {
                $status = 'sent';
                $_SESSION['contact_csrf'] = bin2hex(random_bytes(32));
                $values = array_fill_keys(array_keys($values), '');
            } else {
                error_log('CampusPlay contact email could not be sent.');
                $status = 'failed';
            }
        }
    }

    if ($errors) {
        $status = 'invalid';
    }
    if ($errors || $status === 'failed') {
        $_SESSION['contact_form_data'] = $values;
    }
    if ($errors) {
        $_SESSION['contact_errors'] = $errors;
    }
    $_SESSION['contact_status'] = $status;
    header('Location: ' . $_SERVER['SCRIPT_NAME']);
    exit;
}

if (is_array($_SESSION['contact_form_data'] ?? null)) {
    $values = array_merge($values, array_intersect_key($_SESSION['contact_form_data'], $values));
    unset($_SESSION['contact_form_data']);
}
if (is_array($_SESSION['contact_errors'] ?? null)) {
    $errors = array_values(array_filter($_SESSION['contact_errors'], 'is_string'));
    unset($_SESSION['contact_errors']);
}
$prefillSport = isset($_GET['sport']) && is_string($_GET['sport']) ? trim($_GET['sport']) : '';
if ($values['sport'] === '' && in_array($prefillSport, $sportOptions, true)) {
    $values['sport'] = $prefillSport;
}

if (is_string($_SESSION['contact_status'] ?? null)) {
    $status = $_SESSION['contact_status'];
    unset($_SESSION['contact_status']);
}

include 'includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1><?php echo t('contact_title'); ?></h1>
        <p><?php echo t('contact_intro'); ?></p>
    </div>
</section>

<section class="section">
    <div class="container content-block">
        <div class="info-grid">
            <div class="info-card">
                <h3><?php echo t('contact_visit'); ?></h3>
                <p><?php echo t('contact_office'); ?><br>Isak Steyl Stadium<br>Vaal University of Technology<br>Vanderbijlpark, 1900</p>
            </div>
            <div class="info-card">
                <h3><?php echo t('contact_hours'); ?></h3>
                <p><?php echo t('office_days'); ?><br>08:00 to 16:30<br><?php echo t('office_closed'); ?></p>
            </div>
            <div class="info-card">
                <h3><?php echo t('contact_direct'); ?></h3>
                <p><?php echo t('contact_phone'); ?> +27 16 950 9917<br><?php echo t('contact_email'); ?> hello@campusplay.co.za<br><?php echo t('contact_tiktok'); ?> @vut.sports</p>
            </div>
        </div>

        <h2><?php echo t('contact_send_title'); ?></h2>
        <p><?php echo t('contact_send_desc'); ?></p>

        <?php if (isset($statusMessages[$status])): ?>
            <?php [$alertType, $alertMessage] = $statusMessages[$status]; ?>
            <div class="alert alert-<?php echo $alertType; ?>" role="status" aria-live="polite">
                <?php echo htmlspecialchars($alertMessage, ENT_QUOTES, 'UTF-8'); ?>
            </div>
        <?php endif; ?>

        <?php if ($errors): ?>
            <div class="alert alert-error" role="alert">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo htmlspecialchars(t($error), ENT_QUOTES, 'UTF-8'); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ($errors): ?>
            <div class="alert alert-error" role="alert">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo htmlspecialchars(t($error), ENT_QUOTES, 'UTF-8'); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="alert alert-error" id="jsError" role="alert" hidden></div>

        <form id="contactForm" method="post" action="<?php echo htmlspecialchars($_SERVER['SCRIPT_NAME'], ENT_QUOTES, 'UTF-8'); ?>" data-error-name="<?php echo htmlspecialchars(t('error_name'), ENT_QUOTES, 'UTF-8'); ?>" data-error-email="<?php echo htmlspecialchars(t('error_email'), ENT_QUOTES, 'UTF-8'); ?>" data-error-sport="<?php echo htmlspecialchars(t('error_sport_short'), ENT_QUOTES, 'UTF-8'); ?>" data-error-message="<?php echo htmlspecialchars(t('error_message_short'), ENT_QUOTES, 'UTF-8'); ?>" novalidate>
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['contact_csrf'], ENT_QUOTES, 'UTF-8'); ?>">

            <div class="form-group">
                <label for="name"><?php echo t('form_name'); ?> *</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($values['name'], ENT_QUOTES, 'UTF-8'); ?>" required autocomplete="name">
            </div>

            <div class="form-group">
                <label for="email"><?php echo t('form_email'); ?> *</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($values['email'], ENT_QUOTES, 'UTF-8'); ?>" required autocomplete="email">
            </div>

            <div class="form-group">
                <label for="sport"><?php echo t('form_sport'); ?> *</label>
                <select id="sport" name="sport" required>
                    <option value=""><?php echo t('contact_select_sport'); ?></option>
                    <?php foreach ($sportOptions as $option): ?>
                        <?php $optionLabel = $option === 'Bursary Enquiry' ? t('contact_bursary') : $option; ?>
                        <option value="<?php echo htmlspecialchars($option, ENT_QUOTES, 'UTF-8'); ?>"<?php echo $values['sport'] === $option ? ' selected' : ''; ?>>
                            <?php echo htmlspecialchars($optionLabel, ENT_QUOTES, 'UTF-8'); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="message"><?php echo t('form_message'); ?> *</label>
                <textarea id="message" name="message" rows="6" required minlength="10"><?php echo htmlspecialchars($values['message'], ENT_QUOTES, 'UTF-8'); ?></textarea>
            </div>

            <button type="submit" class="btn btn-lg"><?php echo t('form_send'); ?></button>
        </form>

        <p class="form-note"><?php echo t('contact_privacy'); ?></p>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
