<!DOCTYPE html>
<html lang="en">
    <head>
        <title>NULL SKY</title>
        <link rel="icon" type="image/png" href="/media/NullSkyLight.png">
        <meta name="viewport">
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/style.css">
        <?php
            $thisFileName = basename($_SERVER['SCRIPT_FILENAME']);
            require_once("subroutines/main.php");
            require_once("subroutines/sql.php");
        ?>
    </head>

    <body>
        <!-- Generate Header Bar -->
        <?php print_header($thisFileName); ?>

        <div class="min-h-screen text-sm text-white">
            <div class="container">
                <!-- Welcome Section -->
                <div class="grid">
                    <div class="panel">
                        <h2 class="text-primary text-xl section-title">Welcome to the Null Sky</h2>
                        <p>
                            Welcome to my passion project / fever dream / insomnia fueled effort to build something cool for myself!<br>
                            First off, if you came here looking for tips on playing this wonderful game you have sadly come to the wrong place adventurer!<br>
                            I work on this purely in my spare time as a fun way to kill time and also build some skills while doing it.
                        </p><br>

                        <h2 class="text-primary text-xl section-title">What is SpaceTraders API?</h2>
                        <p>
                            SpaceTraders is a space-themed universe where you can explore star systems, trade goods, mine asteroids, and take on faction contracts to earn credits and reputation.<br>
                            The economy of the game is entirely player driven, and during it's alpha we are experiencing weekly/bi-weekly resets.<br>
                            Now here's the cool part, there is no client for this game. No user interface. No standardized method of interaction at all.<br>
                        </p><br>

                        <h2 class="text-primary text-xl section-title">There's no game client? How do I play it?!</h2>
                        <p>
                            That's the neat part! You don't...at least...not from here...yet!<br>
                            TLDR; it's a bunch of API endpoints to send and receive data and you build everything else you use to interact with the game.<br>
                            Fleet management, automation, user interface etc. all hand crafted by yours truely.
                        </p><br>

                        <blockquote class="italic text-secondary" cite="">
                            "Across the quiet span of stars, thought drifts and settles.<br>
                            I look within, mapping new ground where uncertainty becomes direction.<br>
                            The vastness remains still, inviting awareness rather than fear,<br>
                            learning beneath the Null Sky."
                        </blockquote>
                    </div>
                </div>

                <!-- Grid 1 - Server Status + Global Stats -->
                <div class="grid grid-3">
                    <div class="panel">
                        <h3 class="text-primary text-xl section-title">Server Status</h3>
                        <table class="table">
                            <?php $ServerStatus = SELECT('SELECT server_up, game_version, agents, ships, systems, waypoints, accounts, reset_freq, reset_date, next_reset, last_updated FROM server')[0]; ?>
                            <tbody>
                                <tr> <td>Status:</td>      <td class="text-right"><?= $ServerStatus['server_up'] ?></td></tr>
                                <tr> <td>Version:</td>     <td class="text-right"><?= $ServerStatus['game_version'] ?></td></tr>
                                <tr> <td>Next Reset:</td>  <td class="text-right"><?= $ServerStatus['next_reset'] ?> UTC</td></tr>
                                <tr> <td>Last Update:</td> <td class="text-right"><?= $ServerStatus['last_updated'] ?> UTC</td></tr>
                            </tbody>
                        </table>
                        <hr style="border-color: var(--border-accent);">
                        <table class="table">
                            <tbody>
                                <tr> <td>Agents Registered:</td> <td class="text-right"><?= $ServerStatus['agents'] ?>       </td></tr>
                                <tr> <td>Ships Owned:</td>       <td class="text-right"><?= $ServerStatus['ships'] ?>        </td></tr>
                                <tr> <td>Systems Found:</td>     <td class="text-right"><?= $ServerStatus['systems'] ?>      </td></tr>
                                <tr> <td>Waypoints Scanned:</td> <td class="text-right"><?= $ServerStatus['waypoints'] ?>    </td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel">
                        <h3 class="text-primary text-xl section-title">Leaderboard (Credits)</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style='width: 35px'>Pos</th>
                                    <th style='text-align: left'>Agent</th>
                                    <th style='text-align: right'>Credits</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $Leaderboard = SELECT("SELECT * FROM leaderboard_creds");
                                    foreach ($Leaderboard as $key => $vals) {
                                        $curr = $key + 1;
                                        print("
                                            <tr>
                                                <td style='width: 35px'>{$curr}</td>
                                                <td>{$vals['agent']}</td>
                                                <td class='text-right'>{$vals['credits']}</td>
                                            </tr>
                                        ");
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel">
                        <h3 class="text-primary text-xl section-title">Leaderboard (Charts)</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style='width: 35px'>Pos</th>
                                    <th style='text-align: left'>Agent</th>
                                    <th style='text-align: right'>Charts</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $Leaderboard = SELECT("SELECT * FROM leaderboard_charts");
                                    foreach ($Leaderboard as $key => $vals) {
                                        $curr = $key + 1;
                                        print("
                                            <tr>
                                                <td style='width: 35px'>{$curr}</td>
                                                <td>{$vals['agent']}</td>
                                                <td class='text-right'>{$vals['charts']}</td>
                                            </tr>
                                        ");
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
