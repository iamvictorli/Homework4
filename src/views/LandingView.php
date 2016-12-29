<?php

namespace VictorLi\hw4\views;

use VictorLi\hw4\views\elements as E;

/**
 * Initial landing page
 */
class LandingView extends View {
    function render($data = []) {
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <title>PasteChart</title>
                <link rel="stylesheet" href="src/styles/main.css">
            </head>
            <body>
                <?php
                    $heading = new E\headingElement();
                    $heading->render('PasteChart');

                    // $form = new E\form();
                    // $form->render();
                ?>
            </body>
        </html>
        <?php
    }
}
