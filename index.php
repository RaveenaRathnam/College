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
    <h1>Academic Schools</h1>
    <p class="lead"> At DkIT, our teaching and research experience is divided across 4 Academic Schools of Business & Humanities; Engineering; Health & Science and Informatics & Creative Arts. You will be part of one of these Schools and your studies will usually include a combination of tutorials, lectures, lab classes, group work, presentations, student projects and work placement.</p>
  </div>
    <section>
        <!-- display a table of products -->
        <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th>School Name</th>
                <th>School Phone</th>
                <th>School Email</th>
                <th>Head of School</th>
                <th>Year Of Establishment</th>
            </tr>

            <?php foreach ($schools as $school) : ?>
            <tr>
                
                <td><?php echo $school['School_Name']; ?></td>
                <td><?php echo $school['School_Phone']; ?></td>
                <td><?php echo $school['School_Email']; ?></td>
                <td><?php echo $school['School_Head']; ?></td>
                <td><?php echo $school['Year_of_Establishment']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
            </div>
    </section>

</main><!-- /.container -->
 <?php include 'includes/footer.php';?>
