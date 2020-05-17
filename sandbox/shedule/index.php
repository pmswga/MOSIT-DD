<?php

    require_once "vendor/autoload.php";

    $inputFileName = 'shedule.xlsx';

    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $spreadsheet = $reader->load($inputFileName);
    $schedule = $spreadsheet->getActiveSheet();
    
    
    $countRow = $schedule->getHighestRow();
    $countColumn = $schedule->getHighestColumn();
    $columnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($countColumn);
    
    $groups = [];
    
    for ($row = 1; $row <= $countRow; $row++) {
        for ($col = 1; $col <= $columnIndex; $col++) {
            $value = $schedule->getCellByColumnAndRow($col, $row)->getValue();
            
            if (preg_match('/[А-Я]{4}-[0-9]{2}-[0-9]{2}/i', $value)) {
                $groups[] = [
                    'group' => $value,
                    'col' => $col,
                    'row' => $row
                ];
            }
            
        }
    }
    
    
    foreach ($groups as &$group) {
        $col = $group['col'];
        $row = $group['row'] + 2;
        $countPairs = 1;
        $day = 1;
        $isEven = false;
        
        for ($row; $row <= 72; $row++) {
            $subject = $schedule->getCellByColumnAndRow($col, $row)->getValue();
            
            
            if ($countPairs <= 12) {
                
                    if (!$isEven) {
                        $group['subjetcs'][$day][] = $subject."_even";
                        $isEven = true;
                    } else {
                        $group['subjetcs'][$day][] = $subject."_odd";
                        $isEven = false;
                    }
                    
                $countPairs++;
            } else {
                $countPairs = 1;
                $day++;
            }
            
            
        }
        
    }
    
    echo "<pre>";
    print_r($groups);
    echo "</pre>";
    
    exit();

    $count = 0;
    for ($column = 6; !empty($schedule->getCellByColumnAndRow($column, 2)->getValue()); $column += 4) {
        $count += 1;
        
        if (strtolower($schedule->getCellByColumnAndRow($column, 2)->getValue()) != strtolower("День недели")) {
            echo "<fieldset>";
            echo "<legend>";
            echo "<h3>".$schedule->getCellByColumnAndRow($column, 2)->getValue()."</h3>";
            echo "</legend>";
            
            echo "<ol>";
            for ($row = 4; $row <= 75; $row++) {
                $cell = $schedule->getCellByColumnAndRow($column, $row)->getValue();
                
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
                echo "<li><b>Вид занятий:</b> ".$schedule->getCellByColumnAndRow($column+1, $row)->getValue()."</li>";
                echo "<li><b>ФИО преподавателя:</b> ".$schedule->getCellByColumnAndRow($column+2, $row)->getValue()."</li>";
                echo "</ul>";
                
                echo "</li>";
                
            }
            echo "</ol>";
            
            
            echo "</fieldset>";
        }
    }


?>