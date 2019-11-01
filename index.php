<?php
date_default_timezone_set('Europe/Kiev');

if (file_exists("config.php")) {
    require_once("config.php");
} else {
    print_r('FATAL ERROR "Config" file not exist!');
    return;
}

if (file_exists("router.php")) {
    require_once("router.php");
} else {
    print_r(001 . __LINE__ . __FILE__);
    return;
}
if (file_exists("view.php")) {
    require_once("view.php");
} else {
    print_r(002 . __LINE__ . __FILE__);
    return;
}

Route::Start();


