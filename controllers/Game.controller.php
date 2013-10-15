<?php
class Game{
    private $_strXmlPathname = '../xml/';

    public function __construct() {

    }

    public function saveXmlToFile($intPlayerId, $strXml) {
        $blnSuccess = false;
        $strFilename = 'P' . $intPlayerId . '.xml';
        $objFileHandler = fopen($this->_strXmlPathname.$strFilename, 'w');
        if(fwrite($objFileHandler, $strXml)) {
            $blnSuccess = true;
        }
        fclose($objFileHandler);

        return $blnSuccess;
    }

    public function getXmlFromFile($intPlayerId) {
        $strFilename = 'P' . $intPlayerId . '.xml';
        if(file_exists($this->_strXmlPathname.$strFilename)) {
            $objFileHandler = fopen($this->_strXmlPathname.$strFilename, 'r');
            $strFileContent = fread($objFileHandler, filesize($this->_strXmlPathname.$strFilename));
            return $strFileContent;
        }
        else{
            return false;
        }

    }

}