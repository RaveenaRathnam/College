 drop DATABASE IF EXISTS college_data;
CREATE DATABASE college_data;
use college_data;

CREATE TABLE Schools(
School_ID INT NOT NULL AUTO_INCREMENT,
School_Name VARCHAR(30),
Year_of_Establishment YEAR,
PRIMARY KEY (School_ID)
);

Drop table messages;
CREATE TABLE MESSAGES
(MESSAGE_ID INTEGER NOT NULL AUTO_INCREMENT,
RECORD_ID INTEGER NOT NULL,
TABLE_NAME VARCHAR(25),
MESSAGE VARCHAR(50),
MESSAGE_TIME TIMESTAMP,
PRIMARY KEY(MESSAGE_ID));



CREATE TABLE Departments(
Department_ID INT NOT NULL AUTO_INCREMENT  ,
School_ID INT NOT NULL,
Department_Name VARCHAR(30),
Year_of_Establishment YEAR,
PRIMARY KEY (Department_ID, School_ID),
FOREIGN KEY (School_ID) REFERENCES Schools(School_ID));

CREATE TABLE Courses(
Course_ID INT NOT NULL AUTO_INCREMENT,
Department_ID INT NOT NULL,
Course_Name VARCHAR(30),
Course_Type VARCHAR(30),
Course_Level INT,
Course_Fee DECIMAL(30,2) DEFAULT 0,
PRIMARY KEY (Course_ID,Department_ID),
FOREIGN KEY (Department_ID) REFERENCES Departments(Department_ID));

CREATE TABLE Modules(
Module_ID INT NOT NULL AUTO_INCREMENT,
Module_Name VARCHAR(30),
Module_Type VARCHAR(20),
Module_Hour INT,
PRIMARY KEY (Module_ID)
);

CREATE TABLE Course_Module(
Course_ID INT NOT NULL,
Module_ID INT NOT NULL ,
Duration INT,
Start_date DATE,
End_date DATE,
PRIMARY KEY (Module_ID,Course_ID),
FOREIGN KEY (Module_ID) REFERENCES Modules(Module_ID),
FOREIGN KEY (Course_ID) REFERENCES Courses(Course_ID)
);

CREATE TABLE Groups(
Group_ID INT NOT NULL AUTO_INCREMENT,
Course_ID INT NOT NULL,
Current_Year Int,
Current_Semester Int,
Group_name VARCHAR(30),
PRIMARY KEY (Group_ID,Course_ID),
FOREIGN KEY (Course_ID) REFERENCES Courses(Course_ID)
);

CREATE TABLE Students(
Student_ID INT NOT NULL AUTO_INCREMENT,
Group_ID INT NOT NULL,
Student_FirstName VARCHAR(30),
Student_LastName VARCHAR(30),
Student_FullName VARCHAR(30),
gender CHAR(1),
address Text,
email varchar(255),
phone varchar(15) NOT NULL UNIQUE,      
PRIMARY KEY (Student_ID,Group_ID),
FOREIGN KEY (Group_ID) REFERENCES Groups(Group_ID)
);



CREATE TABLE Student_Module(
Student_ID INT NOT NULL,
Module_ID INT NOT NULL,
Grade DECIMAL(5,2)DEFAULT 0,
Comments Text,
PRIMARY KEY (Student_ID,Module_ID),
FOREIGN KEY (Student_ID) REFERENCES Students(Student_ID),
FOREIGN KEY (Module_ID) REFERENCES Modules(Module_ID)
);

CREATE TABLE Lecturers(
Lecturer_ID INT NOT NULL AUTO_INCREMENT,
Department_ID INT NOT NULL, 
Lecturer_FirstName VARCHAR(30),
Lecturer_LastName VARCHAR(30),
Lecturer_FullName VARCHAR(30),
job_type VARCHAR(30),
gender CHAR(1),
address text,
age int,
email varchar(255),
phone varchar(15) NOT NULL UNIQUE,
PRIMARY KEY (Lecturer_ID,Department_ID),
FOREIGN KEY (Department_ID) REFERENCES Departments(Department_ID)
);


CREATE TABLE Module_Lecturer(
Module_ID INT NOT NULL,
Lecturer_ID INT NOT NULL,
PRIMARY KEY (Lecturer_ID,Module_ID),
FOREIGN KEY (Lecturer_ID) REFERENCES Lecturers(Lecturer_ID),
FOREIGN KEY (Module_ID) REFERENCES Modules(Module_ID)
);



ALTER TABLE Schools AUTO_INCREMENT=1001;
INSERT INTO Schools(School_Name,Year_of_Establishment) VALUES("School of Business and Humanities",1977);
INSERT INTO Schools (School_Name,Year_of_Establishment)VALUES("School of Engineering",1980);
INSERT INTO Schools(School_Name,Year_of_Establishment) VALUES("School of Health&Science",1982);
INSERT INTO Schools(School_Name,Year_of_Establishment) VALUES("School of Informatics &Creative Arts",1990);

ALTER TABLE Departments AUTO_INCREMENT=2001;
INSERT INTO Departments(School_ID,Department_Name,Year_of_Establishment) VALUES(1001,"Department of Business Studies",1979);
INSERT INTO Departments(School_ID,Department_Name,Year_of_Establishment) VALUES(1002,"Department of Electronic and Mechanical Engineering",1984);
INSERT INTO Departments(School_ID,Department_Name,Year_of_Establishment) VALUES(1003,"Department of Nursing,Midwifery&Early Years",1988);
INSERT INTO Departments(School_ID,Department_Name,Year_of_Establishment) VALUES(1004,"Department of Visual and Human Centered computing",1986);
INSERT INTO Departments(School_ID,Department_Name,Year_of_Establishment) VALUES(1004,"Department of Creative Arts,Media&Music",1990);
INSERT INTO Departments(School_ID,Department_Name,Year_of_Establishment) VALUES(1001,"Department of Management & Financial Studies",1980);
INSERT INTO Departments(School_ID,Department_Name,Year_of_Establishment) VALUES(1002,"Department of Engineering Trades & Civil Engineering",1992);
INSERT INTO Departments(School_ID,Department_Name,Year_of_Establishment) VALUES(1003,"Department of Agriculture, Food & Animal Health",1993);
INSERT INTO Departments(School_ID,Department_Name,Year_of_Establishment) VALUES(1002,"Department of the Built Environment",2002);
INSERT INTO Departments(School_ID,Department_Name,Year_of_Establishment) VALUES(1004,"Department of Computing Science and Mathematics",2004);

ALTER TABLE Courses AUTO_INCREMENT=3001;
INSERT INTO Courses(Department_ID,Course_Name,Course_Type,Course_Level,Course_Fee) VALUES(2001,"BB (Hons) in Digital & International Business","Add On",8,3000.00);
INSERT INTO Courses(Department_ID,Course_Name,Course_Type,Course_Level,Course_Fee) VALUES(2002,"Bachelor of Engineering (Hons) in Electrical and Electronic Engineering","Undergraduate",8,3000.00);
INSERT INTO Courses(Department_ID,Course_Name,Course_Type,Course_Level,Course_Fee) VALUES(2003,"BSc (Hons) in General Nursing","Undergraduate",8,5000.00);
INSERT INTO Courses(Department_ID,Course_Name,Course_Type,Course_Level,Course_Fee) VALUES(2003,"Certificate in School Age Childcare","Flexible&Professional",7,750.00);
INSERT INTO Courses(Department_ID,Course_Name,Course_Type,Course_Level,Course_Fee) VALUES(2005,"BA (Hons) in Creative Media"," Undergraduate",8,3000.00);
INSERT INTO Courses(Department_ID,Course_Name,Course_Type,Course_Level,Course_Fee) VALUES(2006,"BA (Hons) in Public Relations","Add On",8,3000.00);
INSERT INTO Courses(Department_ID,Course_Name,Course_Type,Course_Level,Course_Fee) VALUES(2006,"BA (Hons) in Accounting & Finance","Undergraduate",8,3000.00);
INSERT INTO Courses(Department_ID,Course_Name,Course_Type,Course_Level,Course_Fee) VALUES(2008,"MSc / Postgraduate Diploma in Agricultural Biotechnology","Postgraduate",9,7650.00);
INSERT INTO Courses(Department_ID,Course_Name,Course_Type,Course_Level,Course_Fee) VALUES(2009,"MSc in Building Surveying","Postgraduate",9,5100.00);
INSERT INTO Courses(Department_ID,Course_Name,Course_Type,Course_Level,Course_Fee) VALUES(2010,"BSc (Hons) in Mathematics and Data Science","Undergraduate",8,3000.00);
INSERT INTO Courses(Department_ID,Course_Name,Course_Type,Course_Level,Course_Fee) VALUES(2007,"BA (Hons) in Civil Engineering","Undergraduate",8,3000.00);
INSERT INTO Courses(Department_ID,Course_Name,Course_Type,Course_Level,Course_Fee) VALUES(2004,"BA(Hons) in Computer Science","Undergraduate",8,3000.00);

ALTER TABLE Modules AUTO_INCREMENT=4001;
INSERT INTO Modules(Module_Name,Module_Type,Module_hour) VALUES ("Digital Marketting","Mandatory",'05:00:00');
INSERT INTO Modules(Module_Name,Module_Type,Module_hour) VALUES ("Engineering Science",	"Mandatory",'05:00:00');
INSERT INTO Modules(Module_Name,Module_Type,Module_hour) VALUES ("Natural Sciences for General Nursing", "Mandatory",'04:00:00');
INSERT INTO Modules(Module_Name,Module_Type,Module_hour) VALUES ("Psychology-School Age Chilcare", "Mandatory",'05:00:00');
INSERT INTO Modules(Module_Name,Module_Type,Module_hour) VALUES ("Advanced Digital Photography", "Optional",'04:00:00');
INSERT INTO Modules(Module_Name,Module_Type,Module_hour) VALUES ("Business Ethics & Corporate Citizenship",	"Oprtional",'04:00:00');
INSERT INTO Modules(Module_Name,Module_Type,Module_hour) VALUES ("Financial Services 1", "Optional",'03:00:00');
INSERT INTO Modules(Module_Name,Module_Type,Module_hour) VALUES ("Animal Genetics",	"Mandatory",'04:00:00');
INSERT INTO Modules(Module_Name,Module_Type,Module_hour) VALUES ("Building Information Modelling (BIM)", "Mandatory",'06:00:00');
INSERT INTO Modules(Module_Name,Module_Type,Module_hour) VALUES ("Artificial Intelligence",	"Optional",'03:00:00');

INSERT INTO Course_Module VALUES(3001,4001,12,'2022-09-17','2022-12-17');
INSERT INTO Course_Module VALUES(3002,4002,24,'2022-09-17','2023-05-13');
INSERT INTO Course_Module VALUES(3003,4003,10,'2022-09-17','2022-12-3');
INSERT INTO Course_Module VALUES(3004,4004,24,'2022-09-17','2023-05-13');
INSERT INTO Course_Module VALUES(3005,4005,12,'2022-09-17','2022-12-17');
INSERT INTO Course_Module VALUES(3006,4006,10,'2022-09-17','2022-12-3');
INSERT INTO Course_Module VALUES(3007,4007,24,'2022-09-17','2023-05-13');
INSERT INTO Course_Module VALUES(3008,4008,12,'2022-09-17','2022-12-17');
INSERT INTO Course_Module VALUES(3009,4009,8,'2022-09-17','2022-11-17');
INSERT INTO Course_Module VALUES(3010,4010,24,'2022-09-17','2023-05-13');
INSERT INTO Course_Module VALUES(3005,4010,8,'2022-09-17','2022-11-17');
INSERT INTO Course_Module VALUES(3003,4004,8,'2022-09-17','2022-11-17');
INSERT INTO Course_Module VALUES(3012,4010,24,'2022-09-17','2022-12-17');
INSERT INTO Course_Module VALUES(3011,4009,12,'2022-09-17','2022-11-17');

ALTER TABLE Groups AUTO_INCREMENT=5001;
INSERT INTO Groups(Course_ID,Current_Year,Current_Semester,Group_name) VALUES(3001,2,1,"DIB2A");
INSERT INTO Groups(Course_ID,Current_Year,Current_Semester,Group_name) VALUES(3002,1,1,"EEE1A");
INSERT INTO Groups(Course_ID,Current_Year,Current_Semester,Group_name) VALUES(3002,1,1,"EEE1B");
INSERT INTO Groups(Course_ID,Current_Year,Current_Semester,Group_name) VALUES(3003,3,5,"GN3A");
INSERT INTO Groups(Course_ID,Current_Year,Current_Semester,Group_name) VALUES(3005,1,2,"CM1A");
INSERT INTO Groups(Course_ID,Current_Year,Current_Semester,Group_name) VALUES(3005,1,2,"CM1B");
INSERT INTO Groups(Course_ID,Current_Year,Current_Semester,Group_name) VALUES(3006,3,6,"PR3A");
INSERT INTO Groups(Course_ID,Current_Year,Current_Semester,Group_name) VALUES(3006,3,6,"PR3B");
INSERT INTO Groups(Course_ID,Current_Year,Current_Semester,Group_name) VALUES(3007,1,2,"AF1A");
INSERT INTO Groups(Course_ID,Current_Year,Current_Semester,Group_name) VALUES(3010,4,7,"MDS4A");

ALTER TABLE Students AUTO_INCREMENT=6001;
INSERT INTO Students(Group_ID,Student_FirstName,Student_LastName,gender,address,email,phone) VALUES(5001,"Martin","Connor",'M',"89,Foster Avenue,County Dublin,A94 V6T7","martin@Home.com",0599775265 );
INSERT INTO Students(Group_ID,Student_FirstName,Student_LastName,gender,address,email,phone) VALUES(5001,"Cassy","Murphy",'F',"Alexandra Quay, York Road, Ringsend, Dublin, County Dublin,  D04 Y970","Cassy@Home.com",0879980004 );
INSERT INTO Students(Group_ID,Student_FirstName,Student_LastName,gender,address,email,phone) VALUES(5002," Ruth"," Callan",'F',"59, Park Boulevard, County Dublin, D15 HC2P","ruth@Home.com",0539136610 );
INSERT INTO Students(Group_ID,Student_FirstName,Student_LastName,gender,address,email,phone) VALUES(5002,"Jakub"," Hoey",'M',"12, St Patrick's Terrace, Dublin, County Dublin, D08 DFK1","jakub@bgm.com",091583700);
INSERT INTO Students(Group_ID,Student_FirstName,Student_LastName,gender,address,email,phone) VALUES(5003," Maggi","Connor",'F'," 27, Santry Court, Santry, Dublin, County Dublin,D09 X6X4","maggi@bgm.com",0879580031 );
INSERT INTO Students(Group_ID,Student_FirstName,Student_LastName,gender,address,email,phone) VALUES(5005,"Candy","Murphy",'F',"Wesley College, 12, Wyckham Point, County Dublin,  D16 H0A9","candy@dkit.com",0578732332);
INSERT INTO Students(Group_ID,Student_FirstName,Student_LastName,gender,address,email,phone) VALUES(5006,"Stephanie","Martin",'F'," 1, Bridgeview Halting Site,  Dublin, D10 XW08","stephanie@Home.com",0988125135 );
INSERT INTO Students(Group_ID,Student_FirstName,Student_LastName,gender,address,email,phone) VALUES(5008,"Lowis","Daniel",'M'," 56, Walnut Rise, Dublin, County Dublin, D09 VK51","lowis@stars.com",0599134022 );
INSERT INTO Students(Group_ID,Student_FirstName,Student_LastName,gender,address,email,phone) VALUES(5009,"Andra"," Leacy",'M',"Air Cooled Condenser, Ravenswood, County Dublin, D11 YP40","andra@Home.com",0906662218 );
INSERT INTO Students(Group_ID,Student_FirstName,Student_LastName,gender,address,email,phone) VALUES(5010,"Andrew","McDonnel",'M',"13, Beechwood Road, Ranelagh, Dublin, County Dublin, D06 Y176","andrew@Home.com",0214505071 );

INSERT INTO Student_Module VALUES(6001,4001,80.20,"Excellent");
INSERT INTO Student_Module VALUES(6002,4001,79.60,"Very Good");
INSERT INTO Student_Module VALUES(6003,4002,68.90,"Average");
INSERT INTO Student_Module VALUES(6004,4002,90.00,"Excellent");
INSERT INTO Student_Module VALUES(6005,4002,88.89,"Excellent");
INSERT INTO Student_Module VALUES(6006,4005,45.5,"Pass");
INSERT INTO Student_Module VALUES(6007,4005,56.30,"Good");
INSERT INTO Student_Module VALUES(6008,4006,96.45,"Excellent");
INSERT INTO Student_Module VALUES(6009,4009,70.80,"Very Good");
INSERT INTO Student_Module VALUES(6010,4010,39.80,"Fail");

ALTER TABLE Lecturers AUTO_INCREMENT=7001;
INSERT INTO Lecturers(Department_ID,Lecturer_FirstName,Lecturer_LastName,Job_type,gender,address,age,email,phone) VALUES(2001,"Martin","McCathy","Full-Time",'M',"34 Dublin Rd,Dundalk,Co.Louth",42,"mccathym@staff.com",0898902741 );
INSERT INTO Lecturers(Department_ID,Lecturer_FirstName,Lecturer_LastName,Job_type,gender,address,age,email,phone) VALUES(2001,"Ruth","McKeever","Full-Time",'F',"12 Rockview Manor,Dundalk,Co.Louth",45,"mckeeverr@staff.com",0897654382 );
INSERT INTO Lecturers(Department_ID,Lecturer_FirstName,Lecturer_LastName,Job_type,gender,address,age,email,phone) VALUES(2002," Anne"," Kealy","Part-Time",'F',"12 Dublin Rd,Dundalk,Co.Louth",46,"kealya@staff.com",0896784378 );
INSERT INTO Lecturers(Department_ID,Lecturer_FirstName,Lecturer_LastName,Job_type,gender,address,age,email,phone) VALUES(2002,"Andrea"," Leacy","Full-Time",'F',"13 Rockview Manor,Dundalk,Co.Louth",43,"leacya@staff.com",0812375689);
INSERT INTO Lecturers(Department_ID,Lecturer_FirstName,Lecturer_LastName,Job_type,gender,address,age,email,phone) VALUES(2003," John","Kennedy","Part-Time",'M'," 14 College Manor,Dundalk,Co.Louth",40,"kennedyj@staff.com",0810097764 );
INSERT INTO Lecturers(Department_ID,Lecturer_FirstName,Lecturer_LastName,Job_type,gender,address,age,email,phone) VALUES(2004,"Jane","O'Connor","Part-Time",'F',"15 Temple Street ,Dublin,Co.Dublin",45,"o'connorj@staff.com",0985744432);
INSERT INTO Lecturers(Department_ID,Lecturer_FirstName,Lecturer_LastName,Job_type,gender,address,age,email,phone) VALUES(2005,"Niamh","Brady","Part-Time",'F',"16 SaltTown ,Dundalk,Co.Louth",48,"bradyn@staff.com", 0874321114);
INSERT INTO Lecturers(Department_ID,Lecturer_FirstName,Lecturer_LastName,Job_type,gender,address,age,email,phone) VALUES(2006,"Tom","Brady","Full-Time",'M'," 17 Thomas,Drogheda,Co.Louth",50,"mchught@staff.com",0897788870);
INSERT INTO Lecturers(Department_ID,Lecturer_FirstName,Lecturer_LastName,Job_type,gender,address,age,email,phone) VALUES(2007,"Cian"," Murphy","Full-Time",'M',"27 ParkSquare ,Drogheda,Co.Meath",41,"murphyc@staff.com",0876654432);
INSERT INTO Lecturers(Department_ID,Lecturer_FirstName,Lecturer_LastName,Job_type,gender,address,age,email,phone) VALUES(2008,"Killan","Reilly","Full-Time",'M',"113 Termonfeckin,Drogheda,Co.Meath",46,"reillyk@staff.com",08904436782);


 INSERT INTO module_lecturer VALUES (4001,7001);
 INSERT INTO module_lecturer VALUES (4002,7002);
 INSERT INTO module_lecturer VALUES (4003,7003);
 INSERT INTO module_lecturer VALUES (4004,7004);
 INSERT INTO module_lecturer VALUES (4005,7005);
 INSERT INTO module_lecturer VALUES (4006,7006);
 INSERT INTO module_lecturer VALUES (4007,7007);
 INSERT INTO module_lecturer VALUES (4008,7008);
 INSERT INTO module_lecturer VALUES (4009,7009);
 INSERT INTO module_lecturer VALUES (4010,7001);
 INSERT INTO module_lecturer VALUES (4008,7002);
 INSERT INTO module_lecturer VALUES (4009,7003);
 INSERT INTO module_lecturer VALUES (4001,7010);


-----------------------------------------------TRIGGERS-------------------------------
drop TRIGGER student_fullname;
CREATE TRIGGER student_fullname
BEFORE INSERT
on
Students
for each row set new.Student_FullName = CONCAT(new.Student_FirstName ,CONCAT(" ", new.Student_LastName));
--select * from students;

drop TRIGGER lecturer_fullname;
CREATE TRIGGER lecturer_fullname
BEFORE INSERT
on
lecturers
for each row set new.Lecturer_FullName = CONCAT(new.Lecturer_FirstName ,CONCAT(" ", new.Lecturer_LastName));
--select * from lecturers;

Drop trigger if exists insert_school_message; 
CREATE TRIGGER  insert_school_message 
AFTER UPDATE ON schools
FOR EACH ROW
INSERT INTO MESSAGES(RECORD_ID,TABLE_NAME,MESSAGE,MESSAGE_TIME) 
VALUES (OLD.School_ID, "Schools", Concat(OLD.School_Name, 
CONCAT(' Updated to ', NEW.School_Name)), CURRENT_TIMESTAMP);
--Update schools set school_name="School of Music" where school_id=1001;
-- select * from messages;
 
Drop trigger if exists delete_lecturer ;  
CREATE TRIGGER delete_lecturer
BEFORE DELETE
ON
lecturers
FOR EACH ROW
DELETE FROM module_lecturer WHERE lecturer_ID = OLD.lecturer_ID;

Drop trigger if exists insert_lecturer_message;
CREATE TRIGGER  insert_lecturer_message 
AFTER DELETE ON Lecturers
FOR EACH ROW
INSERT INTO MESSAGES(RECORD_ID,TABLE_NAME,MESSAGE,MESSAGE_TIME) 
VALUES (OLD.Lecturer_ID, "Lecturers", CONCAT(OLD.Lecturer_FullName, " deleted"), CURRENT_TIMESTAMP);
--DELETE FROM lecturers WHERE lecturer_ID=7001;
--select * from messages;

----------------------------INDEXES------------------------------------
ALTER TABLE  schools
DROP INDEX IF EXISTS idx_schoolName ;
create index idx_schoolName on schools(school_name);

ALTER TABLE  Students
DROP INDEX IF EXISTS idx_studentName ;
create index idx_studentName on Students(Student_FullName);

ALTER TABLE  Lecturers
DROP INDEX IF EXISTS idx_lecturerName ;
create index idx_lecturerName on Lecturers(Lecturer_FullName);


--------------------------VIEWS----------------------------------------
Drop VIEW v_student_details;
CREATE VIEW v_student_details as SELECT Student_ID as StudentNumber,
Student_FullName from Students;
--select * from v_student_details;

Drop VIEW  v_lecturer_details;
CREATE VIEW v_lecturer_details as SELECT Lecturer_ID as LecturerNumber,
Lecturer_fullname from Lecturers;
--select * from v_lecturer_details;


Drop VIEW  student_coursefee;
CREATE VIEW student_coursefee as SELECT s.Student_FullName,g.Group_ID,g.Group_name,
c.Course_Name,c.Course_Fee from Students s,Courses c,Groups g
WHERE s.Group_ID=g.Group_ID
AND g.Course_ID=c.Course_ID;
-- select * from student_coursefee;

Drop VIEW  lecturers_in_dep;
CREATE VIEW lecturers_in_dep as SELECT d.Department_Name,
count(l.Department_ID) as No_Of_lectures 
from Lecturers l,Departments d
WHERE l.Department_ID=d.Department_ID
group by d.Department_Name
order by No_Of_lectures desc;
--select * from lecturers_in_dep;
  
  
 ---------------------------------DATABASE ADMINISTRATION---------------------------
 
 /*cd c:\xampp\mysql\bin
mysql -u root -p*/

CREATE  USER 'administrator'@'localhost' IDENTIFIED BY 'administrator';
GRANT ALL  PRIVILEGES ON college_data.* TO  'administrator'@'localhost' WITH GRANT OPTION;
SHOW GRANTS FOR 'administrator'@'localhost';
REVOKE ALL PRIVILEGES ON *.* FROM 'administrator'@'localhost';
REVOKE GRANT OPTION ON college_data.* FROM 'administrator'@'localhost';
DROP USER 'administrator'@'localhost'; 

CREATE  USER 'lecturer'@'localhost' IDENTIFIED BY 'lecturer';
GRANT SELECT , UPDATE ON college_data.* TO  'lecturer'@'localhost' WITH GRANT OPTION;
SHOW GRANTS FOR 'lecturer'@'localhost';
REVOKE ALL PRIVILEGES ON *.* FROM 'lecturer'@'localhost';
REVOKE GRANT OPTION ON college_data.* FROM 'lecturer'@'localhost';
DROP USER 'lecturer'@'localhost';


CREATE  USER 'student'@'localhost' IDENTIFIED BY 'student';
GRANT SELECT ON college_data. TO  'student'@'localhost' WITH GRANT OPTION;
SHOW GRANTS FOR 'student'@'localhost'; 
REVOKE ALL PRIVILEGES ON *.* FROM 'student'@'localhost';
REVOKE GRANT OPTION ON college_data.* FROM 'student'@'localhost';
DROP USER 'student'@'localhost'; 



---------------------------------STORED PROCEDURES---------------------------
 
1)DELIMITER //
 CREATE PROCEDURE Student_By_FirstName(IN student_FirstName   varchar(30) )
 BEGIN
 SELECT *  FROM students s WHERE s. student_FirstName like CONCAT(student_FirstName, '%') ;
 END //
DELIMITER ;
CALL Student_By_FirstName ('Cassy');

2)DELIMITER //
CREATE PROCEDURE Stored1(OUT countBelowGrade INT)
BEGIN
    DECLARE avgAge  DECIMAL(5,2) DEFAULT 0;
    SELECT AVG(age) INTO avgAge FROM Lecturers;
    SELECT COUNT(*) INTO countBelowGrade FROM Lecturers WHERE age < avgAge;
END //
DELIMITER ;
CALL Stored1(@countBelowGrade);
SELECT @countBelowGrade;

3)
DELIMITER //
CREATE PROCEDURE GetCourseByDate(IN course_date date)
   BEGIN
   SELECT *  FROM Course_Module
   where Start_date = course_date;
   END //
DELIMITER ;
Call GetCourseByDate('2022-09-17');


4)DELIMITER //
CREATE PROCEDURE TotalEachother()
BEGIN
SELECT Student_id,sum(grade) as total_value from Student_module,modules
 where Student_module.module_id = modules.module_id group by Student_id;
END //
DELIMITER ;

call TotalEachother();


//Transactions:
ALTER TABLE student_module
DROP FOREIGN KEY student_module_ibfk_1;


START TRANSACTION;
INSERT INTO Students(Group_ID,Student_FirstName,Student_LastName,gender,address,email,phone) VALUES(5010,"Mac","Guy",'M',"12, Beechwood Road, Ranelagh, Dublin, County Dublin, D06 Y176","Mac@Home.com",0054236599 );
INSERT INTO Students(Group_ID,Student_FirstName,Student_LastName,gender,address,email,phone) VALUES(5010,"Coke","Shane",'M',"23, Beechwood Road, Ranelagh, Dublin, County Dublin, D06 Y176","Coke@Home.com",0485312365 );
COMMIT;
DELETE FROM Students where Student_ID = 6003;
ROLLBACK;