$(document).ready(function() {
    // Delete a book
    $('.deleteBtn').click(function() {
        const id = $(this).closest('tr').data('id');
        if (confirm('Are you sure you want to delete this book?')) {
            window.location.href = `delete.php?id=${id}`;
        }
    });

    // Edit a book (prefill the form with current data)
    $('.editBtn').click(function() {
        const row = $(this).closest('tr');
        const id = row.data('id');
        const title = row.find('td:eq(1)').text();
        const author = row.find('td:eq(2)').text();
        const publication_year = row.find('td:eq(3)').text();
        const genre = row.find('td:eq(4)').text();

        // Populate form fields for editing
        $('#addBookForm').attr('action', 'update.php');
        $('#addBookForm').append(`<input type="hidden" name="id" value="${id}">`);
        $('#addBookForm input[name="title"]').val(title);
        $('#addBookForm input[name="author"]').val(author);
        $('#addBookForm input[name="publication_year"]').val(publication_year);
        $('#addBookForm input[name="genre"]').val(genre);
        $('button[type="submit"]').text('Update Book');
    });
});