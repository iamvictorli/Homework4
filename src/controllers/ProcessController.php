<?php

namespace VictorLi\hw4\controller;

use VictorLi\hw4\views as V;
use VictorLi\hw4\model as M;
use VictorLi\hw4\configs as C;

/**
 * Server-side validation on user-input
 */
class ProcoessController extends Controller {
    public function invoke($info = []) {
        $chartInfo = [];
        $chartInfo['Title'] = $info['Chart_Title'];
        $chartInfo['data'] = preg_replace( '/\h+/', '' , $info['data']); //remove all whitespaces excluding new lines

        $data = [];
        if ($this->validate($chartInfo)) {

            $data['title'] = $chartInfo['Title'];

            //convert data to json
            $jsonData = $this->convertToJson($chartInfo['data']);

            $data['data'] = $jsonData;
            $data['md5'] = hash("md5", $chartInfo['data']);
            //save all info to database
            $addDataModel = new M\addDataModel();
            $addDataModel->doQuery($data);

            //then head to line graph
            header('Location:' . BASE_URL .'/?c=chart&a=show&arg1=LineGraph&arg2=' . $data['md5']);
            exit;
        } else {
            $LandingView = new V\LandingView();
            $data['error'] = 'There has been an error in your input. Please make sure to have a title and conform data to the syntax';
            $LandingView->render($data);
        }
    }

    public function validate($info) {
        if (strlen($info['Title']) <= 0 || strlen($info['data']) <= 0 ) { return false; }

        $formatdata = preg_replace("/\r\n/", "\n", $info['data']);

        $lines = explode('\n', $formatdata);
        if (count($lines) > 50) { return false; }

        foreach ($lines as $lineValue) {
            if (count($lineValue) > 80) { return false; }
            $removeSpacesLine = preg_replace("/\s+/", "", $lineValue);

            //splitLines is an array that seperates all the commas in the line
            $splitLines = explode(',', $removeSpacesLine);
            if (ctype_alpha($splitLines[0]) && strlen($splitLines[0]) > 0 && count($splitLines) > 1 && count($splitLines) <= 6) {

                for ($i=1; $i < count($splitLines); $i++) {
                    if (!is_numeric($splitLines[$i])) {
                        return false;
                    }
                }

            } else {
                return false;
            }
        }

        return true;
    }

    public function convertToJson($data) {
        $formatdata = preg_replace("/\r\n/", "\n", $data);
        $jsonData = '{';

        $seperateLines = explode("\n", $formatdata);

        $FirstLine = true;
        foreach ($seperateLines as $lines) {
            //first line in data should not start with a comma
            if (!$FirstLine) {
                $jsonData .= ',';
            } else $FirstLine = false;

            //seperate $xvalue as the first coordinate,and the rest in an array in $yvalue
            list($xvalue, $yvalue) = explode(',', $lines, 2);
            $jsonData .= '"' . $xvalue . '":'; // "xvalue:"

            $yCoordinates = explode(',', $yvalue);
            if (count($yCoordinates) > 1) { //more than 1 coordinate. Store it as an array of y coordinates
                $jsonData .= '[';

                foreach ($yCoordinates as $y) {
                    if (empty($y) && $y !== '0') {
                        $jsonData .= 'null,';
                    } else {
                        $jsonData .= $y . ',';
                    }
                }

                $jsonData = rtrim($jsonData, ",");
                $jsonData .= ']';
            } else {
                if (empty($yvalue) && $yvalue !== '0') {
                    $jsonData .= 'null,';
                } else {
                    $jsonData .= $yvalue;
                }
            }
        }

        $jsonData .= '}';
        return $jsonData;
    }
}
