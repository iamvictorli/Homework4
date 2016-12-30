<?php

namespace VictorLi\hw4;
require './vendor/autoload.php';

use VictorLi\hw4\controller as C;

if (!isset($_REQUEST['c'])) {
    $MainViewController = new C\MainViewController();
    $MainViewController->invoke();
} else {
    if ($_REQUEST['c'] === 'ProcoessController' && $_REQUEST['m'] === 'invoke') {
        $ProcoessController = new C\ProcoessController();
        $ProcoessController->invoke($_REQUEST);
    }
}
