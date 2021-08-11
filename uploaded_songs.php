<?php
    session_start();
    if(!isset($_SESSION['email_address']))
		header('location:index.php');
	
	include('connection.php');
		
	if(isset($_POST['upload'])){

		$audio_file = $_FILES['audio_file']['name'];
		$song_name = mysqli_real_escape_string($conn,$_POST['song_name']);
		$song_format = mysqli_real_escape_string($conn,$_POST['song_format']);
		
		if(isset($_FILES['audio_file'])){
			$file_name = $_FILES['audio_file']['name'];
			$file_size = $_FILES['audio_file']['size'];
			$file_tmp = $_FILES['audio_file']['tmp_name'];
			$file_type = $_FILES['audio_file']['type'];
			
			move_uploaded_file($file_tmp,"songs/uploaded_songs/".$file_name);
		 }

		$email_address = $_SESSION['email_address'];

		$sql = "SELECT * FROM user WHERE email_address = '$email_address' ";
		$result = mysqli_query($conn,$sql);

		$row = mysqli_fetch_array($result);
		$singer_id = $row['user_id'];
		$singer_name = $row['username'];

		$song_image = 'musical-world.jpg';

		//$sql="CALL uploadsongs('$singer_id','$song_name','$song_format','$singer_name','$song_image','$audio_file')";

		$sql = "INSERT INTO upload_albums(`singer_id`,`song_name`,`song_format`,`singer_name`,`song_image`,`audio_file`) VALUES('$singer_id','$song_name','$song_format','$singer_name','$song_image','$audio_file')";
		$result = mysqli_query($conn,$sql);
		if($result){
				echo '<script type="text/javascript">';
                echo 'setTimeout(function () { sweetAlert("Uploaded"," <b>You have successfully uploaded your song '.$song_name.'</b>","success");';
				echo '}, 500);</script>';
		}else{
			echo '<script type="text/javascript">';
            echo 'setTimeout(function () { sweetAlert("Oops..."," Error while uploading.Please check your internet coonection!","error");';
            echo '}, 500);</script>';
		}

	}

	$username = $_SESSION['username'];
	$sql = "SELECT * FROM user WHERE username = '$username' ";
	$result = mysqli_query($conn,$sql);

	$row = mysqli_fetch_array($result);
	$user_id = $row['user_id'];

	$sql = "SELECT * FROM upload_albums ORDER BY song_id ASC";
	$result = mysqli_query($conn,$sql);

	while($rows = mysqli_fetch_array($result)){
		$song_id = $rows['song_id'];
		if(isset($_POST[$song_id])){

			$sql = "SELECT * FROM favorite_songs WHERE song_id = '$song_id' AND cat_id = '4' AND user_id = '$user_id' ";
			$results = mysqli_query($conn,$sql);

			if(mysqli_num_rows($results)>0){
				echo '<script type="text/javascript">';
            	echo 'setTimeout(function () { sweetAlert("Warning","<b> You have already added this song to your favorite list!!...</b>","error");';
            	echo '}, 500);</script>';
			}else{

			$sql = "SELECT * FROM upload_albums WHERE song_id = '$song_id'  ";
			$results = mysqli_query($conn,$sql);

			$row = mysqli_fetch_array($results);
			$song_id = $row['song_id'];
			$song_name = $row['song_name'];
			$singer_name = $row['singer_name'];
			$song_image = $row['song_image'];
			$audio_file = $row['audio_file'];

			$sql = "INSERT INTO favorite_songs(`cat_id`,`song_id`,`user_id`,`song_name`,`singer_name`,`song_image`,`audio_file`) VALUES('4','$song_id','$user_id','$song_name','$singer_name','$song_image','$audio_file') ";
			$results = mysqli_query($conn,$sql);

			if($results){
				echo '<script type="text/javascript">';
                echo 'setTimeout(function () { sweetAlert("Added"," <b>Song '.$song_name.' is successfully added to your favorite songs</b>","success");';
				echo '}, 500);</script>';
			}else{
				echo '<script type="text/javascript">';
            	echo 'setTimeout(function () { sweetAlert("Oops...","<b> Error while adding.Please check your internet coonection!</b>","error");';
            	echo '}, 500);</script>';
			}
		}
	}
}
?>

<!DOCTYPE HTML>
<html dir="rtl">

<head>
	<title>Musical World | Uploaded Songs</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
	<link rel="icon" href="images/i1.png" />
    <!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<!-- Material Design Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.14/css/mdb.min.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/btnStyle.css" rel='stylesheet' type='text/css' />
	<!-- font-awesome icons -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- //Custom Theme files -->
	<!--webfonts-->
	<link href="//fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
	<!--//webfonts-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.min.css">
	<style>
    /* card details start  */
@import url('https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto+Condensed:400,400i,700,700i');
section{
    padding: 100px 0;
}
.details-card {
	background: #ecf0f1;
}

.card-content {
	background: #ffffff;
	border: 4px;
	box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
}

.card-img {
	position: relative;
	overflow: hidden;
	border-radius: 0;
	z-index: 1;
}

.card-img img {
	width: 100%;
	height: auto;
	display: block;
}

.card-img span {
	position: absolute;
    top: 15%;
    left: 12%;
    background: #1ABC9C;
    padding: 6px;
    color: #fff;
    font-size: 12px;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -ms-border-radius: 4px;
    -o-border-radius: 4px;
    transform: translate(-50%,-50%);
}
.card-img span h4{
        font-size: 12px;
        margin:0;
        padding:10px 5px;
         line-height: 0;
}
.card-desc {
	padding: 1.25rem;
}

.card-desc h3 {
	color: #000000;
    font-weight: 600;
    font-size: 1.0em;
    line-height: 1.3em;
    margin-top: 0;
    margin-bottom: 5px;
    padding: 0;
}

.card-desc p {
	color: #747373;
    font-size: 14px;
	font-weight: 400;
	font-size: 1em;
	line-height: 1.5;
	margin: 0px;
	margin-bottom: 20px;
	padding: 0;
	font-family: 'Raleway', sans-serif;
}
.btn-card{
	background-color: #1ABC9C;
	color: #fff;
	box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
    padding: .84rem 2.14rem;
    font-size: .81rem;
    -webkit-transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    -o-transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    margin: 0;
    border: 0;
    -webkit-border-radius: .125rem;
    border-radius: .125rem;
    cursor: pointer;
    text-transform: uppercase;
    white-space: normal;
    word-wrap: break-word;
    color: #fff;
}
.btn-card:hover {
    background: orange;
}
a.btn-card {
    text-decoration: none;
    color: #fff;
}

.col-md-3{
	padding-bottom:30px;
	padding-left:30px;
}
/* End card section */
    </style>

</head>

<body>
	<!-- header -->
	<header>
		<div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand m-1" href="index.php" style="color:white">
                    <img src="images/natural-music-logo-creative-icon-vector-29591193.jpg" width=110px height=110px>
                </a>
                <button class="navbar-toggler ml-lg-auto ml-sm-5" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav text-center ml-auto">

                        <li class="navbarItemStyle mr-4">
                            <a class=" scroll " style="color:#3e495b" href="profile.php" >خانه</a>
                        </li>
                        <li class="navbarItemStyle mr-4">
                            <a class="scroll" style="color:#3e495b" href="#about" >درباره ما</a>
                        </li>
                        <li class="navbarItemStyle mr-4">
                            <a class="scroll" style="color:#3e495b" href="#contact">ارتباط با ما</a>
                        </li>
                        <div class="dropdown mr-4">
                            <a class="navbarItemStyle" type="button" id="dropdownMenu1" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">آلبوم ها
                            </a>
                            <div class="dropdown-menu dropdown-primary">

                                <a class="dropdown-item" href="pop_songs.php"><b>موزیک پاپ</b></a>
                                <a class="dropdown-item" href="rap_songs.php"><b>موزیک رپ</b></a>
                                <a class="dropdown-item" href="favorite_list.php"><b>مورد علاقه ها</b></a>
                            </div>
                        </div>
                        <li class="navbarItemStyle mr-4">
                            <a class="scroll" style="color:#3e495b" href="logout.php">خروج</a>
                        </li>
                    </ul>
                </div>
            </nav>
		</div>
	</header>
	<!-- //header -->

	<center><br><b><div class="alert alert-primary" role="alert">
  آیا خواننده هستید؟<a href="#" class="alert-link">   خب موزیک های خود را اینجا آپلود کنید!</a>
	</div><b><center>

<form method="post" action="uploaded_songs.php" enctype="multipart/form-data">
	<div class="form-row">
		<div class="col">
			<div class="form-group btn btn-primary">
				<input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="audio_file" required>
			</div>
		</div>		

		<div class="col">
			<div class="md-form mb-4">
				<input type="text" id="form1" class="form-control validate" name="song_name" required>
				<label data-error="wrong" data-success="right" for="form1"> نام موزیک</label>
			</div>
		</div>

		<div class="col">
			<div class="md-form mb-4">
				<input type="text" id="form2" class="form-control validate" name="song_format" required>
				<label data-error="wrong" data-success="right" for="form2">فرمت موزیک</label>
			</div>
		</div>
		
		<div class="col">
			<div class="text-center">
				<button type="submit" name="upload" class="btn btn-default btn-rounded mb-4">بارگذاری <i class="fa fa-upload"></i></button>
			</div>
		</div>
	</div>	
</form>

<center><b><div class="alert alert-primary" role="alert">
  <a href="#" class="alert-link">سایر آپشن های وب سایت رادیو آوا </a>
	</div><b>

		<?php
			include('connection.php');
			$sql = "SELECT * FROM upload_albums ORDER BY song_id ASC";
			$result = mysqli_query($conn,$sql);

			echo "<section class='details-card'>
						<div class='container'>
					<div class='row'>
				";
			if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_array($result)){
					$song_id = $row['song_id'];
					$song_name = $row['song_name'];
					$singer_name = $row['singer_name'];
					$song_image = $row['song_image'];
					$audio_file = $row['audio_file'];
					echo "
							<div class='col-md-3'>
								<form method='post' action='uploaded_songs.php'>
									<div class='card-deck'>
										<div class='card-img'>
											<img src='songs/uploaded_songs/img/$song_image' style='width:350px;height:250px;' alt=''>
										</div>
										<div class='card-desc'>
											<h3>$song_name | $singer_name</h3>
											<audio class='embed-responsive-item' controls='' preload='none'> <source src='songs/uploaded_songs/$audio_file' type='audio/mp3'></audio><br>
											<div class='row'><button type='submit' class='btn-card' style='color:red'; name='$song_id'><i class='fa fa-heart'></i></button><br></div><br>  
										</div>
									</div>
								</form>
							</div>
							";
					echo "<br><br>";
				}
			}
			echo "</div>
			</div>
		</section>
	";
	
		?>

	<!-- contact top -->
    <div class="contact-top text-center" id="more_info">
        <div class="content-contact-top p-12">

            <h3 class=" text-white"><strong>دلنوشته های روزانه شما</strong></h3><br><br>
            <p class="text-white w-75 mx-auto">مطربی میگفت خسرو را که ای گنج سخن
            </p><span>***</span>
            <p class="text-white w-75 mx-auto">علم موسیقی ز فن نظم نیکوتر بود
            </p><span>***</span>
            <p class="text-white w-75 mx-auto">زانکه این علمی است کز دقت نیاید در قلم
            </p><span>***</span>
            <p class="text-white w-75 mx-auto">وان نه دشوار است کاندر کاغذ و دفتر بود
            </p><br>
            <p class="text-white w-75 mx-auto">“دهلوی”
            </p>
        </div>
    </div>
	<!-- //contact top -->
	<!-- contact -->
    <div class="w3-contact py-5" id="contact" >
        <div class="container">
            <div class="row contact-form pt-md-5">
                <!-- contact details -->
                <div class="col-lg-6 contact-bottom d-flex flex-column contact-right-w3ls" >
                    <h5>ارتباط با ما</h5>
                    <div class="fv3-contact">
                        <div class="row">
                            <div class="col-2">
                                <span class="fa fa-envelope-open"></span>
                            </div>
                            <div class="col-10">
                                <h6>ایمیل</h6>
                                <p>
                                    <a href="mailto:example@email.com" class="text-dark">ali.akhi.1998@gmail.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="fv3-contact my-4">
                        <div class="row">
                            <div class="col-2">
                                <span class="fa fa-phone"></span>
                            </div>
                            <div class="col-10">
                                <h6>شماره تماس</h6>
                                <p dir="ltr">+98 910 903 7707</p>
                            </div>
                        </div>
                    </div>
                    <div class="fv3-contact">
                        <div class="row">
                            <div class="col-2">
                                <span class="fa fa-home"></span>
                            </div>
                            <div class="col-10">
                                <h6>آدرس</h6>
                                <p>ایران | تهران</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wthree-form-left my-lg-0 mt-5">
                    <h5>ارسال ایمیل به ما</h5>
                    <!-- contact form grid -->
                    <div class="contact-top1">
                        <form action="#" method="get" class="contact-wthree">
                            <div class="form-group d-flex">
                                <label>
                                    نام
                                </label>
                                <input class="form-control" type="text" placeholder="Name" name="email" required="">
                            </div>
                            <div class="form-group d-flex">
                                <label>
                                    ایمیل
                                </label>
                                <input class="form-control" type="email" placeholder="email" name="email" required="">
                            </div>
                            <div class="form-group d-flex">
                                <label>
                                    شماره تماس
                                </label>
                                <input class="form-control" type="text" placeholder="phone number" name="email" required="">
                            </div>
                            <div class="form-group d-flex">
                                <label>
                                    پیام
                                </label>
                                <textarea class="form-control" rows="5" id="contactcomment" placeholder="your message" required></textarea>
                            </div>
                            <div class="d-flex  justify-content-end">
                                <button type="submit" class="snip1479">ارسال پیام</button>
                            </div>
                        </form>
                    </div>
                    <!--  //contact form grid ends here -->
                </div>

            </div>
            <!--  //contact form grid ends here -->
        </div>

    </div>
    <!-- //contact details container -->
    </div>
    </div>
    <!-- //contact -->
    <!-- copyright -->
    <div class="cpy-right text-center">
        <p dir="ltr">© 2020 Radio ava- designed by Ali.Akhi</p>
    </div>
    <!-- //copyright -->
    <!-- js-->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- js-->
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.14/js/mdb.min.js"></script>
	<!-- start-smooth-scrolling -->
	<script src="js/move-top.js "></script>
    <script src="js/easing.js "></script>
    <script src="js/SmoothScroll.min.js "></script>
	<!-- //smooth-scrolling-of-move-up -->
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"></script>
	<!-- //Bootstrap Core JavaScript -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.min.js"></script>
</body>

</html>
