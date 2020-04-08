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
		$pdo = new PDO($dsn, $user, $password);
		$pdo->exec("SET DEFAULTS `utf8`");
		
		
		$recordList = $pdo->query("SELECT * FROM `IP`;");
		$record = $recordList->fetchAll();
		
		$file = new IP($record[0]['excel_file']);
		
		
		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file->getFilename());
		
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
				"A8",
				"A10",
				"A12",
				"A14",
				"A16",
				"A18",
				"A20",
				"A22",
				"A24"
			],
			2 => [
				"A5",
				"A7",
				"A9",
				"A11",
				"A13",
				"A15",
				"A17",
				"A29",
				"A21",
				"A23"
			],
			3 => [
				"B24",
				"D24",
				"B25",
				"D25",
				"B26",
				"D26",
				"B27",
				"D27",
				"B28",
				"D28"
			],
			4 => [
				"B4",
				"C4",
				"B5",
				"C5",
				"B6",
				"C6",
				"B7",
				"C7",
				"B8",
				"C8",
				"B14",
				"C14",
				"B15",
				"C15",
				"B16",
				"C16",
				"B17",
				"C17",
				"B18",
				"C18",
				"B19",
				"C19"
			]
		];
		
		
		
		foreach ($ip_config as $sheet => $cells) {
			foreach ($cells as $cell) {
				echo $spreadsheet->getSheet($sheet)->getCell($cell);
				echo ", ";
			}
			
			echo "<br>";
		}
		
		
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
	
	
	
	

