<?php

namespace VictorLi\hw4\configs;
require_once('config.php');

$connection = mysqli_connect(HOST, USERNAME, PASSWORD);

if($connection) {
    $query = "CREATE DATABASE " . DB_NAME;

    $connection->query($query);

    mysqli_select_db($connection, DB_NAME);

    $query = "CREATE TABLE DataPoints(
                md5 VARCHAR(255),
                title VARCHAR(255),
                data VARCHAR(4000)
    )";
    $connection->query($query);
}

$connection->close();
