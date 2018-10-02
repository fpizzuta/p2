<?php
//require 'Form.php';
//$form = new DWA\Form($_GET);
# Start the session, since we'll be using it below
session_start();
# Get the data from the session

$results = $_SESSION['results'] ?? null;

# Clear the session
session_unset();