<?php
require 'Form.php';
require 'Event.php';
session_start();

$myCost = new Frank\Event($_GET);
$form = new DWA\Form($_GET);
$submitted = $form->isSubmitted();

if ($submitted) {
    $errors = $form->validate(
        [
            'firstName' => 'required|alpha',
            'lastName' => 'required|alpha',
            'trackName' => 'required',
            'guests' => 'required|digit|min:0|max:5',
        ]
    );
}

$firstName = $_GET['firstName'] ?? false;
$lastName = $_GET['lastName'] ?? false;
$trackName = $_GET['trackName'] ?? false;
$guests = $_GET['guests'] ?? false;
$diet = $_GET['diet'] ?? false;
$cost = $myCost->cost($guests);

$_SESSION['results'] = [
    'firstName' => $firstName,
    'lastName' => $lastName,
    'trackName' => $trackName,
    'guests' => $guests,
    'diet' => $diet,
    'errors' => $errors,
    'cost' => $cost,
];

# Redirect the user page to the page that shows the form
header('Location: index.php');
