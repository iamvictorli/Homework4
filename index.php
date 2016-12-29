<?php

namespace VictorLi\hw4;
require './vendor/autoload.php';

use VictorLi\hw4\controller as C;

$MainViewController = new C\MainViewController();
$MainViewController->invoke();
