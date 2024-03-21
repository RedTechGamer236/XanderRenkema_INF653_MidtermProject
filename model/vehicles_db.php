<?php
function get_vehicles($sort) {
    global $db;
    $allowed_sort_columns = array('price', 'year'); // Define the allowed columns
    if (!in_array($sort, $allowed_sort_columns)) {
        $sort = 'price'; // Set a default column to sort by
    }
    if($sort == 'price') $query = 'SELECT * FROM vehicles ORDER BY vehicles.price DESC';
    if($sort == 'year') $query = 'SELECT * FROM vehicles ORDER BY vehicles.year DESC';
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicles_by_make($make_id, $sort) {
    global $db;
    $allowed_sort_columns = array('price', 'year'); // Define the allowed columns
    if (!in_array($sort, $allowed_sort_columns)) {
        $sort = 'price'; // Set a default column to sort by
    }
    if($sort == 'price') $query = 'SELECT * FROM vehicles WHERE make_id = :make_id ORDER BY vehicles.price DESC';
    if($sort == 'year') $query = 'SELECT * FROM vehicles WHERE make_id = :make_id ORDER BY vehicles.year DESC';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicles_by_type($type_id, $sort) {
    global $db;
    $allowed_sort_columns = array('price', 'year'); // Define the allowed columns
    if (!in_array($sort, $allowed_sort_columns)) {
        $sort = 'price'; // Set a default column to sort by
    }
    if($sort == 'price') $query = 'SELECT * FROM vehicles WHERE type_id = :type_id ORDER BY vehicles.price DESC';
    if($sort == 'year') $query = 'SELECT * FROM vehicles WHERE type_id = :type_id ORDER BY vehicles.year DESC';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicles_by_class($class_id, $sort) {
    global $db;
    $allowed_sort_columns = array('price', 'year'); // Define the allowed columns
    if (!in_array($sort, $allowed_sort_columns)) {
        $sort = 'price'; // Set a default column to sort by
    }
    if($sort == 'price') $query = 'SELECT * FROM vehicles WHERE class_id = :class_id ORDER BY vehicles.price DESC';
    if($sort == 'year') $query = 'SELECT * FROM vehicles WHERE class_id = :class_id ORDER BY vehicles.year DESC';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicle($vehicle_id) {
    global $db;
    $query = 'SELECT * FROM vehicles WHERE ID = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->execute();
    $vehicle = $statement->fetch();
    $statement->closeCursor();
    return $vehicle;
}

function add_vehicle($year, $model, $price, $type_id, $class_id, $make_id) {
    global $db;
    $query = 'INSERT INTO vehicles (year, model, price, type_id, class_id, make_id)
        VALUES (:year, :model, :price, :type_id, :class_id, :make_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':type_id', $type_id);
    $statement->bindValue(':class_id', $class_id);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $statement->closeCursor();
}

function delete_vehicle($vehicle_id) {
    global $db;
    $query = 'DELETE FROM vehicles WHERE ID = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->execute();
    $statement->closeCursor();
}