<?php

namespace VictorLi\hw4\views\elements;
use VictorLi\hw4\configs as C;

/**
 * shows all the URL, to display data in other types of graphs or in XML, JSON, or JSONP data
 */
class URLElement extends Element {
    function render($data) {
        ?>
        <pre>
                Share your chart and data at the URLs below:<br>

                As a LineGraph: <br>
                <?php echo(BASE_URL . '/?c=chart&a=show&arg1=LineGraph&arg2=' . $data['md5']) ?><br>

                As a PointGraph: <br>
                <?php echo(BASE_URL . '/?c=chart&a=show&arg1=PointGraph&arg2=' . $data['md5']) ?><br>

                As a Histogram: <br>
                <?php echo(BASE_URL . '/?c=chart&a=show&arg1=Histogram&arg2=' . $data['md5']) ?><br>

                As a XML data: <br>
                <?php echo(BASE_URL . '/?c=chart&a=show&arg1=xml&arg2=' . $data['md5']) ?><br>

                As a JSON data: <br>
                <?php echo(BASE_URL . '/?c=chart&a=show&arg1=json&arg2=' . $data['md5']) ?><br>

                As a JSONP: <br>
                <?php echo(BASE_URL . '/?c=chart&a=show&arg1=jsonp&arg2=' . $data['md5']) . '&arg3=javscript_callback'?><br>
            </pre>
        <?php
    }
}
