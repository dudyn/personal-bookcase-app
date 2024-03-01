<?php
include '../functions/connect.php';
include 'nav.php';

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
            <button type="button" class="btn btn-dark" onclick="window.location.href = '/';">Back</button>
        </form>
    </div>
</body>

</html>