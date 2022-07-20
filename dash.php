<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title> EXAM DASHBOARD </title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

<script>
$(function () {
    $(document).on( 'scroll', function(){
        console.log('scroll top : ' + $(window).scrollTop());
        if($(window).scrollTop()>=$(".logo").height())
        {
             $(".navbar").addClass("navbar-fixed-top");
        }

        if($(window).scrollTop()<$(".logo").height())
        {
             $(".navbar").removeClass("navbar-fixed-top");
        }
    });
});

  
function check()
	{
		if (document.getElementById('total').value < 20 )
		{
			document.getElementById('message').style.color = 'red';
			document.getElementById('message').innerHTML = 'Question range should be atleast  20';
		}
		else if (document.getElementById('total').value > 20) 
		{
			document.getElementById('message').style.color = 'red';
			document.getElementById('message').innerHTML = 'Question range should not exceed 20';

		}
    else{
      document.getElementById('message').style.color = 'green';
			document.getElementById('message').innerHTML = '';
    }
	}

  function right_ans()
	{
		if (document.getElementById('right').value < 1 )
		{
			document.getElementById('message2').style.color = 'red';
			document.getElementById('message2').innerHTML = 'Right answer marks should be atleast 1';
		}
		else if (document.getElementById('right').value > 1) 
		{
			document.getElementById('message2').style.color = 'red';
			document.getElementById('message2').innerHTML = 'Right answer marks should not exceed 1';

		}
    else{
      document.getElementById('message2').style.color = 'green';
			document.getElementById('message2').innerHTML = '';
    }
	}


  function wrong_ans()
	{
		if (document.getElementById('wrong').value < 1 )
		{
			document.getElementById('message3').style.color = 'red';
			document.getElementById('message3').innerHTML = 'Right answer marks should be atleast 1';
		}
		else if (document.getElementById('wrong').value > 1) 
		{
			document.getElementById('message3').style.color = 'red';
			document.getElementById('message3').innerHTML = 'Right answer marks should not exceed 1';

		}
    else{
      document.getElementById('message3').style.color = 'green';
			document.getElementById('message3').innerHTML = '';
    }
	}

  function tim()
	{
		if (document.getElementById('time').value < 30 )
		{
			document.getElementById('message4').style.color = 'red';
			document.getElementById('message4').innerHTML = 'Time should be atleast 30';
		}
		else if (document.getElementById('time').value > 30) 
		{
			document.getElementById('message4').style.color = 'red';
			document.getElementById('message4').innerHTML = 'Time should not exceed 30';

		}
    else{
      document.getElementById('message4').style.color = 'green';
			document.getElementById('message4').innerHTML = '';
    }
	}
  function exmtitle()
	{
		if (document.getElementById('exmname').value == "" )
		{
			document.getElementById('exm').style.color = 'red';
			document.getElementById('exm').innerHTML = 'Please enter exam title';
		}
  }
  function examzone()
	{
		if (document.getElementById('tag').value =="" )
		{
			document.getElementById('message6').style.color = 'red';
			document.getElementById('message6').innerHTML = 'Please enter exam zone';
		}
  } 
  function examdesc()
	{
		if (document.getElementById('desc').value ="" )
		{
			document.getElementById('message7').style.color = 'red';
			document.getElementById('message7').innerHTML = 'Please enter description';
		}
  } 
  
</script>
</head>

<body  style="background:#eee;">


</head>
<script>
function pageRedirect() {
	<?php if(@$_GET['q']==4) echo'class="active"'; ?>
  window.location.href = "dash.php?q=4";
}
</script>
   
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo">RTO</span></div>
<?php
 include_once 'dbconnection.php';
//session_start();
include_once 'dbconnection.php';
// echo '<div class="lg"style="margin-top:20px;margin-left:85%;"><a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;<button style="background-color: black;border: none; border:1px solid black inherit;border-style:none;outline: none;">Logout</button></a></span></div>';
?>

</div></div>
<!-- admin start-->

<!--navigation menu-->
<nav class="navbar navbar-default title1">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <li <?php if(@$_GET['q']==5) echo'class="active"'; ?>><a href="dash.php?q=5">Home<span class="sr-only">(current)</span></a></li> 
      <li <?php if(@$_GET['q']==2) echo'class="active"'; ?>><a href="dash.php?q=2">Ranking</a></li>  
      <li <?php if(@$_GET['q']==4) echo'class="active"'; ?>><a href="dash.php?q=4">Add Exams</a></li>
      <li ><a href="rtopanel.php">Signout</a></li>
      </ul>
          </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--navigation menu closed-->
<div class="container"><!--container start-->
<div class="row">
<div class="col-md-12">
<!--add quiz start-->
<?php
if(@$_GET['q']==4 && !(@$_GET['step'])) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Exam Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update1.php?q=addquiz"  method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="exmname" name="name" onkeyup="exmtitle();" placeholder="Enter Exam Title" class="form-control input-md" type="text" required>
  <span id="exm"></span>

  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="total"></label>  
  <div class="col-md-12">
  <input id="total" name="total" onkeyup="check();" placeholder="Enter total number of questions" class="form-control input-md" type="number" required="">
  <span id="message"></span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="right"></label>  
  <div class="col-md-12">
  <input id="right" name="right" onkeyup="right_ans();" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number" required="">
  <span id="message2"></span> 
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="wrong"></label>  
  <div class="col-md-12">
  <input id="wrong" name="wrong" onkeyup="wrong_ans();" placeholder="Enter minus marks on wrong answer without sign" class="form-control input-md" min="0" type="number" required="">
  <span id="message3"></span>   
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="time"></label>  
  <div class="col-md-12">
  <input id="time" name="time" onkeyup="tim();" placeholder="Enter time limit for test in minute" class="form-control input-md" min="1" type="number" required="">
  <span id="message4"></span> 
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="tag"></label>  
  <div class="col-md-12">
  <!-- <input id="tag" name="tag" onkeyup="examzone();" placeholder="Enter zone" class="form-control input-md" min="1"  required="">-->
  <select  id="tag" name="tag" onkeyup="examzone();" placeholder="Enter Zone" class="form-control input-md" required="" >
  <option value="select">Enter Zone </option>
 <option value="Kuttanad">Kuttanad</option>
 <option value="Alappuzha">Alappuzha</option>
 <option value="Kottayam">Kottayam</option>
 <option value="Idukki">Idukki</option> </select>
  <span id="message6"></span> 
  </div>
</div>




<!-- Text input-->
<!-- <div class="form-group">
  <label class="col-md-12 control-label" for="desc"></label>  
  <div class="col-md-12">
  <textarea rows="8" cols="8" name="desc" id="desc" onkeyup="examdesc();" class="form-control" placeholder="Write description here..." required></textarea>  
  <span id="message7"></span> 
   </div>
</div>-->


<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" name="addqn" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';



}
?>
<!--add exam end-->

<!--add exam step2 start-->
<?php
if(@$_GET['q']==4 && (@$_GET['step'])==2 ) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update1.php?q=addqns&n='.@$_GET['n'].'&eid='.@$_GET['eid'].'&ch=4 "  method="POST">
<fieldset>
';
 
 for($i=1;$i<=@$_GET['n'];$i++)
 {
echo '<b>Question number&nbsp;'.$i.'&nbsp;:</><br /><!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qns'.$i.' "></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns'.$i.'" class="form-control" placeholder="Write question number '.$i.' here..."></textarea>  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'1"></label>  
  <div class="col-md-12">
  <input id="'.$i.'1" name="'.$i.'1"  placeholder="Enter option a" class="form-control input-md" type="text">
  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'2"></label>  
  <div class="col-md-12">
  <input id="'.$i.'2" name="'.$i.'2" placeholder="Enter option b" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'3"></label>  
  <div class="col-md-12">
  <input id="'.$i.'3" name="'.$i.'3" placeholder="Enter option c" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'4"></label>  
  <div class="col-md-12">
  <input id="'.$i.'4" name="'.$i.'4" placeholder="Enter option d" class="form-control input-md" type="text">
    
  </div>
</div>
<br />
<b>Correct answer</b>:<br />
<select id="ans'.$i.'" name="ans'.$i.'" placeholder="Choose correct answer " class="form-control input-md" >
   <option value="a">Select answer for question '.$i.'</option>
  <option value="a">option a</option>
  <option value="b">option b</option>
  <option value="c">option c</option>
  <option value="d">option d</option> </select><br /><br />'; 
 }
    
echo '<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';



}
?><!--add exam step 2 end-->

<!--remove exam-->
<!--remove quiz-->
<?php if(@$_GET['q']==5) {

$result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
echo  '
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Added Exams</b></span><br /><br />
<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$total = $row['total'];
	$sahi = $row['sahi'];
    $time = $row['time'];
	$eid = $row['eid'];
	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="update1.php?q=rmquiz&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Remove</b></span></a></b></td></tr>';
}
$c=0;
echo '</table></div></div>';

}

//ranking start
if(@$_GET['q']== 2) 
{
$q=mysqli_query($con,"SELECT * FROM rank  ORDER BY score DESC " )or die('Error223');
echo  '<div class="panel title"><div class="table-responsive">
<table class="table table-striped title1" >
<tr style="color:red"><td><b>Rank</b></td><td><b>Reg ID</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>Score</b></td><td><b>Date and Time</b></td></tr>';
$c=0;
while($row=mysqli_fetch_array($q) )
{
$e=$row['email'];
$s=$row['score'];
$date=$row['time'];

$q12=mysqli_query($con,"SELECT * FROM tbl_register WHERE reg_id='$e' " )or die('Error231');
while($row=mysqli_fetch_array($q12) )
{
$name=$row['fname']." ".$row['lname'];
$gender=$row['gender'];
//$zone=$row['zone'];
}
$c++;
echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td>'.$e.'</td><td>'.$name.'</td><td>'.$gender.'</td><td>'.$s.'</td><td>'.$date.'</td><td>';
}
echo '</table></div></div>';}

?>





</div><!--container closed-->
</div></div>
</body>
</html>
