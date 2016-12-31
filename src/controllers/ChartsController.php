<?php

namespace VictorLi\hw4\controller;

use VictorLi\hw4\views as V;
use VictorLi\hw4\model as M;

/**
* contrller to show the different charts
 */
class ChartsController extends Controller {
    public function invoke($info = []) {
        $getDataModel = new M\getDataModel();
        $result = $getDataModel->doQuery($info);

        $row = $result->fetch_assoc();
        $data = [];
        $data['title'] = $row['title'];
        $data['data'] = $row['data'];
        $data['md5'] = $info['arg2'];
        $data['graphtype'] = $info['arg1'];

        $ChartView = new V\ChartView();
        $ChartView->render($data);
    }
}
