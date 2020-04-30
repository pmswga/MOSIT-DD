<?php

    require_once "vendor/autoload.php";

    $inputFileName = 'shedule.xlsx';

    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $spreadsheet = $reader->load("shedule.xlsx");
    $shedule = $spreadsheet->getActiveSheet();

    
    //var_dump($spreadsheet);

    for ($column = 6; !empty($shedule->getCellByColumnAndRow($column, 2)->getValue()); $column += 5) {
        
        
        if (strtolower($shedule->getCellByColumnAndRow($column, 2)->getValue()) != strtolower("День недели")) {
            echo "<fieldset>";
            echo "<legend>";
            echo "<h3>".$shedule->getCellByColumnAndRow($column, 2)->getValue()."</h3>";
            echo "</legend>";
            
            echo "<ol>";
            for ($row = 4; $row <= 75; $row++) {
                $cell = $shedule->getCellByColumnAndRow($column, $row)->getValue();
                
                if (strpos($cell, ' н. ')) {
                    $data = explode(' н. ', $cell);
                    $subject = $data[1];
                    
                    $nums = explode(' ', $data[0]);
                    
                    var_dump($nums);
                    
                    
                } else {
                    $subject = $cell;
                }
                
                
                echo "<li>";
                
                echo $subject;
                echo "<ul>";
                echo "<li><b>Вид занятий:</b> ".$shedule->getCellByColumnAndRow($column+1, $row)->getValue()."</li>";
                echo "<li><b>ФИО преподавателя:</b> ".$shedule->getCellByColumnAndRow($column+2, $row)->getValue()."</li>";
                echo "</ul>";
                
                echo "</li>";
                
            }
            echo "</ol>";
            
            
            echo "</fieldset>";
        }
    }


?>