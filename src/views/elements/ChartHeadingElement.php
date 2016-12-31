<?php

namespace VictorLi\hw4\views\elements;

/**
 * haeding element for Charts
 */
class ChartHeadingElement extends Element {
    public function render($data) {
        ?>
            <h1><?php echo($data['md5'] . ' ' . $data['graphtype'] . ' - PasteChart'); ?></h1>
        <?php
    }
}
