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

    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images\img1.png" class="d-block w-100" style="width:100%;height:600px" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images\img2.jpg" class="d-block w-100" style="width:100%;height:600px" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images\img3.jpg" class="d-block w-100"style="width:100%;height:600px" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images\img4.jpg" class="d-block w-100" style="width:100%;height:600px"alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<br>
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
                <a href="page-1.php?q=2" class="btn btn-primary">View Departments</a>
                 </div>
                </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

</main><!-- /.container -->
 <?php include 'includes/footer.php';?>
