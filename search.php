<?php

// Database configuration
$dbHost     = 'localhost';
$dbName     = 'test';
$dbUsername = 'test';
$dbPassword = '';
$dbCharset  = 'utf8';
$dbDSN      = "mysql:host=$dbHost;dbname=$dbName;charset=$dbCharset";

$dbOptions = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// Connect with the database
$db = new PDO($dbDSN, $dbUsername, $dbPassword, $dbOptions);

// Get search term
$searchTerm = $_GET['term'];
if (trim($searchTerm) == '') {exit;}
$searchTerm = "%" . $searchTerm . "%";

// Get matched data from skills table
$sql = "SELECT id, skill FROM skills WHERE lower(skill) LIKE lower(:search) AND status = '1' ORDER BY skill ASC";
$stmt = $db->prepare($sql);
$stmt->bindParam(':search', $searchTerm);
$stmt->execute();
$rows = $stmt->fetchAll();

// Generate skills data array
$skillData = [];
foreach ($rows as $row) {
    $data['id'] = $row['id'];
    $data['value'] = $row['skill'];
    array_push($skillData, $data);
}

// Return results as json encoded array
echo json_encode($skillData);

?>