<?php 
require('../model/database.php');
require('../model/classes_db.php');

if($action == 'list_classes') {
    $classes = get_classes();
    include('view/class_list.php');
} else if($action == 'add_class') {
    $class_name = filter_input(INPUT_POST, 'class_name');
    if($class_name == NULL) {
        $error = "Invalid class name. Check all fields and try again.";
        include('view/error.php');
    } else {
        add_class($class_name);
        header("Location: .?action=list_classes");
    }
} else if($action == 'delete_class') {
    $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
    if($class_id == NULL || $class_id == FALSE) {
        $error = "Missing or incorrect ids.";
        include("view/error.php");
    } else {
        delete_vehicle($class_id);
        header("Location: .?action=list_classes");
    }
}