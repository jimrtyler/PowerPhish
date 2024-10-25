<?php
// Check if all the required GET variables are set

    
    // Get the GET variables
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email2'];


    
    // Sanitize the input (basic sanitization, can be expanded)
    $firstName = filter_var($firstName, FILTER_SANITIZE_STRING);
    $lastName = filter_var($lastName, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Create the filename based on the current date
    $fileName = date('Y-m-d') . '.csv';

    // Open the file in append mode, if it doesn't exist it will be created
    $file = fopen($fileName, 'a');

    $submittedData = "submittedData";

    $timestamp = date('Y-m-d H:i:s');

    if ($file) {
        // Create an array with the data to be written
        $data = [$timestamp, $firstName, $lastName, $email, $submittedData];

        // Write the data to the CSV file
        fputcsv($file, $data);

        // Close the file
        fclose($file);

        // Confirmation message
        //echo "Data has been recorded successfully.";
    } else {
        // Error handling
        //echo "Error: Unable to open the file.";
    }


header("Location: https://www.youtube.com/watch?v=o0btqyGWIQw");
?>