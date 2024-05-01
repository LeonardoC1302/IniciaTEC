<?php

namespace Classes;
use League\Csv\Reader;
use League\Csv\Statement;

class ExcelManager {
    public $fileName;
    public $extension;

    public function __construct($fileName, $extension)
    {
        $this->fileName = $fileName;
        $this->extension = $extension;
    }

    public function getRecords(){
        if($this->extension == 'csv'){
            $csv = Reader::createFromPath($this->fileName);
            $csv->setHeaderOffset(0);
            $records = $csv->getRecords();
            
            return $records;
        }
    }
}
