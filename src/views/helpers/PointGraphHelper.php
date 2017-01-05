<?php

namespace VictorLi\hw4\views\helper;

class PointGraphHelper extends Helper {
    function render($data) {
        ?>
            <div id="PointGraph"></div>
            <script type="text/javascript">
            var graph = new Chart("PointGraph",
                <?php echo($data['data']) ?>, {"title":"<?php echo($data['title']) ?>" , "type": "PointGraph"});
             graph.draw();
            </script>
        <?php
    }
}
