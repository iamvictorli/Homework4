<?php

namespace VictorLi\hw4\views\helper;

class graphHelper extends Helper {
    function render($data) {
        ?>
            <div id="<?php echo($data['graphtype']); ?>"></div>
            <script type="text/javascript">
            var graph = new Chart("<?php echo($data['graphtype']); ?>",
                <?php echo($data['data']) ?>, {"title":"<?php echo($data['title']) ?>" , "type": "<?php echo($data['graphtype']); ?>"});
             graph.draw();
            </script>
        <?php
    }
}
