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

require_once 'entrant.php';

//var_dump($_POST);

function isOriginal($original) {
    if ($original) {
        return '<span class="glyphicon glyphicon-ok"><span style="display:none;">' . $original. '</span></span>';
    } else {
        return '<span class="glyphicon glyphicon-minus"><span style="display:none;">' . $original. '</span></span>';
    }
    
}

function isPozaKonkurs($konkurs) {
    if (trim($konkurs) != '') {
        return '<span class="glyphicon glyphicon-ok"><span >' . $konkurs . '</span></span>';
    } else {
        return '<span class="glyphicon glyphicon-minus"><span style="display:none;">' . $konkurs . '</span></span>';
    }    
}

function showEntrantRating($specialnist, $course, $formaNavch, $okr, $vstupNaOsnovi) {
    global $conn;
    if (($specialnist != '') and ($course != '')) {
        $tableValue = '';
        if ($course != '5') {
            //echo "курс 1 \n";
            $resultTable = $conn->prepare('SELECT `e6`, `e2`, `e8`, `e29`, `e30`, replace(`e12`, ",", ".") as `ce12`, `e41`, `e14`, `e7`, `e43` 
                FROM `entrant`
                WHERE
                (`e14` = :specialnist) and 
                (`e7` = :course) and 
                (`e4` IN ("Допущено") and
                (`e8` = :formaNavch) and
                (`e43` like :vstupNaOsnovi ))
                ORDER BY `ce12` DESC;');
            $resultTable->bindValue(':vstupNaOsnovi', '%'.$vstupNaOsnovi.'%', PDO::PARAM_INT);
        } else {            
            //echo "курс 5 \n" . $specialnist . ' ' . $course . ' ' . $okr;
            
            $resultTable = $conn->prepare('SELECT `e6`, `e2`, `e8`, `e29`, `e30`, replace(`e12`, ",", ".") as `ce12`, `e41`, `e14`, `e7`, `e43`, `e9` 
                FROM `entrant`
                WHERE
                (`e14` = :specialnist) and 
                (`e7` = :course) and 
                (`e9` like :okr ) and
                (`e4` IN ("Допущено") and
                (`e8` = :formaNavch))
                ORDER BY `ce12` DESC;');
            $resultTable->bindValue(':okr', '%'.$okr.'%', PDO::PARAM_STR);

        }

            $resultTable->bindValue(':specialnist', $specialnist, PDO::PARAM_STR);
            $resultTable->bindValue(':course', $course, PDO::PARAM_INT);
            $resultTable->bindValue(':formaNavch', $formaNavch, PDO::PARAM_STR);
            $resultTable->execute();
            
        $i = 1;
        while ($row = $resultTable->fetch()) {
            $original = isOriginal($row['e41']);
            //$pozaKonkurs = isOriginal($row['e30']);
            $pilga = isOriginal($row['e29']);
            $tableValue .= <<< TABLERESULT
            
                    <tr>
                        <td>$i</td>
                        <td>$row[e6]</td>
                        <td>$row[e2]</td>
                        <td>$pilga</td>
                        <td>$row[ce12]</td>
                        <td>$original</td>
                        <td>&nbsp;</td>
                   
                    </tr>
                    
TABLERESULT;
            $i++;
        }
    }
    
    drawTable($tableValue);
    
}

$specialnist = $_POST['specialnist'];
$course = $_POST['course'];
$formaNavch = $_POST['formaNavch'];
$okr = $_POST['okr'];
$vstupNaOsnovi = $_POST['vstupNaOsnovi'];

showEntrantRating($specialnist, $course, $formaNavch, $okr, $vstupNaOsnovi);

//echo "<pre>";
//var_dump($_SERVER);
//echo "</pre>";