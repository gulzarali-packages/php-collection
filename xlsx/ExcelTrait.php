<?php

trait ExcelTrait{
    /**
     * delete any file from server
     */
    public function deleteFile(){
        unlink($this->file_name);
    }
    /**
     * convert associative array to simple array
     */
    public function toOneDArray($arr){

    }
}