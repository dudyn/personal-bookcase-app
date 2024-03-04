<?php
include '../functions/connect.php';
include '../functions/validation.php';
include 'nav.php';

// Po nacisnieciu przycisku zatwierdzajacego, wykorzystujac dane w formularzu, dodany zostanie obiekt do bazy danych
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $numberOfPages = $_POST['numberofpages'];

    $errorMessage = '';
    if (strlen($title)<3){
        $errorMessage = $errorMessage . "Title's length is too short. <br>";
    }
    if (strlen($author)<3){
        $errorMessage = $errorMessage . "Author's length is too short. <br>";
    }
    if (strlen($numberOfPages)<0 || $numberOfPages<=0){
        $errorMessage = $errorMessage . "Incorrect number of pages value. <br>";
    }
    if ($errorMessage !== ''){
        showDangerMessage($errorMessage);
    }
    else{
        $sql = "insert into `books` (title, author, number_of_pages) values ('$title', '$author', '$numberOfPages')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            //echo "Data inserted successfully!";
            header('location:/');
        } else {
            die(mysqli_error($con));
        }
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>PersonalBookcase App</title>
</head>

<body class="bg-light">
    <div class="container my-3">
        <div class="fw-bold fs-3 font-monospace mb-2">Add new book</div>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input class="form-control" type="text" placeholder="Enter the title" name="title" autocomplete="off" value="<?php echo isset($_POST['title']) ? $_POST['title'] : ''; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Author</label>
                <input class="form-control" type="text" placeholder="Enter the author" name="author" autocomplete="off" value="<?php echo isset($_POST['author']) ? $_POST['author'] : ''; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Number of pages</label>
                <input class="form-control" type="number" placeholder="Enter number of pages for the book" name="numberofpages" autocomplete="off" value="<?php echo isset($_POST['numberofpages']) ? $_POST['numberofpages'] : ''; ?>">
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-dark" onclick="window.location.href = '/';">Back</button>
        </form>
        <?php if (isset($errorMessage)) echo $errorMessage; ?>
    </div>
</body>

</html>