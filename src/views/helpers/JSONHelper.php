<?php

namespace VictorLi\hw4\views\helper;

class JSONHelper extends Helper {
    function render($data) {
        ?>
            <pre><?php echo($data['data']); ?></pre>
        <?php
    }
}
