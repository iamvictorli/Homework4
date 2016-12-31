<?php

namespace VictorLi\hw4\model;

/**
 * model for getting data, using the hashed data
 */
class getDataModel extends Model {
    public function doQuery($data = []) {
        $md5 = $data['arg2'];
        $connection = mysqli_connect(HOST, USERNAME, PASSWORD, DB_NAME);
        $query = '';

        if ($connection) {
            $query = "SELECT data, title
                        FROM DataPoints
                        WHERE md5 = '" . $md5 . "'";
        }
        $result = $connection->query($query);
        $connection->close();
        return $result;
    }
}
