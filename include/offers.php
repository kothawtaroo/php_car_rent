<!-- Offers Area Start -->
<?php include_once "include/config.php" ?>
<section class="dlauto-offers-area section_70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="site-heading">

                    <h2>Popular offers</h2>
                </div>
            </div>
        </div>

        <div class="tab-content" id="offerTabContent">
            <!-- All Tab Start -->
            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                <div class="row">

                    <!---sample-->
                    <?php $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand limit 9";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                        foreach ($results as $result) {
                    ?>

                            <div class="col-lg-4">
                                <div class="single-offers">
                                    <div class="offer-text"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" class="img-responsive" alt="image"></a>
                                        <ul>
                                            <li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($result->FuelType); ?></li>
                                            <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result->ModelYear); ?> Model</li>
                                            <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result->SeatingCapacity); ?> seats</li>
                                        </ul>

                                        <div class="car-title-m">
                                            <h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"> <?php echo htmlentities($result->VehiclesTitle); ?></a></h6>
                                            <span class="price">$<?php echo htmlentities($result->PricePerDay); ?> /Day</span>
                                        </div>

                                        <div class="offer-action"><a href="#" class="offer-btn-1">Rent Car</a><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>" class="offer-btn-2">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    } ?>



                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Offers Area End -->