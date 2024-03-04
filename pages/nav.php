<?php
include 'functions/search.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">

    <title>PersonalBookcase App</title>
</head>

<body class="bg-light">
    <nav class="navbar navbar-light bg-success d-flex align-items-center justify-content-between">
        <div class="d-flex justify-content-start">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-book mx-3 custom-cursor-pointer" onclick="window.location.href = '/'" viewBox="0 0 16 16">
                <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
            </svg>
            <div class="fw-bold fs-5 text-center font-monospace custom-cursor-pointer" onclick="window.location.href = '/'">PersonalBookcase App</div>
        </div>
        <?php
        $path = $_SERVER['REQUEST_URI'];
        if ($path == '/'){
            echo '
            <div class="d-flex align-items-center justify-content-center">
                <form method="post" class="d-flex my-auto">
                <input type="text" name="search_input" class="form-control ml-auto mx-2 border-dark d-inline-flex w-auto bg-light" value="' . (isset($_POST['search_input']) ? $_POST['search_input'] : '') . '">
                    <button type="submit" class="btn btn-outline-dark ml-auto">Search</button>
                </form>
                <button class="btn btn-outline-dark ml-auto mx-2" onclick="window.location.href = \'pages/add.php\';">Add new book</button>
            </div>
            ';
        }
        else{
            echo '<button class="btn btn-outline-dark ml-auto mx-2 invisible" onclick="window.location.href = \'pages/add.php\';">Add new book</button>';
        }
        ?>
    </nav>
</body>

</html>