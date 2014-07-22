<?php
    
?>
<!DOCTYPE html>
<!--
 * Copyright (C) 2014 brun
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="lib/twitter/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="lib/twitter/bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="lib/datatables/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <script src="lib/datatables/datatables/media/js/jquery.js" type="text/javascript"></script>
        <script src="lib/datatables/datatables/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="lib/twitter/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <title>Admiss::report</title>
    </head>
    <body class="container-fluid">
        <h3 class="text-center">Інформація про подання документів до<br />
        Івано-Франківського національного технічного університету нафти і газу у 2014 </h3>
        <?php
        require_once 'entrant.php';
       
        showNavbar();
        showTableWrapper();
        
        
        ?>
        
        <footer class="container-fluid">&copy; <a href="http://brun.if.ua/" title="Розробка сайтів">Ігор Броновський</a> 2014. Пропозиції/побажання залишайте <a href="http://brun.if.ua/contact">тут</a></footer>

    </body>
</html>
