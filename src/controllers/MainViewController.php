<?php

namespace VictorLi\hw4\controller;

use VictorLi\hw4\views as V;
/**
 * Main/Landing Controller of initial site
 */
class MainViewController extends Controller {
    public function invoke($info = []) {

        $LandingView = new V\LandingView();
        $LandingView->render($info);
    }
}
