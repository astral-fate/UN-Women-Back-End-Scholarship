<?php
try{
$sql = "SELECT * From cars WHERE cat_id = ? and published = 1 and id <> ?";
$stmtRelatedCar = $conn->prepare($sql);
$stmtRelatedCar->execute([$cat_id, $id]);
$relatedCars = $stmtRelatedCar->fetchAll();
} catch(PDOException $e) {
$msg = $e->getMessage();
$alertType = "alert-danger";

}

?>

<div class="container-fluid pb-5">
<div class="container pb-5">
<h2 class="mb-4">Related Cars</h2>
<div class="owl-carousel related-carousel position-relative" style="padding:

<div class="container-fluid pb-5">
        <div class="container pb-5">
        <?php
            foreach($relatedCars as $row){
                $idRelated = $row['id'];
                $carRelatedTitle = $row['title'];
                $imageRelated = $row['image'];
                $modelRelated = $row['model'];
                $typeRelated = $row['type'] ? 'Auto' : 'Manual';
                $consumptionRelated = $row['consumption'];

                ?>
            <h2 class="mb-4">Related Cars</h2>

            <div class="owl-carousel related-carousel position-relative" style="padding: 0 30px;">
                
            <div class="rent-item">
                
                    <img class="img-fluid mb-4" src="img/car-rent-1.png" alt="">
                    <h4 class="text-uppercase mb-4">Mercedes Benz R3</h4>
                    <div class="d-flex justify-content-center mb-4">
                        <div class="px-2">
                            <i class="fa fa-car text-primary mr-1"></i>
                            <span>2015</span>
                        </div>
                        <div class="px-2 border-left border-right">
                            <i class="fa fa-cogs text-primary mr-1"></i>
                            <span>AUTO</span>
                        </div>
                        <div class="px-2">
                            <i class="fa fa-road text-primary mr-1"></i>
                            <span>25K</span>
                        </div>
                    </div>
                    <a class="btn btn-primary px-3" href="">$99.00/Day</a>
                </div>
                <?php
                        }
                 ?>
            </div>
        
        </div>
       
    </div>

    </div>