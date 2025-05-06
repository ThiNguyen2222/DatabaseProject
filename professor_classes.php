<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connects to Database
$conn = new mysqli('mariadb', 'cs332s27', '80NB9UEV', 'cs332s27');

// Check if the connection failed and display error if it did
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate inputs
$prof_ssn = $conn->real_escape_string($_POST['prof_ssn']);

$sql = "SELECT c.Title, s.Classroom, s.MeetingDays, s.StartTime, s.EndTime 
        FROM Section s
        JOIN Course c ON s.CourseID = c.CourseID
        WHERE s.ProfessorSSN = '$prof_ssn'";
$result = $conn->query($sql);

// Displays the results in an HTML table format
echo "<h2>Professor's Classes</h2>";

// Check if any rows were returned from the query
if ($result->num_rows > 0) {
    // Start building the results table
    echo "<table border='1'>
            <tr>
                <th>Course Title</th>
                <th>Classroom</th>
                <th>Meeting Days</th>
                <th>Start Time</th>
                <th>End Time</th>
            </tr>";
    
    // Loop through each row of results
    while($row = $result->fetch_assoc()) {
        // Output each course as a table row
        echo "<tr>
                <td>".htmlspecialchars($row["Title"])."</td>
                <td>".htmlspecialchars($row["Classroom"])."</td>
                <td>".htmlspecialchars($row["MeetingDays"])."</td>
                <td>".htmlspecialchars($row["StartTime"])."</td>
                <td>".htmlspecialchars($row["EndTime"])."</td>
              </tr>";
    }
    echo "</table>";
} else {
    // Display message if no classes were found
    echo "No classes found for this professor.";
}

$conn->close();
?>
