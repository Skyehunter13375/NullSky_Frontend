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
            require_once("/var/www/NullSky/requests/db.php");
            $_SESSION['form_token'] = bin2hex(random_bytes(16));
        ?>
    </head>
    <body>
        <?php print_header($thisFileName); ?>
        <div class="min-h-screen text-sm text-white">
            <div class="container">
                <div class="grid">
                    <div class="panel">
                        <form action="/requests/submit.php" method="POST">
                            <input type="hidden" name="token" value="<?php echo $_SESSION['form_token']; ?>">
                            <input type="text"   name="block" style="display:none">

                            <label>Name:</label><br>
                            <input type="text" name="name" style='width: 400px; height: 2rem;' required><br><br>

                            <label>Email:</label><br>
                            <input type="email" name="email" style='width: 400px; height: 2rem;' required><br><br>

                            <label>Summary:</label><br>
                            <input type="text" name="summary" style='width: 98%; height: 2rem;' required></textarea><br><br>

                            <label>Details/Notes (optional):</label><br>
                            <textarea name="notes" style='width: 98%; height: 15rem;'></textarea><br><br>

                            <label>Is this a private matter: </label>
                            <input type='checkbox' name='private'><br><br>

                            <button type="submit" style='width:100%; height: 2.5rem;'>Submit Ticket</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="grid">
                    <div class="panel">
                        <table class='table'>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Summary</th>
                                <th>Submitted</th>
                                <th>Status</th>
                            </tr>

                            <?php
                                $stmt = $pdo->prepare("
                                    SELECT
                                        id,
                                        CASE WHEN private = true THEN 'Redacted' ELSE name END AS name,
                                        CASE WHEN private = true THEN 'Redacted' ELSE summary END AS summary,
                                        submit_date,
                                        status
                                    FROM req_detail;
                                ");
                                $stmt->execute();
                                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($results as $res) {
                                    printf("
                                        <tr>
                                            <td>{$res['id']}</td>
                                            <td>{$res['name']}</td>
                                            <td>{$res['summary']}</td>
                                            <td>{$res['submit_date']}</td>
                                            <td>{$res['status']}</td>
                                        </tr>
                                    ");
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>