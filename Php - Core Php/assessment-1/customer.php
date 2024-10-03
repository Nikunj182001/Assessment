<?php
function createCustomer($name, $balance) {
    return [
        'id' => uniqid(), // Generate unique ID
        'name' => $name,
        'balance' => $balance
    ];
}
?>
