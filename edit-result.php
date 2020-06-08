<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{

$stid=intval($_GET['stid']);
if(isset($_POST['submit']))
{

$rowid=$_POST['id'];
$CA=$_POST['CA'];
$CASS=$_POST['CASS'];
$marks=$_POST['marks']; 
$FirstTerm=$_POST['FirstTerm'];
$SecondTerm=$_POST['SecondTerm'];
$open=$_POST['Open'];
$present=$_POST['Present'];
$absent=$_POST['Absent'];
$resume=$_POST['Resume'];
$comment1=$_POST['Comment1'];
$comment1=$_POST['Comment2'];
foreach($_POST['id'] as $count => $id){
$ca=$CA[$count];
$cass=$CASS[$count];
$mrks=$marks[$count];
$firstterm=$FirstTerm[$count];
$iid=$rowid[$count];
$secondterm=$SecondTerm[$count];
for($i=0;$i<=$count;$i++) {

$sql="update tblresult set CA=:ca,CASS=:cass,marks=:mrks,FirstTerm=:firstterm,SecondTerm=:secondterm,Open=:open,Present=:present,Absent=:absent,Resume=:resume,Comment1=:comment1,Comment2=:comment2 where id=:iid ";
$query = $dbh->prepare($sql);
$query->bindParam(':ca',$ca,PDO::PARAM_STR);
$query->bindParam(':cass',$cass,PDO::PARAM_STR);
$query->bindParam(':mrks',$mrks,PDO::PARAM_STR);
$query->bindParam(':firstterm',$firstterm,PDO::PARAM_STR);
$query->bindParam(':secondterm',$secondterm,PDO::PARAM_STR);
$query->bindParam(':open',$open,PDO::PARAM_STR);
$query->bindParam(':present',$present,PDO::PARAM_STR);
$query->bindParam(':absent',$absent,PDO::PARAM_STR);
$query->bindParam(':resume',$resume,PDO::PARAM_STR);
$query->bindParam(':comment1',$comment1,PDO::PARAM_STR);
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
$query->execute();

$msg="Result info updated successfully";
}
}
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SMS Admin|  Student result info < </title>
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
                                    <h2 class="title">Student Result Info</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Result Info</li>
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
                                                    <h5>Update the Result info</h5>
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

$ret = "SELECT tblstudents.StudentName,tblclasses.ClassName,tblclasses.Exam from tblresult join tblstudents on tblresult.StudentId=tblresult.StudentId join tblsubjects on tblsubjects.id=tblresult.SubjectId join tblclasses on tblclasses.id=tblstudents.ClassId where tblstudents.StudentId=:stid limit 1";
$stmt = $dbh->prepare($ret);
$stmt->bindParam(':stid',$stid,PDO::PARAM_STR);
$stmt->execute();
$result=$stmt->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($stmt->rowCount() > 0)
{
foreach($result as $row)
{  ?>


                                                    <div class="form-group">
                                            <label for="default" class="col-sm-2 control-label">Class</label>
                                                        <div class="col-sm-10">
<?php echo htmlentities($row->ClassName)?>( <?php echo htmlentities($row->Exam)?>)
                                                        </div>
                                                    </div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Full Name</label>
<div class="col-sm-10">
<?php echo htmlentities($row->StudentName);?>
</div>
</div>
<?php } }?>



<?php 
$sql = "SELECT distinct tblstudents.StudentName,tblstudents.StudentId,tblclasses.ClassName,tblclasses.Exam,tblsubjects.SubjectName,tblresult.CA,tblresult.CASS,tblresult.marks,tblresult.FirstTerm,tblresult.SecondTerm,Open,Present,Absent,Resume,Comment1,Comment2, tblresult.id as resultid from tblresult join tblstudents on tblstudents.StudentId=tblresult.StudentId join tblsubjects on tblsubjects.id=tblresult.SubjectId join tblclasses on tblclasses.id=tblstudents.ClassId where tblstudents.StudentId=:stid ";
$query = $dbh->prepare($sql);
$query->bindParam(':stid',$stid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>



<div class="form-group">
<label for="default" class="col-sm-2 control-label"><?php echo htmlentities($result->SubjectName)?></label>
<div class="col-sm-10">
<input type="hidden" name="id[]" value="<?php echo htmlentities($result->resultid)?>">
<label>CA-1</label><input <?php if("CA[]">20) echo "error"; ?> type="text" name="CA[]" class="form-control" id="CA" value="<?php echo htmlentities($result->CA)?>" maxlength="5" required="required" autocomplete="off">
<label>CA-2</label><input <?php if("CASS[]">20) echo "error"; ?> type="text" name="CASS[]" class="form-control" id="CASS" value="<?php echo htmlentities($result->CASS)?>" maxlength="5" required="required" autocomplete="off">
<label>EXAM</label><input <?php if("marks[]">60) echo "error"; ?> type="text" name="marks[]" class="form-control" id="marks" value="<?php echo htmlentities($result->marks)?>" maxlength="5" required="required" autocomplete="off">
<label>SECOND-TERM</label><input <?php if("SecondTerm[]">100) echo "error"; ?> type="text" name="SecondTerm[]" class="form-control" id="" value="<?php echo htmlentities($result->SecondTerm)?>" maxlength="5" required="required" autocomplete="off">
<label>FIRST-TERM</label><input <?php if("FirstTerm[]">100) echo "error"; ?> type="text" name="FirstTerm[]" class="form-control" id="" value="<?php echo htmlentities($result->FirstTerm)?>" maxlength="5" required="required" autocomplete="off">
</div>
</div>




<?php }} ?>
<table>
<tr>
<td>
<div class="form-group">
<div class="col-sm-offset-1 col-sm-10">
<label for="date" class="col-sm-5 control-label"> Times School Open </label>
<input type="Open" name="Open" id="Open" value="<?php echo htmlentities($result->Open)?>"  class=""></input>
</td>
<td>
<div class="form-group">
<div class="col-sm-offset-1 col-sm-10">
<label for="date" class="col-sm-5 control-label">  Times present </label>
<input type="Present" name="Present" id="Present" value="<?php echo htmlentities($result->Present)?>"  class=""></input>
</td>
</tr>
<tr>
<td>
<div class="form-group">
<div class="col-sm-offset-1 col-sm-10">
<label for="date" class="col-sm-5 control-label"> Times Absent </label>
<input type="Absent" name="Absent" id="Absent" value="<?php echo htmlentities($result->Absent)?>"  class=""></input>
</td>
<td>
<div class="form-group">
<div class="col-sm-offset-1 col-sm-10">
<label for="date" class="col-sm-5 control-label">   Resumption Date </label>
<input type="Resume" name="Resume" id="Resume" value="<?php echo htmlentities($result->Resume)?>"  class=""></input>
</td>	
</tr>
<tr>
<td>
<div class="form-group">
<div class="col-sm-offset-1 col-sm-10">
<label for="date" class="col-sm-5 control-label">   Principal's Comment </label>
<input type="text" name="Comment1" id="Comment1" value="<?php echo htmlentities($result->Comment1)?>"  class=""></input>
</td>
<td>
<div class="form-group">
<div class="col-sm-offset-1 col-sm-10">
<label for="date" class="col-sm-5 control-label">  Teacher's Comment </label>
<input type="text" name="Comment2" id="Comment2" value="<?php echo htmlentities($result->Comment2)?>"  class=""></input>
</td>	
</tr>
</table>											    
													<div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-12 -->
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
<?PHP } ?>
