<?php

ob_start();
// Functions -------------------------------------------------------------------

function is_get() {
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function is_post() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function get($key, $value = null) {
    return $_GET[$key] ?? $value;
}

function post($key, $value = null) {
    return $_POST[$key] ?? $value;
}

function req($key, $value = null) {
    return $_REQUEST[$key] ?? $value;
}

function redirect($url = null) {
    if ($url === null) {
        $url = $_SERVER['REQUEST_URI'];
    }
    ob_end_clean(); // Clear the output buffer without sending it to the browser
    header("Location: $url");
    exit();
}

// HTML Helpers ----------------------------------------------------------------

function text($key, $attributes = []) {
    $value = $GLOBALS[$key] ?? '';
    $attrs = '';
    foreach ($attributes as $attr => $val) {
        $attrs .= " $attr='" . htmlspecialchars($val) . "'";
    }
    echo "<input type='text' name='$key' value='" . htmlspecialchars($value) . "'$attrs>";
}

function password($key, $attributes = []) {
    $value = $GLOBALS[$key] ?? '';
    $attrs = '';
    foreach ($attributes as $attr => $val) {
        $attrs .= " $attr='" . htmlspecialchars($val) . "'";
    }
    echo "<input type='password' name='$key' value='" . htmlspecialchars($value) . "'$attrs>";
}

function select($key, $items, $attributes = '') {
    $value = $GLOBALS[$key] ?? '';
    echo "<select name='$key' $attributes>";
    echo "<option value=''>- Select One -</option>";
    foreach ($items as $id => $text) {
        $state = $id == $value ? 'selected' : '';
        echo "<option value='$id' $state>$text</option>";
    }
    echo "</select>";
}

function radios($key, $items, $attributes = '') {
    $value = $GLOBALS[$key] ?? '';
    echo "<div class='radio-option'>";
    foreach ($items as $id => $text) {
        $state = $id == $value ? 'checked' : '';
        echo "<label><input type='radio' name='$key' value='$id' $state $attributes>$text</label>";
    }
    echo "</div>";
}

// Errors ----------------------------------------------------------------------

$err = [];

function err($key) {
    global $err;
    if ($err[$key] ?? false) {
        echo "<span class='err'>$err[$key]</span>";
    }
    else {
        echo "<span></span>";
    }
}

// Temporary Data --------------------------------------------------------------

session_start();

function temp($key, $value = null) {
    if ($value) {
        $_SESSION["temp-$key"] = $value;
    }
    else {
        $value = $_SESSION["temp-$key"] ?? null;
        unset($_SESSION["temp-$key"]);
        return $value;
    }
}

const GENDERS = [
    'M' => 'Male',
    'F' => 'Female',   
];

const ROLE = [
    'Owner' => 'Owner',
    'Tenant' => 'Tenant',
];
// Initializations -------------------------------------------------------------
$_mainColor = '#ea384c';
$_title = 'Your Easiest Solution';
$_head  = '';
$_foot  = '';



$db = new PDO('mysql:host=localhost;dbname=howkee', 'root', '', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
 ]);


// $server = 'localhost';
// $username = 'u515171008_howKee';
// $password = 'fAf32*7(*hffle12';
// $dbname = 'u515171008_howKee';

// // MySQLi Connection with error checking
// $db = mysqli_connect($server, $username, $password, $dbname);

// if (!$db) {
//     die("MySQLi Connection failed: " . mysqli_connect_error());
// }

// try {
//     $db = new PDO("mysql:host=$server;dbname=$dbname", $username, $password, [
//         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
//         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Enables error reporting
//     ]);
// } catch (PDOException $e) {
//     die("PDO Connection failed: " . $e->getMessage());
// }



// Set the time limit for inactivity (15 minutes)
$inactiveLimit = 150 * 60;

// Check if the last activity timestamp exists
if (isset($_SESSION['last_activity'])) {
    $sessionLife = time() - $_SESSION['last_activity'];
    
    if ($sessionLife > $inactiveLimit) {

       $userID = $_SESSION['userId'];
       $status = "Offline now";

       $stm = $db->prepare("UPDATE user SET status = :status WHERE userId = :userId");
       $stm->execute([':status' => $status, ':userId' => $userID]);

       session_unset();
       session_destroy();

       setcookie('id', '', time() - 60*60*24*30, '/');
       setcookie('sess', '', time() - 60*60*24*30, '/');

       header("Location: /Authentication/loginUser.php?session=expired");
       exit();
    }
}

// Update last activity time stamp
$_SESSION['last_activity'] = time();



