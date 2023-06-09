<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
// Add Category Code
if(isset($_POST['submit']))
{
//Getting Post Values
 $st=$_POST['start'];
$ed=$_POST['end'];
$cnt=1;
$a=($ed-$st)*10;
$b=$st;
for($i=0;$i<=$a;$i++)
{   
    $query=mysqli_query($con,"INSERT INTO `fat`(`id1`, `Fat`) VALUES ('$cnt','$b')");
    if($query){
        $b=$b+0.1;
        $cnt=$cnt+1;
    }

}
if($query){
    $b=$st+0.1;
    echo "<script>alert('Data added successfully.');</script>";   
    echo "<script>window.location.href='add-fat.php'</script>";
    } else{
    echo "<script>alert('Something went wrong. Please try again.');</script>";   
    echo "<script>window.location.href='add-fat.php'</script>";    
    }
}
?>
 
 <html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Add Fat table </title>
    <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
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
<li class="breadcrumb-item"><a href="#">Fat</a></li>
<li class="breadcrumb-item active" aria-current="page">Add</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Add Fat</h4>
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
<section class="hk-sec-wrapper">

<div class="row">
<div class="col-sm">
 <form class="needs-validation" method="post" novalidate>
 <h2>Enter Fat details</h2> <br>
 <a class="u-form-group u-form-group-1">
 <label for="text-f2f0" class="u-label">Sarting Fat:-</label>
 <input type="float" placeholder="st" id="text-f2f0" name="start" class="u-border-1 u-border-grey-30 u-input u-input-cube u-white u-input-1">
</a>&nbsp;&nbsp;&nbsp;

<a class="u-form-group u-form-group-1">
<label for="text-f2f0" class="u-label">Ending Fat:-</label>
<input type="float" placeholder="end" id="text-f2f0" name="end" class="u-border-1 u-border-grey-30 u-input u-input-cube u-white u-input-1">
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