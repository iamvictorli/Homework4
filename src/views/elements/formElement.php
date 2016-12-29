<?php

namespace VictorLi\hw4\views\elements;

/**
 * form element for the landing views
 */
class formElement extends Element {
    function render($data) {
        ?>
            <form action="http://localhost/homework4/index.php">
                <label for="Chart_Title">Chart title</label>
                <input type="text" name="Chart_Title" id="Chart_Title">

                <textarea name="data" rows="25" cols="50" placeholder="Text label,Value1,Value2,...,Valuen"></textarea>
                <input type="submit" name="submit" value="Share">
            </form>
        <?php
    }
}
