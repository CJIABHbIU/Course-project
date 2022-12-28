<?php
function getAllTires($db) {
    $sql = "SELECT * FROM tires
			INNER JOIN diameters ON tires.diameter_id = diameters.diameter_id
            INNER JOIN countries ON tires.country_id = countries.country_id;
            ";
    $result = array();
    $stmt = $db->prepare($sql);
    //print_r($stmt);
    $stmt->execute();
    //print_r($stmt);
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { // рассмотреть fetchAll (режим FETCH_BOTH)
        $result[$row['tare_id']] = $row;
        /*echo "<pre>";
        print_r($result[$row['tare_id']]);
        echo "</pre>";*/
    }
    //$result = $stmt->fetchAll();
    /*echo "<pre>";
    print_r($result);
    echo "</pre>";*/
    return $result;
}

function getDiameters($db) {
	$sql = "SELECT * FROM diameters
			INNER JOIN tires ON diameters.diameter_id = tires.diameter_id;
	";
	$result = array();
	$stmt = $db->prepare($sql);
	$stmt->execute();
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$result[$row['diameter_id']] = $row;
	}
	return $result;
}

function getCountries($db) {
	$sql = "SELECT * FROM countries
			INNER JOIN tires ON countries.country_id = tires.country_id;
	";
	$result = array();
	$stmt = $db->prepare($sql);
	$stmt->execute();
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$result[$row['country_id']] = $row;
	}
	return $result;
}

function getCountriesForAdd($db) {
	$sql = "SELECT * FROM countries;";
	$result = array();
	$stmt = $db->prepare($sql);
	$stmt->execute();
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$result[$row['country_id']] = $row;
	}
	return $result;
}

function getDiametersForAdd($db) {
	$sql = "SELECT * FROM diameters;";
	$result = array();
	$stmt = $db->prepare($sql);
	$stmt->execute();
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$result[$row['diameter_id']] = $row;
	}
	return $result;
}

function addTire($db, $tire_name, $country_id, $diameter_id) {
	$sql = "INSERT INTO tires(tire_name, country_id, diameter_id) 
			VALUES(:tire_name, :country_id, :diameter_id)
	";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':tire_name', $tire_name, PDO::PARAM_STR);
	$stmt->bindValue(':country_id', $country_id, PDO::PARAM_INT);
    $stmt->bindValue(':diameter_id', $diameter_id, PDO::PARAM_INT);
	
	$stmt->execute();
}

function getTireById($db, $id) {
    $sql = "SELECT * FROM tires
            WHERE tare_id = :tare_id;
    ";
    $stmt = $db->prepare($sql);
    $stmt->bindValue('tare_id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function saveTire($db, $name, $id) {
    $sql = "UPDATE tires
            SET tire_name = :tire_name
            WHERE tare_id = :tare_id
    ";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':tire_name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':tare_id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function deleteTire($db, $id) {
	$sql = "DELETE FROM tires WHERE tare_id = :tare_id";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(":tare_id", $id, PDO::PARAM_INT);

	$stmt->execute();
}