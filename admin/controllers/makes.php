<?php 
require('../model/database.php');
require('../model/makes_db.php');

if($action == 'list_makes') {
    $makes = get_makes();
    include('view/make_list.php');
} else if($action == 'add_make') {
    $make_name = filter_input(INPUT_POST, 'make_name');
    if($make_name == NULL) {
        $error = "Invalid make name. Check all fields and try again.";
        include('view/error.php');
    } else {
        add_make($make_name);
        header("Location: .?action=list_makes");
    }
} else if($action == 'delete_make') {
    $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
    if($make_id == NULL || $make_id == FALSE) {
        $error = "Missing or incorrect ids.";
        include("view/error.php");
    } else {
        delete_vehicle($make_id);
        header("Location: .?action=list_makes");
    }
}