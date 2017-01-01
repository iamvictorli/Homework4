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
                <base href=<?php echo(BASE_DIRECTORY . '/'); ?>>
                <link rel="stylesheet" href="src/styles/main.css">
                <script src="src/scripts/validation.js"></script>
            </head>
            <body>
                <?php
                    $heading = new E\headingElement();
                    $heading->render('PasteChart');

                    $form = new E\formElement();
                    $form->render($data);
                ?>
            </body>
        </html>
        <?php
    }
}
