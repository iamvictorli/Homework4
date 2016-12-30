<?php

namespace VictorLi\hw4\controller;

/**
 * Server-side validation on user-input
 */
class ProcoessController extends Controller {
    public function invoke($info = []) {
        $chartInfo = [];
        $chartInfo['Title'] = $info['Chart_Title'];
        $chartInfo['data'] = preg_replace( '/\h+/', '' , $info['data']); //remove all whitespaces excluding new lines

        if ($this->validate($chartInfo)) {

        }
    }

    public function validate($info) {
        
    }
}
