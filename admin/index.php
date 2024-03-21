<?php
$action = filter_input(INPUT_POST, 'action');
if($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if($action == NULL) $action = 'list_vehicles';
}

if($action == 'list_vehicles' || $action == 'show_add_form' || $action == 'add_vehicle' || 
    $action == 'delete_vehicle') include('controllers/vehicles.php');
else if($action == 'list_makes' || $action == 'add_make' || $action == 'delete_make') 
    include('controllers/makes.php');
else if($action == 'list_types' || $action == 'add_type' || $action == 'delete_type') 
    include('controllers/types.php');
else if($action == 'list_classes' || $action == 'add_class' || $action == 'delete_class') 
    include('controllers/classes.php');