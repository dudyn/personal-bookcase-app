<?php
include '../functions/connect.php';
include 'nav.php';

// Po nacisnieciu przycisku zatwierdzajacego, wykorzystujac dane w formularzu, dodany zostanie obiekt do bazy danych
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $numberOfPages = $_POST['numberofpages'];

    $sql = "insert into `books` (title, author, number_of_pages) values ('$title', '$author', '$numberOfPages')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        //echo "Data inserted successfully!";
        header('location:/');
    } else {
        die(mysqli_error($con));
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>PersonalBookcase App</title>
</head>

<body class="bg-light">
    <div class="container my-3">
        <div class="fw-bold fs-3 font-monospace mb-2">Add new book</div>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input class="form-control" type="text" placeholder="Enter the title" name="title" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Author</label>
                <input class="form-control" type="text" placeholder="Enter the author" name="author" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Number of pages</label>
                <input class="form-control" type="number" placeholder="Enter number of pages for the book" name="numberofpages" autocomplete="off">
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-dark" onclick="window.location.href = '/';">Back</button>
        </form>
    </div>
</body>

</html>