<?php
include "database.php";
if(isset($_POST["idUcapanMotivasi"])) {
    echo getUcapanMotivasi($_POST["idUcapanMotivasi"]);
} else {
    http_response_code(403); // Set HTTP status code to 403 Forbidden
    echo "403 Forbidden - You are not allowed to access this resource.";
    exit;
}