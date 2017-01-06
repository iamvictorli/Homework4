<?php

namespace VictorLi\hw4\views\elements;

use VictorLi\hw4\views\helper as H;

/**
 * All the differenet types of graphs to be displayed`
 */
class GraphElement extends Element {
    function render($data) {
        if($data['graphtype'] === 'LineGraph' || $data['graphtype'] === 'PointGraph' || $data['graphtype'] === 'Histogram') {
            $graph = new H\graphHelper();
            $graph->render($data);

        } else if($data['graphtype'] === 'xml') {
            $XML = new H\XMLHelper();
            $XML->render($data);
        } else if($data['graphtype'] === 'json') {
            $JSON= new H\JSONHelper();
            $JSON->render($data);
        } else if($data['graphtype'] === 'jsonp') {
            $JSONP = new H\JSONPHelper();
            $JSONP->render($data);
        } else {
            echo('there has been an error in the URL');
        }
    }
}
