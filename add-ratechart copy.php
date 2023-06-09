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
 $st1=$_POST['start1'];
$ed1=$_POST['end1'];
$st2=$_POST['start2'];
$ed2=$_POST['end2'];
$a=$_POST['a'];
$b=$_POST['b'];
$v=$b;
$c=$_POST['c'];
$d=$_POST['d'];
$e=$_POST['e'];
$Rate=$_POST['Rate'];
$rate1=$Rate;
$rate2=$Rate;





$x=($ed1-$st1)*10;
$y=$st1;
for($i=0;$i<=$x;$i++)
{   
    $q1=mysqli_query($con,"INSERT INTO `fat`( `Fat`) VALUES ('$y')");
    if($q1){
        $y=$y+0.1;
    }

}

$u=($ed2-$st2)*10;
$z=$st2;
for($i=0;$i<=$u;$i++)
{   
    $q2=mysqli_query($con,"INSERT INTO `snf`(`SNF`) VALUES ('$z')");
    if($q2){
        $z=$z+0.1;
        
    }
}


$g=(3.5-$st1)*10;
$g++;
$h=(8.5-$st2)*10;
$i=$h-5;
$m=0;
$fat=3.5;
$snf=8.5;
for($t=$g;$t>0;$t--)
{    
     
     $rate1=$Rate-($a)*$m;
     $m++;
    for($k=0;$k<5;$k++)
    {   
        
        $q3=mysqli_query($con,"INSERT INTO `rate`(`Fat`, `SNF`, `Rate`) VALUES ('$fat','$snf','$rate1')"); 
                $rate1=$rate1-$d;
            $snf=$snf-0.1;
    }
    $l=0;
    for($l=$i;$l>=0;$l--)
    {   
         $q4=mysqli_query($con,"INSERT INTO `rate`(`Fat`, `SNF`, `Rate`) VALUES ('$fat','$snf','$rate1')"); 
         $rate1=$rate1-$c;
         $snf=$snf-0.1;
    }
$fat=$fat-0.1;
$snf=8.5;
}

$n=($ed1-3.5)*10;
$o=($ed2-8.5)*10;
$fat=3.5;

$m=1;
for($r=0;$r<$n;$r++)
{   
    $fat=$fat+0.1;
    $rate2=$Rate+($v)*$m;
     $m++;
     $snf=8.5;
    for($s=0;$s<$o;$s++)
    {  
         $snf=$snf+0.1;
        $rate2=$rate2+$e;
        $q5=mysqli_query($con,"INSERT INTO `rate`(`Fat`, `SNF`, `Rate`) VALUES ('$fat','$snf','$rate2')"); 
     
    }

}

if($q1&&$q2&&$q3&&$q4&&$q5){
    echo "<script>alert('Data in rate chart added successfully.');</script>";   
    echo "<script>window.location.href='add-ratechart.php'</script>";
    } else{
    echo "<script>alert('Something went wrong. In Adding Data.');</script>";   
    echo "<script>window.location.href='add-ratechart.php'</script>";    
    }
}
if(isset($_POST['submit2']))
{  
  $q6=mysqli_query($con,"delete from rate");
  $q7=mysqli_query($con,"delete from fat");
  $q8=mysqli_query($con,"delete from snf");
  

  if($q6&&$q7&&$q8){
    echo "<script>alert('Data in rate chart Deleted successfully.');</script>";   
    echo "<script>window.location.href='add-ratechart.php'</script>";
    } else{
    echo "<script>alert('Something went wrong. In Deleting Data.');</script>";   
    echo "<script>window.location.href='add-ratechart.php'</script>";    
    }
  }
?>
 
 <html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Add Rate Chart </title>
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
<li class="breadcrumb-item"><a href="#">Rate Chart</a></li>
<li class="breadcrumb-item active" aria-current="page">Add</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Add Rate Chart</h4>
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
<section class="hk-sec-wrapper">

<div class="row">
<div class="col-sm">
 <form class="needs-validation" method="post" novalidate>
 <h2>Enter Rate chart Details</h2> <br>

 <a class="u-form-group u-form-group-1">
 <label for="text-f2f0" class="u-label">Sarting Fat:-</label>
 <input type="float" placeholder="start" id="text-f2f0" name="start1" class="u-border-1 u-border-grey-30 u-input u-input-cube u-white u-input-1">
</a>&nbsp;&nbsp;&nbsp;

<a class="u-form-group u-form-group-1">
<label for="text-f20" class="u-label">Ending Fat:-</label>
<input type="float" placeholder="end" id="text-f20" name="end1" class="u-border-1 u-border-grey-30 u-input u-input-cube u-white u-input-1">
</a>&nbsp;<br><br>
<a class="u-form-group u-form-group-1">
 <label for="text-f2f" class="u-label">Sarting SNF:-</label>
 <input type="float" placeholder="start" id="text-f2f" name="start2" class="u-border-1 u-border-grey-30 u-input u-input-cube u-white u-input-1">
</a>&nbsp;&nbsp;&nbsp;

<a class="u-form-group u-form-group-1">
<label for="text-ff0" class="u-label">Ending SNF:-</label>
<input type="float" placeholder="end" id="text-ff0" name="end2" class="u-border-1 u-border-grey-30 u-input u-input-cube u-white u-input-1">
</a>&nbsp;<br><br>

<a class="u-form-group u-form-group-1">
 <label for="ext-f2f0" class="u-label">Decrease Rate below 3.5 fat:-</label>
 <input type="float"  id="ext-f2f0" name="a" class="u-border-1 u-border-grey-30 u-input u-input-cube u-white u-input-1">
</a>&nbsp;&nbsp;&nbsp;

<a class="u-form-group u-form-group-1">
<label for="text-ff0" class="u-label">Increase Rate After 3.5 fat:-</label>
<input type="float"  id="tet-ff0" name="b" class="u-border-1 u-border-grey-30 u-input u-input-cube u-white u-input-1">
</a>&nbsp;<br><br>

<a class="u-form-group u-form-group-1">
 <label for="ext-f2f0" class="u-label">Decrease Rate below 8.0 SNF:-</label>
 <input type="float"  id="ext-f2f0" name="c" class="u-border-1 u-border-grey-30 u-input u-input-cube u-white u-input-1">
</a>&nbsp;

<a class="u-form-group u-form-group-1">
 <label for="txt-f2f0" class="u-label">Decrease Rate 8.5 to 8.0 SNF:-</label>
 <input type="float"  id="txt-f2f0" name="d" class="u-border-1 u-border-grey-30 u-input u-input-cube u-white u-input-1">
</a>&nbsp;&nbsp;&nbsp<br><br>

<a class="u-form-group u-form-group-1">
 <label for="tex-f2f0" class="u-label">Increase Rate After 8.5 SNF:-</label>
 <input type="float"  id="tex-f2f0" name="e" class="u-border-1 u-border-grey-30 u-input u-input-cube u-white u-input-1">
</a>&nbsp;&nbsp;&nbsp;

<a class="u-form-group u-form-group-1">
 <label for="tex-f0" class="u-label">Rate At fat=3.5 and SNF=8.5:-</label>
 <input type="float"  id="tex-f0" name="Rate" class="u-border-1 u-border-grey-30 u-input u-input-cube u-white u-input-1">
</a>&nbsp;&nbsp;&nbsp;
<br><br>

<button class="btn btn-primary" type="submit" name="submit">Submit</button><br><br>
<h4>Clear All Data From Ratechart <h4><br>
<h6>If you want to enter new Data in Ratechart Then Frist Clear All Data from old Rate Chart<h6><br><br>
<button class="btn btn-primary" type="submit" name="submit2">Clear All</button>
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