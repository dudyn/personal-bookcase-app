<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['search_input'])) {
        $search_value = $_POST['search_input'];
    }
    else{
        $search_value = '';
    }
}
?>