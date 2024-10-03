<?php
require 'banker.php';
require 'customer.php';

do {
    echo "=== Bank Management System ===\n";
    echo "1. Add Customer\n";
    echo "2. View Customers\n";
    echo "3. Search Customer\n";
    echo "4. Total Amount in Bank\n";
    echo "5. Exit\n";
    echo "Select an option: ";
    
    $option = trim(fgets(STDIN));

    switch ($option) {
        case 1:
            echo "Enter Customer Name: ";
            $name = trim(fgets(STDIN));
            echo "Enter Initial Balance: ";
            $balance = trim(fgets(STDIN));

            if (!is_numeric($balance) || $balance < 0) {
                echo "Invalid balance. Please enter a positive number.\n";
                break;
            }

            $customer = createCustomer($name, $balance);
            addCustomer($customer);
            break;

        case 2:
            viewCustomers();
            break;

        case 3:
            echo "Enter Customer ID to search: ";
            $id = trim(fgets(STDIN));
            searchCustomer($id);
            break;

        case 4:
            totalBankAmount();
            break;

        case 5:
            echo "Exiting...\n";
            exit;

        default:
            echo "Invalid option. Please try again.\n";
    }

} while (true);
