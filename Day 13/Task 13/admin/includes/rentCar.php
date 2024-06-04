<?php
include_once('admin/includes/conn.php'); 

try {
    $sql = "SELECT id, title, image, model, type, consumption, price, featured FROM cars LIMIT 2";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $carResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $msg = $e->getMessage();
    $alertType = "alert-danger";
}
?>

<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <h1 class="display-1 text-primary text-center">03</h1>
        <h1 class="display-4 text-uppercase text-center mb-5">Find Your Car</h1>
        <div class="row">
            <?php
            foreach ($carResults as $row) {
                $id = $row['id'];
                $CarTitle = $row['title'];
                $image = $row['image'];
                $model = $row['model'];
                $type = $row['type'] ? 'Auto' : 'Manual';
                $consumption = $row['consumption'];
                $price = $row['price'];
                $featured = $row['featured'] ? 'active' : '';
            ?>
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="rent-item mb-4">
                        <img class="img-fluid mb-4" src="img/<?php echo htmlspecialchars($image); ?>" alt="">
                        <h4 class="text-uppercase mb-4"><?php echo htmlspecialchars($CarTitle); ?></h4>
                        <div class="d-flex justify-content-center mb-4">
                            <div class="px-2">
                                <i class="fa fa-car text-primary mr-1"></i>
                                <span><?php echo htmlspecialchars($model); ?></span>
                            </div>
                            <div class="px-2 border-left border-right">
                                <i class="fa fa-cogs text-primary mr-1"></i>
                                <span><?php echo htmlspecialchars($type); ?></span>
                            </div>
                            <div class="px-2">
                                <i class="fa fa-road text-primary mr-1"></i>
                                <span><?php echo htmlspecialchars($consumption); ?> kl</span>
                            </div>
                        </div>
                        <a class="btn btn-primary px-3" href="detail.php?id=<?php echo $id; ?>">$<?php echo htmlspecialchars($price); ?> /Day</a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
