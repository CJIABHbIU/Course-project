<?php

set_include_path("C:\OSPanel\domains\www\php");
include_once "api.php";

use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase{
     function testGetAllTires(){

        $user = "root";
        $password = "9260809906Ruslan";

        try {
        $db = new PDO("mysql:host=localhost;dbname=db", $user, $password);
        } 
        catch (Exception $e){
            echo $e->getMessage();
        }

        $this->assertNotNull(getAllTires($db));
    }

    function testGetCountries(){

        $user = "root";
        $password = "9260809906Ruslan";

        try {
        $db = new PDO("mysql:host=localhost;dbname=db", $user, $password);
        } 
        catch (Exception $e){
            echo $e->getMessage();
        }

        $this->assertNotNull(getCountries($db));
    }

    function testGetDiameters(){

        $user = "root";
        $password = "9260809906Ruslan";

        try {
        $db = new PDO("mysql:host=localhost;dbname=db", $user, $password);
        } 
        catch (Exception $e){
            echo $e->getMessage();
        }

        $this->assertNotNull(getDiameters($db));
    }

    function testGetCountriesForAdd(){

        $user = "root";
        $password = "9260809906Ruslan";

        try {
        $db = new PDO("mysql:host=localhost;dbname=db", $user, $password);
        } 
        catch (Exception $e){
            echo $e->getMessage();
        }

        $this->assertNotNull(getCountriesForAdd($db));
    }

    function testGetDiametersForAdd(){

        $user = "root";
        $password = "9260809906Ruslan";

        try {
        $db = new PDO("mysql:host=localhost;dbname=db", $user, $password);
        } 
        catch (Exception $e){
            echo $e->getMessage();
        }

        $this->assertNotNull(getDiametersForAdd($db));
    }

    function testGetTireById(){

        $user = "root";
        $password = "9260809906Ruslan";

        try {
        $db = new PDO("mysql:host=localhost;dbname=db", $user, $password);
        } 
        catch (Exception $e){
            echo $e->getMessage();
        }
        $this->assertEquals(getTireById($db, 8), Array("tare_id" => 8, "tire_name" => "Michelin X-Ice North", "country_id" => 2, "diameter_id" => 17));
    }
}