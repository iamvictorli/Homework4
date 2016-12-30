<?php

namespace VictorLi\hw4;
require './vendor/autoload.php';

use VictorLi\hw4\controller as C;

if (!isset($_REQUEST['c'])) {
    $MainViewController = new C\MainViewController();
    $MainViewController->invoke();
}
