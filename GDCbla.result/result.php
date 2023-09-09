<?php

session_start();
error_reporting(0);
$input_roll = $_POST["rollno_input"];

// Read the JSON data from the result.json file
$json_data = file_get_contents("result.json");

// Decode the JSON data into a PHP associative array
$data = json_decode($json_data, true);

$studentFound = false;

// Loop through all the students in the data
foreach ($data as $student) {
    $studentInfo = $student["studentInfo"];

    // Check if the input roll matches the student's roll number
    if ($input_roll == $studentInfo["rollnumber"]) {

        // Print the table for the particular student
        echo "<!DOCTYPE html>";
        echo "<html lang='en'>";
        echo "<head>";
        echo "<meta charset='UTF-8'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "<meta name='keywords' content='marksheet, html, css'>";
        echo "<meta name='description' content='A marksheet using HTML and CSS.'>";
        echo "<meta name='author' content='Khalid Javid'>";
        echo "<!-- CSS -->";
        echo "<link rel='stylesheet' href='./static/css/style.css'>";
        echo "<!-- Favicon -->";
        echo "<link rel='shortcut icon' href='./static/img/favicon.ico' type='image/x-icon'>";
        echo "<title>Result-BCA</title>";
        echo "</head>";
        echo "<body>";

        echo "<img id='mu-logo' src='./static/img/logo-gdc.png' alt='MU'>
        
        <svg width='80' height='80' viewBox='0 0 250 250'
            style='fill:#e60105; color:#c8e6c9; position: absolute; top: 0; border: 0; right: 0;' aria-hidden='true'>
            <!-- The other styles for the corner are in ./static/css/style.css -->

            <path
                d='M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2'
                fill='currentColor' style='transform-origin: 130px 106px;' class='octo-arm'></path>
            <path
                d='M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z'
                fill='currentColor' class='octo-body'></path>
        </svg>

       <br><br><br><br>
        <div id='svg-background'>
            <div id='mu-logo-watermark-wrapper'>
                <img id='mu-logo-watermark' src='./static/img/logo-gdc.png' alt=''>
            </div>
        </div>";

        echo "<main>";
        // Add the HTML content you provided at the beginning of the body
        // ...

        // Access and use the JSON data as needed
        echo "<div class='student-data'>";
        echo "<label for='name'>NAME : <span>{$studentInfo["Name"]}</span></label>";
        echo "<label for='examination'>SEMESTER : <span>{$studentInfo["Semester"]}</span></label>";
        echo "<label for='held-in'>BATCH : <span>{$studentInfo["Batch"]}</span></label>";
        echo "<label for='form-no'>FORM NO. : <span>{$studentInfo["Form No"]}</span></label>";
        echo "<label for='seat-no'>SESSION : <span>{$studentInfo["Session"]}</span></label>";
        echo "<label for='seat-no'>EXAM. ROLL NO. : <span>{$studentInfo["Exam. Roll No"]}</span></label>";
        echo "</div>";
        echo "</main>";

        // Access and use the results data as needed
        echo "<section>";
        echo "<table>";
        echo "<tr>";
        echo "<th rowspan='2' class='no-left-border'>COURSE TYPE</th>";
        echo "<th rowspan='2'>PAPER TITLE</th>";
        echo "<th rowspan='2'>PAPER CODE</th>";
        echo "<th colspan='3'>MARKS OBTAINED</th>";
        echo "<th rowspan='2' class='no-right-border'>GRADE</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Theory</th>";
        echo "<th>Practical</th>";
        echo "<th>Total Marks</th>";
        echo "</tr>";

        foreach ($student["results"] as $result) {
            echo "<tr>";
            echo "<td class='no-bottom-top-border no-left-border text-center'>{$result["Course Type"]}</td>";
            echo "<td class='no-bottom-top-border'>{$result["Paper Title"]}</td>";
            echo "<td class='no-bottom-top-border'>{$result["Paper Code"]}</td>";
            echo "<td class='no-bottom-top-border'>{$result["Theory"]}</td>";
            echo "<td class='no-bottom-top-border'>{$result["Tutorial / Practical"]}</td>";
            echo "<td class='no-bottom-top-border'>{$result["Total Marks Obtained"]}</td>";
            echo "<td class='no-bottom-top-border'>{$result["Grade"]}</td>";
            echo "</tr>";
        }

        // The rest of your table rows here
        echo "<tr>";
        echo "<td colspan='3' style='text-align: center; font-weight: bold; color: #e60105;'>TOTAL MARKS / RESULT </td>";
        echo "<td colspan='3' style='text-align: center;'>{$student["totalMarksResult"]["Total Marks / Result"]}</td>";
        echo "<td id='grade'>{$student["totalMarksResult"]["Grade"]}</td>";
        echo "</tr>";

        echo "</table>";
        echo "</section>";

        echo'<section class="end-section">


        <div class="end-data-set">
            <label for="result-date">Result Declared on :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <div id="result-date">MARCH 11, 2019</div>
        </div>

        <div class="salutation-outer">
            <div class="salutation-inner">
                <div>PRINCIPAL</div>
                <div>GOVT. DEGREE COLLEGE BARAMULLA</div>
            </div>
        </div>
        </section>';
 
        echo "</body>";
        echo "</html>";
        
        
    }
}
if(!$studentFound){
    $_SESSION['sts']="Student not found with this name";
    header('location:index.php');
};

?>




