<?php session_start();
    error_reporting(0);include_once "include/header.php" ?>
    <?php include_once "include/top_header.php" ?>
        <?php include_once "include/main_header.php" ?>
            <?php  include_once "include/main_menu.php" ?>

                <!-- Car Listing Area Start -->
                <section class="dlauto-car-listing section_70">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="car-list-left">
                                    <div class="sidebar-widget">
                                        <form>
                                            <p>
                                                <input type="text" placeholder="From Address" />
                                            </p>
                                            <p>
                                                <input type="text" placeholder="To Address" />
                                            </p>
                                            <p>
                                                <select>
                                                    <option data-display="Select">AC Car</option>
                                                    <option>Non-AC Car</option>
                                                </select>
                                            </p>
                                            <p>
                                                <input id="reservation_date" name="reservation_date" placeholder="Journey Date" data-select="datepicker" type="text">
                                            </p>
                                            <p class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                <input type="text" class="form-control" placeholder="Journey Time" />
                                            </p>
                                            <p>
                                                <button type="submit" class="dlauto-theme-btn">Find Car</button>
                                            </p>
                                        </form>
                                    </div>
                                    <div class="sidebar-widget">
                                        <ul class="service-menu">
                                            <li class="active"><a href="#">All Brands<span>(2376)</span></a></li>
                                            <li><a href="#">Toyota<span>(237)</span></a></li>
                                            <li><a href="#">nissan<span>(123)</span></a></li>
                                            <li><a href="#">mercedes<span>(23)</span></a></li>
                                            <li><a href="#">hyundai<span>(467)</span></a></li>
                                            <li><a href="#">Audi<span>(123)</span></a></li>
                                            <li><a href="#">datsun<span>(23)</span></a></li>
                                            <li><a href="#">Mitsubishi<span>(223)</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="car-listing-right">
                                    <div class="property-page-heading">
                                        <div class="propertu-page-head">
                                            <ul>
                                                <li class="active"><a href="#"><i class="fa fa-th-list"></i></a></li>
                                                <li><a href="#"><i class="fa fa-th-large"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="paging_status">
                                            <p>1-10 of 25 results</p>
                                        </div>
                                        <div class="propertu-page-shortby">
                                            <label><i class="fa fa-sort-amount-asc"></i>Sort By</label>
                                            <select class="chosen-select-no-single">
                                                <option>Default</option>
                                                <option>Price (Low to High)</option>
                                                <option>Price (High to Low)</option>
                                                <option>Featured</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-------->
                                    <div class="car-grid-list">
                                        <br>
                                        <div class="col-md-12 col-md-push-4">

                                            <?php $sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid  from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>
                                                <div class="product-listing-m gray-bg">
                                                    <div class="product-listing-img"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="Image" /> </a>
                                                    </div>
                                                    <div class="product-listing-content">
                                                        <h5><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->VehiclesTitle);?></a></h5>
                                                        <p class="list-price">$
                                                            <?php echo htmlentities($result->PricePerDay);?> Per Day</p>
                                                        <ul>
                                                            <li><i class="fa fa-user" aria-hidden="true"></i>
                                                                <?php echo htmlentities($result->SeatingCapacity);?> seats</li>
                                                            <li><i class="fa fa-calendar" aria-hidden="true"></i>
                                                                <?php echo htmlentities($result->ModelYear);?> model</li>
                                                            <li><i class="fa fa-car" aria-hidden="true"></i>
                                                                <?php echo htmlentities($result->FuelType);?>
                                                            </li>
                                                        </ul>
                                                        <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>" class="btn">View Details <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                                                    </div>
                                                </div>
                                                <?php }} ?>
                                        </div>
                                    </div>
                                    <!-------->
                                   
                                    <div class="pagination-box-row">
                                        <p>Page 1 of 6</p>
                                        <ul class="pagination">
                                            <li class="active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li>...</li>
                                            <li><a href="#">6</a></li>
                                            <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Car Listing Area End -->
                <?php include_once "include/footer.php" ?>
