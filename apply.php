<?php


// Function to send email with form data
function sendEmail($formData) {
    // Change these variables to your own email settings
    $to = "codewithcrest@gmail.com";
    $subject = "New Job Application Form Submission";
    
    // Construct the email message
    $message = "New Job Application Form Submission:\n\n";
    foreach ($formData as $key => $value) {
        $message .= ucfirst(str_replace('_', ' ', $key)) . ": " . $value . "\n";
    }
    
    // Additional headers
    $headers = "From: sender@example.com\r\n";
    
    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send email.";
    }
}

// Example usage:
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Call the sendEmail function with the form data
    sendEmail($_POST);
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "applyinfo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Personal details
    $title = $_POST["title"];
    $first_name = $_POST["first_name"];
    $middle_name = $_POST["middle_name"];
    $last_name = $_POST["last_name"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];
    $address_line_1 = $_POST["address_line_1"];
    $address_line_2 = $_POST["address_line_2"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip = $_POST["zip"];
    $country = $_POST["country"];
    $phone = $_POST["phone"];
    $other_phone = $_POST["other_phone"];
    $email = $_POST["email"];
    $nin = $_POST["nin"];
    $file_upload = $_POST["file_upload"];
    $how_hear = $_POST["how_hear"];
    $entitled_work = $_POST["entitled_work"];
    $provided_documents = $_POST["provided_documents"];
    $nationality = $_POST["nationality"];
    $relocate = $_POST["relocate"];
    $recent_care_home = $_POST["recent_care_home"];
    $hourly_pay = $_POST["hourly_pay"];

    // Driving history
    $driving_license = $_POST["driving_license"];

    // Criminal record
    $criminal_record = $_POST["criminal_record"];
    $criminal_proceedings = $_POST["criminal_proceedings"];
    $criminal_details = $_POST["criminal_details"];
    $criminal_records_disclosure = $_POST["criminal_records_disclosure"];

    // Suitability for the job
    $job_description_understood = $_POST["job_description_understood"];
    $health_conditions = $_POST["health_conditions"];
    $convictions = $_POST["convictions"];
    $convictions_details = $_POST["convictions_details"];

    // Employment history
    $previous_employer = $_POST["previous_employer"];
    $previous_job_title = $_POST["previous_job_title"];
    $previous_employment_dates = $_POST["previous_employment_dates"];
    $reason_for_leaving = $_POST["reason_for_leaving"];

    // References
    $referee_name = $_POST["referee_name"];
    $referee_position = $_POST["referee_position"];
    $referee_contact = $_POST["referee_contact"];

    // Insert data into database
    $sql = "INSERT INTO applicants (title, first_name, middle_name, last_name, gender, dob, address, address_line_1, address_line_2, city, state, zip, country, phone, other_phone, email, nin, file_upload, how_hear, entitled_work, provided_documents, nationality, relocate, recent_care_home, hourly_pay, driving_license, criminal_record, criminal_proceedings, criminal_details, criminal_records_disclosure, job_description_understood, health_conditions, convictions, convictions_details, previous_employer, previous_job_title, previous_employment_dates, reason_for_leaving, referee_name, referee_position, referee_contact)
            VALUES ('$title', '$first_name', '$middle_name', '$last_name', '$gender', '$dob', '$address', '$address_line_1', '$address_line_2', '$city', '$state', '$zip', '$country', '$phone', '$other_phone', '$email', '$nin', '$file_upload', '$how_hear', '$entitled_work', '$provided_documents', '$nationality', '$relocate', '$recent_care_home', '$hourly_pay', '$driving_license', '$criminal_record', '$criminal_proceedings', '$criminal_details', '$criminal_records_disclosure', '$job_description_understood', '$health_conditions', '$convictions', '$convictions_details', '$previous_employer', '$previous_job_title', '$previous_employment_dates', '$reason_for_leaving', '$referee_name', '$referee_position', '$referee_contact')";

    if ($conn->query($sql) === TRUE) {
        header("location: ./success.html");
        echo "Application submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();



