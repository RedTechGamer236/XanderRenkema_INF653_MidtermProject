<?php
function get_makes() {
    global $db;
    $query = 'SELECT * FROM makes ORDER BY ID';
    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
}

function get_make_name($make_id) {
    global $db;
    $query = 'SELECT * FROM makes WHERE ID = :make_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $make = $statement->fetch();
    $statement->closeCursor();
    $make_name = $make['Make'];
    return $make_name;
}

function add_make($make) {
    global $db;
    $query = 'INSERT INTO makes (Make) VALUES (:make)';
    $statement = $db->prepare($query);
    $statement->bindValue(':make', $make);
    $statement->execute();
    $statement->closeCursor();
}

function delete_make($make_id) {
    global $db;
    $query = 'DELETE FROM makes WHERE ID = :make_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $statement->closeCursor();
}