<?php 
require('../model/database.php');
require('../model/classes_db.php');
require('../model/makes_db.php');
require('../model/types_db.php');
require('../model/vehicles_db.php');

if($action == 'list_vehicles') {
    $make_id = filter_input(INPUT_POST, 'make', FILTER_VALIDATE_INT);
    $class_id = filter_input(INPUT_POST, 'class', FILTER_VALIDATE_INT);
    $type_id = filter_input(INPUT_POST, 'type', FILTER_VALIDATE_INT);
    $sort = filter_input(INPUT_POST, 'sort', FILTER_SANITIZE_STRING);
    if($make_id == NULL || $make_id == FALSE) $make_id = 0;
    if($type_id == NULL || $type_id == FALSE) $type_id = 0;
    if($class_id == NULL || $class_id == FALSE) $class_id = 0;
    if($sort == NULL) $sort = 'price';
    $makes = get_makes();
    if($make_id > 0) $make_name = get_make_name($make_id);
    $types = get_types();
    if($type_id > 0) $type_name = get_type_name($type_id);
    $classes = get_classes();
    if($class_id > 0) $class_name = get_class_name($class_id);
    if($make_id > 0) {
        $vehicles = get_vehicles_by_make($make_id, $sort);
        include('view/vehicle_search.php');
    }
    else if($type_id > 0) {
        $vehicles = get_vehicles_by_type($type_id, $sort);
        include('view/vehicle_search.php');
    }
    else if($class_id > 0) {
        $vehicles = get_vehicles_by_class($class_id, $sort);
        include('view/vehicle_search.php');
    }
    else {
        $vehicles = get_vehicles($sort);
        include('view/vehicle_list.php');
    }
} else if($action == 'show_add_form') {
    $makes = get_makes();
    $types = get_types();
    $classes = get_classes();
    include('view/add_vehicles.php');
} else if($action == 'add_vehicle') {
    $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
    $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
    $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
    $year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
    $model = filter_input(INPUT_POST, 'model');
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);
    if($make_id == NULL || $make_id == FALSE || $type_id == NULL || $type_id == FALSE || $class_id == NULL || $class_id == FALSE || $year == NULL || $year == FALSE || $model == NULL || $price == NULL || $price == FALSE) {
        $error = "Invalid vehicle data. Check all fields and try again.";
        include('view/error.php');
    } else {
        add_vehicle($year, $model, $price, $type_id, $class_id, $make_id);
        header("Location: .?action=list_vehicles");
    }
} else if($action == 'delete_vehicle') {
    $vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
    $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
    $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
    $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
    if($make_id == NULL || $make_id == FALSE || $type_id == NULL || $type_id == FALSE || $class_id == NULL || $class_id == FALSE || $vehicle_id == NULL || $vehicle_id == FALSE) {
        $error = "Missing or incorrect ids.";
        include("view/error.php");
    } else {
        delete_vehicle($vehicle_id);
        header("Location: .?action=list_vehicles");
    }
}