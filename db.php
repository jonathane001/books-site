<?php
// connects to the books database.
// Change these to match your own MySQL settings.
$host     = "127.0.0.1";
$user     = "root";
$password = "yourpassword";
$database = "books";

// Make mysqli throw errors so we can catch them
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $db = new mysqli($host, $user, $password, $database);
    $db->set_charset("utf8mb4");
} catch (mysqli_sql_exception $e) {
    // Show a simple message instead of the real error
    die("Could not connect to the database. Check the settings in db.php.");
}
?>
