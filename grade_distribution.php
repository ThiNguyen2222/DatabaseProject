<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connects to Database
$conn = new mysqli('mariadb', 'cs332s27', '80NB9UEV', 'cs332s27');

// Check if connection failed and display error message if it did
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate inputs
$course_id = $conn->real_escape_string($_POST['course_id']);
$section_id = (int)$_POST['section_id'];

$sql = "SELECT Grade, COUNT(*) as Count 
        FROM Enrollment e
        JOIN Section s ON e.SectionID = s.SectionID
        WHERE s.CourseID = '$course_id' AND s.SectionNumber = $section_id
        GROUP BY Grade
        ORDER BY 
            CASE Grade
                WHEN 'A' THEN 1
                WHEN 'A-' THEN 2
                WHEN 'B+' THEN 3
                WHEN 'B' THEN 4
                WHEN 'B-' THEN 5
                WHEN 'C+' THEN 6
                WHEN 'C' THEN 7
                WHEN 'C-' THEN 8
                WHEN 'D+' THEN 9
                WHEN 'D' THEN 10
                WHEN 'D-' THEN 11
                WHEN 'F' THEN 12
                ELSE 13
            END";
$result = $conn->query($sql);

// Displays the results in an HTML table format
echo "<h2>Grade Distribution for Course $course_id, Section $section_id</h2>";

// Check if any results were returned
if ($result->num_rows > 0) {
    // Start building the results table
    echo "<table border='1'>
            <tr>
                <th>Grade</th>
                <th>Number of Students</th>
            </tr>";
    
    // Loop through each grade result
    while($row = $result->fetch_assoc()) {
        // Output each grade count as a table row
        echo "<tr>
                <td>".htmlspecialchars($row["Grade"])."</td>
                <td>".htmlspecialchars($row["Count"])."</td>
              </tr>";
    }
    echo "</table>";
} else {
    // Display message if no records found
    echo "No enrollment records found for this section.";
}

$conn->close();
?>
