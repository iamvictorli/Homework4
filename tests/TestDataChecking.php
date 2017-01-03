<?php

require_once('../vendor/autoload.php');

use VictorLi\hw4\controller as C;

/**
 * Unit testing for checking data Server-side
 */
class TestDataChecking extends UnitTestCase {

    function __construct() {
        parent::__construct('Data Checking');
    }
}

$test = new TestDataChecking();
$test->run(new HtmlReporter());
