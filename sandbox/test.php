<?php
	require_once "vendor/autoload.php";	

	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
	
	$dsn = 'mysql:dbname=sip_db;host=127.0.0.1:3308';
	$user = 'root';
	$password = '';
	
	class IP
	{
		private $fp;
		private $temp_filename;
		
		public function __construct($file_data) {
			$this->fp = tmpfile();
			
			$this->temp_filename = stream_get_meta_data($this->fp)['uri'];
			
			fputs($this->fp, $file_data);
		}
		
		public function __destruct() {
			fclose($this->fp);
		}
		
		public function getFilename() {
			return $this->temp_filename;
		}
	}
	
	
	try
	{
		//$pdo = new PDO($dsn, $user, $password);
		//$pdo->exec("SET NAMES `utf8`");
		
		
		//$recordList = $pdo->query("SELECT * FROM `IP`;");
		//$record = $recordList->fetchAll();
		
		//$file = new IP($record[0]['excel_file']);
		
		
		//$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file->getFilename());
		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("ИПП Аввакумов Г.Е..xlsx");
		
		$ip_config = [
			0 => [
				"A26",
				"CJ26",
				"Q27",
				"AH28",
				"A29",
			],
			1 => [
				"A6",
			],
			2 => [
				"A5",
			],
			3 => [
				"A24",
			],
			4 => [
				"A4",
			]
		];
        
		
		foreach ($ip_config as $sheet => $cells) {
			foreach ($cells as $cell) {
                
                switch ($sheet) {
                    case 0: {
                        echo $spreadsheet->getSheet($sheet)->getCell($cell);
                        echo ", ";
                        
                        echo "<hr>";
                        
                    } break;
                    case 1: {
                        $cell_data = null;
                        $current_cell = $cell;
                        
                        for ($i = (int)$cell[1]; strtolower($cell_data) != strtolower("ИТОГО ЗА ОСЕННИЙ СЕМЕСТР"); $i += 1) {
                            echo $cell_data;
                                                        
                            $current_cell = $cell[0].$i;
                            $cell_data =  $spreadsheet->getSheet($sheet)->getCell($current_cell);
                        }
                        
                        echo "<hr>";
                        
                    } break;
                    case 2: {
                        $cell_data = null;
                        $current_cell = $cell;
                        
                        for ($i = (int)$cell[1]; strtolower($cell_data) != strtolower("ИТОГО ЗА ВЕСЕННИЙ СЕМЕСТР"); $i += 1) {
                            echo $cell_data;
                            
                            
                            $current_cell = $cell[0].$i;
                            $cell_data =  $spreadsheet->getSheet($sheet)->getCell($current_cell);
                        }
                        
                        echo "<hr>";
                        
                    } break;
                    case 3: {
                        $cell_data = null;
                        $current_cell = $cell;
                        $caption_cell = "B".($cell[1].$cell[2]);
                                                
                        for ($i = (int)($cell[1].$cell[2]); strtolower($spreadsheet->getSheet($sheet)->getCell($current_cell)) != strtolower("ИТОГО"); $i += 1) {
                            
                            
                            if (strtolower($cell_data) != strtolower("ИТОГО")) {
                                
                                echo $spreadsheet->getSheet($sheet)->getCell($current_cell)." ";
                                echo $spreadsheet->getSheet($sheet)->getCell($caption_cell);
                            }
                            
                            
                            $current_cell = $cell[0].$i;
                            $caption_cell = "B".$i;
                        }
                        
                        echo "<hr>";
                    }
                }
                
			}
			
			echo "<br>";
		}
        
        
		
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
	
	
	
	

