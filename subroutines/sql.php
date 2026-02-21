<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);

function SELECT($statement) {
//  var_dump(is_readable('/var/www/data/SpaceTraders.db'));
//  var_dump(is_writeable('/var/www/data/SpaceTraders.db'));
    $db     = new SQLite3('/var/www/data/SpaceTraders.db');
    $result = $db->query($statement);

    $rows = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $rows[] = $row;
    }

    $db->close();
    return $rows;
}

