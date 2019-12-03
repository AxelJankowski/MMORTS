<?php
    require_once("system/config.php");

    if ($maintenance == true) {
        echo "The site is under construction.";
    } elseif ($maintenance == false) {
        ?>
            <html lang="en">
                <head>
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

                    <title><?php echo $title.$separator.$description; ?></title>

                    <link href="frontend/design/css/bootstrap.css" rel="stylesheet">
                    <link href="frontend/design/css/style.css" rel="stylesheet">
                </head>

                <body>
                    <div id="container">
                        <div>
                            header
                        </div>
                        <div>
                            content
                        </div>
                        <div>
                            footer
                        </div>
                    </div>
                </body>
            </html>
        <?php
    }
?>