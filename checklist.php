<?php
$pageTitle = 'Get Involved';
include 'includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1>Joining Checklist</h1>
        <p>Print this page or save it as a PDF before your first visit to the Sport Academy.</p>
    </div>
</section>

<section class="section">
    <div class="container content-block">

        <div class="checklist-actions no-print">
            <button type="button" onclick="window.print()" class="btn">
                <i class="fa-solid fa-print" aria-hidden="true"></i> Print this checklist
            </button>
            <a href="sports.php" class="btn btn-outline">Back to Sports</a>
        </div>

        <div class="checklist" id="printable">

            <header class="checklist-header">
                <img src="assets/images/campusplay-logo-icon.svg" alt="" width="48" height="48">
                <div>
                    <h2>CampusPlay — Joining Checklist</h2>
                    <p>Vaal University of Technology</p>
                </div>
            </header>

            <section class="checklist-block">
                <h3>Before you go</h3>
                <ul class="check-list">
                    <li><span class="check-box"></span> Decide which sport interests you (see the <a href="sports.php">Sport Codes</a> page).</li>
                    <li><span class="check-box"></span> Check training times on <a href="https://www.tiktok.com/@vut.sports" target="_blank" rel="noopener noreferrer">@vut.sports on TikTok</a>.</li>
                    <li><span class="check-box"></span> Note the Sport Academy office hours: Monday to Friday, 08:00 to 16:30.</li>
                    <li><span class="check-box"></span> Plan a visit that does not clash with your lectures.</li>
                </ul>
            </section>

            <section class="checklist-block">
                <h3>What to bring</h3>
                <ul class="check-list">
                    <li><span class="check-box"></span> Student card or proof of registration.</li>
                    <li><span class="check-box"></span> ID document (for non-students).</li>
                    <li><span class="check-box"></span> A pen to complete registration forms.</li>
                    <li><span class="check-box"></span> Contact details (phone number and email).</li>
                    <li><span class="check-box"></span> Water bottle if you plan to attend a session on the same day.</li>
                </ul>
            </section>

            <section class="checklist-block">
                <h3>Questions to ask at the office</h3>
                <ul class="check-list">
                    <li><span class="check-box"></span> Who is the coach or team manager for this sport?</li>
                    <li><span class="check-box"></span> What are the weekly training times?</li>
                    <li><span class="check-box"></span> Are there any joining fees or equipment costs?</li>
                    <li><span class="check-box"></span> Is there a beginner or trial session I can attend first?</li>
                    <li><span class="check-box"></span> How do I get added to the sport's WhatsApp group?</li>
                </ul>
            </section>

            <section class="checklist-block">
                <h3>After registering</h3>
                <ul class="check-list">
                    <li><span class="check-box"></span> Save the coach or manager's contact details.</li>
                    <li><span class="check-box"></span> Join the club's WhatsApp group for training and fixtures.</li>
                    <li><span class="check-box"></span> Attend your first session and introduce yourself.</li>
                    <li><span class="check-box"></span> Follow <a href="https://www.tiktok.com/@vut.sports" target="_blank" rel="noopener noreferrer">@vut.sports</a> for match updates.</li>
                </ul>
            </section>

            <section class="checklist-block">
                <h3>Contact details</h3>
                <address>
                    <p><strong>Sport Academy Office</strong></p>
                    <p>Isak Steyl Stadium, Vaal University of Technology</p>
                    <p>Private Bag X021, Vanderbijlpark, 1900</p>
                    <p>Telephone: +27 16 950 9917</p>
                    <p>Email: hello@campusplay.co.za</p>
                </address>
            </section>

            <footer class="checklist-footer">
                <p>CampusPlay is operating at VUT as a pilot campus. The platform is independent.</p>
                <p>Generated from campusplay.co.za</p>
            </footer>

        </div>

    </div>
</section>

<?php include 'includes/footer.php'; ?>