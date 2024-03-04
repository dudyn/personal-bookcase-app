<?php

$errorMessage = '';

function showDangerMessage($text){
    global $errorMessage;
    $errorMessage = '<div class="d-flex justify-content-center align-items-center my-4">
        <div class="alert alert-danger">'
            . $text .
        '</div>
    </div>';
}