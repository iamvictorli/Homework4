<?php

namespace VictorLi\hw4\views\helper;

/**
 * display Line graph
 */
class LineGraphHelper {
    function render($data) {
        ?>
            <div id="LineGraph"></div>
            <script type="text/javascript">
            var graph = new Chart("LineGraph",
                <?php echo($data['data']) ?>, {"title":"<?php echo($data['title']) ?>"});
             graph.draw();
            </script>
        <?php
    }
}
