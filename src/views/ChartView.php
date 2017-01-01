<?php

namespace VictorLi\hw4\views;

use VictorLi\hw4\views\elements as E;
use VictorLi\hw4\configs as C;

class ChartView extends View {
    public function render($data = [])     {
        ?>
            <!DOCTYPE html>
            <html>
                <head>
                    <meta charset="utf-8">
                    <title><?php echo($data['title']); ?></title>
                    <base href=<?php echo(BASE_DIRECTORY . '/'); ?>>
                    <link rel="stylesheet" href="src/styles/main.css">
                    <script src="./src/scripts/chart.js"></script>
                </head>
                <body>
                    <?php
                        $ChartHeading = new E\ChartHeadingElement();
                        $ChartHeading->render($data);

                        $Graph = new E\GraphElement();
                        $Graph->render($data);

                        $URLElement = new E\URLElement();
                        $URLElement->render($data);
                     ?>
                </body>
            </html>
        <?php
    }
}
