<?php 
require('../model/database.php');
require('../model/types_db.php');

if($action == 'list_types') {
    $types = get_types();
    include('view/type_list.php');
} else if($action == 'add_type') {
    $type_name = filter_input(INPUT_POST, 'type_name');
    if($type_name == NULL) {
        $error = "Invalid type name. Check all fields and try again.";
        include('view/error.php');
    } else {
        add_type($type_name);
        header("Location: .?action=list_types");
    }
} else if($action == 'delete_type') {
    $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
    if($type_id == NULL || $type_id == FALSE) {
        $error = "Missing or incorrect ids.";
        include("view/error.php");
    } else {
        delete_vehicle($type_id);
        header("Location: .?action=list_types");
    }
}