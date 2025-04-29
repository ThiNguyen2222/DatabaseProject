-- Departments
INSERT INTO Department VALUES ('CPSC', 'Computer Science', '6572783700', 'CS-522', '123456789');
INSERT INTO Department VALUES ('MATH', 'Mathematics', '6572783631', 'MH-154', '987654321');

-- Professors
INSERT INTO Professor VALUES ('123456789', 'Dr. Smith', 'M', 'Professor', 90000, 'PhD CS', '714', '5551234', '123 Main St', 'Fullerton', 'CA', '92831');
INSERT INTO Professor VALUES ('987654321', 'Dr. Doe', 'F', 'Associate Professor', 85000, 'PhD Math', '714', '5555678', '456 State St', 'Fullerton', 'CA', '92831');
INSERT INTO Professor VALUES ('112233445', 'Dr. Kim', 'F', 'Assistant Professor', 78000, 'PhD CS', '714', '5557890', '789 Palm St', 'Fullerton', 'CA', '92831');

-- Courses
INSERT INTO Course VALUES ('CPSC101', 'Intro to Programming', 'Python Crash Course', 3, 'CPSC');
INSERT INTO Course VALUES ('CPSC131', 'Data Structures', 'Data Structures and Algorithms', 3, 'CPSC');
INSERT INTO Course VALUES ('MATH150', 'Calculus I', 'Calculus: Early Transcendentals', 4, 'MATH');
INSERT INTO Course VALUES ('MATH250', 'Linear Algebra', 'Linear Algebra Done Right', 3, 'MATH');

-- Prerequisites
INSERT INTO Prerequisite VALUES ('CPSC131', 'CPSC101');

-- Sections
INSERT INTO Section VALUES (1, 'CPSC101', 1, 'CS-101', 30, 'MW', '09:00:00', '10:15:00', '123456789');
INSERT INTO Section VALUES (2, 'CPSC101', 2, 'CS-102', 25, 'TTh', '11:00:00', '12:15:00', '123456789');
INSERT INTO Section VALUES (3, 'CPSC131', 1, 'CS-201', 20, 'MW', '13:00:00', '14:15:00', '123456789');
INSERT INTO Section VALUES (4, 'MATH150', 1, 'MH-101', 35, 'MWF', '10:00:00', '10:50:00', '987654321');
INSERT INTO Section VALUES (5, 'MATH250', 1, 'MH-102', 25, 'TTh', '14:00:00', '15:15:00', '987654321');
INSERT INTO Section VALUES (6, 'MATH250', 2, 'MH-103', 20, 'MW', '15:00:00', '16:15:00', '987654321');

-- Students
INSERT INTO Student VALUES ('880000001', 'Alice', 'Nguyen', '714', '5550001', '100 Apple St', 'Fullerton', 'CA', '92831', 'CPSC');
INSERT INTO Student VALUES ('880000002', 'Bob', 'Tran', '714', '5550002', '101 Orange St', 'Fullerton', 'CA', '92831', 'CPSC');
INSERT INTO Student VALUES ('880000003', 'Cathy', 'Kim', '714', '5550003', '102 Peach St', 'Fullerton', 'CA', '92831', 'MATH');
INSERT INTO Student VALUES ('880000004', 'David', 'Lee', '714', '5550004', '103 Grape St', 'Fullerton', 'CA', '92831', 'CPSC');
INSERT INTO Student VALUES ('880000005', 'Emily', 'Chen', '714', '5550005', '104 Berry St', 'Fullerton', 'CA', '92831', 'MATH');
INSERT INTO Student VALUES ('880000006', 'Frank', 'Wong', '714', '5550006', '105 Lemon St', 'Fullerton', 'CA', '92831', 'CPSC');
INSERT INTO Student VALUES ('880000007', 'Grace', 'Park', '714', '5550007', '106 Cherry St', 'Fullerton', 'CA', '92831', 'MATH');
INSERT INTO Student VALUES ('880000008', 'Hank', 'Pham', '714', '5550008', '107 Melon St', 'Fullerton', 'CA', '92831', 'CPSC');

-- Student Minors
INSERT INTO StudentMinor VALUES ('880000001', 'MATH');
INSERT INTO StudentMinor VALUES ('880000002', 'MATH');

-- Enrollment (20 Records)
INSERT INTO Enrollment VALUES ('880000001', 1, 'A');
INSERT INTO Enrollment VALUES ('880000002', 1, 'B+');
INSERT INTO Enrollment VALUES ('880000003', 2, 'A-');
INSERT INTO Enrollment VALUES ('880000004', 2, 'B');
INSERT INTO Enrollment VALUES ('880000005', 3, 'A');
INSERT INTO Enrollment VALUES ('880000006', 3, 'C+');
INSERT INTO Enrollment VALUES ('880000007', 4, 'B-');
INSERT INTO Enrollment VALUES ('880000008', 4, 'A');
INSERT INTO Enrollment VALUES ('880000001', 5, 'B+');
INSERT INTO Enrollment VALUES ('880000002', 5, 'C');
INSERT INTO Enrollment VALUES ('880000003', 5, 'B+');
INSERT INTO Enrollment VALUES ('880000004', 6, 'A-');
INSERT INTO Enrollment VALUES ('880000005', 6, 'B');
INSERT INTO Enrollment VALUES ('880000006', 1, 'C');
INSERT INTO Enrollment VALUES ('880000007', 2, 'B-');
INSERT INTO Enrollment VALUES ('880000008', 3, 'A');
INSERT INTO Enrollment VALUES ('880000001', 4, 'B');
INSERT INTO Enrollment VALUES ('880000002', 5, 'B+');
INSERT INTO Enrollment VALUES ('880000003', 6, 'C+');
