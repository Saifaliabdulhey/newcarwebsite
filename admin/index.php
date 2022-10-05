<?php require_once('header.php'); ?>

<section class="content-header">
  <h1>Dashboard</h1>
</section>

<?php


$statement = $pdo->prepare("SELECT * FROM tbl_top_category");
$statement->execute();
$total_top_category = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_mid_category");
$statement->execute();
$total_mid_category = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_end_category");
$statement->execute();
$total_end_category = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_product");
$statement->execute();
$total_product = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_status='1'");
$statement->execute();
$total_customers = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_subscriber WHERE subs_active='1'");
$statement->execute();
$total_subscriber = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_shipping_cost");
$statement->execute();
$available_shipping = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_status=?");
$statement->execute(array('Completed'));
$total_order_completed = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE shipping_status=?");
$statement->execute(array('Completed'));
$total_shipping_completed = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_status=?");
$statement->execute(array('Pending'));
$total_order_pending = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_status=? AND shipping_status=?");
$statement->execute(array('Completed', 'Pending'));
$total_order_complete_shipping_pending = $statement->rowCount();
?>

<section class="content">
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-primary">
        <div class="inner">
          <h3><?php echo $total_product; ?></h3>

          <p>Number of Cars</p>
        </div>
        <div class="icon">
          <i class="ionicons ion-android-cart"></i>
        </div>

      </div>

    </div>

    <form method="post" enctype="multipart/form-data">
      <p>
        <label for="firstName">Name:</label>
        <input type="text" name="title" id="firstName" required>
      </p>
      <p>
        <label for="lastName">VIN:</label>
        <input type="text" name="slug" id="lastName" required>
      </p>
      <p>
        <label for="emailAddress">Content:</label>
        <input type="text" name="content" id="emailAddress" required>
      </p>
      <input type="submit" name="vin" value="Submit">
    </form>
    <?php


    if (isset($_POST['vin'])) {
      $title = $_POST['title'];
      $slug = $_POST['slug'];
      $content = $_POST['content'];

      $statement = $pdo->prepare("INSERT INTO page (title, slug, content) VALUES('$title', '$slug', '$content')");
      $statement->execute();
    }

    ?>
</section>

<?php require_once('footer.php'); ?>