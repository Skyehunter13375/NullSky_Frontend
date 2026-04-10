<?php $id = $_GET['id'] ?? null; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>NULL SKY</title>
        <link rel="icon" type="image/png" href="/media/NullSkyLight.png">
        <meta name="viewport">
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/style/style.css">
        <?php
            $thisFileName = basename($_SERVER['SCRIPT_FILENAME']);
            require_once("/var/www/NullSky/subroutines/main.php");
            require_once("/var/www/NullSky/subroutines/sql.php");
        ?>
    </head>
    <body>
        <?php print_header($thisFileName); ?>
        <div class="min-h-screen text-sm text-white">
            <div class="container">
                <div class="grid">
                    <div class="panel">

                    <h2>Ticket Submitted Successfully</h2>

                    <?php if ($id): ?>
                        <p>Your ticket ID is: <strong><?php echo htmlspecialchars($id); ?></strong></p>
                    <?php endif; ?>

                    <a href="/request.php">Submit another ticket</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>