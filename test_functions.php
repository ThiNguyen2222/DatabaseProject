<?php
// test_functions.php - Comprehensive Testing Script

/**
 * TEST SETUP
 */
echo "=== Starting Professor Classes Tests ===\n";

// 1. Mock the database results
function getMockProfessorClasses() {
    return [
        [
            "Title" => "Intro to Programming",
            "Classroom" => "CS-101",
            "MeetingDays" => "MW",
            "StartTime" => "09:00:00",
            "EndTime" => "10:15:00"
        ],
        [
            "Title" => "Data Structures",
            "Classroom" => "CS-201",
            "MeetingDays" => "TTh",
            "StartTime" => "11:00:00",
            "EndTime" => "12:15:00"
        ]
    ];
}

// 2. Test Cases
function testTableStructure() {
    $output = generateProfessorTable(getMockProfessorClasses());
    
    $requiredElements = [
        '<table' => 'Missing table element',
        '<th>Course Title</th>' => 'Missing course title header',
        '<th>Classroom</th>' => 'Missing classroom header',
        'MW' => 'Missing meeting days data',
        '09:00:00' => 'Missing start time data'
    ];
    
    foreach ($requiredElements as $pattern => $error) {
        if (strpos($output, $pattern) === false) {
            return "[FAIL] $error";
        }
    }
    return "[PASS] Table structure correct";
}

function testDataDisplay() {
    $output = generateProfessorTable(getMockProfessorClasses());
    $mockData = getMockProfessorClasses();
    
    foreach ($mockData as $row) {
        foreach ($row as $value) {
            if (strpos($output, $value) === false) {
                return "[FAIL] Missing data: $value";
            }
        }
    }
    return "[PASS] All data displayed correctly";
}

function testEmptyResults() {
    $output = generateProfessorTable([]);
    
    if (strpos($output, "No classes found") === false) {
        return "[FAIL] Empty results not handled properly";
    }
    return "[PASS] Empty results handled correctly";
}

// 3. Function to test (isolated from actual file)
function generateProfessorTable($classes) {
    ob_start();
    
    if (!empty($classes)) {
        echo "<table border='1'>
                <tr>
                    <th>Course Title</th>
                    <th>Classroom</th>
                    <th>Meeting Days</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                </tr>";
        
        foreach ($classes as $row) {
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
        echo "No classes found.";
    }
    
    return ob_get_clean();
}

/**
 * EXECUTE TESTS
 */
$testResults = [
    testTableStructure(),
    testDataDisplay(),
    testEmptyResults()
];

/**
 * OUTPUT RESULTS
 */
echo implode("\n", $testResults);
echo "\n=== Tests Complete ===\n";

/**
 * VERIFICATION SUMMARY
 */
$passCount = count(array_filter($testResults, fn($r) => strpos($r, '[PASS]') !== false));
$totalTests = count($testResults);

echo "\nSUMMARY: $passCount/$totalTests tests passed\n";
exit($passCount === $totalTests ? 0 : 1);