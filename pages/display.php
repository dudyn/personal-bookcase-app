<?php
include 'functions/connect.php';
include 'functions/search.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>PersonalBookcase App</title>
</head>

<body class="bg-light">

    <div class="container">
        <div class="fw-bold fs-3 mt-3 font-monospace">Book list</div>
        <table class="table table-bordered">
            <thead class="bg-dark text-light">
                <tr>
                    <th scope="col">Book id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Pages read number</th>
                    <th scope="col">Number of pages</th>
                    <th scope="col">Date read</th>
                    <th scope="col">Rating (0-5)</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($search_value)){
                    $sql = "Select * from `books` where `title` like '%$search_value%' or `author` like '%$search_value%' or `book_id` = '$search_value'";
                }
                else{
                    $sql = "Select * from `books`";
                }
                $result = mysqli_query($con, $sql);
                if ($result) {
                    $num_rows = mysqli_num_rows($result);
                    if ($num_rows==0){
                        echo '<tr>
                            <th scope="row">-</th>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>';
                    }
                    else{
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['book_id'];
                            $title = $row['title'];
                            $author = $row['author'];
                            $pages_read_number = $row['pages_read_number'];
                            if (!$pages_read_number) {
                                $pages_read_number = 0;
                            }
                            $number_of_pages = $row['number_of_pages'];
                            $date_read = $row['date_read'];
                            if (!$date_read) {
                                $date_read = '-';
                            }
                            $rating = $row['rating'];
                            if (!$rating) {
                                $rating = '-';
                            }
                            echo '<tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $title . '</td>
                            <td>' . $author . '</td>
                            <td>' . $pages_read_number . '</td>
                            <td>' . $number_of_pages . '</td>
                            <td>' . $date_read . '</td>
                            <td>' . $rating . '</td>
                            <td class="d-flex justify-content-center">
                            <button class="btn btn-primary mx-1" onclick="window.location.href = \'pages/update.php?update_id=' . $id . '\';">Update</button>
                            <button class="btn btn-danger mx-1" onclick="window.location.href = \'../functions/delete.php?delete_id=' . $id . '\';">Delete</button>
                            </td>
                        </tr>';
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>