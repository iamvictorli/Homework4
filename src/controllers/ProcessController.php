<?php

namespace VictorLi\hw4\controller;

use VictorLi\hw4\views as V;
use VictorLi\hw4\model as M;

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
            $data['data'] = $chartInfo['data'];
            $data['md5'] = hash("md5", $chartInfo['data']);
            //save all info to database
            $addDataModel = new M\addDataModel();
            $addDataModel->doQuery($data);

            //then head to line graph
        } else {
            $LandingView = new V\LandingView();
            $data['error'] = 'There has been an error in your input. Please make sure to have a title and conform data to the syntax';
            $LandingView->render($data);
        }
    }

    public function validate($info) {
        if (strlen($info['Title']) <= 0 || strlen($info['data']) <= 0 ) { return false; }

        $lines = explode('\n', $info['data']);
        if (count($lines) > 50) { return false; }

        foreach ($lines as $lineValue) {
            if (count($lineValue) > 80) { return false; }

            //splitLines is an array that seperates all the commas in the line
            $splitLines = explode(',', $lineValue);
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
}
