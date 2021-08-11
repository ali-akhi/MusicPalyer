<?php
    session_start();
    if(!isset($_SESSION['email_address']))
		header('location:index.php');
		
	$email_address = $_SESSION['email_address'];
?>


<!DOCTYPE HTML>
<html dir="rtl">

<head>
	<title>Music World | Profile</title>
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
                            <a class="scroll" style="color:#3e495b" href="#about" >درباره ما</a>
                        </li>
						<li class="navbarItemStyle mr-4">
                            <a class="scroll" style="color:#3e495b" href="#contact">ارتباط با ما</a>
                        </li>


                        <div class="dropdown mr-4">
                            <a class="navbarItemStyle " id="dropdownMenu1" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">آلبوم ها</a>
                            <div class="dropdown-menu dropdown-primary">
                                <a class="dropdown-item" href="pop_songs.php"><b>موزیک پاپ</b></a>
                                <a class="dropdown-item" href="rap_songs.php"><b>موزیک رپ</b></a>
                                <a class="dropdown-item" href="uploaded_songs.php"><b>بارگذاری موزیک</b></a>
                            </div>
                        </div>
                        <li class="navbarItemStyle mr-4">
                            <a class="scroll" style="color:#3e495b" href="logout.php">خروج</a>
                        </li>
<!--                        <li class=" ">-->
<!--                            -->
<!---->
<!--                        </li>-->
					</ul>
				</div>
			</nav>
		</div>
	</header>
	<!-- //header -->
	<!-- banner -->
	<div class="banner" id="home">
		<div class="container">
			<div class="banner-text">
				<div class="slider-info text-right">
                    <h1 class="text-uppercase">احساس شنیدن موزیک رویایی</h1>
                    <b><p class="text-white"><?php echo "سلام، کاربر ".$_SESSION['username']." به صفحه خود خوش آمدید";?></p></b>
                    <!--					<a class="btn btn-agile  mt-4 scroll" href="#about" role="button">دیدن ادامه</a>-->
                    <a class="scroll" role="button" href="#about"><button class="snip1479"><span class="text-green">مشاهده ادامه</span></button></a>
				</div>
			</div>
		</div>
	</div>
	<!-- //banner -->
	<!-- about-->
	<section class="wthree-row" id="about">
		<div class="row justify-content-center align-items-center no-gutters abbot-main">
			<div class="col-lg-6 p-0">
				<img src="images/about.jpg" class="img-fluid" alt="" />
			</div>
            <div class="col-lg-6 abbot-right px-md-5  py-lg-0 py-3">
                <div>
                    <div class="card-body px-lg-3 px-md-2 px-sm-2">
                        <h3 class="stat-title card-title align-self-center mb-sm-5 mb-3">رادیو آوا
                            <br>پلی لیست شخصی داشته باشید </h3>
                        <span class="w3-line"></span>
                        <p class="card-text align-self-center my-4 text-black">
                            هنوز پلی لیستی ندارید؟<br>
                            پس از همین الان شروع کن و بهترین موزیک ها رو دانلود کن و به لیست خودت اضافه کن و از شنیدنشون لذت ببر.
                        </p>
                        <p class="card-text align-self-center mb-5 text-black">گوش دادن به موسیقی تاثیرات مثبت و موثر بر روح و جسم انسان دارد. هر فردی نیاز دارد تا به موسیقی گوش دهد چرا که روح هم نیاز به تغذیه دارد همان طور که به تغذیه جسم می رسیم باید حواسمان به غذای روح هم باشد. تغذیه روح هم موسیقی است.</p>
                        <p class="card-text align-self-center mb-5 text-black">هر فردی برای تخلیه روح خود نیاز به فضایی دارد که بتوانند خشم درونی اش را تخلیه کند. در ایران مکان و محلی برای این کار وجود ندارد. به عنوان مثال اگر در خارج شهر دهکده هایی باشد که افراد بتوانند به آنجا بروند و روح خود را خالی کنند احساس آرامش می کنند. وقتی فردی با فریاد کشیدن انرژی های اضافی و یا خشم خود را از بدنش خارج گند به آرامش روحی و جسمی می رسد.حال که در ایران چنین امکانی وجود ندارد عده ای از مردم با رفتن به کنسرت می خواهند کیم نیروی خود را تخلیه کنند که این امری طبیعی است.

                            اگر دقت داشته باشیم موسیقی مذهبی هم نوعی حس آرامش را به انسان منتقل می کند. در مراسم عزاداری رسمی شاهد نواختن سازهایی هستیم که ریتم غمگین را به گوش مان می رساند. نواختن طبل،سنج و فلوت در مراسم عزاداری سالار شهیدان حس خیلی خوبی را در فضا طنین انداز می کند و افراد در حال و هوای خاص معنوی غرق می شوند و لذت می برند.

                            با همکاری، فرهنگ سازی و احترام گذاشتن به عقاید یکدیگر مسئولین و متولیان امر می توانند گام های موثر و مثبتی در حوزه فرهنگ و موسیقی بردارند تا مردم هم بتوانند در کمال آرامش از امکانات فرهنگی موجود در جامعه استفاده کنند و لذت ببرند.</p>
                        <!--						<a href="#more_info" class="btn btn-agile abt_card_btn scroll">Know More</a>-->
                        <a href="#more_info" class="scroll"> <button class="snip1479"><span class="text-green">مشاهده ادامه</span></button>	</a>				</div>
                </div>
            </div>
		</div>
	</section>
	<!-- //about -->
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
	<script src="js/bootstrap.js">
	</script>
	<!-- //Bootstrap Core JavaScript -->
</body>

</html>
