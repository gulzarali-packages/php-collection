<?php

trait ExcelTrait{
    /**
     * delete any file from server
     */
    public function deleteFile($file_name){
        unlink($file_name);
    }
}