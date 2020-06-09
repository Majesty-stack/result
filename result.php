<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Result Management System</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.12.2/printThis.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="css/bootstrap.min.css"  >
<link rel="stylesheet" href="js/jquery.min.js"  >
<link rel="stylesheet" href="css/bootstrap.min.js" >
<link rel="stylesheet" href="" media="screen" >
<link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
<link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
<link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
<link rel="stylesheet" href="css/prism/prism.css" media="screen" >
<link rel="stylesheet" href="css/main.css" media="screen" >
<script src="js/modernizr/modernizr.min.js"></script>
<script src="js/jquery/jquery-2.2.4.js" "></script>    
<script src="js/jquery.js" ></script>
<script src="js/jquery.min.js" ></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<link href="css/stylesheet.css" rel="stylesheet" type="text/css"/>
</head> 
<body>
<section>
<div class="main-wrapper">
<div class="content-wrapper">
<div class="content-container">
				<!-- /.left-sidebar -->
<div class="main-page">
<div class="container-fluid">
<div class="row page-title-div">
<div class="col-md-12">
<h2 class="title" align="center"></h2>
</div>
</div>
<!-- /.row -->
<!-- /.row -->
</div>
<!-- /.container-fluid -->
<div class="container-fluid">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel">
<div class="panel-heading">
<div class="panel-title">
<div class="desktop" id="examples">		

<table>
	<tr>
	  <table id="outerTable">
		 <tr>
			 <td id="balad">
				<div>
					  <img src="image/balad.jpg" width="188" height="143" alt="balad">
				 </div>
		   </td>
			   <td id="header">
				   <div>
						 <h1> <center>BALAD COMPREHENSIVE COLLEGE</center></h1>
						 <p><center>1,Obafemi Street,Abule Alfa Bus Stop,Off Isawo,Agric,Ikorodu,Lagos,Nigeria</center></p>
						 <p><center><b> Tel : 08024246368,    Email : baladschools@gmail.com</b> </center></p>
					</div>
				 </td>
		   </tr>
	</table>
<tr>
<td>
<table id="contentLeft">
<?php
// code Student Data
$rollid=$_POST['rollid'];
$classid=$_POST['class'];
$_SESSION['rollid']=$rollid;
$_SESSION['classid']=$classid;
$_SESSION['StudentId']=$StudentId;	
$query = "SELECT   tblstudents.StudentName,tblstudents.RollId,tblstudents.AdmissionNumber,tblstudents.Age,tblstudents.Sex,tblstudents.image,tblstudents.RegDate,tblstudents.StudentId,tblstudents.Status,tblclasses.Session,tblclasses.ClassName,tblclasses.Exam from tblstudents join tblclasses on tblclasses.id=tblstudents.ClassId where tblstudents.RollId=:rollid and tblstudents.ClassId=:classid";
$stmt = $dbh->prepare($query);
$stmt->bindParam(':rollid',$rollid,PDO::PARAM_STR);
$stmt->bindParam(':classid',$classid,PDO::PARAM_STR);
$stmt->execute();
$resultss=$stmt->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($stmt->rowCount() > 0)
{
foreach($resultss as $row)
{   ?>
<tr>
<td id="left">
         <p><b>Student Name :</b> <?php echo htmlentities($row->StudentName);?></p>
		 <p><b>Academic session :</b> <?php echo htmlentities($row->Session);?></p>
		 <p><b>Student Age :</b> <?php echo htmlentities($row->Age);?></p>
</td>
<td id="right">
	    <p><b>Admission Number :</b> <?php echo htmlentities($row->AdmissionNumber);?></p>
	    <p><b>Student Class:</b> <?php echo htmlentities($row->ClassName);?>(<?php echo htmlentities($row->Exam);?>)
		<p><b>Student Sex :</b> <?php echo htmlentities($row->Sex);?></p>
		
</td>
<td id="pix">
		<img src="<?php echo htmlentities($row->image);?>" width="130" height="150" alt="">
</td>

</tr>
<tr>


<?php }
?>
</table>
</td>													
</tr>
<div class="panel-body p-20">
<table class="table table-hover table-bordered">
<thead>
    <tr>
    <th >SN</th>
	<th>SUBJECTS</th>    
	<th> CA-1</th>
	<th> CA-2</th>
	<th>EXAM</th>
	<th>3RD-TERM</th>
	<th>2ND-TERM</th>
	<th>1ST-TERM</th>
	<th>TOTAL</th>
	<th>AVE.</th>
	<th>POSITION</th>
	<th>GRADE</th>
	</tr>
</thead> 
<tbody>
<?php                                              
// Code for result
$query ="select t.StudentName,t.RollId,t.ClassId,t.CA,t.CASS,t.marks,t.FirstTerm,t.SecondTerm,t.Open,t.Present,t.Absent,t.Resume,t.Comment1,t.Comment2,SubjectId,tblsubjects.SubjectName,tblsubjects.SubjectTeacher from (select sts.StudentName,sts.RollId,sts.ClassId,tr.CA,tr.CASS,tr.marks,tr.FirstTerm,tr.SecondTerm,tr.Open,tr.Present,tr.Absent,tr.Resume,tr.Comment1,tr.Comment2,SubjectId from tblstudents as sts join  tblresult as tr on tr.StudentId=sts.StudentId) as t join tblsubjects on tblsubjects.id=t.SubjectId where (t.RollId=:rollid and t.ClassId=:classid)";
$query= $dbh -> prepare($query);
$query->bindParam(':rollid',$rollid,PDO::PARAM_STR);
$query->bindParam(':classid',$classid,PDO::PARAM_STR);
$query-> execute();  
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
$comment=$comment;

if($countrow=$query->rowCount()>0)
{ 
foreach($results as $result){
	$subject_id= $result->SubjectId;
?>
<tr>
<th scope="row"><?php echo htmlentities($cnt);?></th>
<td><?php echo htmlentities($result->SubjectName);?></td>
<td ><?php echo htmlentities($totalCA=$result->CA);?></td>
<td ><?php echo htmlentities($totalCASS=$result->CASS);?></td>
<td><?php echo htmlentities($totalmarks=$result->marks);?></td>
<td><?php
echo htmlentities($totalscore=$totalCA+$totalCASS+$totalmarks);
// This query is suppose to return the value of the thirdterm scores into the database but in this case it returned only one value and duplicate it.
// Pls refer to my database of tblresult for more clarification.
$sql="update  tblresult set ThirdTerm=:thirdterm where ClassId=:classid";
$query = $dbh->prepare($sql);
$query->bindParam(':thirdterm',$totalscore,PDO::PARAM_STR);
$query->bindParam(':classid',$classid,PDO::PARAM_STR);
$query-> execute();
;?></td>
<td><?php echo htmlentities($secondterm=$result->SecondTerm);?></td>
<td><?php echo htmlentities($firstterm=$result->FirstTerm);?></td>
<td><?php echo htmlentities($totals=$totalscore+$firstterm+$secondterm);?></td>

<td>
<?php
$average=(round (htmlentities($totals)/3));
 echo $average;
//This query is suppose to return the value of the average scores into the database but in this case it returned only one value and duplicate it.
// the average score for each subject will be used as rank for each students
// Pls refer to my database of tblresult for more clarification. 
$sql="update  tblresult set Average=:average where ClassId=:classid";
$query = $dbh->prepare($sql);
$query->bindParam(':average',$average,PDO::PARAM_STR);
$query->bindParam(':classid',$classid,PDO::PARAM_STR);
$query-> execute();
?>
</td>
<td>
	
<?php 
$query ="select (FirstTerm+ThirdTerm+SecondTerm) as total from tblresult where ClassId=:classid and SubjectId=:subjectid ORDER BY total DESC";
$query= $dbh -> prepare($query);
$query->bindParam(':subjectid',$subject_id,PDO::PARAM_STR);
$query->bindParam(':classid',$classid,PDO::PARAM_STR);
$query-> execute();  
$subjects = $query -> fetchAll(PDO::FETCH_ASSOC);
$pos_array= array_column($subjects, 'total');
$position = array_search($totals, $pos_array)+1;
echo $position.'/'.count($pos_array)
?>

</td>
<td><?php ($grade=(round (htmlentities(($average=$totalscore+$firstterm+$secondterm)/3,2))));
						if($grade>70 && $grade<=100){
							echo "A";
						}
						elseif
						($grade>=69 ){
							echo "B";
						}
						elseif
						($grade>=59){
							echo "C";
						}
						elseif
						($grade>=49){
							echo "D";
						}
						elseif
						($grade>=39){
							echo "E";
						}
						else{
							echo "F";
						}
?>
</td>
 </tr>
<?php 
$totlcount+=$totals;
$cnt++;}
?>
<tr> <th scope="row" colspan="2">Total Marks</th>
<td scope="row" colspan="2" ><b><?php echo htmlentities($totlcount); ?></b> out of <?php echo htmlentities($outof=($cnt-1)*300); ?></td>
<td><b> Times school opened </b></td> <td> => <?php echo htmlentities($result->Open);?></td>
 <td><b>Times Present</b></td><td scope="row" colspan="1"> =><?php echo htmlentities($result->Present);?></td>
 <td><b> Times Absent </b></td> <td> => <?php echo htmlentities($result->Absent);?></td>
</tr>
<tr> <th scope="row" colspan="2"> Average Score </th>
<td scope="row" colspan="2"> <?php $scores=(($totlcount)/3);
echo ((round (htmlentities($scores),2)));
$sql="update  tblstudents set Scores=:scores where RollId=:rollid";
$query = $dbh->prepare($sql);
$query->bindParam(':scores',$scores,PDO::PARAM_STR);
$query->bindParam(':rollid',$rollid,PDO::PARAM_STR);
$query-> execute(); 
?>
</td>
 <td scope="row" colspan="2"> <b>Percentage</b></td><td scope="row" colspan="2" ><?php echo  (round (htmlentities($totlcount*(100)/$outof,2))); ?>%</td>
</tr>
</div
</table>
</div>
<?php } else { ?>     
<div class="alert alert-warning left-icon-alert" role="alert">
<strong>Notice!</strong> Your result not declare yet
<?php }
?>
</div>
<?php   } else {?>
<div class="alert alert-danger left-icon-alert" role="alert">
<strong>Oh snap!</strong>
<?php
$display="none";
echo htmlentities("Invalid PIN"); }?>
</div>
</tbody>
</table

</div>
<div>
	<table>
		<tr>
			<td><p><b>Teacher's Comments   :</b><?php echo htmlentities($result->Comment2);?></p></td>
			<td><p><b> Next term begins   :</b><?php echo htmlentities($result->Resume);?></p></td>
		
		</tr>
		
		<tr>
			<td><p><b>Principal's Comments :</b><?php echo htmlentities($result->Comment1);?></p></td>
			<td><b>principal's Signature............<b></td>
		</tr>
	</table>
</div>
<a href="index.php">Back to Home</a>

</div>
<!-- /.panel -->
</div>
<!-- /.col-md-6 -->



<!-- /.row -->
</div>
<!-- /.container-fluid -->

</section>

<div class="col-xs-12">

<a href="#" style="display:<?php echo $display;?>; width: 100px; " class="btn btn-warning desktop" id="print" onclick="printContent('examples')">Download</a> 
</div>
<!-- /.section -->
						
						<!------End of desktop section------->
						





<script >
	function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }

</script>
<script>

	$('#print').click(function(){
$('.desktop').printThis();
	})
</script>