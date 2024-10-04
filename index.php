<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Library Management System</h1>
        
        <!-- Add New Book Form -->
        <div class="form-section">
            <h2>Add New Book</h2>
            <form id="addBookForm" action="add.php" method="POST">
                <input type="text" name="title" placeholder="Title" required>
                <input type="text" name="author" placeholder="Author" required>
                <input type="number" name="publication_year" placeholder="Publication Year" required>
                <input type="text" name="genre" placeholder="Genre" required>
                <button type="submit">Add Book</button>
            </form>
        </div>

        <!-- Book List -->
        <div class="book-list">
            <h2>Book List</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Publication Year</th>
                        <th>Genre</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="bookList">
                    <?php
                    $sql = "SELECT * FROM books";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr data-id='{$row['id']}'>
                                    <td>{$row['id']}</td>
                                    <td>{$row['title']}</td>
                                    <td>{$row['author']}</td>
                                    <td>{$row['publication_year']}</td>
                                    <td>{$row['genre']}</td>
                                    <td>
                                        <button class='editBtn'>Edit</button>
                                        <button class='deleteBtn'>Delete</button>
                                    </td>
                                </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="js/main.js"></script>

    
</body>
</html>