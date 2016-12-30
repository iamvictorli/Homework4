<?php

namespace VictorLi\hw4\model;
require_once("./src/configs/config.php");

abstract class Model {
    abstract public function doQuery($data = []);
}
