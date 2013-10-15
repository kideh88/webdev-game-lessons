<?php
class Worker
{
    // Constructor
    public function __construct() {
    }

    public function GetUniqueId()
    {
        return uniqid();
    }

    public function CreateFullName($firstName, $lastName)
    {
        // Concatenates the parameters and returns them
        // 5013 - 2013 = 3000
        return $firstName." ".$lastName;
    }


    // Function
    public function GetName(){
        return "Santiago";
    }
    // Destructor
    public function __destruct() {
    }
}
?>