<?php
require_once('database.php');

// Get products
$queryDepartments = 'SELECT * FROM departments';
$statement = $db->prepare($queryDepartments);
$statement->execute();
$departments = $statement->fetchAll();
$statement->closeCursor();
//print_r($products);
?>
<?php include 'includes/header.php';?>
<main class="container">
  <div class="starter-template text-center">
    <h1>Departments</h1>
    <p class="lead">Here at DKIT we have different departments under different Schools.Each and every department has specialized staff and they help students in achiving their goals.</p>
  </div>
    <section>
        <!-- display a table of products -->
        <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th>Department Name</th>
                <th>Department Phone</th>
                <th>Department Email</th>
                <th>Head of Department</th>
                <th>Year Of Establishment</th>
            </tr>

            <?php foreach ($departments as $department) : ?>
            <tr>
                <td><?php echo  $department['Department_Name']; ?></td>
                <td><?php echo  $department['Department_Phone']; ?></td>
                <td><?php echo  $department['Department_Email']; ?></td>
                <td><?php echo  $department['Department_Head']; ?></td>
                <td><?php echo $department['Year_of_Establishment']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
            </div>
    </section>

</main><!-- /.container -->
 <?php include 'includes/footer.php';?>
