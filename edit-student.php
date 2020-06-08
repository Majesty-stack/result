<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: add-students.php"); 
    }
    else{
$stid=intval($_GET['stid']);		
if(isset($_POST['submit'])){
$studentname=$_POST['fullanme'];
$admission=$_POST['admission'];
$rollid=$_POST['rollid'];
$state=$_POST['state'];
$studentphone=$_POST['telephonenumber'];
$studentaddress=$_POST['address'];
$gender=$_POST['gender'];
$classname=$_POST['classname'];
$exam=$_POST['exam']; 
$classid=$_POST['class'];
$dob=$_POST['dob']; 
$status=1;

$sql="update tblstudents set StudentName=:studentname,AdmissionNumber=:admissionnumber,RollId=:roolid,State=:state,TelephoneNumber=:telephonenumber,Address=:address,Gender=:gender,ClassId=:classid,DOB=:dob,Status=:status where StudentId=:stid ";
$query = $dbh->prepare($sql);
$query->bindParam(':studentname',$studentname,PDO::PARAM_STR);
$query->bindParam(':admissionnumber',$admission,PDO::PARAM_STR);
$query->bindParam(':roolid',$roolid,PDO::PARAM_STR);
$query->bindParam(':state',$state,PDO::PARAM_STR);
$query->bindParam(':telephonenumber',$studentphone,PDO::PARAM_STR);
$query->bindParam(':address',$studentaddress,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':classid',$classid,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':stid',$stid,PDO::PARAM_STR);
$query->execute();

$msg="Student info updated successfully";
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SMS Admin| Student Admission< </title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/select2/select2.min.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
  <?php include('includes/topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

                    <!-- ========== LEFT SIDEBAR ========== -->
                   <?php include('includes/leftbar.php');?>  
                    <!-- /.left-sidebar -->

                    <div class="main-page">

                     <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Student Admission</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Student Admission</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="container-fluid">
                           
                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Edith Student info</h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">
<?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Well done!</strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                                <form class="form-horizontal" method="post">
<?php 

$sql = "SELECT tblstudents.StudentName,tblstudents.AdmissionNumber,tblstudents.RollId,tblstudents.RegDate,tblstudents.StudentId,tblstudents.Status,tblstudents.State,tblstudents.TelephoneNumber,tblstudents.Address,tblstudents.Gender,tblstudents.DOB,tblclasses.ClassName,tblclasses.Exam from tblstudents join tblclasses on tblclasses.id=tblstudents.ClassId where tblstudents.StudentId=:stid";
$query = $dbh->prepare($sql);
$query->bindParam(':stid',$stid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>
<?php } }?> 
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Full Name</label>
<div class="col-sm-10">
<input  type="text" name="fullanme" class="form-control" id="fullanme" value="<?php echo htmlentities($result->StudentName);?>" maxlength="50" required="required" autocomplete="off">
</div>
</div>




<div class="form-group">
<label for="default" class="col-sm-2 control-label"> Admission Number </label>
<div class="col-sm-10">
<input type="admission" name="admission" class="form-control" id="admission"value="<?php echo htmlentities($result->AdmissionNumber);?>"  maxlength="10" required="required" autocomplete="off">
</div>
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label"> PIN </label>
<div class="col-sm-10">
<input type="rollid" name="rollid" class="form-control" id="rollid"value="<?php echo htmlentities($result->RollId);?>"  maxlength="10" required="required" autocomplete="off">
</div>
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label"> State of origin </label>
<div class="col-sm-10">
<input type="state" name="state" class="form-control" id="state"value="<?php echo htmlentities($result->State);?>" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label"> Phone Number </label>
<div class="col-sm-10">
<input type="telephonenumber" name="telephonenumber" class="form-control" id="telephonenumber"value="<?php echo htmlentities($result->TelephoneNumber);?>" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label"> Address </label>
<div class="col-sm-10">
<input type="text" name="address" class="form-control" id="address"value="<?php echo htmlentities($result->Address);?>" required="required" autocomplete="off">
</div>
</div>


<div class="form-group">
<label for="default" class="col-sm-2 control-label">Gender</label>
<div class="col-sm-10">
<input type="radio" name="gender" value="Male" required="required" checked="">Male <input type="radio" name="gender" value="Female" required="required"> Female <input type="radio" name="gender" value="Other" required="required"> Other
</div>
</div>










<div class="form-group">
<label for="default" class="col-sm-2 control-label">Class</label>
<div class="col-sm-10">
<?php $sql = "SELECT * from tblclasses";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

?>
<input type="text" name="classname" class="form-control" id="classname" value="<?php echo htmlentities($result->ClassName);?>(<?php echo htmlentities($result->Exam);?>)" maxlength="30" required="required" autocomplete="off">

 
                                                        </div>
                                                    </div>
													
<div class="form-group">
<label for="date" class="col-sm-2 control-label"> DOB</label>
<div class="col-sm-10">
<input type="date"  name="dob" class="form-control" id="dob" value="<?php echo htmlentities($result->DOB);?>"  autocomplete="off">
</div>
</div>
													

                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="submit"   class="btn btn-primary">Add</button>
                                                        </div></form>
                                                        </div>
													
                                                    </div>
												                                                    

                                           

                                            </div>
                                        </div>-->
                                    </div>
							
                                    <!-- /.col-md-12 
                                </div>
									
                    </div>
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
									
        <!-- /.main-wrapper -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <script src="js/prism/prism.js"></script>
        <script src="js/select2/select2.min.js"></script>
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $(".js-states").select2();
                $(".js-states-limit").select2({
                    maximumSelectionLength: 2
                });
                $(".js-states-hide").select2({
                    minimumResultsForSearch: Infinity
                });
            });
        </script>
    </body>
</html>
<?php } ?>
