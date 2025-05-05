<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connects to Database
$conn = new mysqli('mariadb', 'cs332sXX', 'YOUR_MYSQL_PASSWORD', 'cs332sXX');

// Check if connection failed and display error message if it did
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate inputs
$course_num = $conn->real_escape_string($_POST['course_num']);

/**
 * SQL QUERY: COURSE SECTIONS
 * Retrieves all sections for the specified course including:
 * - Section details (number, classroom, schedule)
 * - Enrollment count for each section
 * Uses LEFT JOIN to include sections with no enrollments
 * GROUP BY aggregates enrollment counts per section
 */
$sql = "SELECT s.SectionNumber, s.Classroom, s.MeetingDays, s.StartTime, s.EndTime, 
               COUNT(e.CampusID) as EnrollmentCount
        FROM Section s
        LEFT JOIN Enrollment e ON s.SectionID = e.SectionID
        WHERE s.CourseID = '$course_num'
        GROUP BY s.SectionID";
$result = $conn->query($sql);

// Display page header with course number
echo "<h2>Sections for Course $course_num</h2>";

// Check if any sections were found
if ($result->num_rows > 0) {
    // Start building the results table
    echo "<table border='1'>
            <tr>
                <th>Section Number</th>
                <th>Classroom</th>
                <th>Meeting Days</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Students Enrolled</th>
            </tr>";
    
    // Loop through each section record
    while($row = $result->fetch_assoc()) {
        // Output each section as a table row
        // htmlspecialchars prevents XSS attacks by escaping HTML characters
        echo "<tr>
                <td>".htmlspecialchars($row["SectionNumber"])."</td>
                <td>".htmlspecialchars($row["Classroom"])."</td>
                <td>".htmlspecialchars($row["MeetingDays"])."</td>
                <td>".htmlspecialchars($row["StartTime"])."</td>
                <td>".htmlspecialchars($row["EndTime"])."</td>
                <td>".htmlspecialchars($row["EnrollmentCount"])."</td>
              </tr>";
    }
    echo "</table>";
} else {
    // Display message if no sections found
    echo "No sections found for this course.";
}

$conn->close();
?>