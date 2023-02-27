<?php
require_once('database.php');

// Get products
$queryCourses = 'SELECT * FROM courses';
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
        <!-- display a table of products -->
        <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th>Course Name</th>
                <th>Course Type</th>
                <th>Course Level</th>
                <th>Course Fee</th>
            </tr>

            <?php foreach ($courses as $course) : ?>
            <tr>
                <td><?php echo $course['Course_Name']; ?></td>
                <td><?php echo $course['Course_Type']; ?></td>
                <td><?php echo $course['Course_Level']; ?></td>
                <td><?php echo $course['Course_Fee']; ?></td>
                 
            </tr>
            <?php endforeach; ?>
        </table>
            </div>
    </section>

</main><!-- /.container -->
 <?php include 'includes/footer.php';?>
