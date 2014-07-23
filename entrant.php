<?php

/*
 * Copyright (C) 2014 Brun
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
 */

require_once 'config.php';

// вибір спеціальностей
function getSpecialnist() {
    global $conn;
    $resultSpecialnist = $conn->prepare('SELECT `e14` FROM `entrant` GROUP BY `e14` ASC');
    $resultSpecialnist->execute();

    echo '<div class="col-md-3">';
    echo '<label>Напрям підготовки</label>';
    echo '<select name="specialnist" id="specialnist" class="form-control">';
    while ($row = $resultSpecialnist->fetch()) {
        echo '<option>' . ($row['e14']) . '</option>' . "\n";
    }
    echo '</select></div>';
}

// вибір спеціальностей
function getCourse() {
    global $conn;
    $resultSpecialnist = $conn->prepare('SELECT `e7` FROM `entrant` GROUP BY `e7` ASC');
    $resultSpecialnist->execute();
    
    echo '<div class="col-md-2">';
    echo '<label>Курс</label>';
    echo '<select name="course" id="course" class="form-control">';
    while ($row = $resultSpecialnist->fetch()) {
        echo '<option>' . ($row['e7']) . '</option>' . "\n";
    }
    echo '</select></div>';
}

function getFormaNavchannya() {
    global $conn;
    $resultSpecialnist = $conn->prepare('SELECT `e8` FROM `entrant` GROUP BY `e8` ASC');
    $resultSpecialnist->execute();
    
    echo '<div class="col-md-2">';
    echo '<label>Форма навчання</label>';
    echo '<select name="forma-navch" id="forma-navch" class="form-control">';
    while ($row = $resultSpecialnist->fetch()) {
        echo '<option>' . ($row['e8']) . '</option>' . "\n";
    }
    echo '</select></div>';
}

function getVstupylyNaOsnovi() {
    echo '<div class="col-md-2" id="vstup-na">';
    echo '<label>Вступили на основі</label>';
    echo '<select name="vstup-na-osnovi" id="vstup-na-osnovi" class="form-control">' . "\n";
    echo '<option value="102">Загальної середньої освіти</option>' . "\n";
    echo '<option value="104">ОКР молодшого спеціаліста</option>' . "\n";    
    echo '</select></div>' . "\n";
}

function showNavbar() {
    echo <<< NAVBAR
    <div class="container">

    <form>
        <div class="form-group">
    
NAVBAR;

    getSpecialnist();
    getCourse();
    getFormaNavchannya();
    getVstupylyNaOsnovi();

    echo <<< NAVBAR
    
        <div class="col-md-2" id="okr-col" style="display: none;">
            <label>ОКР</label>
            <select name="okr" id="okr" class="form-control">
                <option>Спеціаліст</option>
                <option>Магістр</option>
            </select>
        </div>
        
        <div class="col-md-2">
            <label> &nbsp; </label>
            <button type="button" class="btn btn-primary form-control" id="showResult">Показати</button>
        </div>
        </div>
    </form>

    </div>
NAVBAR;

}

function showTableWrapper() {
    $sitePath = dirname($_SERVER['SCRIPT_NAME']) . "/getData.php";
    echo <<< TABLE
    <br />
    <div id="table-wrapper" class="container" style="min-height: 340px;">
    
    </div>
    
    <script>
        $("#showResult").click(function() {
            $("#table-wrapper").load("$sitePath", {
                specialnist: $('#specialnist').val(), 
                course: $('#course').val(),                 
                okr: $('#okr').val(),
                formaNavch: $('#forma-navch').val(),
                vstupNaOsnovi: $('#vstup-na-osnovi').val()
                });
        });
        
        $('#course').change(function() {
          var valOKR = $('#course').val();
          //console.log( valOKR );
          switch (valOKR){
            case '1':
                $('#okr-col').hide('slow');
                $('#vstup-na').show('slow');
                break;
            case '5':
                $('#vstup-na').hide('slow');
                $('#okr-col').show('slow');
                break;
          };
        });

    </script>
   
TABLE;

}

function drawTable($tableValue) {
    echo <<< TABLERESULT
    
<table id="resultTable" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>№пп</th>
            <th>№ справи</th>
            <th>ПІБ</th>
            <th>Пільга</th>
            <th>Бал</th>
            <th><abbr title="Оригінал документів">ОД</abbr></th>
            <th>Примітки</th>
        </tr>
    </thead>
 
    <tfoot>
        <tr>
            <th>№пп</th>
            <th>№ справи</th>
            <th>ПІБ</th>
            <th>Пільга</th>
            <th>Бал</th>
            <th><abbr title="Оригінал документів">ОД</abbr></th>
            <th>Примітки</th>
        </tr>
    </tfoot>
 
    <tbody>
        
    $tableValue
            
    </tbody>
</table>     
    
            <script>
            $(document).ready(function() {
                $('#resultTable').dataTable({ 
                "fnDrawCallback": function ( oSettings ) {
                            /* Need to redo the counters if filtered or sorted */
                            if ( oSettings.bSorted || oSettings.bFiltered )
                            {
                                    for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
                                    {
                                            $('td:eq(0)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
                                    }
                            }
                    },
                    "aoColumnDefs": [
                            { "bSortable": false, "aTargets": [ 0 ] }
                    ],
                   /* "aaSorting": [[ 1, 'asc' ]], */
            
            
                    /* "order": [[ 5, "desc" ], [ 4, "desc" ]], */
            
                    "order": [[ 4, "desc" ]],
            
                    "aLengthMenu": [
                            [25, 50, 100, 200, -1],
                            [25, 50, 100, 200, "Все"]
                        ], 
                "iDisplayLength" : -1 });
            } );
            </script>
            
            
TABLERESULT;
}

function getUserName() {
    global $conn;
    $resultUserName = $conn->prepare('SELECT * FROM entrant LIMIT 25;');
    $resultUserName->execute();

    while ($row = $resultUserName->fetch()) {
        echo ($row['e2']) . '<br />' . "\n";
    }
}

