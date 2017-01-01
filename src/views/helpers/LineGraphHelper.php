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
                {"Jan":7, "Feb":20, "Dec":5}, {"title":"<?php echo($data['title']) ?>"});
             graph.draw();
            </script>
        <?php
    }
}
