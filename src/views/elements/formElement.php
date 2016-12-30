<?php

namespace VictorLi\hw4\views\elements;

/**
 * form element for the landing views
 */
class formElement extends Element {
    function render($data) {
        ?>
            <form onsubmit="return CheckData();" action="http://localhost/homework4/index.php">
                <input type="hidden" name="c" value="ProcoessController">
                <input type="hidden" name="m" value="invoke">
                <label for="Chart_Title">Chart title</label>
                <input type="text" name="Chart_Title" id="Chart_Title">

                <label for="data">Data</label>
                <textarea id="data" name="data" rows="25" cols="85" placeholder="Text label,Value1,Value2,...,Valuen"></textarea>
                <input type="submit" name="submit" value="Share">
                <div id="error_message"></div>
            </form>
        <?php
    }
}
