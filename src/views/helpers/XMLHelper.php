<?php

namespace VictorLi\hw4\views\helper;

use VictorLi\hw4\configs as C;

class XMLHelper extends Helper {
    function render($data) {
        ?>
        <pre>&lt;&quest;?xml version="1.0" encoding="UTF-8"?>' <br>
            &lt;&#33;DOCTYPE Datapoints SYSTEM http://localhost/chart.dtd"> <br>
        &lt;DataPoints&gt;

        <?php
        $DataInArray = json_decode($data['data']);

        $output = '';

        foreach ($DataInArray as $key => $value) {
            $countYValues = 1;
            $output .= "\t" . '&lt;X title="' . $key . '"&gt;' . "\n";

            if (is_array($value)) {

                foreach ($value as $yvalues) {
                    $output .= "\t\t" . '&lt;Y' . $countYValues . '>' . $yvalues . '&lt;/Y' . $countYValues . '>' . "\n";
                    $countYValues++;
                }

            } else {
                $output .= "\t\t" . '&lt;Y1>' . $value . '&lt;/Y1>' . "\n";
            }
            $output .= "\t" . '&lt;/X>' . "\n";
        }

        echo($output);

        ?>
        &lt;/DataPoints&gt;
        </pre>
        <?php
    }
}
