<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connects to Database
$conn = new mysqli('mariadb', 'cs332s27', '80NB9UEV', 'cs332s27');

// Check if connection failed and display error message if connection fails
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate inputs
$student_id = $conn->real_escape_string($_POST['student_id']);


$sql = "SELECT c.CourseID, c.Title, s.SectionNumber, e.Grade
        FROM Enrollment e
        JOIN Section s ON e.SectionID = s.SectionID
        JOIN Course c ON s.CourseID = c.CourseID
        WHERE e.CampusID = '$student_id'";
$result = $conn->query($sql);

// Display transcript header
echo "<h2>Transcript for Student $student_id</h2>";

// Check if any courses were found
if ($result->num_rows > 0) {
    // Start building the transcript table
    echo "<table border='1'>
            <tr>
                <th>Course ID</th>
                <th>Course Title</th>
                <th>Section</th>
                <th>Grade</th>
            </tr>";
    
    // Loop through each course record
    while($row = $result->fetch_assoc()) {
        // Output each course as a table row
        echo "<tr>
                <td>".htmlspecialchars($row["CourseID"])."</td>
                <td>".htmlspecialchars($row["Title"])."</td>
                <td>".htmlspecialchars($row["SectionNumber"])."</td>
                <td>".htmlspecialchars($row["Grade"])."</td>
              </tr>";
    }
    echo "</table>";
} else {
    // Display message if no courses found
    echo "No courses found for this student.";
}

// Retrieves basic student info (name and major) to display above transcript
$info_sql = "SELECT FirstName, LastName, MajorDeptID FROM Student WHERE CampusID = '$student_id'";
$info_result = $conn->query($info_sql);

// Display student information if found
if ($info_result->num_rows > 0) {
    $info = $info_result->fetch_assoc();
    echo "<h3>Student: ".htmlspecialchars($info["FirstName"])." ".htmlspecialchars($info["LastName"])."</h3>";
    echo "<p>Major: ".htmlspecialchars($info["MajorDeptID"])."</p>";
}

$conn->close();
?>
