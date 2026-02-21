<!DOCTYPE html>
<html lang="en">
    <head>
        <title>NULL SKY</title>
        <meta name="viewport">
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/style.css">
        <?php
            $thisFileName = basename($_SERVER['SCRIPT_FILENAME']);
            require_once("subroutines/main.php");
        ?>
    </head>

    <body>
        <?php print_header($thisFileName); ?>
        <div class="min-h-screen text-primary">
            <div class="container">
                <div class="panel">
                    <h2 class="text-lg section-title">About Me</h2>
                    <p style="color: var(--text-white);">
                        I am a Linux system administrator and software engineer with roughly a decade of experience working at the intersection of technical support and software development.<br>
                        Building tools to resolve common issues or prevent them from ever appearing in the first place is my passion.<br><br>

                        There is nothing more permanent than a temporary solution! I cannot accept the "slap a band-aid on it" mentality when a permanent solution is possible.<br>
                        I put a lot of personal time and focus on finding root cause for any particular issue and resolving it permanently, or implementing a solid mitigation process if a permanent solution is not yet possible.<br><br>

                        I am comfortable working independently or as part of a team, mentoring others, and helping translate technical complexity into actionable outcomes.<br>
                        I am also a stickler for documentation! I spent a great deal of my career writing training documentation, building classes for new hires, and mentoring teams from day one until they know the product better than I do.
                    </p>
                </div><br>

                <div class="panel">
                    <h2 class="text-lg section-title">Professional Projects</h2>
                    <ul style="margin-left: -20px; color: var(--text-white);">
                        <li>Linux VM Monitoring & Troubleshooting Suite
                        <ul style="color: var(--text-secondary)">
                            <li>A toolbox of 75 programs to troubleshoot common issues with a highly customized RHEL linux server VM.
                            <li>Designed to aid the support teams with issues ranging from user administration to system performance to data problems in two different databases.
                            <li>All programs are available via CLI or by a custom TUI that I hand built.
                        </ul><br>

                        <li>Printer Fleet Management
                        <ul style="color: var(--text-secondary)">
                            <li>Utilizes SNMP to query thousands of physical devices every few hours to collect usage and error data for analysis
                            <li>The Linux VM the device is connected to collects the data from each individual device, then a central system collects that data from each individual client VM.
                            <li>After collection I analyze the data to determine which printers are "sick" and need maintenance or replacement parts based on error logs and usage metrics and automatically dispatch a field service technician.
                            <li>It is also entirely integrated into a Salesforce ticketing system to facilitate the field service dispatch and to create a paper trail for each printer that needs work.
                        </ul><br>

                        <li>Software Version Control Solution
                        <ul style="color: var(--text-secondary)">
                            <li>My team needed a way to keep our monitoring tools and automation of fixes up to date across our server fleet so I built one.
                            <li>I created the internal software version control system that would push the updated code to each client VM, and my peers built the tunnel to connect with the system.
                            <li>Built for in-house security purposes to avoid connecting client machines to external sources like git.
                        </ul><br>

                        <li>Case Escalation Tools
                        <ul style="color: var(--text-secondary)">
                            <li>A fairly simple form-based web UI for tier 1 to escalate an open ticket to tier 2 for assistance.
                            <li>It is fully integrated with Salesforce for the sake of keeping a single paper trail and documenting cases in a uniform manner.
                            <li>While I prefer a phone call or chat directly with the escalation point for the purposes of training and knowledge retention, this did improve consistency in case documentation and formalized the process a bit.
                        </ul>
                    </ul>
                </div><br>

                <div class="panel">
                    <h2 class="text-lg section-title">Personal Projects</h2>
                    <ul style="margin-left: -20px; color: var(--text-white);">
                        <li>Personal Homelab
                        <ul style="color: var(--text-secondary)">
                            <li>I built and maintain a 25U StarTech rack loaded with a mixture of Supermicro & HP enterprise servers to run the services I need in my home.
                            <li>This covers my NAS, home security, highly available VM cluster, home network etc.
                            <li>Custom cabling hand cut and terminated to length for each machine.
                            <li>Redundant power from the main as well as redundant UPS to avoid downtime.
                        </ul><br>

                        <li>Null Sky - A SpaceTraders API game client
                        <ul style="color: var(--text-secondary)">
                            <li>SpaceTraders is a web API where you register an agent and control a fleet of star ships to collect and sell materials, grow your weath and build your fleet.
                            <li>There is no standard client for the game, it's just an api endpoint, so everything I do to interact with the game is hand built by me.
                            <li>So far I have a basic automation framework in place so the ships can move cargo, and a web UI to show the status of those ships at any given time
                        </ul><br>

                        <li>Null Note - A home-grown replacement for Obsidian
                        <ul style="color: var(--text-secondary)">
                            <li>This project is in the very early stages of planning still.
                            <li>The intention is to build my own replacement for the Obsidian note taking software with the bloat ripped out and the data stored locally.
                            <li>The scope includes a custom web UI for taking and modifying notes in the Markdown syntax, and syncing those notes to any connected device.
                        </ul><br>

                    </ul>
                </div><br>

                <div class="grid grid-3">
                    <div class="panel">
                        <h2 class="text-lg section-title">Links</h2>
                        <ul style="margin-left: -20px; color: var(--text-white);">
                            <li>LinkedIn: <a target="_blank" style="color: var(--text-secondary);" href="https://www.linkedin.com/in/patrick-kelley-19490b132/">Patrick Kelley</a>
                            <li>Github:   <a target="_blank" style="color: var(--text-secondary);" href="https://github.com/Skyehunter13375">Skyehunter13375</a>
                        </ul>
                    </div>

                    <div class="panel">
                        <h2 class="text-lg section-title">Certifications</h2>
                        <ul style="margin-left: -20px; color: var(--text-white);">
                            <li>In Progress - CompTIA Linux+
                        </ul>
                    </div>

                    <div class="panel">
                        <h2 class="text-lg section-title">Udemy Courses</h2>
                        <ul style="margin-left: -20px; color: var(--text-white);">
                            <li>In Progress - Backend Engineering with Go
                            <li>09/20/2025  - Advanced SQL Bootcamp
                            <li>09/17/2025  - Master Git & Github
                            <li>09/03/2025  - Python Bootcamp
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>