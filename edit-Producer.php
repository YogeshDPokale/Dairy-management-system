<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
// Add Category Code
if(isset($_POST['update']))
{
$cid=substr(base64_decode($_GET['catid']),0,-5);    
//Getting Post Values

$name=$_POST['name'];
$email=$_POST['email'];
$ph=$_POST['phone'];
$vg=$_POST['Village'];   
$ta=$_POST['Taluka'];
$dist=$_POST['District'];
$pin=$_POST['Pincode'];
$ach=$_POST['ACHName'];
$bn=$_POST['BranchName'];
$ac=$_POST['ACNO'];
$ifsc=$_POST['IFSC'];
// $query=mysqli_query($con,"update tblproducer set Name='$name',Email=$email,MobileNumber=$ph,Village=$vg,Taluka=$ta,District=$dist,Pincode=$pin,ACHName=$ach,BranchName=$bn,ACNO=$ac,IFSC='$ifsc' where ID='$cid'"); 

$query=mysqli_query($con,"UPDATE `tblproducer` SET `ID`='$cid',`Name`='$name',`Email`='$email',`MobileNumber`='$ph',`Village`='$vg',`Taluka`='$ta',`District`='$dist',`Pincode`='$pin',`ACHName`='$ach',`BranchName`='$bn',`ACNO`='$ac',`IFSC`='$ifsc' WHERE ID='$cid'");

echo "<script>alert('Producer updated successfully.');</script>";   
echo "<script>window.location.href='manage-Producer.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Edit Producer</title>
    <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    
    
	<!-- HK Wrapper -->
	<div class="hk-wrapper hk-vertical-nav">

<!-- Top Navbar -->
<?php include_once('includes/navbar.php');
include_once('includes/sidebar.php');
?>
    <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <!-- /Vertical Nav -->
        <!-- Main Content -->
        <div class="hk-pg-wrapper">
            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
<li class="breadcrumb-item"><a href="#">Producer</a></li>
<li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Edit Producer</h4>
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
<section class="hk-sec-wrapper">

<div class="row">
<div class="col-sm">
<form class="needs-validation" method="post" novalidate>
<?php
$cid=substr(base64_decode($_GET['catid']),0,-5);
$ret=mysqli_query($con,"select * from tblproducer where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>   




<h2>Edit Producer Details of Sr.No :- <?php echo $row['ID'];?>  </h2> <br>
            
            <a class="u-form-group u-form-name">
              <label for="name-431d" class="u-label">Name:-</label>
              <input type="text" placeholder="Enter your Name" id="name-431d" value="<?php echo $row['Name'];?>" name="name" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white u-input-2" required="">
            </a>&nbsp;&nbsp;
            <a class="col-md-1 mb-6">
            <label for="validationCustom03">Email</label>
              <input type="email"  style="width:30%" placeholder="Enter a valid email address" id="validationCustom03" name="email"  value="<?php echo $row['Email'];?>" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white u-input-3" required="">
            </a><br><br>
            <a class="u-form-group u-form-phone u-form-group-4">
              <label for="phone-bf87" class="u-label">Phone No:-</label>
              <input type="tel" pattern="\+?\d{0,3}[\s\(\-]?([0-9]{2,3})[\s\)\-]?([\s\-]?)([0-9]{3})[\s\-]?([0-9]{2})[\s\-]?([0-9]{2})" placeholder="ph.no(e.g.+91155552675)"  value="<?php echo $row['MobileNumber'];?>"  id="phone-bf87" name="phone" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white u-input-4" required="">
            </a>&nbsp;&nbsp;
            <a class="u-form-address u-form-group u-form-group-5">
              <label for="address-290a" class="u-label">Village:-</label>
              <input type="text" placeholder="Enter Village Name" id="address-290a" value="<?php echo $row['Village'];?>" name="Village" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white u-input-5" required="">
            </a>&nbsp;&nbsp;
            <a class="u-form-address u-form-group u-form-group-5">
              <label for="address-90a" class="u-label">Taluka:-</label>
              <input type="text" placeholder="Taluka" id="address-90a"  value="<?php echo $row['Taluka'];?>"  name="Taluka" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white u-input-5" required="">
            </a><br>
<br>            <a class="u-form-address u-form-group u-form-group-5">
              <label for="address-29a" class="u-label">District:-</label>
              <input type="text" placeholder="District" id="address-29a"  value="<?php echo $row['District'];?>" name="District" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white u-input-5" required="">
            </a>&nbsp;
            <a class="u-form-group u-form-group-1">
              <label for="text-ff0" class="u-label"><ID:->Pincode:-</ID:-></label>
              <input type="integer"  value="<?php echo $row['Pincode'];?>" placeholder="Pincode" id="text-ff0" name="Pincode" class="u-border-1 u-border-grey-30 u-input u-input-cube u-white u-input-1">
            </a>&nbsp;<br><br>
              
            <h3>Bank Details</h3><br>
            <a class="u-form-group u-form-name">
              <label for="name-31d" class="u-label">Account Holder Name:-</label>
              <input type="text" placeholder="Enter Account Holder Name" id="name-31d" value="<?php echo $row['ACHName'];?>" name="ACHName" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white u-input-2" required="">
            </a>&nbsp;
            <a class="u-form-group u-form-name">
              <label for="name-43d" class="u-label">Branch Name:-</label>
              <input type="text" placeholder="Branch Name" id="name-43d"  value="<?php echo $row['BranchName'];?>" name="BranchName" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white u-input-2" required="">
            </a><br><br>
            <a>
            <label for="quantity">Account no:-</label>
            <input type="integer" placeholder="Accunt no" id="quantity" value="<?php echo $row['ACNO'];?>" name="ACNO" min="10" max="11">
            </a>&nbsp;
              <a class="u-form-group u-form-name">
                <label for="name-41d" class="u-label">IFSC:-</label>
                <input type="text" placeholder="IFSC Code" id="name-41d" value="<?php echo $row['IFSC'];?>"  name="IFSC" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white u-input-2" required="">
              </a><br><br>
             


<?php } ?>                                 
<button class="btn btn-primary" type="submit" name="update">Update</button>
</form>
</div>
</div>
</section>
                     
</div>
</div>
</div>


            <!-- Footer -->
<?php include_once('includes/footer.php');?>
            <!-- /Footer -->

        </div>
        <!-- /Main Content -->

    </div>

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="vendors/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
    <script src="dist/js/jquery.slimscroll.js"></script>
    <script src="dist/js/dropdown-bootstrap-extended.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <script src="vendors/jquery-toggles/toggles.min.js"></script>
    <script src="dist/js/toggle-data.js"></script>
    <script src="dist/js/init.js"></script>
    <script src="dist/js/validation-data.js"></script>

</body>
</html>
<?php } ?>