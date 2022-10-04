<?php require_once('header.php'); ?>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    $cta_title = $row['cta_title'];
    $cta_content = $row['cta_content'];
    $cta_read_more_text = $row['cta_read_more_text'];
    $cta_read_more_url = $row['cta_read_more_url'];
    $cta_photo = $row['cta_photo'];
    $featured_product_title = $row['featured_product_title'];
    $featured_product_subtitle = $row['featured_product_subtitle'];
    $latest_product_title = $row['latest_product_title'];
    $latest_product_subtitle = $row['latest_product_subtitle'];
    $popular_product_title = $row['popular_product_title'];
    $popular_product_subtitle = $row['popular_product_subtitle'];
    $total_featured_product_home = $row['total_featured_product_home'];
    $total_latest_product_home = $row['total_latest_product_home'];
    $total_popular_product_home = $row['total_popular_product_home'];
    $home_service_on_off = $row['home_service_on_off'];
    $home_welcome_on_off = $row['home_welcome_on_off'];
    $home_featured_product_on_off = $row['home_featured_product_on_off'];
    $home_latest_product_on_off = $row['home_latest_product_on_off'];
    $home_popular_product_on_off = $row['home_popular_product_on_off'];
}


?>


<div style="background:url(assets/img/background.jpg); height:700px;">

<div class="co">
    <span class="text1"> WELCOME</span>
    <span class="text2">
      TO AMERICAN CARS WEBSITE
    </span>
  </div>

</div>
<h1 style="text-align:center; margin-top:50px;">The Cars </h1>
<hr>

<div style="display:flex; justify-content: center; align-items:center; flex-wrap: wrap;">

    <?php
    $statement = $pdo->prepare("SELECT * FROM tbl_product");
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
    ?>
        <a style="text-decoration:none; color:black;" href="product.php?p_current_price=<?php echo $row['p_current_price']; ?>">
            <div class="card" style="width:400px; margin: 30px; height:430px; display:flex; justify-content:center; align-items:center; flex-direction:column; ">
                <img style="width:400px; margin-top:0;" src="assets/uploads/<?php echo $row['p_featured_photo'] ?>" alt="Avatar" style="width:100%">
                <div class="container">
                    <h4><b><?php echo $row['p_name']; ?></b></h4>
                    <p>VIN: <?php echo $row['p_current_price']; ?></p>
                </div>
            </div>
        </a>
    <?php
    }
    ?>
</div>


<?php require_once('footer.php'); ?>