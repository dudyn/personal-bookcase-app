<?php
include 'connect.php';

$id = $_GET['update_id'];

$sql = "select * from `books` where book_id = $id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$title = $row['title'];
$author = $row['author'];
$pagesReadNumber = $row['pages_read_number'] ? $row['pages_read_number'] : '';
$numberOfPages = $row['number_of_pages'];
$dateRead = $row['date_read'] ? $row['date_read'] : null;
$rating = $row['rating'] ? $row['rating'] : '';

// Po nacisnieciu przycisku zatwierdzajacego, wykorzystujac dane w formularzu, dodany zostanie obiekt do bazy danych
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $pagesReadNumber = $_POST['pagesreadnumber'];
    $numberOfPages = $_POST['numberofpages'];
    $dateRead = $_POST['dateread'] ? $_POST['dateread'] : null;
    $rating = $_POST['rating'];

    $sql = "
    UPDATE `books` SET
    title = '$title',
    author = '$author',
    pages_read_number = '$pagesReadNumber',
    number_of_pages = '$numberOfPages',
    date_read = " . ($dateRead ? "'$dateRead'" : 'NULL') . ",
    rating = '$rating'
    WHERE book_id = $id
    ";
    $result = mysqli_query($con, $sql);

    if ($result) {
        //echo "Data updated successfully!";
        header('location:display.php');
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
    <nav class="navbar navbar-light bg-success d-flex align-items-center justify-content-between">
        <div class="d-flex justify-content-start">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-book mx-3" viewBox="0 0 16 16">
                <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
            </svg>
            <div class="fw-bold fs-5 text-center font-monospace">PersonalBookcase App</div>
        </div>
        <button class="btn btn-outline-dark ml-auto mx-2 invisible" onclick="window.location.href = 'index.php';">Add new book</button>
    </nav>

    <div class="container my-3">
        <div class="fw-bold fs-3 font-monospace mb-2">Update the book with id <?php echo $id ?></div>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input class="form-control" type="text" placeholder="Enter the title" name="title" autocomplete="off" value="<?php echo $title; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Author</label>
                <input class="form-control" type="text" placeholder="Enter the author" name="author" autocomplete="off" value="<?php echo $author; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Pages read number</label>
                <input class="form-control" type="number" placeholder="Enter pages read number" name="pagesreadnumber" autocomplete="off" value="<?php echo $pagesReadNumber; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Number of pages</label>
                <input class="form-control" type="number" placeholder="Enter number of pages for the book" name="numberofpages" autocomplete="off" value="<?php echo $numberOfPages; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Date read</label>
                <input class="form-control" type="date" placeholder="Enter read date" name="dateread" autocomplete="off" value="<?php echo $dateRead; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Rating</label>
                <input class="form-control" type="number" placeholder="Enter rating for the book (0-5)" name="rating" autocomplete="off" value="<?php echo $rating; ?>">
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Update</button>
            <button type="button" class="btn btn-dark" onclick="window.location.href = 'display.php';">Back</button>
        </form>
    </div>
</body>

</html>