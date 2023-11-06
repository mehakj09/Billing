<?php
    $customerName = $_POST['CustomerName'];
    $phoneNo = $_POST['PhoneNo'];
    $address = $_POST['Address'];
    $email = $_POST['Email'];
    $totalAmount=$_POST['tPrice'] ?? null;

    // Database details
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbnew"; 

    // Creating a connection
    $con = mysqli_connect($host, $username, $password, $dbname);

    // Ensure that the connection is made
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Using SQL to create a data entry query
    $sql = "INSERT INTO bill_table (BillID, CustomerName, PhoneNo, Address, Email, PurchaseDate, TotalAmount) VALUES ('0', '$customerName', '$phoneNo', '$address', '$email', NOW(), '$totalAmount')";

    // Send the query to the database to add values and confirm if successful
    $rs = mysqli_query($con, $sql);
    if ($rs) {
        echo "Bill saved successfully!";
    } else {
        echo "Error: " . mysqli_error($con);
    }

    // Close the connection
    mysqli_close($con);

?>
