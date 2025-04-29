CREATE TABLE Department (
  DeptID CHAR(4) PRIMARY KEY,
  Name VARCHAR(50),
  Telephone VARCHAR(15),
  OfficeLocation VARCHAR(50),
  ChairSSN CHAR(9),
  FOREIGN KEY (ChairSSN) REFERENCES Professor(SSN)
);

CREATE TABLE Professor (
  SSN CHAR(9) PRIMARY KEY,
  Name VARCHAR(50),
  Sex CHAR(1),
  Title VARCHAR(20),
  Salary DECIMAL(10,2),
  Degrees VARCHAR(100),
  AreaCode CHAR(3),
  PhoneNumber CHAR(7),
  Street VARCHAR(100),
  City VARCHAR(50),
  State CHAR(2),
  Zip CHAR(5)
);

CREATE TABLE Course (
  CourseID CHAR(7) PRIMARY KEY,
  Title VARCHAR(100),
  Textbook VARCHAR(100),
  Units INT,
  DeptID CHAR(4),
  FOREIGN KEY (DeptID) REFERENCES Department(DeptID)
);

CREATE TABLE Prerequisite (
  CourseID CHAR(6),
  PrereqCourseID CHAR(6),
  PRIMARY KEY (CourseID, PrereqCourseID),
  FOREIGN KEY (CourseID) REFERENCES Course(CourseID),
  FOREIGN KEY (PrereqCourseID) REFERENCES Course(CourseID)
);

CREATE TABLE Section (
  SectionID INT PRIMARY KEY,
  CourseID CHAR(6),
  SectionNumber INT,
  Classroom VARCHAR(50),
  Seats INT,
  MeetingDays VARCHAR(20),
  StartTime TIME,
  EndTime TIME,
  ProfessorSSN CHAR(9),
  FOREIGN KEY (CourseID) REFERENCES Course(CourseID),
  FOREIGN KEY (ProfessorSSN) REFERENCES Professor(SSN)
);

CREATE TABLE Student (
  CampusID CHAR(9) PRIMARY KEY,
  FirstName VARCHAR(30),
  LastName VARCHAR(30),
  AreaCode CHAR(3),
  PhoneNumber CHAR(7),
  Street VARCHAR(100),
  City VARCHAR(50),
  State CHAR(2),
  Zip CHAR(5),
  MajorDeptID CHAR(4),
  FOREIGN KEY (MajorDeptID) REFERENCES Department(DeptID)
);

CREATE TABLE StudentMinor (
  CampusID CHAR(9),
  DeptID CHAR(4),
  PRIMARY KEY (CampusID, DeptID),
  FOREIGN KEY (CampusID) REFERENCES Student(CampusID),
  FOREIGN KEY (DeptID) REFERENCES Department(DeptID)
);

CREATE TABLE Enrollment (
  CampusID CHAR(9),
  SectionID INT,
  Grade VARCHAR(2),
  PRIMARY KEY (CampusID, SectionID),
  FOREIGN KEY (CampusID) REFERENCES Student(CampusID),
  FOREIGN KEY (SectionID) REFERENCES Section(SectionID)
);
