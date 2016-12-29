<?php

namespace VictorLi\hw4\controller;

/**
 * Abstract class of controller
 */
abstract class Controller {
    abstract public function invoke($info = []);
}
