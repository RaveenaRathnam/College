<?php
require_once('database.php');
// Get departments
$queryDepartments = 'SELECT * FROM departments join schools on departments.School_ID=schools.School_ID ORDER BY schools.School_Name';
$statement = $db->prepare($queryDepartments);
$statement->execute();
$departments = $statement->fetchAll();
$statement->closeCursor();
// Get courses
$queryCourses = 'SELECT * FROM courses 
JOIN departments ON courses.Department_ID = departments.Department_ID
JOIN schools ON departments.School_ID = schools.School_ID
ORDER BY departments.Department_Name';
$statement = $db->prepare($queryCourses);
$statement->execute();
$courses = $statement->fetchAll();
$statement->closeCursor();
 
?>
<?php include 'includes/header.php';?>
<main class="container">
  <div class="starter-template text-center">
    <h1 class="m-2">Courses</h1>
    <p class="lead m-5">We provide a range of courses for the students to choose from,here the students can choose their course which will help them get into their dream jobs.<p>
  </div>
    <section>
          <br> 
 <?php foreach ($departments as $department) : ?>
  <div id="department_id<?php echo $department['Department_ID']?>">
    <h1 class="m-2 text-center"><?php echo $department['Department_Name']; ?></h1>
    <br>
            <?php foreach ($courses as $course) : ?>
            <?php if ($course['Department_ID'] === $department['Department_ID']) : ?>
            <div class="card mt-auto">
            <div class="card-body"> 
            <h5 class="card-title text-right"><?php echo $course['Course_Name']; ?></h5>
            <p class="card-text">Course Type: <?php echo $course['Course_Type']; ?></p>
            <p class="card-text">Course Level: <?php echo $course['Course_Level']; ?></p>
            <p class="card-text">Course Fee: <?php echo $course['Course_Fee']; ?></p>     
            </div>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
            
            </div> 
            </div>
             <br>
            <?php endforeach; ?>
            
    </section>

</main><!-- /.container -->
 <?php include 'includes/footer.php';?>
