<?php
require_once('database.php');
$querySchools = 'SELECT * FROM schools';
$statement = $db->prepare($querySchools);
$statement->execute();
$schools = $statement->fetchAll();
$statement->closeCursor();
// Get departments
$queryDepartments = 'SELECT * FROM departments join schools on departments.School_ID=schools.School_ID ORDER BY schools.School_Name';
$statement = $db->prepare($queryDepartments);
$statement->execute();
$departments = $statement->fetchAll();
$statement->closeCursor();
 
?>
<?php include 'includes/header.php';?>
<main class="container">
  <div class="starter-template text-center">
    <h1 class="m-2">Departments</h1>
    <p class="lead m-5">Here at DKIT we have different departments under different Schools.Each and every department has specialized staff and they help students in achiving their goals.</p>
  </div>
    <section>
    <br>
    <?php foreach ($schools as $school) : ?>
    <h1 class="m-2 text-center"><?php echo $school['School_Name']; ?></h1>
    <br>
        <?php foreach ($departments as $department) : ?>
          <?php if ($department['School_ID'] === $school['School_ID']) : ?>
                <div class="card mt-auto" >
                <div class="row ">
                <div class="col-md-6 order-2 order-md-1">
                <img src="<?php echo $department['Department_Image'];?>"  class="img-fluid"/>
                </div>
                <div class="col-md-6 order-1 order-md-2">
                <div class="card-body"> 
                <h5 class="card-title text-right"><?php echo  $department['Department_Name']; ?> </h5>
                <p class="card-text">Phone:<?php echo  $department['Department_Phone']; ?> </p>
                <p class="card-text">Email:<?php echo  $department['Department_Email']; ?> </p>
                <p class="card-text">Head Of Department:<?php echo  $department['Department_Head']; ?> </p>
                <p class="card-text">Year Of Establishment:<?php echo $department['Year_of_Establishment']; ?> </p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                </div>
                </div>
               
                <?php endif; ?>
    <?php endforeach; ?>
    </div>
    <br>
            <?php endforeach; ?>
            
    </section>

</main><!-- /.container -->
 <?php include 'includes/footer.php';?>
