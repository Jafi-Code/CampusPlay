<?php
require_once __DIR__ . '/includes/lang.php';

$pageTitle = t('page_join');
include 'includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1><?php echo t('resources_title'); ?></h1>
        <p><?php echo t('resources_intro'); ?></p>
    </div>
</section>

<section class="section">
    <div class="container content-block">

        <h2><?php echo t('resources_beginner'); ?></h2>
        <p>
            <?php echo t('resources_beginner_intro'); ?>
        </p>

        <div class="info-grid">
            <div class="info-card">
                <h3><?php echo t('resource_pick'); ?></h3>
                <p><?php echo t('resource_pick_desc'); ?></p>
            </div>
            <div class="info-card">
                <h3><?php echo t('resource_prepare'); ?></h3>
                <p><?php echo t('resource_prepare_desc'); ?></p>
            </div>
            <div class="info-card">
                <h3><?php echo t('resource_questions'); ?></h3>
                <p><?php echo t('resource_questions_desc'); ?></p>
            </div>
            <div class="info-card">
                <h3><?php echo t('resource_balance'); ?></h3>
                <p><?php echo t('resource_balance_desc'); ?></p>
            </div>
        </div>

        <h2><?php echo t('resources_external'); ?></h2>
        <p>
            <?php echo t('resources_external_intro'); ?>
        </p>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th><?php echo t('resources_org'); ?></th>
                        <th><?php echo t('resources_what'); ?></th>
                        <th><?php echo t('resources_website'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo t('footer_vut'); ?></td>
                        <td><?php echo t('resource_vut_desc'); ?></td>
                        <td><a href="https://www.vut.ac.za" target="_blank" rel="noopener noreferrer">vut.ac.za</a></td>
                    </tr>
                    <tr>
                        <td><?php echo t('footer_vut_sport'); ?></td>
                        <td><?php echo t('resource_tiktok_desc'); ?></td>
                        <td><a href="https://www.tiktok.com/@vut.sports" target="_blank" rel="noopener noreferrer">@vut.sports</a></td>
                    </tr>
                    <tr>
                        <td>USSA</td>
                        <td><?php echo t('resource_ussa_desc'); ?></td>
                        <td><a href="https://www.ussa.net" target="_blank" rel="noopener noreferrer">ussa.net</a></td>
                    </tr>
                    <tr>
                        <td>SAFA</td>
                        <td><?php echo t('resource_safa_desc'); ?></td>
                        <td><a href="https://www.safa.net" target="_blank" rel="noopener noreferrer">safa.net</a></td>
                    </tr>
                    <tr>
                        <td>Netball South Africa</td>
                        <td><?php echo t('resource_netball_desc'); ?></td>
                        <td><a href="https://netball-sa.co.za" target="_blank" rel="noopener noreferrer">netball-sa.co.za</a></td>
                    </tr>
                    <tr>
                        <td>Athletics South Africa</td>
                        <td><?php echo t('resource_athletics_desc'); ?></td>
                        <td><a href="https://www.athletics.org.za" target="_blank" rel="noopener noreferrer">athletics.org.za</a></td>
                    </tr>
                    <tr>
                        <td>SASCOC</td>
                        <td><?php echo t('resource_sascoc_desc'); ?></td>
                        <td><a href="https://www.sascoc.co.za" target="_blank" rel="noopener noreferrer">sascoc.co.za</a></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h2><?php echo t('resources_checklist'); ?></h2>
        <p>
            <?php echo t('resources_checklist_desc'); ?>
        </p>
        <a href="checklist.php" class="btn"><?php echo t('resources_open_checklist'); ?></a>

    </div>
</section>

<?php include 'includes/footer.php'; ?>