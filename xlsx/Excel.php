<?php
include_once 'ExcelTrait.php';
/**
 * Author       : Gulzar Ali
 * Date         : 20 April 2021
 * Updated      : 20 April 2021
 * Description  : Simple class to extend php file attributes to create and download xls files 
 */
class Excel{
    use ExcelTrait;
    protected $file_name;
    protected $fp;

    function __construct($file_name) {
        $this->file_name = $file_name;
        $this->openExcel();
    }

    /**
     * write file in specified directory
     */
    public function writeExcel($header,$data){

        $header=$this->parseRow($header);
        $this->writeRow($header);

        for($i=0;$i<sizeof($data);$i++){
            $row=$this->parseRow($data[$i]);
            $this->writeRow($row);
        }
    }
    /**
     * convert record row array to  formated string
     */
    public function parseRow($row){
        return implode("\t", array_values($row))."\n";
    }
    /**
     * write down lines into the file
     */
    public function writeRow($row){
        fwrite($this->fp,$row); 
    }
    /**
     * open and close file instanes
     */
    public function openExcel(){
        $this->fp=fopen($this->file_name,"a+");
    }
    /**
     * make file empty before writing contents to it
     */
    public function clear(){
        file_put_contents($this->file_name, '');
    }
    /**
     * download file contents
     */
    public function downloadExcel(){
        fclose($this->fp); 
		header('Content-Description: File Transfer');
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' );
		header("Content-Transfer-Encoding: Binary");
		header("Content-disposition: attachment; filename=\"" . basename($this->file_name) . "\"");
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');

        readfile($this->file_name);
    }
}
