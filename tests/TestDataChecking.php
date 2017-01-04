<?php

require_once('../vendor/autoload.php');

use VictorLi\hw4\controller as C;

/**
 * Unit testing for checking data Server-side
 */
class TestDataChecking extends UnitTestCase {

    function __construct() {
        parent::__construct('Server data validation');
    }

    function testHasTitle() {
        $ProcessController = new C\ProcessController();
        $testData = ['Title' => '', 'data' => 'test, 1'];
        $this->assertFalse($ProcessController->validate($testData), 'title has no title');

        $testData['Title'] = 'Now there is a title';
        $this->assertTrue($ProcessController->validate($testData), 'title now has a title');
    }

    function testSingleLineData() {
        $ProcessController = new C\ProcessController();
        $testData = ['Title' => 'test', 'data' => ''];
        $this->assertFalse($ProcessController->validate($testData), 'data is empty');

        $testData['data'] = 'test';
        $this->assertFalse($ProcessController->validate($testData), '0 sources');

        $testData['data'] = 'test, 1';
        $this->assertTrue($ProcessController->validate($testData), '1 source');

        $testData['data'] = 'test, 1, 2';
        $this->assertTrue($ProcessController->validate($testData), '2 sources');

        $testData['data'] = 'test, 1, 2 ,3';
        $this->assertTrue($ProcessController->validate($testData), '3 sources');

        $testData['data'] = 'test, 1,2,3,      4';
        $this->assertTrue($ProcessController->validate($testData), '4 sources');

        $testData['data'] = 'test, 1,2,3,4 ,';
        $this->assertTrue($ProcessController->validate($testData), '4 sources and comma');

        $testData['data'] = 'test, 1,2,3,4,5';
        $this->assertTrue($ProcessController->validate($testData), '5 sources');

        $testData['data'] = 'test, 1,2,3,4,5  ,';
        $this->assertFalse($ProcessController->validate($testData), '5 sources and comma');

        $testData['data'] = 'test, 1,2,3,4,5,6';
        $this->assertFalse($ProcessController->validate($testData), '6 sources');

        $testData['data'] = 'test, 1,2,3,4,5,6,7';
        $this->assertFalse($ProcessController->validate($testData), '7 sources');

        $testData['data'] = '1,2,3,4,5';
        $this->assertFalse($ProcessController->validate($testData), 'Just numbers');

        $testData['data'] = 'test, , 1,2,3';
        $this->assertTrue($ProcessController->validate($testData), 'first source is empty');

        $testData['data'] = 'test, , ,1,2';
        $this->assertTrue($ProcessController->validate($testData), 'first and second source are empty');

        $testData['data'] = 'test, 1, 2,,';
        $this->assertTrue($ProcessController->validate($testData), 'last two souces are empty');

        $testData['data'] = ', 1,2,3,4,5';
        $this->assertFalse($ProcessController->validate($testData), 'first coordinate is empty');

        $testData['data'] = 'test, 1, a,2,3,4';
        $this->assertFalse($ProcessController->validate($testData), 'one of the sources is not a number');

        $testData['data'] = 'test, 1,2,3,4,555555555555555555555555555555555555555555555555555555555555555555';
        $this->assertTrue($ProcessController->validate($testData), 'length of data is 80');

        $testData['data'] .= '5';
        $this->assertFalse($ProcessController->validate($testData), 'length of data is 81');
    }

    function testNumberOfLines() {
        $ProcessController = new C\ProcessController();
        $testData = ['Title' => 'test', 'data' => 'test,1,2,3'];
        $this->assertTrue($ProcessController->validate($testData), 'One line of data');

        $testData['data'] .= '\n';
        $this->assertFalse($ProcessController->validate($testData), 'accidental new line');

        $testData['data'] .= 'test, 1, 2, 3, 4, 5';
        $this->assertTrue($ProcessController->validate($testData), 'Two lines of data');

        $str = '';
        for ($i=1; $i <= 49; $i++) {
            $str = $str . 'test, 1, 2, 3, 4, 5';
            if($i != 49) { $str .= '\n'; }
        }

        $testData['data'] = $str;
        $this->assertTrue($ProcessController->validate($testData), '49 lines of data');

        $testData['data'] .= '\ntest, 1,2,3,4,5';
        $this->assertTrue($ProcessController->validate($testData), '50 lines of data');

        $testData['data'] .= '\ntest, 1,2,3,4,5';
        $this->assertFalse($ProcessController->validate($testData), '51 lines of data');
    }
}

$test = new TestDataChecking();
$test->run(new HtmlReporter());
