

<?php 
require_once('database.php');
$error = '';
if(isset($_POST["search"])){
  $str=$_POST["search"];
  $query= "SELECT * FROM schools WHERE School_Name like ?";
  $statement = $db->prepare($query);
  $tr = '%'. $str.'%';
  $statement->bindParam(1,$tr); 
  $statement->execute();
  $schools = $statement->fetchAll();
  $statement->closeCursor();
  if(count($schools) > 0){
    foreach($schools as $school){}
  }
  else {
    $error = 'Not Found';
      }
} 


// require_once('database.php');
// $error = '';
// if(isset($_POST["search"])){
//   $str=$_POST["search"];
//  $query1= "SELECT * FROM schools WHERE School_Name like ?";
//   $statement1 = $db->prepare($query1);
//   $tr = '%'. $str.'%';
//   $statement1->bindParam(1,$tr); 
//   $statement1->execute();
//   $schools = $statement1->fetchAll();
//   $statement1->closeCursor();

  
//   $query2= "SELECT * FROM departments join schools on departments.School_ID=schools.School_ID WHERE Department_Name like ? ";
//   $statement2 = $db->prepare($query2);
//   $tr = '%'. $str.'%';
//   $statement2->bindParam(1,$tr); 
//   $statement2->execute();
//   $departments = $statement2->fetchAll();
//   $statement2->closeCursor();

 
//   $query3= "SELECT * FROM courses WHERE Course_Name like ?";
//   $statement3 = $db->prepare($query3);
//   $tr = '%'. $str.'%';
//   $statement3->bindParam(1,$tr); 
//   $statement3->execute();
//   $courses = $statement3->fetchAll();
//   $statement3->closeCursor();

//   echo var_dump($schools);
//   echo var_dump($departments);
//   echo var_dump($courses);
   
  
//   // Display the results
//   if (count($schools) > 0 || count($departments) > 0 || count($courses) > 0) {
//     // Display the schools
//     if (count($schools) > 0) {
//       echo "<h2>Schools</h2>";
//       echo "<ul>";
//       foreach ($schools as $school) {
//         echo "<li>" . $school['School_Name'] . "</li>";
//       }
//       echo "</ul>";
//     }

//     // Display the departments
//     if (count($departments) > 0) {
//       echo "<h2>Departments</h2>";
//       echo "<ul>";
//       foreach ($departments as $department) {
//         echo "<li>" . $department['Department_Name'] . " (" . $department['School_Name'] . ")</li>";
//       }
//       echo "</ul>";
//     }

//     // Display the courses
//     if (count($courses) > 0) {
//       echo "<h2>Courses</h2>";
//       echo "<ul>";
//       foreach ($courses as $course) {
//         echo "<li>" . $course['Course_Name'] . "</li>";
//       }
//       echo "</ul>";
//     }
//   } else {
//     $error = 'Not Found';
//   }
// }

?>

 

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Starter Template · Bootstrap v5.0</title>
    <script src="https://kit.fontawesome.com/dc868a21c4.js" crossorigin="anonymous"></script>
    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/mystyle.css" rel="stylesheet">
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Eighth navbar example">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">DKIT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse" id="navbarsExample07">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          </ul>
          <span class="d-flex">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="page-1.php">Departments</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="page-2.php">Courses</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="page-3.php">Contact Us</a>
              </li>
              <li class="nav-item">
       <form method="post" class="d-flex">
      <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-primary" name="submit "type="submit"><span style="color:#0d6efd"><i class="fa fa-search"></i></span></button>
    </form>
    </li>
            </ul>
          </span>
        </div>
      </div>
    </nav>
    