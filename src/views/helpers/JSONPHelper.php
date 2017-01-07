<?php

namespace VictorLi\hw4\views\helper;

class JSONPHelper extends Helper {
    function render($data) {
        ?>
            <pre><?php echo($data['callback'] . '(' . $data['data'] . ')'); ?></pre>
        <?php
    }
}
