<?php
class Soldier
{
    public function SetName($name)
    {
        // Save the name for the soldier
    }

    public function GetPosition()
    {
        $positionX = rand(0, 500);
        $positionY = rand(0, 500);
        $sPositions =   "<positions>".
            "<positionX>$positionX</positionX>".
            "<positionY>$positionY</positionY>".
            "</positions>";
        return $sPositions;
    }


    public function GetSoldiers()
    {
        $sXml = "<root>".
            "<soldiers>".
            "<soldier>".
            "<name>S1</name>".
            "<positions>".
            "<positionX>0</positionX>".
            "<positionY>100</positionY>".
            "</positions>".
            "</soldier>".
            "<soldier>".
            "<name>S2</name>".
            "<positions>".
            "<positionX>0</positionX>".
            "<positionY>200</positionY>".
            "</positions>".
            "</soldier>".
            "<soldier>".
            "<name>S2</name>".
            "<positions>".
            "<positionX>300</positionX>".
            "<positionY>300</positionY>".
            "</positions>".
            "</soldier>".
            "<soldier>".
            "<name>S2</name>".
            "<positions>".
            "<positionX>400</positionX>".
            "<positionY>400</positionY>".
            "</positions>".
            "</soldier>".
            "</soldiers>".
            "</root>";
        return $sXml;
    }




}
?>