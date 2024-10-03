<?php
function addCustomer($customerData) {
    // Read existing customers
    $customers = json_decode(file_get_contents('customers.json'), true) ?? [];
    
    // Add new customer data
    $customers[] = $customerData;
    
    // Save back to file
    file_put_contents('customers.json', json_encode($customers, JSON_PRETTY_PRINT));
    echo "Customer added successfully.\n";
}

function viewCustomers() {
    $customers = json_decode(file_get_contents('customers.json'), true);
    if (empty($customers)) {
        echo "No customers found.\n";
        return;
    }
    
    foreach ($customers as $customer) {
        echo "ID: {$customer['id']}, Name: {$customer['name']}, Balance: {$customer['balance']}\n";
    }
}

function searchCustomer($id) {
    $customers = json_decode(file_get_contents('customers.json'), true);
    
    foreach ($customers as $customer) {
        if ($customer['id'] == $id) {
            echo "Found Customer - ID: {$customer['id']}, Name: {$customer['name']}, Balance: {$customer['balance']}\n";
            return;
        }
    }
    echo "Customer not found.\n";
}

function totalBankAmount() {
    $customers = json_decode(file_get_contents('customers.json'), true);
    $total = 0;
    
    foreach ($customers as $customer) {
        $total += $customer['balance'];
    }
    echo "Total amount in bank: $total\n";
}
?>
