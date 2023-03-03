<?php
require_once('database.php');

// Get products
$queryCourses = 'SELECT Department_Name,Course_Name,Course_Type,Course_Level,Course_Fee FROM courses 
JOIN departments ON courses.Department_ID = departments.Department_ID
JOIN schools ON departments.School_ID = schools.School_ID
';
$statement = $db->prepare($queryCourses);
$statement->execute();
$courses = $statement->fetchAll();
$statement->closeCursor();
//print_r($products);
?>
<?php include 'includes/header.php';?>
<main class="container">
  <div class="starter-template text-center">
    <h1>Courses</h1>
    <p class="lead">We provide a range of courses for the students to choose from,here the students can choose their course which will help them get into their dream jobs.<p>
  </div>
    <section>
        

            <?php foreach ($courses as $course) : ?>
              <div>
            <div class="card mt-auto">
            <h4 class="card-title text-right"><?php echo $course['Department_Name']; ?></h4>
            <div class="card-body"> 
            <h5 class="card-title text-right"><?php echo $course['Course_Name']; ?></h5>
            <p class="card-text"> <?php echo $course['Course_Type']; ?></p>
            <p class="card-text"> <?php echo $course['Course_Level']; ?></p>
            <p class="card-text"><?php echo $course['Course_Fee']; ?></p>     
            </div>
            </div>
            <?php endforeach; ?>
            </div>
            </div> 
    </section>

</main><!-- /.container -->
 <?php include 'includes/footer.php';?>
