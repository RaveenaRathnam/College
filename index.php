<?php
require_once('database.php');

// Get products
$querySchools = 'SELECT * FROM schools';
$statement = $db->prepare($querySchools);
$statement->execute();
$schools = $statement->fetchAll();
$statement->closeCursor();
//print_r($products);
?>
<?php include 'includes/header.php';?>
<main class="container">
  <div class="starter-template text-center">
    <h1 class="m-2">Academic Schools</h1>
    <p class="lead m-5"> At DkIT, our teaching and research experience is divided across 4 Academic Schools of Business & Humanities; Engineering; Health & Science and Informatics & Creative Arts. You will be part of one of these Schools and your studies will usually include a combination of tutorials, lectures, lab classes, group work, presentations, student projects and work placement.</p>
  </div>
    <section>
         

            <?php foreach ($schools as $school) : ?>
                
                <div class="card mt-auto" >
                <div class="row ">
                <div class="col-md-6 order-2 order-md-1">
                <img src="<?php echo $school['School_Image'];?>"  class="img-fluid"/>
                </div>
                <div class="col-md-6 order-1 order-md-2">
                <div class="card-body"> 
                <h5 class="card-title text-right"><?php echo $school['School_Name']; ?>  </h5>
                <p class="card-text">Phone:<?php echo $school['School_Phone']; ?> </p>
                <p class="card-text">Email:<?php echo $school['School_Email']; ?> </p>
                <p class="card-text">Head Of School:<?php echo $school['School_Head']; ?>  </p>
                <p class="card-text">Year Of Establishment<?php echo $school['Year_of_Establishment']; ?> </p>
                <a href="#" class="btn btn-primary">View Departments</a>
                 </div>
                </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

</main><!-- /.container -->
 <?php include 'includes/footer.php';?>
