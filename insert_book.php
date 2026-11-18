<?php
// takes the data from the form and saves it to the database
include 'db.php';
include 'header.php';

// Grab each form value and remove extra spaces
$isbn   = trim($_POST['isbn'] ?? '');
$author = trim($_POST['author'] ?? '');
$title  = trim($_POST['title'] ?? '');
$genre  = trim($_POST['genre'] ?? '');
$price  = $_POST['price'] ?? '';

// Genres the form allows
$genres = ['Fiction', 'Programming', 'Technology', 'History', 'Science'];

$message = "";
$success = false;

// Check the data before saving it
if ($isbn == '' || $author == '' || $title == '' || $genre == '' || $price == '') {
    $message = "You did not fill in every field. Please go back and try again.";
} elseif (!ctype_digit($isbn) || (strlen($isbn) != 10 && strlen($isbn) != 13)) {
    $message = "The ISBN must be 10 or 13 numbers.";
} elseif (!in_array($genre, $genres)) {
    $message = "Please pick a genre from the list.";
} elseif (!is_numeric($price) || $price < 0) {
    $message = "The price must be a number of 0 or more.";
} else {
    $price = floatval($price);

    // Check if this ISBN is already saved
    $check = $db->prepare("SELECT isbn FROM books WHERE isbn = ?");
    $check->bind_param("s", $isbn);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $message = "A book with ISBN $isbn is already in the database.";
    } else {
        // Prepared statement: the ? marks keep the data separate from the SQL,
        // which protects against SQL injection
        $stmt = $db->prepare("INSERT INTO books (isbn, author, title, genre, price) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssd", $isbn, $author, $title, $genre, $price);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $success = true;
            $message = "\"$title\" was added to the database.";
        } else {
            $message = "Something went wrong. The book was not added.";
        }
        $stmt->close();
    }
    $check->close();
}

$db->close();
?>

<main>
    <h2>Add a New Book</h2>

    <!-- Green box if it worked, red box if it didn't -->
    <p class="<?php echo $success ? 'success' : 'error'; ?>">
        <?php echo htmlspecialchars($message); ?>
    </p>

    <p>
        <a href="newbook.php">Add another book</a> |
        <a href="index.php">See all books</a>
    </p>
</main>

<?php include 'footer.php'; ?>
