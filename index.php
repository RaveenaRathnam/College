<?php
require_once('database.php');

// Get products
$queryProducts = 'SELECT * FROM products';
$statement = $db->prepare($queryProducts);
$statement->execute();
$products = $statement->fetchAll();
$statement->closeCursor();
//print_r($products);
?>
<?php include 'includes/header.php';?>
<main class="container">
  <div class="starter-template text-center">
    <h1>Hello world</h1>
    <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
  </div>
    <section>
        <!-- display a table of products -->
        <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Color</th>
                <th>Year Of Manufacture</th>
                <th>Price</th>
                
            </tr>

            <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product['productCode']; ?></td>
                <td><?php echo $product['productName']; ?></td>
                <td><?php echo $product['productColor']; ?></td>
                <td><?php echo $product['productYear']; ?></td>
                <td class="right"><?php echo $product['listPrice']; ?></td>
                
            </tr>
            <?php endforeach; ?>
        </table>
            </div>
    </section>

</main><!-- /.container -->
 <?php include 'includes/footer.php';?>
