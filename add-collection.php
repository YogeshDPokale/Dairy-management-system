<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');

  } else{
// Add Category Code
$ID=$_POST['ID'];
$fat=0;
$snf=0;
$liters=0;
$degree=0;

if(isset($_POST['submit']))
{
//Getting Post Values
 $cno=$_POST['c_no'];
 $date=$_POST['c_date'];
 $liters=$_POST['liters']; 
$fat=$_POST['fat'];   
$degree=$_POST['degree'];
$snf=$_POST['snf'];
$rate=$_POST['rate'];
$amount=$_POST['amount'];


$query=mysqli_query($con,"INSERT INTO `collection`(`c_no`, `c_date`, `liters`, `fat`, `degree`, `snf`, `rate`, `amount`, `ID`) VALUES ('$cno','$date','$liters','$fat','$degree','$snf','$rate','$amount','$ID')");
if($query){
echo "<script>alert('Collection added successfully.');</script>";   
echo "<script>window.location.href='add-collection.php'</script>";
} else{
echo "<script>alert('Something went wrong. Please try again.');</script>";   
echo "<script>window.location.href='add-collection.php'</script>";    
}
}
$ret=0;
$ret2=0;
if($ID==0)

{
  $ID=1;

}
$rss = array();
if(isset($_POST['check1']))
{  
  $ID=$_POST['ID'];
  $ret=mysqli_query($con,"select Name from tblproducer where ID='$ID'");
  $rss=mysqli_fetch_array($ret);
  if($rss['Name']==0){
         $rss['Name']="No Producer Exist of Entered ID";
  }
  $am=0;
  if(!$ret2==0)

{
  $am=intval($rss['Rate']);
  $rss['Rate']=0;
}
}
if($ret==0)

{
  $ret=mysqli_query($con,"select Name from tblproducer where ID=1 ");
  $rss=mysqli_fetch_array($ret);
}
$amount=0;
$rat=0;
if(isset($_POST['calculate']))
{  $fat=$_POST['fat']; 
  $liters=$_POST['liters'];
  $snf=$_POST['snf'];
  if($fat&&$snf){
  $ret2=mysqli_query($con,"SELECT `Rate` FROM `rate` WHERE fat=$fat and snf=$snf");
  $rss=mysqli_fetch_array($ret2);
  $rat=intval($rss['Rate']);
  $amount=$rat*intval($liters);
  }
  // $amount=$amount*$liters;
  // if(!$rss['Rate']){
  //        $rss['Rate']=0;
  // }
  $ID=$_POST['ID'];
  $ret=mysqli_query($con,"select Name from tblproducer where ID='$ID'");
  $rss=mysqli_fetch_array($ret);
  if($rss['Name']==0){
         $rss['Name']="No Producer Exist of Entered ID";
  }
}
if(!$ret2==0)

{
  $rss['Rate']=0;
}

    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Add Collection</title>
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
<li class="breadcrumb-item"><a href="#">Collection</a></li>
<li class="breadcrumb-item active" aria-current="page">Add</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Add Collection</h4>
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
<section class="hk-sec-wrapper">

<div class="row">
<div class="col-sm">
<form class="needs-validation" method="post" novalidate>
                                       
<h2>Enter Collection Details</h2> <br>
            <a class="u-form-group u-form-group-1">
              <label for="text-f2f0" class="u-label" >Collection No:->Assign Automatically</label>
             &nbsp;  &nbsp;  &nbsp;  &nbsp; 
            <a class="u-form-group u-form-name">
              <label for="name-431d" class="u-label">Date:-</label>
              <input type="date" placeholder="Enter your Name" id="name-431d" name="c_date" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white u-input-2" >
            </a><br><br>
            <a class="col-md-1 mb-2">
              <label for="text-ff0" class="u-label"><ID:-> Producer ID:-</ID:-></label>
              <input type="number" style="width:5%" value=<?php echo $ID   ;?>  id="text-ff0" name="ID" class="u-border-1 u-border-grey-30 u-input u-input-cube u-white u-input-1">
            </a>&nbsp;  <button class="btn btn-primary" type="submit" name="check1">Check</button>
            <a class="col-md-1 mb-2">
              <label for="name-41d" class="u-label">Producer Name:- <?php  print_r($rss['Name']);  ?> </label>
              
                          <br><br>
            <a class="u-form-email u-form-group">
              <label for="email-431d" class="u-label">Liters:-</label>
              <input type="float"  id="email-431d" value=<?php echo $liters   ;?> name="liters" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white u-input-3" >
            </a>&nbsp;
            <a class="u-form-group u-form-phone u-form-group-4">
              <label for="phone-bf87" class="u-label">Fat:-</label>
              <input type="float"  id="phone-bf87" value=<?php echo $fat;?> name="fat" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white u-input-4" >
            </a><br><br>
            <a class="u-form-address u-form-group u-form-group-5">
              <label for="address-290a" class="u-label">Degree:-</label>
              <input type="float"  id="address-290a" value=<?php echo $degree   ;?> name="degree" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white u-input-5" >
            </a>&nbsp;
            <a class="u-form-address u-form-group u-form-group-5">
              <label for="address-90a" class="u-label">Snf:-</label>
              <input type="float" id="address-90a" name="snf" value=<?php echo $snf   ;?> class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white u-input-5" >
              <label for ="address-90a" class="u-label">%</label>
            </a>&nbsp;
            <button class="btn btn-primary" type="submit" name="calculate">Calculate</button><br>
<br>            <a class="u-form-address u-form-group u-form-group-5">
              <label for="address-29a" class="u-label">Rate:-</label>
              <input type="float"  id="address-29a" value=<?php echo $rat;  ?> name="rate" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white u-input-5"  >
              <label for= "address-29a" class="u-label">₹</label>
            </a>&nbsp;
       
            <a class="u-form-group u-form-group-1">
              <label for="text-ff0" class="u-label">Amount</label>
              <input type="float"  id="text-ff0" name="amount" value=<?php  echo $amount;  ?> class="u-border-1 u-border-grey-30 u-input u-input-cube u-white u-input-1">
              <label for ="text-ff0" class="u-label">₹</label>
            </a>&nbsp;
              
           
              <button class="btn btn-primary" type="submit" name="submit">Submit</button>
            </div>
          



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