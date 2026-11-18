# Books

## Setup

1. Open `sql/books.sql` in MySQL Workbench and run it. This creates the database and adds 6 books.
2. Open `db.php` and change `yourpassword` to your MySQL password.
3. In a terminal inside this folder, run `php -S localhost:8000`.
4. Go to http://localhost:8000 in a browser.

## How to use

1. The **Home** page shows every book in the database.
2. Click **Add a Book** to open the form.
3. Fill in the ISBN, author, title, genre and price, then click **Add Book**.
4. A green message means the book was saved. A red message tells you what to fix.
5. Go back to **Home** to see your new book at the top of the list.

## How it works with the database

1. `db.php` connects to the MySQL database. Every page that needs the database includes this file.
2. When you submit the form, it sends the data to `insert_book.php` using POST.
3. `insert_book.php` checks that every field is filled in, the ISBN is 10 or 13 numbers, and the book isn't already saved.
4. If everything is good, it saves the book into the `books` table using a prepared statement. This keeps the user's input separate from the SQL to protect against SQL injection.
5. The Home page runs a `SELECT` query on the `books` table and shows every book, newest first.

To see the saved data directly, run this in MySQL Workbench:

    SELECT * FROM books.books;

## Extra features

- Genre field with a dropdown
- Duplicate ISBN check
- Book count on the home page
- Shared header and footer on every page