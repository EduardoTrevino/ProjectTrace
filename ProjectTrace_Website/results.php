<html class="LSDM_BasePage">
    <head>
        <title> Results </title>
        <link rel="stylesheet" href="/assets/styles/LSDM.css">
    </head>

    <body>
        <!-- [PERSISTENT] Page Header -->
        <div class="LSDM_Header_Area">
            <div class="LSDM_Header_Banner">
                <h1> ProjectTrace </h1>
            </div>

            <!-- [PERSISTENT] Navigation -->
            <div class="LSDM_Header_Nav">
                <a href="./" class="LSDM_Nav_Buttons">              Home  </a>
                <a href="./results.php" class="LSDM_Nav_Buttons">   Results </a>
                <a href="./resources.html" class="LSDM_Nav_Buttons"> Resources </a>
                <a href="./contact.php" class="LSDM_Nav_Buttons">   Contact </a>
            </div>
        </div>

        <!-- Page Content -->
        <div class="LSDM_Body_Subheader">
            <h2> Results </h2>
        </div>

        <div class="LSDM_Body_Content">
            <?php
                // tail -f /var/log/nginx/error.log for error checking

                require __DIR__ . '/assets/scripts/phpFunc.php';

                if (isset($_POST['doe'])) {
                    if ($_POST['doe'] != 'doe') { PrintAward('doe', $_POST['doe']); }
                    else { PrintProjects('doe'); }
                }
                elseif (isset($_POST['nih'])) {
                    if ($_POST['nih'] != 'nih') { PrintAward('nih', $_POST['nih']); }
                    else { PrintProjects('nih'); }
                }
                elseif (isset($_POST['nsf'])) {
                    if ($_POST['nsf'] != 'nsf') { PrintAward('nsf', $_POST['nsf']); }
                    else { PrintProjects('nsf'); }
                }
                // [REMOVE AT LAUNCH] Test Agency
                elseif (isset($_POST['TEST'])) {
                    if ($_POST['TEST'] != 'TEST') { PrintAward('TEST', $_POST['TEST']); }
                    else { PrintProjects('TEST'); }
                }
                else { PrintAgencies(); }
            ?>
        </div>
    </body>
</html>
