<?php

require 'pdo.php';

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