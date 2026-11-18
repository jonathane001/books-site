<?php
// form for adding a new book.
// When submitted, it sends the data to insert_book.php.
include 'header.php';
?>

<main>
    <h2>Add a New Book</h2>

    <form action="insert_book.php" method="post">
        <label for="isbn">ISBN</label>
        <input type="text" id="isbn" name="isbn" maxlength="13" required>

        <label for="author">Author</label>
        <input type="text" id="author" name="author" maxlength="50" required>

        <label for="title">Title</label>
        <input type="text" id="title" name="title" maxlength="100" required>

        <label for="genre">Genre</label>
        <select id="genre" name="genre" required>
            <option value="Fiction">Fiction</option>
            <option value="Programming">Programming</option>
            <option value="Technology">Technology</option>
            <option value="History">History</option>
            <option value="Science">Science</option>
        </select>

        <label for="price">Price ($)</label>
        <input type="number" id="price" name="price" step="0.01" min="0" required>

        <button type="submit">Add Book</button>
    </form>
</main>

<?php include 'footer.php'; ?>
