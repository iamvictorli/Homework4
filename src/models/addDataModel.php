<?php

namespace VictorLi\hw4\model;

/**
 * model for adding data to database
 */
class addDataModel extends Model{

    public function doQuery($data = []) {
        $connection = mysqli_connect(HOST, USERNAME, PASSWORD, DB_NAME);
        $query = '';

        if ($connection) {
            $query = "INSERT INTO DataPoints (md5, title, data) VALUES
                        ('" . $data['md5'] . "', '" . $data['title'] . "', '" . $data['data'] . "')";
        }
        $result = $connection->query($query);
        $connection->close();
        return $result;
    }
}
