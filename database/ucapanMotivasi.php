<?php
include "database.php";
if (isset($_POST["idUcapanMotivasi"])) {
    echo json_encode(getUcapanMotivasi($_POST["idUcapanMotivasi"]));
} else {
    http_response_code(403); // Set HTTP status code to 403 Forbidden
    echo json_encode(array("error" => "Forbidden", "message" => "You are not allowed to access this resource."));
    exit;
}

