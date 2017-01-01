<?php

namespace VictorLi\hw4\views\elements;

use VictorLi\hw4\views\helper as H;

/**
 * All the differenet types of graphs to be displayed`
 */
class GraphElement extends Element {
    function render($data) {
        if($data['graphtype'] === 'LineGraph') {
            $LineGraph = new H\LineGraphHelper();
            $LineGraph->render($data);
        } else if($data['graphtype'] === 'PointGraph') {
            $PointGraph = new H\PointGraphHelper();
            $PointGraph->render($data);
        } else if($data['graphtype'] === 'Histogram') {
            $Histogram = new H\HistogramHelper();
            $Histogram->render($data);
        } else if($data['graphtype'] === 'XML') {
            $XML = new H\XMLHelper();
            $XML->render($data);
        } else if($data['graphtype'] === 'JSON') {
            $JSON= new H\JSONHelper();
            $JSON->render($data);
        } else if($data['graphtype'] === 'JSONP') {
            $JSONP = new H\JSONPHelper();
            $JSONP->render($data);
        } else {
            echo('there has been an error in the URL');
        }
    }
}
