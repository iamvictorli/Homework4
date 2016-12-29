<?php

namespace VictorLi\hw4\views\elements;

/**
 * heading element used for views
 */
class headingElement extends Element {
    function render($data) {
        ?>
            <h1><?php echo($data); ?></h1>
            <p>Share your data in charts!</p>
        <?php
    }
}
