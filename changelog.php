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
            require_once("subroutines/sql.php");
        ?>
    </head>

    <body>
        <?php print_header($thisFileName); ?>
        <div class="container text-sm">
            <div class='panel' style='margin-bottom: 1rem;'>
                <h2 class='text-xl text-primary'>April 2026</h2>
                <ul class='text-white' style='margin-left: -20px'>
                    <li>04/10
                    <ul class='text-white'>
                        <li>Took a little more than a month off to focus on other projects and life events.
                        <li>Created a ticketing system/suggestion box today and decided to switch back to postgres...again...turns out I can't live without arrays as columns.
                        <li>Anyone can input a ticket but they cannot be modified yet except by me in the DB. Will work on that functionality next.
                        <li>It's a heaviliy modified (and simplified) version of the ticketing system I built for my previous employer to manage case esclations through the tiers of support.
                        <li>VoidEngine needs an oil change, it stopped running a little while ago when it tried to refresh during server ST server maintenance which I didn't account for in error handling.
                        <li>I haven't converted that code back to PostgreSQL yet either, that willc ome soon.
                    </ul>
                </ul>
            </div>
        </div>
        <div class="container text-sm">
            <div class='panel' style='margin-bottom: 1rem;'>
                <h2 class='text-xl text-primary'>February 2026</h2>
                <ul class='text-white' style='margin-left: -20px'>
                    <li>02/21
                    <ul class='text-white'>
                        <li>I took the plunge and moved this project into Amazon Web Services (AWS) to get it out of my home network. This came with a littany of challenges.
                        <ul>
                            <li>1) Creating the VM instance and getting SSH keys set up
                            <li>2) Registering a domain (AWS shadow restricts the account from buying domains until a manual review is done...that's not documented anywhere...)
                            <li>3) After several weeks my account lock was lifted and I could actually buy the domain
                            <li>4) Getting DNS to line up between Route53 and Lightsail
                            <li>5) Lots ... and lots ... of waiting for things to synchronize between AWS systems.
                        </ul>
                        <li>As of 03/03 I think I have the kinks ironed out. Once DNS records sync up and propogate everything should resolve?
                        <li>During this break I also renamed the git repos and the project names to NullSky (front-end) and VoidEngine (back-end) and split the code up into proper locations on the server.
                        <li>I should be able to get back to work on this 03/04 once AWS starts behaving.
                    </ul>
                </ul>
                <ul class='text-white' style='margin-left: -20px'>
                    <li>02/04
                    <ul class='text-white'>
                        <li>Another big overhaul today...having issues post reset with the database file becoming inaccessible to PHP.
                        <li>Updating the refesh process to create a proper backup of the existing data, delete data from tables and vacuum instead of just renaming the DB file like I was before.
                        <li>Tweaked the automation so now I have a rigid "warm up" process to ensure all of the data is up to date before starting the scheduled tasks.
                        <li>There is also now a method to manually run a task from inside the program which pauses scheduled tasks, executes then lifts the pause.
                        <li>Overhauled the logging so now I can easily log to three different files, activity, errors and a dump for debugging.
                        <li>Set up actual error handling for the API calls so that now if SpaceTraders returns an error I can actually handle it properly.
                        <li>This was the first step to truely automating the registration process. Now I can leave the game running and as soon as the server resets I can see my agent is no longer valid and register a new one to keep playing.
                        <li>Also learned that the "bi-weekly" resets is just a guideline not so much a rule. They appear to happen pseudo randomly now.
                    </ul>
                </ul>

                <ul class='text-white' style='margin-left: -20px'>
                    <li>02/03
                    <ul class='text-white'>
                        <li>Additions to the aboutme page.
                        <li>Added certifications and lots of detail about my projects both professional and personal.
                        <li>Minor tweaks to styling as well to allow for more grid layout sizes.
                        <li>Reformatted the changelog page to split by month. Saves a little vertical space.
                    </ul>
                </ul>
            </div>

            <div class='panel' style='margin-bottom: 1rem;'>
                <h2 class='text-xl text-primary'>January 2026</h2>
                <ul class='text-white' style='margin-left: -20px'>
                    <li>01/31
                    <ul class='text-white'>
                        <li>Broke down the waypoint data into multiple tables for ease of storage since SQLite doesn't support arrays in a single column like Postgres does.
                        <li>Updated the systems/waypoint collection routines so that they store the data more effectively now.
                        <li>More updates to the fleet page to display the system each ship is in separate from the waypoint data.
                        <li>The waypoint data is also much more verbose now, properly displaying traits and status data for each waypoint.
                        <li>Need a scheduled job to keep waypoint data up to speed, then I can finally start working on the interactivity of the web pages with the automation of the game client.
                    </ul>
                </ul>

                <ul class='text-white' style='margin-left: -20px'>
                    <li>01/29
                    <ul class='text-white'>
                        <li>Spent the day stripping all of the SQLite database and Golang automation code out to store them separately on the server and in a separate GH repo.
                        <li>There is now segmentation between the Golang code running the automation and eventually providing an API for the PHP web pages and the web UI itself.
                        <li>This way if I want to run the server entirely headless I can and it will just execute tasks as I define them. But it opens the door for the player to load the web GUI and interact with the game manually that way.
                    </ul>
                </ul>

                <ul class='text-white' style='margin-left: -20px'>
                    <li>01/27
                    <ul class='text-white'>
                        <li>More work on the fleet page today, added ship modules and ship mounts data which was not being collected before.
                        <li>There was more I did this day but I forgot to create the entry in the changelog so here we are!
                    </ul>
                </ul>

                <ul class='text-white' style='margin-left: -20px'>
                    <li>01/24
                    <ul class='text-white'>
                        <li>Completely new main program that includes a task controller and scheduler.
                        <li>Now the program can run entirely independently. This sets the framework for interacting with the program rather than the DB directly from the web pages.
                        <li>I will create a service to keep the game up and running here soon, then all interaction with the game will be done through scheduled or manual task creation.
                        <li>This should ensure that we only ever have one main source of truth for both the state of my agent and fleet but also a single point of entry to the DB.
                        <li>I also now capture each ships module and mount hardpoint loadouts. I wasn't doing so before but that data is now being collected and updated on ship update.
                        <li>That means I also can now display that data in the fleet page so that was built out today as well.
                        <li>Working on the modal for the system viewer within the fleet page. Only a table view of the system for now until I can get the javascript piece finished and integrated.
                        <li>I also created a component viewer in the fleet page using a lot of the same logic.
                        <li>My intention is to come clean this logic up later on, right now it's just a functional prototype.
                        <li>Tomorrow is reset day, so I'll be reregistering my agent and checking all of the automation that's complete at this point.
                        <li>Fixed some bugs in the ingest code. I was sticking some of the ship_frame data in the ship_reactor tables by mistake.
                        <li>Still need to build out the ship cargo viewer and create integration to offload or jettison that cargo as needed.
                    </ul>
                </ul>

                <ul class='text-white' style='margin-left: -20px'>
                    <li>01/23/2026
                    <ul class='text-white'>
                        <li>Created a table view (modal) of each ship's location in the fleet page. That way you can see where each ship is in the system.
                        <li>I have not incorporated the actual javascript system viewer to this just yet but I'm getting there.
                        <li>Next step is to build out the ship components and contract viewer pages more and start creating links to the actual go program to accept and fulfil contracts.
                        <li>Getting VERY close to being able to actually interact with the game and start playing!!!
                    </ul>
                </ul>

                <ul class='text-white' style='margin-left: -20px'>
                    <li>01/19
                    <ul class='text-white'>
                        <li>Finished and tested the new agent registration code.
                        <li>It works as intended now, resetting everything and grabbing initial data from the registration response.
                        <li>Fixed a typo in my sqlitedb builder.
                        <li>Starting to work on the new main script so that it just runs autonomously as a systemd service.
                        <li>Eventually it will always be running and just run jobs placed in the SQLitedb automagically as manual tasks between scheduled events/listeners.
                        <li>I also realized I am mapping the system incorrectly, I currently have everything orbiting 0,0 by mistake. Moons and space stations might orbit planets so I'll fix that later tonight and add color schemes to the web UI.
                    </ul>
                </ul>

                <ul class='text-white' style='margin-left: -20px'>
                    <li>01/13
                    <ul class='text-white'>
                        <li>Took a short break for Xmas/New Year and to focus on my Linux+ certification training.
                        <li>Stripped out the TUI entirely, I do still have that code but it's been removed from the project dirs.
                        <li>Converting everything over use proper state control that way PHP and Golang can intermingle and automation can be paused for manual intervention via the web UI.
                        <li>Go will run the entire project under the hood, PHP web pages will serve as the user interface, allowing the user to pause the game and manually interact with the pieces.
                        <li>Each component (fleet, agent, contracts etc) will have it's own scheduled interval to be updated on automagically unless the client is paused.
                        <li>Reworked the system display page to use Plotly.js instead of Chart.js. Looks much better this way in my opinion.
                    </ul>
                </ul>
            </div>

            <div class='panel' style='margin-bottom: 1rem;'>
                <h2 class='text-xl text-primary'>December 2025</h2>
                <ul class='text-white' style='margin-left: -20px'>
                    <li>12/31
                    <ul class='text-white'>
                        <li>Cleaned up a ton of the redundant CSS that was left over from switching back from Tailwind to pure CSS.
                        <li>Dabbled with importing a Github activity calendar but ultimately decided not to include it for now.
                        <li>Removed the javascript I used to read markdown for the about me and changelog and just converted it to pure HTML.
                        <li>Created the bones of a method to display how a system actually looks by plotting points in a JS chart and drawing fake orbit circles.
                        <li>Cobbled together a baseline for the poem that defines the theme of this project.
                        <li>Today is mostly stylistic changes before I get back into Golang and rip out all the TUI components leaving just the CLI.
                        <li>Set up cloudflare app path so I can finally share the link now that all pages are at least semi-functional again!!!
                    </ul>
                </ul>

                <ul class='text-white' style='margin-left: -20px'>
                    <li>12/28
                    <ul class='text-white'>
                        <li>Reworked the front end for the home page and fleet pages, still need to work on contracts and system viewer.
                        <li>This is the setup setp for converting all the TUI stuff over to PHP and just using GO for the back end with SQLite.
                        <li>I also want to get all of the PHP SQL stuff removed, so it just calls various GO programs to get the data out of SQLite and update it if needed all in one place.
                        <li>I am also working on abandoning TailwindCSS for raw CSS of my own design. Decided I don't like the clutter that tailwind creates and I can simplify it dramatically while keeping the same idea.
                        <li>Working on a plan to create an actual visual system model viewer, not sure what tech I want to use to build that just yet.
                        <li>Also need to write up an ABOUT ME page soon when I make the page public again.
                    </ul>
                </ul>

                <ul class='text-white' style='margin-left: -20px'>
                    <li>12/26
                    <ul class='text-white'>
                        <li>Merged my PHP and Golang projects together into one package.
                        <li>From now on I will serve a PHP based web UI to view and interact with the game.
                        <li>Golang will serve as the backbone still to update and maintain the SQLite database.
                        <li>Today's commits will be strictly for getting the baseline of that merger up and running.
                        <li>Will attempt to maintain all previous git history, not ready for a rebase just yet.
                    </ul>
                </ul>

                <ul class='text-white' style='margin-left: -20px'>
                    <li>12/13
                    <ul class='text-white'>
                        <li>Completed registration automation feature.
                        <li>Now the config program will automagically register a new agent after a reset (as long as the agent token is removed from the config. This will be changed later on.
                        <li>Initial capture of Agent, System, Fleet, and Contract data is done during registration of the new agent to minimize calls to the API.
                        <li>I also updated some of the logging routines and error handling to be a bit more verbose going forward.
                    </ul>
                </ul>

                <ul class='text-white' style='margin-left: -20px'>
                    <li>12/12
                    <ul class='text-white'>
                        <li>Big simplification of package structures so there's less cross importing avoiding conflicts.
                        <li>Working on initial registration script so that it captures preliminary data to kickstart the process after a reset.
                        <li>Created models for the entire registration process so it can be automated now.
                        <li>Set up new tables for factions
                    </ul>
                </ul>

                <ul class='text-white' style='margin-left: -20px'>
                    <li>12/08
                    <ul class='text-white'>
                        <li>Mostly finished conversion back to SQLite.
                        <li>Automated most of the first time setup stuff.
                        <li>Now you just create the config.yaml file and it should do everything automagically.
                        <li>Systems capture is not done yet. I need to actually sit and write my registration function to fill all of that out the first time the agent is registered. Then it becomes a non-issue.
                        <li>Getting close to done with a primitive version of the UI, now I can actually start playing the game and automating ship action.
                    </ul>
                </ul>

                <ul class='text-white' style='margin-left: -20px'>
                    <li>12/07
                    <ul class='text-white'>
                        <li>Converting back to SQLite...again.
                        <li>Condensing and simplifying the file structure, getting too large.
                        <li>Reworking comment structure as well as I've fully switched from VsCode to NeoVim now.
                    </ul>
                </ul>
            </div>

            <div class='panel' style='margin-bottom: 1rem;'>
                <h2 class='text-xl text-primary'>November 2025</h2>
                <ul class='text-white' style='margin-left: -20px'>
                    <li>11/28
                    <ul class='text-white'>
                        <li>Modifying color theme to be more dark gray and green themed, easier on the eyes when staring at it for hours.
                        <li>Converted single line entries for Fleet and Systems into selectable cards.
                        <li>Beginning to break down menus into substructures.
                    </ul>
                </ul>

                <ul class='text-white' style='margin-left: -20px'>
                    <li>11/26
                    <ul class='text-white'>
                        <li>Removed unecessary struct in agent data collection routines. Updated functions accordingly.
                        <li>Tested with some new formatting on the lists and graphing and plotting data.
                        <li>Added TUI functions to view contracts in progress.
                    </ul>
                </ul>

                <ul class='text-white' style='margin-left: -20px'>
                    <li>11/25
                    <ul class='text-white'>
                        <li>Reworked the existing TUI menus, everything now focuses and updates correctly.
                        <li>Starting to build submenus for each section to actually interact with things.
                        <li>Up until today everything was purely displaying information. Next step is to make things interactive and updatable.
                        <li>Added a proper color theme to the global state based on <a href="https://github.com/projekt0n/github-nvim-theme">projekt0n/github-nvim-theme</a>.
                    </ul>
                </ul>

                <ul class='text-white' style='margin-left: -20px'>
                    <li>11/24
                    <ul class='text-white'>
                        <li>Moved app config structs into General package so they could be available everywhere.
                        <li>The fact that Golang doesn't have true Global variables is really frustrating...
                        <li>Moved the menu builder funcs into their respective packages now that the structs are global (if imported).
                        <li>This will let me keep like-code together. Once in a menu like Fleet, the code for the entire fleet menu tree will be together in the Fleet package.
                    </ul>
                </ul>

                <ul class='text-white' style='margin-left: -20px'>
                    <li>11/23
                    <ul class='text-white'>
                        <li>Big refactor on the main function and how it handles passing focus around.
                        <li>Created logic for displaying (with the intent of editing later) the config.yaml file.
                        <li>This should set the stage for all further UI changes and make that substantially easier now that I can pass the entire app back and forth instead of just random flex primitives.
                    </ul>
                </ul>

                <ul class='text-white' style='margin-left: -20px'>
                    <li>11/22
                    <ul class='text-white'>
                        <li>This is a stub update, life happened and not much progress the last couple days.
                        <li>Initial stages of new agent registration are done.
                        <li>Needs to be automated and populate the config.yaml file with that token still but it should at least get us registered for now even if the token piece is still manual.
                        <li>Added logic to display leaderboards in the TUI. Still working out what data needs a menu in there as opposed to just running under the hood...
                    </ul>
                </ul>

                <ul class='text-white' style='margin-left: -20px'>
                    <li>11/18
                    <ul class='text-white'>
                        <li>Big changes to the UI builder & associated functions.
                        <li>Can now display contracts, systems, waypoints, and ship fleet.
                        <li>It's not the cleanest and needs lots of work, especially with resizing and scaling properly to the window size.
                        <li>I also added lots of logging.
                    </ul>
                </ul>

                <ul class='text-white' style='margin-left: -20px'>
                    <li>11/16
                    <ul class='text-white'>
                        <li>Another big refactor while I am learning which packages I like.
                        <li>Filling in gaps in data collection routines.
                        <li>Complete overhaul of postgres connections. Simplified and trimmed lots of fat.
                        <li>Added a config file to standardize DB connection info and account/agent tokens.
                        <li>Fixed all the timestamp checking (UTC vs Local time) and rebuilt the database.
                        <li>Abandoned Bubbletea in favor of Tview. Much simpler, easier to understand and less abstract.
                        <li>Shifting gears from data collection to TUI building then to start actually playing the game.
                        <li>Also added a quick feature milestone tracker to the README. Swiped that idea from someone else's project.
                    </ul>
                </ul>

                <ul class='text-white' style='margin-left: -20px'>
                    <li>11/13
                    <ul class='text-white'>
                        <li>New agent registration function so I don't have to keep going to the web page on reset. Requires testing still.
                        <li>Basic leaderboard data collection started.
                    </ul>
                </ul>

                <ul class='text-white' style='margin-left: -20px'>
                    <li>11/11
                    <ul class='text-white'>
                        <li>Created structs and function template for shipyard data collection but can't test until next reset or I move systems.
                    </ul>
                </ul>

                <ul class='text-white' style='margin-left: -20px'>
                    <li>11/10
                    <ul class='text-white'>
                        <li>Fixed my ingest routines to properly use json.Unmarshal() with wrappers to get rid of the "data" fields.
                        <li>Rebuilt my structs for all data types for ease of using interfaces and SQL tuning later on.
                        <li>Gave up on SQLite and switched back to PostgreSQL. I need the ability to store arrays in a single column for cross reference later.
                        <li>Rebuilt the PSQL DB and updated all functions to write data there again.
                    </ul>
                </ul>

                <ul class='text-white' style='margin-left: -20px'>
                    <li>11/09
                    <ul class='text-white'>
                        <li>Added system and waypoint data collection routines.
                        <li>Built DB tables to contain that data.
                    </ul>
                </ul>

                <ul class='text-white' style='margin-left: -20px'>
                    <li>11/04
                    <ul class='text-white'>
                        <li>Added contract tables to DB and built associated structs.
                        <li>Built Get,Update,Display routine framework for the contract data.
                    </ul>
                </ul>

                <ul class='text-white' style='margin-left: -20px'>
                    <li>11/03
                    <ul class='text-white'>
                        <li>Moved development environment to a local machine from a remote server.
                        <li>Switched from Tview to BubbleTea.
                        <li>Abandoned the server performance data for now, not really relevant and distracting.
                    </ul>
                </ul>

                <ul class='text-white' style='margin-left: -20px'>
                    <li>11/01
                    <ul class='text-white'>
                        <li>Switched from PostgreSQL to SQLite.
                    </ul>
                </ul>
            </div>

            <div class='panel' style='margin-bottom: 1rem;'>
                <h2 class='text-primary'>October 2025</h2>
                <ul class='text-white' style='margin-left: -20px'>
                    <li>10/20
                    <ul class='text-white' style='margin-left: -20px'>
                        <li>Project start
                        <li>Registering an agent
                        <li>Laying the basic foundation for how the TUI is going to work.
                        <li>Gathering the information required from both the host server and the SpaceTraders web API.
                        <li>Found and installed the base packages I'll be using for this project.
                        <li>Created and set up the PGSQL DB and all permissions.
                        <li>Started pre-defining some of the tables I knew I'd need.
                    </ul>
                </ul>
            </div>
        </div>
    </body>
</html>
