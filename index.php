<?php
// home page that lists every book in the database
include 'db.php';
include 'header.php';

// Get all books, newest first
$result = $db->query("SELECT isbn, author, title, genre, price FROM books ORDER BY added_on DESC");
?>

<main>
    <!-- Welcome banner -->
    <section class="hero">
        <h2>Welcome to Books</h2>
        <p>We have <?php echo $result->num_rows; ?> books in stock right now.</p>
    </section>

    <h2>Our Books</h2>

    <!-- One box for each book in the database -->
    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="book">
            <!-- htmlspecialchars stops anyone from sneaking code into the page -->
            <h3><?php echo htmlspecialchars($row['title']); ?></h3>
            <p>
                <?php echo htmlspecialchars($row['author']); ?> |
                <?php echo htmlspecialchars($row['genre']); ?> |
                $<?php echo number_format($row['price'], 2); ?>
            </p>
            <p class="isbn">ISBN: <?php echo htmlspecialchars($row['isbn']); ?></p>
        </div>
    <?php endwhile; ?>
</main>

<?php
$db->close();
include 'footer.php';
?>
