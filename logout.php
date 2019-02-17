<?php session_start() ?>
        <!Doctype html>
        <html>
        <head>
            <meta charset="UTF8" >
            <title> Déconnextion</title>
            <body>


                <?php

                session_destroy();
                header ('location:index.html');
                ?>
            </body>
        </head>
        </html>      
