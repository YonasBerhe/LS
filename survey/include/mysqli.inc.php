<?php

// Establish a connection to the database
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// If we have a MySQLi error
if (mysqli_connect_errno()) {

    // TODO: This should redirect to a page showing that the site is down for maintenance

    printf("Connect failed: %s\n", mysqli_connect_error());
    exit;

}