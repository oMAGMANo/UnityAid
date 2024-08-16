<?php 
include 'config.inc.php';
ob_start();
session_start();
$row = mysqli_fetch_assoc(mysqli_query($con,"select * from campaign where id='".$_GET['campaign_id']."'"));
$res_dona = mysqli_fetch_assoc(mysqli_query($con,"select SUM(amount) as total_amount from donation where campaign_id='".$row['id']."'"));
if(isset($_POST['donate_now'])){
 extract($_POST);
 $sql = mysqli_query($con,"insert into donation set user_id='$user_id',name='$name',organizer_id='$organizer_id',campaign_id='$campaign_id',email='$email',phone='$phone',amount='$amount',country='$country'");
 if($sql){
    $insert_id = mysqli_insert_id($con);  
     header("location: pay.php?id=".$insert_id);
 }
}
$msglog='';
if(isset($_POST['submit_volunteers'])){
  extract($_POST);
 $sql = mysqli_query($con,"insert into volunteers set user_id='$user_id',name='$name',organizer_id='$organizer_id',campaign_id='$campaign_id',email='$email',phone='$phone',country='$country'");
 if($sql){
    $msglog = '<div class="alert alert-success alert-dismissible fade show">
                                     Thank you for showing Interest in this event, we will get back to you shortly.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button>
                                    </div>';
 }  
}
?>
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>UnityAid | Campaign Details</title>
	<meta name="title" content="UnityAid | Campaign Details">
	<meta name="description" content="&lt;p&gt;Description&lt;/p&gt;&lt;p&gt;Donations to this campaign will support animal shelters, rescue organizations, and advocacy groups working tirelessly to protect...">
	<meta name="keywords" content="">
	<link rel="shortcut icon" href="assets/universal/images/logoFavicon/favicon.png" type="image/x-icon">
	 
	<link rel="stylesheet" href="assets/universal/css/bootstrap.css">
	<link rel="stylesheet" href="assets/universal/css/font-awesome.css">
	<link rel="stylesheet" href="assets/themes/primary/css/slick.css">
	<link rel="stylesheet" href="assets/universal/css/line-awesome.css">
	<link rel="stylesheet" href="assets/themes/primary/css/lightbox.min.css">
	<link rel="stylesheet" href="assets/themes/primary/css/aos.css">
	<link rel="stylesheet" href="assets/themes/primary/css/main.css">
	<link rel="stylesheet" href="assets/themes/primary/css/custom.css">
	<link rel="stylesheet" href="assets/themes/primary/css/color.php?color1=47D195&amp;color2=9DE713">
	<link rel="stylesheet" href="assets/universal/css/select2.css">
	<style>
	.border-bottom-none {
		border-bottom: none;
	}
	
	.loadComment {
		padding-top: 35px;
	}
	</style>
	<style>
	.campaign-card__img {
		-webkit-mask-image: url("assets/themes/primary/images/campaign-image-shape.png");
		background: url("assets/themes/primary/images/campaign-image-shape.png");
		mask-image: url("assets/themes/primary/images/campaign-image-shape.png");
	}
	</style>
	<style>
	.campaign-card__img {
		-webkit-mask-image: url("assets/themes/primary/images/campaign-image-shape.png");
		background: url("assets/themes/primary/images/campaign-image-shape.png");
		mask-image: url("assets/themes/primary/images/campaign-image-shape.png");
	}
	</style>
	<style>
	.campaign-card__img {
		-webkit-mask-image: url("assets/themes/primary/images/campaign-image-shape.png");
		background: url("assets/themes/primary/images/campaign-image-shape.png");
		mask-image: url("assets/themes/primary/images/campaign-image-shape.png");
	}
	</style>
	<style>

	</style>
	<style>
	.anonymous-alert-text .alert {
		background-color: #cff4fc !important;
	}
	
	.select2-results__option {
		padding-left: 16px;
	}
	</style>
</head>

<body>
	 	<?php include 'nav.php'; ?>
	<section class="breadcrumb bg-img" data-background-image="assets/images/site/breadcrumb/65b24f623fe111706184546.png">
		<div class="breadcrumb__bg bg-img" data-background-image="assets/themes/primary/images/breadcrumb-vector.png"></div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="breadcrumb__wrapper">
						<h1 class="breadcrumb__title">Campaign Details</h1>
						<ul class="breadcrumb__list">
							 
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="donation-details pt-120 pb-60">
		<div class="container">
			<div class="row g-4">
				<div class="col-lg-8">
					<div class="donation-details__img" data-aos="fade-up" data-aos-duration="1500"> <img src="uploads/<?=$row['image']?>" alt="image"> </div>
					<nav>
						<div class="nav nav-tabs custom--tab" id="nav-tab" role="tablist">
							<button type="button" class="nav-link active" id="nav-desc-tab" data-bs-toggle="tab" data-bs-target="#nav-desc" role="tab" aria-controls="nav-desc" aria-selected="true"> Description </button>
							<button type="button" class="nav-link" id="nav-image-tab" data-bs-toggle="tab" data-bs-target="#nav-image" role="tab" aria-controls="nav-image" aria-selected="false"> Relevant Images </button>
							<button type="button" class="nav-link" id="nav-document-tab" data-bs-toggle="tab" data-bs-target="#nav-document" role="tab" aria-controls="nav-document" aria-selected="false"> Relevant Document </button>
							 
						</div>
					</nav>
					<div class="tab-content mb-4" id="nav-tabContent">
						<div class="tab-pane fade show active" id="nav-desc" role="tabpanel" aria-labelledby="nav-desc-tab" tabindex="0">
							<div class="donation-details__txt">
								<h2 class="donation-details__title" data-aos="fade-up" data-aos-duration="1500"><?=$row['name']; ?></h2>
								<div class="donation-details__desc" data-aos="fade-up" data-aos-duration="1500">
									 <?=$row['description']; ?>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="nav-image" role="tabpanel" aria-labelledby="nav-image-tab" tabindex="0">
							<div class="row g-4">
							    <?php
							     $sql_gal = mysqli_query($con,"select * from gallery where campaign_id='".$row['id']."'");
							     if(mysqli_num_rows($sql_gal) > 0){
							       while($res=mysqli_fetch_assoc($sql_gal)) { 
							    ?>
								<div class="col-md-4 col-sm-6 col-xsm-6">
									<div class="donation-details__relevent-img">
										<a href="uploads/<?=$res['image']?>" data-lightbox="Campaign Name"> <img src="uploads/<?=$res['image']?>" alt="image"> </a>
									</div>
								</div>
							  <?php } } ?>	
							</div>
						</div>
						<div class="tab-pane fade" id="nav-document" role="tabpanel" aria-labelledby="nav-document-tab" tabindex="0">
							<div class="donation-details__document">
								<object data="uploads/<?=$row['document']?>" type="application/pdf"></object>
							</div>
						</div>
						<div class="tab-pane fade" id="nav-comment" role="tabpanel" aria-labelledby="nav-comment-tab" tabindex="0">
							<div class="donation-details__comments">
								<h3 class="donation-details__subtitle">Comments (0)</h3>
								<p>No data found</p>
							</div>
							<div class="donation-details__post__comment">
								<h3 class="donation-details__subtitle">Post a comment</h3>
								<form action="campaign/clean-water-initiative-providing-safe-drinking-water/comment" method="POST" class="row g-4">
									<input type="hidden" name="_token" value="8KsDbgxDMlm0fE7cNMkbpqC7Nwo3CmenNXbnYdpD" autocomplete="off">
									<div class="col-sm-6">
										<input type="text" name="name" class="form--control" value="Tuhin Hookah" placeholder="Your Name*" required readonly> </div>
									<div class="col-sm-6">
										<input type="email" name="email" class="form--control" value="tuhinkuili@gmail.com" placeholder="Your Email*" required readonly> </div>
									<div class="col-12">
										<textarea class="form--control" name="comment" rows="10" placeholder="Your Comment*" required></textarea>
									</div>
									<div class="col-12 d-flex justify-content-center">
										<button type="submit" class="btn btn--base">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="related-campaign">
						<h2 class="donation-details__title" data-aos="fade-up" data-aos-duration="1500">Related Campaigns</h2>
						<div class="row g-4">
						    <?php
	              $sql = mysqli_query($con,"select * from campaign where status=1 and category_id='".$row['category_id']."' and id!='".$row['id']."' limit 6");
	              if(mysqli_num_rows($sql) > 0){
	                while($row=mysqli_fetch_assoc($sql))  {
	                  $res_dona = mysqli_fetch_assoc(mysqli_query($con,"select SUM(amount) as total_amount from donation where campaign_id='".$row['id']."'"));
	              ?>
							<div class="col-md-6" data-aos="fade-up" data-aos-duration="1500">
								<div class="campaign-card">
									<div class="campaign-card__img">
										<a href="campaigns-details.php?campaign_id=<?=$row['id']?>"> <img src="uploads/<?=$row['image']?>" alt="image"> </a>
									</div>
									<div class="campaign-card__txt">
										<h3 class="campaign-card__title">
        <a href="campaigns-details.php?campaign_id=<?=$row['id']?>">
           <?=$row['name']?>
        </a>
    </h3>
										<div class="campaign__countdown" data-target-date="<?=$row['start_date']?>T00:00:00"></div>
									 
										<div class="campaign-card__bottom">
											<ul class="campaign-card__list">
												<li> <span><i class="fa-solid fa-hand-holding-dollar"></i> Goal:</span> ₹<?=$row['goal_amount']?> </li>
													<li> <span><i class="fa-solid fa-sack-dollar"></i> Raised:</span> ₹<?=number_format($res_dona['total_amount']); ?> </li>
											</ul> <a href="campaigns-details.php?campaign_id=<?=$row['id']?>" class="btn btn--sm btn--base">
            Make A Donation        </a> </div>
									</div>
								</div>
							</div>
							<?php } } ?> 
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="post-sidebar">
						<div class="post-sidebar__card" data-aos="fade-up" data-aos-duration="1500">
							<h3 class="post-sidebar__card__header">Time Left</h3>
							<div class="post-sidebar__card__body">
								<div class="campaign__countdown" data-target-date="<?=$row['start_date']?>T00:00:00"></div>
								<!--<div class="progress custom--progress my-4" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">-->
								<!--	<div class="progress-bar" style="width: 0%"><span class="progress-txt">0%</span></div>-->
								<!--</div>-->
								<ul class="campaign-status">
									<li> <span><i class="fa-solid fa-hand-holding-dollar"></i> Goal:</span> ₹<?=$row['goal_amount']?></li>
									<li> <span><i class="fa-solid fa-sack-dollar"></i> Raised:</span> ₹<?=number_format($res_dona['total_amount']); ?> </li>
								</ul>
							</div>
						</div>
						
						<div class="post-sidebar__card" data-aos="fade-up" data-aos-duration="1500">
							<h3 class="post-sidebar__card__header">Make a Donation</h3>
							<div class="post-sidebar__card__body">
							    <?php if(isset($_SESSION["login_id"])){ 
							      $user = mysqli_fetch_assoc(mysqli_query($con,"select * from users where id='".$_SESSION["login_id"]."'"));  
							      $name = $user['name'];
							      $email = $user['email'];
							      $phone = $user['phone'];
							      $user_id = $user['id'];
							      $organizer_id = $row['user_id'];
							      $campaign_id = $user['id']; 
							      
							    } else {
							       $name = '';
							       $email = '';
							       $phone = '';
							       $user_id = 0;
							       $organizer_id=0;
							       $campaign_id = 0; 
							     } ?>
								<form action="" method="POST">
									<input type="hidden" name="organizer_id" value="<?=$row['user_id']?>" autocomplete="off">
									<input type="hidden" name="campaign_id" value="<?=$row['id']?>">
									<input type="hidden" name="user_id" value="<?=$user_id?>">
									<div class="form-group">
										  
									</div>
									<div class="form-group anonymous-alert-text d-none">
										<div class="alert alert-info" role="alert"> We require your information even if you choose to donate anonymously. However, rest assured that your details will not be displayed anywhere in our system. </div>
									</div>
									<div class="form-group">
										<label class="form--label required">Full Name</label>
										<input type="text" class="form--control" name="name" value="<?=$name?>" placeholder="John Doe" required> </div>
									<div class="form-group">
										<label class="form--label required">Email</label>
										<input type="email" class="form--control" name="email" value="<?=$email?>" placeholder="example@example.com" required> </div>
									<div class="form-group">
										<label class="form--label required">Country</label>
										<select class="form--control form-select select-2" name="country">
											<option data-mobile_code="93" value="Afghanistan" data-code="AF"> Afghanistan </option>
											<option data-mobile_code="358" value="Aland Islands" data-code="AX"> Aland Islands </option>
											<option data-mobile_code="355" value="Albania" data-code="AL"> Albania </option>
											<option data-mobile_code="213" value="Algeria" data-code="DZ"> Algeria </option>
											<option data-mobile_code="1684" value="AmericanSamoa" data-code="AS"> AmericanSamoa </option>
											<option data-mobile_code="376" value="Andorra" data-code="AD"> Andorra </option>
											<option data-mobile_code="244" value="Angola" data-code="AO"> Angola </option>
											<option data-mobile_code="1264" value="Anguilla" data-code="AI"> Anguilla </option>
											<option data-mobile_code="672" value="Antarctica" data-code="AQ"> Antarctica </option>
											<option data-mobile_code="1268" value="Antigua and Barbuda" data-code="AG"> Antigua and Barbuda </option>
											<option data-mobile_code="54" value="Argentina" data-code="AR"> Argentina </option>
											<option data-mobile_code="374" value="Armenia" data-code="AM"> Armenia </option>
											<option data-mobile_code="297" value="Aruba" data-code="AW"> Aruba </option>
											<option data-mobile_code="61" value="Australia" data-code="AU"> Australia </option>
											<option data-mobile_code="43" value="Austria" data-code="AT"> Austria </option>
											<option data-mobile_code="994" value="Azerbaijan" data-code="AZ"> Azerbaijan </option>
											<option data-mobile_code="1242" value="Bahamas" data-code="BS"> Bahamas </option>
											<option data-mobile_code="973" value="Bahrain" data-code="BH"> Bahrain </option>
											<option data-mobile_code="880" value="Bangladesh" data-code="BD"> Bangladesh </option>
											<option data-mobile_code="1246" value="Barbados" data-code="BB"> Barbados </option>
											<option data-mobile_code="375" value="Belarus" data-code="BY"> Belarus </option>
											<option data-mobile_code="32" value="Belgium" data-code="BE"> Belgium </option>
											<option data-mobile_code="501" value="Belize" data-code="BZ"> Belize </option>
											<option data-mobile_code="229" value="Benin" data-code="BJ"> Benin </option>
											<option data-mobile_code="1441" value="Bermuda" data-code="BM"> Bermuda </option>
											<option data-mobile_code="975" value="Bhutan" data-code="BT"> Bhutan </option>
											<option data-mobile_code="591" value="Plurinational State of Bolivia" data-code="BO"> Plurinational State of Bolivia </option>
											<option data-mobile_code="387" value="Bosnia and Herzegovina" data-code="BA"> Bosnia and Herzegovina </option>
											<option data-mobile_code="267" value="Botswana" data-code="BW"> Botswana </option>
											<option data-mobile_code="55" value="Brazil" data-code="BR"> Brazil </option>
											<option data-mobile_code="246" value="British Indian Ocean Territory" data-code="IO"> British Indian Ocean Territory </option>
											<option data-mobile_code="673" value="Brunei Darussalam" data-code="BN"> Brunei Darussalam </option>
											<option data-mobile_code="359" value="Bulgaria" data-code="BG"> Bulgaria </option>
											<option data-mobile_code="226" value="Burkina Faso" data-code="BF"> Burkina Faso </option>
											<option data-mobile_code="257" value="Burundi" data-code="BI"> Burundi </option>
											<option data-mobile_code="855" value="Cambodia" data-code="KH"> Cambodia </option>
											<option data-mobile_code="237" value="Cameroon" data-code="CM"> Cameroon </option>
											<option data-mobile_code="1" value="Canada" data-code="CA"> Canada </option>
											<option data-mobile_code="238" value="Cape Verde" data-code="CV"> Cape Verde </option>
											<option data-mobile_code=" 345" value="Cayman Islands" data-code="KY"> Cayman Islands </option>
											<option data-mobile_code="236" value="Central African Republic" data-code="CF"> Central African Republic </option>
											<option data-mobile_code="235" value="Chad" data-code="TD"> Chad </option>
											<option data-mobile_code="56" value="Chile" data-code="CL"> Chile </option>
											<option data-mobile_code="86" value="China" data-code="CN"> China </option>
											<option data-mobile_code="61" value="Christmas Island" data-code="CX"> Christmas Island </option>
											<option data-mobile_code="61" value="Cocos (Keeling) Islands" data-code="CC"> Cocos (Keeling) Islands </option>
											<option data-mobile_code="57" value="Colombia" data-code="CO"> Colombia </option>
											<option data-mobile_code="269" value="Comoros" data-code="KM"> Comoros </option>
											<option data-mobile_code="242" value="Congo" data-code="CG"> Congo </option>
											<option data-mobile_code="243" value="The Democratic Republic of the Congo" data-code="CD"> The Democratic Republic of the Congo </option>
											<option data-mobile_code="682" value="Cook Islands" data-code="CK"> Cook Islands </option>
											<option data-mobile_code="506" value="Costa Rica" data-code="CR"> Costa Rica </option>
											<option data-mobile_code="225" value="Cote d&#039;Ivoire" data-code="CI"> Cote d&#039;Ivoire </option>
											<option data-mobile_code="385" value="Croatia" data-code="HR"> Croatia </option>
											<option data-mobile_code="53" value="Cuba" data-code="CU"> Cuba </option>
											<option data-mobile_code="357" value="Cyprus" data-code="CY"> Cyprus </option>
											<option data-mobile_code="420" value="Czech Republic" data-code="CZ"> Czech Republic </option>
											<option data-mobile_code="45" value="Denmark" data-code="DK"> Denmark </option>
											<option data-mobile_code="253" value="Djibouti" data-code="DJ"> Djibouti </option>
											<option data-mobile_code="1767" value="Dominica" data-code="DM"> Dominica </option>
											<option data-mobile_code="1849" value="Dominican Republic" data-code="DO"> Dominican Republic </option>
											<option data-mobile_code="593" value="Ecuador" data-code="EC"> Ecuador </option>
											<option data-mobile_code="20" value="Egypt" data-code="EG"> Egypt </option>
											<option data-mobile_code="503" value="El Salvador" data-code="SV"> El Salvador </option>
											<option data-mobile_code="240" value="Equatorial Guinea" data-code="GQ"> Equatorial Guinea </option>
											<option data-mobile_code="291" value="Eritrea" data-code="ER"> Eritrea </option>
											<option data-mobile_code="372" value="Estonia" data-code="EE"> Estonia </option>
											<option data-mobile_code="251" value="Ethiopia" data-code="ET"> Ethiopia </option>
											<option data-mobile_code="500" value="Falkland Islands (Malvinas)" data-code="FK"> Falkland Islands (Malvinas) </option>
											<option data-mobile_code="298" value="Faroe Islands" data-code="FO"> Faroe Islands </option>
											<option data-mobile_code="679" value="Fiji" data-code="FJ"> Fiji </option>
											<option data-mobile_code="358" value="Finland" data-code="FI"> Finland </option>
											<option data-mobile_code="33" value="France" data-code="FR"> France </option>
											<option data-mobile_code="594" value="French Guiana" data-code="GF"> French Guiana </option>
											<option data-mobile_code="689" value="French Polynesia" data-code="PF"> French Polynesia </option>
											<option data-mobile_code="241" value="Gabon" data-code="GA"> Gabon </option>
											<option data-mobile_code="220" value="Gambia" data-code="GM"> Gambia </option>
											<option data-mobile_code="995" value="Georgia" data-code="GE"> Georgia </option>
											<option data-mobile_code="49" value="Germany" data-code="DE"> Germany </option>
											<option data-mobile_code="233" value="Ghana" data-code="GH"> Ghana </option>
											<option data-mobile_code="350" value="Gibraltar" data-code="GI"> Gibraltar </option>
											<option data-mobile_code="30" value="Greece" data-code="GR"> Greece </option>
											<option data-mobile_code="299" value="Greenland" data-code="GL"> Greenland </option>
											<option data-mobile_code="1473" value="Grenada" data-code="GD"> Grenada </option>
											<option data-mobile_code="590" value="Guadeloupe" data-code="GP"> Guadeloupe </option>
											<option data-mobile_code="1671" value="Guam" data-code="GU"> Guam </option>
											<option data-mobile_code="502" value="Guatemala" data-code="GT"> Guatemala </option>
											<option data-mobile_code="44" value="Guernsey" data-code="GG"> Guernsey </option>
											<option data-mobile_code="224" value="Guinea" data-code="GN"> Guinea </option>
											<option data-mobile_code="245" value="Guinea-Bissau" data-code="GW"> Guinea-Bissau </option>
											<option data-mobile_code="595" value="Guyana" data-code="GY"> Guyana </option>
											<option data-mobile_code="509" value="Haiti" data-code="HT"> Haiti </option>
											<option data-mobile_code="379" value="Holy See (Vatican City State)" data-code="VA"> Holy See (Vatican City State) </option>
											<option data-mobile_code="504" value="Honduras" data-code="HN"> Honduras </option>
											<option data-mobile_code="852" value="Hong Kong" data-code="HK"> Hong Kong </option>
											<option data-mobile_code="36" value="Hungary" data-code="HU"> Hungary </option>
											<option data-mobile_code="354" value="Iceland" data-code="IS"> Iceland </option>
											<option data-mobile_code="91" value="India" data-code="IN" selected> India </option>
											<option data-mobile_code="62" value="Indonesia" data-code="ID"> Indonesia </option>
											<option data-mobile_code="98" value="Iran, Islamic Republic of Persian Gulf" data-code="IR"> Iran, Islamic Republic of Persian Gulf </option>
											<option data-mobile_code="964" value="Iraq" data-code="IQ"> Iraq </option>
											<option data-mobile_code="353" value="Ireland" data-code="IE"> Ireland </option>
											<option data-mobile_code="44" value="Isle of Man" data-code="IM"> Isle of Man </option>
											<option data-mobile_code="972" value="Israel" data-code="IL"> Israel </option>
											<option data-mobile_code="39" value="Italy" data-code="IT"> Italy </option>
											<option data-mobile_code="1876" value="Jamaica" data-code="JM"> Jamaica </option>
											<option data-mobile_code="81" value="Japan" data-code="JP"> Japan </option>
											<option data-mobile_code="44" value="Jersey" data-code="JE"> Jersey </option>
											<option data-mobile_code="962" value="Jordan" data-code="JO"> Jordan </option>
											<option data-mobile_code="77" value="Kazakhstan" data-code="KZ"> Kazakhstan </option>
											<option data-mobile_code="254" value="Kenya" data-code="KE"> Kenya </option>
											<option data-mobile_code="686" value="Kiribati" data-code="KI"> Kiribati </option>
											<option data-mobile_code="850" value="Democratic People&#039;s Republic of Korea" data-code="KP"> Democratic People&#039;s Republic of Korea </option>
											<option data-mobile_code="82" value="Republic of South Korea" data-code="KR"> Republic of South Korea </option>
											<option data-mobile_code="965" value="Kuwait" data-code="KW"> Kuwait </option>
											<option data-mobile_code="996" value="Kyrgyzstan" data-code="KG"> Kyrgyzstan </option>
											<option data-mobile_code="856" value="Laos" data-code="LA"> Laos </option>
											<option data-mobile_code="371" value="Latvia" data-code="LV"> Latvia </option>
											<option data-mobile_code="961" value="Lebanon" data-code="LB"> Lebanon </option>
											<option data-mobile_code="266" value="Lesotho" data-code="LS"> Lesotho </option>
											<option data-mobile_code="231" value="Liberia" data-code="LR"> Liberia </option>
											<option data-mobile_code="218" value="Libyan Arab Jamahiriya" data-code="LY"> Libyan Arab Jamahiriya </option>
											<option data-mobile_code="423" value="Liechtenstein" data-code="LI"> Liechtenstein </option>
											<option data-mobile_code="370" value="Lithuania" data-code="LT"> Lithuania </option>
											<option data-mobile_code="352" value="Luxembourg" data-code="LU"> Luxembourg </option>
											<option data-mobile_code="853" value="Macao" data-code="MO"> Macao </option>
											<option data-mobile_code="389" value="Macedonia" data-code="MK"> Macedonia </option>
											<option data-mobile_code="261" value="Madagascar" data-code="MG"> Madagascar </option>
											<option data-mobile_code="265" value="Malawi" data-code="MW"> Malawi </option>
											<option data-mobile_code="60" value="Malaysia" data-code="MY"> Malaysia </option>
											<option data-mobile_code="960" value="Maldives" data-code="MV"> Maldives </option>
											<option data-mobile_code="223" value="Mali" data-code="ML"> Mali </option>
											<option data-mobile_code="356" value="Malta" data-code="MT"> Malta </option>
											<option data-mobile_code="692" value="Marshall Islands" data-code="MH"> Marshall Islands </option>
											<option data-mobile_code="596" value="Martinique" data-code="MQ"> Martinique </option>
											<option data-mobile_code="222" value="Mauritania" data-code="MR"> Mauritania </option>
											<option data-mobile_code="230" value="Mauritius" data-code="MU"> Mauritius </option>
											<option data-mobile_code="262" value="Mayotte" data-code="YT"> Mayotte </option>
											<option data-mobile_code="52" value="Mexico" data-code="MX"> Mexico </option>
											<option data-mobile_code="691" value="Federated States of Micronesia" data-code="FM"> Federated States of Micronesia </option>
											<option data-mobile_code="373" value="Moldova" data-code="MD"> Moldova </option>
											<option data-mobile_code="377" value="Monaco" data-code="MC"> Monaco </option>
											<option data-mobile_code="976" value="Mongolia" data-code="MN"> Mongolia </option>
											<option data-mobile_code="382" value="Montenegro" data-code="ME"> Montenegro </option>
											<option data-mobile_code="1664" value="Montserrat" data-code="MS"> Montserrat </option>
											<option data-mobile_code="212" value="Morocco" data-code="MA"> Morocco </option>
											<option data-mobile_code="258" value="Mozambique" data-code="MZ"> Mozambique </option>
											<option data-mobile_code="95" value="Myanmar" data-code="MM"> Myanmar </option>
											<option data-mobile_code="264" value="Namibia" data-code="NA"> Namibia </option>
											<option data-mobile_code="674" value="Nauru" data-code="NR"> Nauru </option>
											<option data-mobile_code="977" value="Nepal" data-code="NP"> Nepal </option>
											<option data-mobile_code="31" value="Netherlands" data-code="NL"> Netherlands </option>
											<option data-mobile_code="599" value="Netherlands Antilles" data-code="AN"> Netherlands Antilles </option>
											<option data-mobile_code="687" value="New Caledonia" data-code="NC"> New Caledonia </option>
											<option data-mobile_code="64" value="New Zealand" data-code="NZ"> New Zealand </option>
											<option data-mobile_code="505" value="Nicaragua" data-code="NI"> Nicaragua </option>
											<option data-mobile_code="227" value="Niger" data-code="NE"> Niger </option>
											<option data-mobile_code="234" value="Nigeria" data-code="NG"> Nigeria </option>
											<option data-mobile_code="683" value="Niue" data-code="NU"> Niue </option>
											<option data-mobile_code="672" value="Norfolk Island" data-code="NF"> Norfolk Island </option>
											<option data-mobile_code="1670" value="Northern Mariana Islands" data-code="MP"> Northern Mariana Islands </option>
											<option data-mobile_code="47" value="Norway" data-code="NO"> Norway </option>
											<option data-mobile_code="968" value="Oman" data-code="OM"> Oman </option>
											<option data-mobile_code="92" value="Pakistan" data-code="PK"> Pakistan </option>
											<option data-mobile_code="680" value="Palau" data-code="PW"> Palau </option>
											<option data-mobile_code="970" value="Palestinian Territory" data-code="PS"> Palestinian Territory </option>
											<option data-mobile_code="507" value="Panama" data-code="PA"> Panama </option>
											<option data-mobile_code="675" value="Papua New Guinea" data-code="PG"> Papua New Guinea </option>
											<option data-mobile_code="595" value="Paraguay" data-code="PY"> Paraguay </option>
											<option data-mobile_code="51" value="Peru" data-code="PE"> Peru </option>
											<option data-mobile_code="63" value="Philippines" data-code="PH"> Philippines </option>
											<option data-mobile_code="872" value="Pitcairn" data-code="PN"> Pitcairn </option>
											<option data-mobile_code="48" value="Poland" data-code="PL"> Poland </option>
											<option data-mobile_code="351" value="Portugal" data-code="PT"> Portugal </option>
											<option data-mobile_code="1939" value="Puerto Rico" data-code="PR"> Puerto Rico </option>
											<option data-mobile_code="974" value="Qatar" data-code="QA"> Qatar </option>
											<option data-mobile_code="40" value="Romania" data-code="RO"> Romania </option>
											<option data-mobile_code="7" value="Russia" data-code="RU"> Russia </option>
											<option data-mobile_code="250" value="Rwanda" data-code="RW"> Rwanda </option>
											<option data-mobile_code="262" value="Reunion" data-code="RE"> Reunion </option>
											<option data-mobile_code="590" value="Saint Barthelemy" data-code="BL"> Saint Barthelemy </option>
											<option data-mobile_code="290" value="Saint Helena" data-code="SH"> Saint Helena </option>
											<option data-mobile_code="1869" value="Saint Kitts and Nevis" data-code="KN"> Saint Kitts and Nevis </option>
											<option data-mobile_code="1758" value="Saint Lucia" data-code="LC"> Saint Lucia </option>
											<option data-mobile_code="590" value="Saint Martin" data-code="MF"> Saint Martin </option>
											<option data-mobile_code="508" value="Saint Pierre and Miquelon" data-code="PM"> Saint Pierre and Miquelon </option>
											<option data-mobile_code="1784" value="Saint Vincent and the Grenadines" data-code="VC"> Saint Vincent and the Grenadines </option>
											<option data-mobile_code="685" value="Samoa" data-code="WS"> Samoa </option>
											<option data-mobile_code="378" value="San Marino" data-code="SM"> San Marino </option>
											<option data-mobile_code="239" value="Sao Tome and Principe" data-code="ST"> Sao Tome and Principe </option>
											<option data-mobile_code="966" value="Saudi Arabia" data-code="SA"> Saudi Arabia </option>
											<option data-mobile_code="221" value="Senegal" data-code="SN"> Senegal </option>
											<option data-mobile_code="381" value="Serbia" data-code="RS"> Serbia </option>
											<option data-mobile_code="248" value="Seychelles" data-code="SC"> Seychelles </option>
											<option data-mobile_code="232" value="Sierra Leone" data-code="SL"> Sierra Leone </option>
											<option data-mobile_code="65" value="Singapore" data-code="SG"> Singapore </option>
											<option data-mobile_code="421" value="Slovakia" data-code="SK"> Slovakia </option>
											<option data-mobile_code="386" value="Slovenia" data-code="SI"> Slovenia </option>
											<option data-mobile_code="677" value="Solomon Islands" data-code="SB"> Solomon Islands </option>
											<option data-mobile_code="252" value="Somalia" data-code="SO"> Somalia </option>
											<option data-mobile_code="27" value="South Africa" data-code="ZA"> South Africa </option>
											<option data-mobile_code="211" value="South Sudan" data-code="SS"> South Sudan </option>
											<option data-mobile_code="500" value="South Georgia and the South Sandwich Islands" data-code="GS"> South Georgia and the South Sandwich Islands </option>
											<option data-mobile_code="34" value="Spain" data-code="ES"> Spain </option>
											<option data-mobile_code="94" value="Sri Lanka" data-code="LK"> Sri Lanka </option>
											<option data-mobile_code="249" value="Sudan" data-code="SD"> Sudan </option>
											<option data-mobile_code="597" value="Suricountry" data-code="SR"> Suricountry </option>
											<option data-mobile_code="47" value="Svalbard and Jan Mayen" data-code="SJ"> Svalbard and Jan Mayen </option>
											<option data-mobile_code="268" value="Swaziland" data-code="SZ"> Swaziland </option>
											<option data-mobile_code="46" value="Sweden" data-code="SE"> Sweden </option>
											<option data-mobile_code="41" value="Switzerland" data-code="CH"> Switzerland </option>
											<option data-mobile_code="963" value="Syrian Arab Republic" data-code="SY"> Syrian Arab Republic </option>
											<option data-mobile_code="886" value="Taiwan" data-code="TW"> Taiwan </option>
											<option data-mobile_code="992" value="Tajikistan" data-code="TJ"> Tajikistan </option>
											<option data-mobile_code="255" value="Tanzania" data-code="TZ"> Tanzania </option>
											<option data-mobile_code="66" value="Thailand" data-code="TH"> Thailand </option>
											<option data-mobile_code="670" value="Timor-Leste" data-code="TL"> Timor-Leste </option>
											<option data-mobile_code="228" value="Togo" data-code="TG"> Togo </option>
											<option data-mobile_code="690" value="Tokelau" data-code="TK"> Tokelau </option>
											<option data-mobile_code="676" value="Tonga" data-code="TO"> Tonga </option>
											<option data-mobile_code="1868" value="Trinidad and Tobago" data-code="TT"> Trinidad and Tobago </option>
											<option data-mobile_code="216" value="Tunisia" data-code="TN"> Tunisia </option>
											<option data-mobile_code="90" value="Turkey" data-code="TR"> Turkey </option>
											<option data-mobile_code="993" value="Turkmenistan" data-code="TM"> Turkmenistan </option>
											<option data-mobile_code="1649" value="Turks and Caicos Islands" data-code="TC"> Turks and Caicos Islands </option>
											<option data-mobile_code="688" value="Tuvalu" data-code="TV"> Tuvalu </option>
											<option data-mobile_code="256" value="Uganda" data-code="UG"> Uganda </option>
											<option data-mobile_code="380" value="Ukraine" data-code="UA"> Ukraine </option>
											<option data-mobile_code="971" value="United Arab Emirates" data-code="AE"> United Arab Emirates </option>
											<option data-mobile_code="44" value="United Kingdom" data-code="GB"> United Kingdom </option>
											<option data-mobile_code="1" value="United States" data-code="US"> United States </option>
											<option data-mobile_code="598" value="Uruguay" data-code="UY"> Uruguay </option>
											<option data-mobile_code="998" value="Uzbekistan" data-code="UZ"> Uzbekistan </option>
											<option data-mobile_code="678" value="Vanuatu" data-code="VU"> Vanuatu </option>
											<option data-mobile_code="58" value="Venezuela" data-code="VE"> Venezuela </option>
											<option data-mobile_code="84" value="Vietnam" data-code="VN"> Vietnam </option>
											<option data-mobile_code="1284" value="British Virgin Islands" data-code="VG"> British Virgin Islands </option>
											<option data-mobile_code="1340" value="U.S. Virgin Islands" data-code="VI"> U.S. Virgin Islands </option>
											<option data-mobile_code="681" value="Wallis and Futuna" data-code="WF"> Wallis and Futuna </option>
											<option data-mobile_code="967" value="Yemen" data-code="YE"> Yemen </option>
											<option data-mobile_code="260" value="Zambia" data-code="ZM"> Zambia </option>
											<option data-mobile_code="263" value="Zimbabwe" data-code="ZW"> Zimbabwe </option>
										</select>
									</div>
									<div class="form-group">
										<label class="form--label required">Phone</label>
										<input type="hidden" name="mobile_code">
										<input type="text" class="form--control" name="phone" value="<?=$phone?>" placeholder="+0123 456 789" required> </div>
									<h4 class="post-sidebar__card__subtitle mt-4">Choose an amount</h4>
									<div class="form-group">
										<div class="input--group"> <span class="input-group-text">₹</span>
											<input type="number" step="any" min="0" class="form--control" id="donationAmount" name="amount" value="" placeholder="0" readonly required> </div>
									</div>
									<div class="form-group">
										<div class="d-flex flex-wrap gap-3">
											<div class="form--radio">
												<input type="radio" class="form-check-input" id="donationAmount_1" name="donationAmount" data-amount="100">
												<label class="form-check-label" for="donationAmount_1"> ₹100 </label>
											</div>
											<div class="form--radio">
												<input type="radio" class="form-check-input" id="donationAmount_2" name="donationAmount" data-amount="200">
												<label class="form-check-label" for="donationAmount_2"> ₹200 </label>
											</div>
											<div class="form--radio">
												<input type="radio" class="form-check-input" id="donationAmount_3" name="donationAmount" data-amount="300">
												<label class="form-check-label" for="donationAmount_3"> ₹300 </label>
											</div>
											<div class="form--radio">
												<input type="radio" class="form-check-input" id="donationAmount_4" name="donationAmount" data-amount="400">
												<label class="form-check-label" for="donationAmount_4"> ₹400 </label>
											</div>
											<div class="form--radio">
												<input type="radio" class="form-check-input" id="donationAmount_5" name="donationAmount" data-amount="500">
												<label class="form-check-label" for="donationAmount_5"> ₹500 </label>
											</div>
											<div class="form--radio">
												<input type="radio" class="form-check-input" id="customDonationAmount" name="donationAmount">
												<label class="form-check-label" for="customDonationAmount"> Custom </label>
											</div>
										</div>
									</div>
									 
									<div class="mt-4 mb-3 preview-details d-none">
										<ul class="list-group">
											<li class="list-group-item d-flex justify-content-between"> <span>Limit</span> <span><span class="min fw-bold">0</span> USD - <span class="max fw-bold">0</span> USD</span>
											</li>
											<li class="list-group-item d-flex justify-content-between"> <span>Charge</span> <span><span class="charge fw-bold">0</span> USD</span>
											</li>
											<li class="list-group-item d-flex justify-content-between"> <span>Payable</span> <span><span class="payable fw-bold">0</span> USD</span>
											</li>
											<li class="list-group-item justify-content-between d-none rate-element"></li>
											<li class="list-group-item justify-content-between d-none in-site-cur"> <span>In <span class="method_currency"></span></span> <span class="final_amount fw-bold">0</span> </li>
										</ul>
									</div>
									<button type="submit" name="donate_now" class="btn btn--base w-100 mt-2">Donate Now</button>
								</form>
							</div>
						</div>
						<div class="post-sidebar__card" data-aos="fade-up" data-aos-duration="1500">
							<h3 class="post-sidebar__card__header">Volunteering</h3>
							<div class="post-sidebar__card__body">
							    <?php if(isset($_SESSION["login_id"])){ 
							      $user = mysqli_fetch_assoc(mysqli_query($con,"select * from users where id='".$_SESSION["login_id"]."'"));  
							      $name = $user['name'];
							      $email = $user['email'];
							      $phone = $user['phone'];
							      $user_id = $user['id'];
							      $organizer_id = $row['user_id'];
							      $campaign_id = $user['id']; 
							      
							    } else {
							       $name = '';
							       $email = '';
							       $phone = '';
							       $user_id = 0;
							       $organizer_id=0;
							       $campaign_id = 0; 
							     } ?>
								<form action="" method="POST">
								    <?=$msglog?>
									<input type="hidden" name="organizer_id" value="<?=$row['user_id']?>" autocomplete="off">
									<input type="hidden" name="campaign_id" value="<?=$row['id']?>">
									<input type="hidden" name="user_id" value="<?=$user_id?>">
									<div class="form-group">
										  
									</div>
									<div class="form-group anonymous-alert-text d-none">
										<div class="alert alert-info" role="alert"> We require your information even if you choose to donate anonymously. However, rest assured that your details will not be displayed anywhere in our system. </div>
									</div>
									<div class="form-group">
										<label class="form--label required">Full Name</label>
										<input type="text" class="form--control" name="name" value="<?=$name?>" placeholder="John Doe" required> </div>
									<div class="form-group">
										<label class="form--label required">Email</label>
										<input type="email" class="form--control" name="email" value="<?=$email?>" placeholder="example@example.com" required> </div>
									<div class="form-group">
										<label class="form--label required">Country</label>
										<select class="form--control form-select select-2" name="country">
											<option data-mobile_code="93" value="Afghanistan" data-code="AF"> Afghanistan </option>
											<option data-mobile_code="358" value="Aland Islands" data-code="AX"> Aland Islands </option>
											<option data-mobile_code="355" value="Albania" data-code="AL"> Albania </option>
											<option data-mobile_code="213" value="Algeria" data-code="DZ"> Algeria </option>
											<option data-mobile_code="1684" value="AmericanSamoa" data-code="AS"> AmericanSamoa </option>
											<option data-mobile_code="376" value="Andorra" data-code="AD"> Andorra </option>
											<option data-mobile_code="244" value="Angola" data-code="AO"> Angola </option>
											<option data-mobile_code="1264" value="Anguilla" data-code="AI"> Anguilla </option>
											<option data-mobile_code="672" value="Antarctica" data-code="AQ"> Antarctica </option>
											<option data-mobile_code="1268" value="Antigua and Barbuda" data-code="AG"> Antigua and Barbuda </option>
											<option data-mobile_code="54" value="Argentina" data-code="AR"> Argentina </option>
											<option data-mobile_code="374" value="Armenia" data-code="AM"> Armenia </option>
											<option data-mobile_code="297" value="Aruba" data-code="AW"> Aruba </option>
											<option data-mobile_code="61" value="Australia" data-code="AU"> Australia </option>
											<option data-mobile_code="43" value="Austria" data-code="AT"> Austria </option>
											<option data-mobile_code="994" value="Azerbaijan" data-code="AZ"> Azerbaijan </option>
											<option data-mobile_code="1242" value="Bahamas" data-code="BS"> Bahamas </option>
											<option data-mobile_code="973" value="Bahrain" data-code="BH"> Bahrain </option>
											<option data-mobile_code="880" value="Bangladesh" data-code="BD"> Bangladesh </option>
											<option data-mobile_code="1246" value="Barbados" data-code="BB"> Barbados </option>
											<option data-mobile_code="375" value="Belarus" data-code="BY"> Belarus </option>
											<option data-mobile_code="32" value="Belgium" data-code="BE"> Belgium </option>
											<option data-mobile_code="501" value="Belize" data-code="BZ"> Belize </option>
											<option data-mobile_code="229" value="Benin" data-code="BJ"> Benin </option>
											<option data-mobile_code="1441" value="Bermuda" data-code="BM"> Bermuda </option>
											<option data-mobile_code="975" value="Bhutan" data-code="BT"> Bhutan </option>
											<option data-mobile_code="591" value="Plurinational State of Bolivia" data-code="BO"> Plurinational State of Bolivia </option>
											<option data-mobile_code="387" value="Bosnia and Herzegovina" data-code="BA"> Bosnia and Herzegovina </option>
											<option data-mobile_code="267" value="Botswana" data-code="BW"> Botswana </option>
											<option data-mobile_code="55" value="Brazil" data-code="BR"> Brazil </option>
											<option data-mobile_code="246" value="British Indian Ocean Territory" data-code="IO"> British Indian Ocean Territory </option>
											<option data-mobile_code="673" value="Brunei Darussalam" data-code="BN"> Brunei Darussalam </option>
											<option data-mobile_code="359" value="Bulgaria" data-code="BG"> Bulgaria </option>
											<option data-mobile_code="226" value="Burkina Faso" data-code="BF"> Burkina Faso </option>
											<option data-mobile_code="257" value="Burundi" data-code="BI"> Burundi </option>
											<option data-mobile_code="855" value="Cambodia" data-code="KH"> Cambodia </option>
											<option data-mobile_code="237" value="Cameroon" data-code="CM"> Cameroon </option>
											<option data-mobile_code="1" value="Canada" data-code="CA"> Canada </option>
											<option data-mobile_code="238" value="Cape Verde" data-code="CV"> Cape Verde </option>
											<option data-mobile_code=" 345" value="Cayman Islands" data-code="KY"> Cayman Islands </option>
											<option data-mobile_code="236" value="Central African Republic" data-code="CF"> Central African Republic </option>
											<option data-mobile_code="235" value="Chad" data-code="TD"> Chad </option>
											<option data-mobile_code="56" value="Chile" data-code="CL"> Chile </option>
											<option data-mobile_code="86" value="China" data-code="CN"> China </option>
											<option data-mobile_code="61" value="Christmas Island" data-code="CX"> Christmas Island </option>
											<option data-mobile_code="61" value="Cocos (Keeling) Islands" data-code="CC"> Cocos (Keeling) Islands </option>
											<option data-mobile_code="57" value="Colombia" data-code="CO"> Colombia </option>
											<option data-mobile_code="269" value="Comoros" data-code="KM"> Comoros </option>
											<option data-mobile_code="242" value="Congo" data-code="CG"> Congo </option>
											<option data-mobile_code="243" value="The Democratic Republic of the Congo" data-code="CD"> The Democratic Republic of the Congo </option>
											<option data-mobile_code="682" value="Cook Islands" data-code="CK"> Cook Islands </option>
											<option data-mobile_code="506" value="Costa Rica" data-code="CR"> Costa Rica </option>
											<option data-mobile_code="225" value="Cote d&#039;Ivoire" data-code="CI"> Cote d&#039;Ivoire </option>
											<option data-mobile_code="385" value="Croatia" data-code="HR"> Croatia </option>
											<option data-mobile_code="53" value="Cuba" data-code="CU"> Cuba </option>
											<option data-mobile_code="357" value="Cyprus" data-code="CY"> Cyprus </option>
											<option data-mobile_code="420" value="Czech Republic" data-code="CZ"> Czech Republic </option>
											<option data-mobile_code="45" value="Denmark" data-code="DK"> Denmark </option>
											<option data-mobile_code="253" value="Djibouti" data-code="DJ"> Djibouti </option>
											<option data-mobile_code="1767" value="Dominica" data-code="DM"> Dominica </option>
											<option data-mobile_code="1849" value="Dominican Republic" data-code="DO"> Dominican Republic </option>
											<option data-mobile_code="593" value="Ecuador" data-code="EC"> Ecuador </option>
											<option data-mobile_code="20" value="Egypt" data-code="EG"> Egypt </option>
											<option data-mobile_code="503" value="El Salvador" data-code="SV"> El Salvador </option>
											<option data-mobile_code="240" value="Equatorial Guinea" data-code="GQ"> Equatorial Guinea </option>
											<option data-mobile_code="291" value="Eritrea" data-code="ER"> Eritrea </option>
											<option data-mobile_code="372" value="Estonia" data-code="EE"> Estonia </option>
											<option data-mobile_code="251" value="Ethiopia" data-code="ET"> Ethiopia </option>
											<option data-mobile_code="500" value="Falkland Islands (Malvinas)" data-code="FK"> Falkland Islands (Malvinas) </option>
											<option data-mobile_code="298" value="Faroe Islands" data-code="FO"> Faroe Islands </option>
											<option data-mobile_code="679" value="Fiji" data-code="FJ"> Fiji </option>
											<option data-mobile_code="358" value="Finland" data-code="FI"> Finland </option>
											<option data-mobile_code="33" value="France" data-code="FR"> France </option>
											<option data-mobile_code="594" value="French Guiana" data-code="GF"> French Guiana </option>
											<option data-mobile_code="689" value="French Polynesia" data-code="PF"> French Polynesia </option>
											<option data-mobile_code="241" value="Gabon" data-code="GA"> Gabon </option>
											<option data-mobile_code="220" value="Gambia" data-code="GM"> Gambia </option>
											<option data-mobile_code="995" value="Georgia" data-code="GE"> Georgia </option>
											<option data-mobile_code="49" value="Germany" data-code="DE"> Germany </option>
											<option data-mobile_code="233" value="Ghana" data-code="GH"> Ghana </option>
											<option data-mobile_code="350" value="Gibraltar" data-code="GI"> Gibraltar </option>
											<option data-mobile_code="30" value="Greece" data-code="GR"> Greece </option>
											<option data-mobile_code="299" value="Greenland" data-code="GL"> Greenland </option>
											<option data-mobile_code="1473" value="Grenada" data-code="GD"> Grenada </option>
											<option data-mobile_code="590" value="Guadeloupe" data-code="GP"> Guadeloupe </option>
											<option data-mobile_code="1671" value="Guam" data-code="GU"> Guam </option>
											<option data-mobile_code="502" value="Guatemala" data-code="GT"> Guatemala </option>
											<option data-mobile_code="44" value="Guernsey" data-code="GG"> Guernsey </option>
											<option data-mobile_code="224" value="Guinea" data-code="GN"> Guinea </option>
											<option data-mobile_code="245" value="Guinea-Bissau" data-code="GW"> Guinea-Bissau </option>
											<option data-mobile_code="595" value="Guyana" data-code="GY"> Guyana </option>
											<option data-mobile_code="509" value="Haiti" data-code="HT"> Haiti </option>
											<option data-mobile_code="379" value="Holy See (Vatican City State)" data-code="VA"> Holy See (Vatican City State) </option>
											<option data-mobile_code="504" value="Honduras" data-code="HN"> Honduras </option>
											<option data-mobile_code="852" value="Hong Kong" data-code="HK"> Hong Kong </option>
											<option data-mobile_code="36" value="Hungary" data-code="HU"> Hungary </option>
											<option data-mobile_code="354" value="Iceland" data-code="IS"> Iceland </option>
											<option data-mobile_code="91" value="India" data-code="IN" selected> India </option>
											<option data-mobile_code="62" value="Indonesia" data-code="ID"> Indonesia </option>
											<option data-mobile_code="98" value="Iran, Islamic Republic of Persian Gulf" data-code="IR"> Iran, Islamic Republic of Persian Gulf </option>
											<option data-mobile_code="964" value="Iraq" data-code="IQ"> Iraq </option>
											<option data-mobile_code="353" value="Ireland" data-code="IE"> Ireland </option>
											<option data-mobile_code="44" value="Isle of Man" data-code="IM"> Isle of Man </option>
											<option data-mobile_code="972" value="Israel" data-code="IL"> Israel </option>
											<option data-mobile_code="39" value="Italy" data-code="IT"> Italy </option>
											<option data-mobile_code="1876" value="Jamaica" data-code="JM"> Jamaica </option>
											<option data-mobile_code="81" value="Japan" data-code="JP"> Japan </option>
											<option data-mobile_code="44" value="Jersey" data-code="JE"> Jersey </option>
											<option data-mobile_code="962" value="Jordan" data-code="JO"> Jordan </option>
											<option data-mobile_code="77" value="Kazakhstan" data-code="KZ"> Kazakhstan </option>
											<option data-mobile_code="254" value="Kenya" data-code="KE"> Kenya </option>
											<option data-mobile_code="686" value="Kiribati" data-code="KI"> Kiribati </option>
											<option data-mobile_code="850" value="Democratic People&#039;s Republic of Korea" data-code="KP"> Democratic People&#039;s Republic of Korea </option>
											<option data-mobile_code="82" value="Republic of South Korea" data-code="KR"> Republic of South Korea </option>
											<option data-mobile_code="965" value="Kuwait" data-code="KW"> Kuwait </option>
											<option data-mobile_code="996" value="Kyrgyzstan" data-code="KG"> Kyrgyzstan </option>
											<option data-mobile_code="856" value="Laos" data-code="LA"> Laos </option>
											<option data-mobile_code="371" value="Latvia" data-code="LV"> Latvia </option>
											<option data-mobile_code="961" value="Lebanon" data-code="LB"> Lebanon </option>
											<option data-mobile_code="266" value="Lesotho" data-code="LS"> Lesotho </option>
											<option data-mobile_code="231" value="Liberia" data-code="LR"> Liberia </option>
											<option data-mobile_code="218" value="Libyan Arab Jamahiriya" data-code="LY"> Libyan Arab Jamahiriya </option>
											<option data-mobile_code="423" value="Liechtenstein" data-code="LI"> Liechtenstein </option>
											<option data-mobile_code="370" value="Lithuania" data-code="LT"> Lithuania </option>
											<option data-mobile_code="352" value="Luxembourg" data-code="LU"> Luxembourg </option>
											<option data-mobile_code="853" value="Macao" data-code="MO"> Macao </option>
											<option data-mobile_code="389" value="Macedonia" data-code="MK"> Macedonia </option>
											<option data-mobile_code="261" value="Madagascar" data-code="MG"> Madagascar </option>
											<option data-mobile_code="265" value="Malawi" data-code="MW"> Malawi </option>
											<option data-mobile_code="60" value="Malaysia" data-code="MY"> Malaysia </option>
											<option data-mobile_code="960" value="Maldives" data-code="MV"> Maldives </option>
											<option data-mobile_code="223" value="Mali" data-code="ML"> Mali </option>
											<option data-mobile_code="356" value="Malta" data-code="MT"> Malta </option>
											<option data-mobile_code="692" value="Marshall Islands" data-code="MH"> Marshall Islands </option>
											<option data-mobile_code="596" value="Martinique" data-code="MQ"> Martinique </option>
											<option data-mobile_code="222" value="Mauritania" data-code="MR"> Mauritania </option>
											<option data-mobile_code="230" value="Mauritius" data-code="MU"> Mauritius </option>
											<option data-mobile_code="262" value="Mayotte" data-code="YT"> Mayotte </option>
											<option data-mobile_code="52" value="Mexico" data-code="MX"> Mexico </option>
											<option data-mobile_code="691" value="Federated States of Micronesia" data-code="FM"> Federated States of Micronesia </option>
											<option data-mobile_code="373" value="Moldova" data-code="MD"> Moldova </option>
											<option data-mobile_code="377" value="Monaco" data-code="MC"> Monaco </option>
											<option data-mobile_code="976" value="Mongolia" data-code="MN"> Mongolia </option>
											<option data-mobile_code="382" value="Montenegro" data-code="ME"> Montenegro </option>
											<option data-mobile_code="1664" value="Montserrat" data-code="MS"> Montserrat </option>
											<option data-mobile_code="212" value="Morocco" data-code="MA"> Morocco </option>
											<option data-mobile_code="258" value="Mozambique" data-code="MZ"> Mozambique </option>
											<option data-mobile_code="95" value="Myanmar" data-code="MM"> Myanmar </option>
											<option data-mobile_code="264" value="Namibia" data-code="NA"> Namibia </option>
											<option data-mobile_code="674" value="Nauru" data-code="NR"> Nauru </option>
											<option data-mobile_code="977" value="Nepal" data-code="NP"> Nepal </option>
											<option data-mobile_code="31" value="Netherlands" data-code="NL"> Netherlands </option>
											<option data-mobile_code="599" value="Netherlands Antilles" data-code="AN"> Netherlands Antilles </option>
											<option data-mobile_code="687" value="New Caledonia" data-code="NC"> New Caledonia </option>
											<option data-mobile_code="64" value="New Zealand" data-code="NZ"> New Zealand </option>
											<option data-mobile_code="505" value="Nicaragua" data-code="NI"> Nicaragua </option>
											<option data-mobile_code="227" value="Niger" data-code="NE"> Niger </option>
											<option data-mobile_code="234" value="Nigeria" data-code="NG"> Nigeria </option>
											<option data-mobile_code="683" value="Niue" data-code="NU"> Niue </option>
											<option data-mobile_code="672" value="Norfolk Island" data-code="NF"> Norfolk Island </option>
											<option data-mobile_code="1670" value="Northern Mariana Islands" data-code="MP"> Northern Mariana Islands </option>
											<option data-mobile_code="47" value="Norway" data-code="NO"> Norway </option>
											<option data-mobile_code="968" value="Oman" data-code="OM"> Oman </option>
											<option data-mobile_code="92" value="Pakistan" data-code="PK"> Pakistan </option>
											<option data-mobile_code="680" value="Palau" data-code="PW"> Palau </option>
											<option data-mobile_code="970" value="Palestinian Territory" data-code="PS"> Palestinian Territory </option>
											<option data-mobile_code="507" value="Panama" data-code="PA"> Panama </option>
											<option data-mobile_code="675" value="Papua New Guinea" data-code="PG"> Papua New Guinea </option>
											<option data-mobile_code="595" value="Paraguay" data-code="PY"> Paraguay </option>
											<option data-mobile_code="51" value="Peru" data-code="PE"> Peru </option>
											<option data-mobile_code="63" value="Philippines" data-code="PH"> Philippines </option>
											<option data-mobile_code="872" value="Pitcairn" data-code="PN"> Pitcairn </option>
											<option data-mobile_code="48" value="Poland" data-code="PL"> Poland </option>
											<option data-mobile_code="351" value="Portugal" data-code="PT"> Portugal </option>
											<option data-mobile_code="1939" value="Puerto Rico" data-code="PR"> Puerto Rico </option>
											<option data-mobile_code="974" value="Qatar" data-code="QA"> Qatar </option>
											<option data-mobile_code="40" value="Romania" data-code="RO"> Romania </option>
											<option data-mobile_code="7" value="Russia" data-code="RU"> Russia </option>
											<option data-mobile_code="250" value="Rwanda" data-code="RW"> Rwanda </option>
											<option data-mobile_code="262" value="Reunion" data-code="RE"> Reunion </option>
											<option data-mobile_code="590" value="Saint Barthelemy" data-code="BL"> Saint Barthelemy </option>
											<option data-mobile_code="290" value="Saint Helena" data-code="SH"> Saint Helena </option>
											<option data-mobile_code="1869" value="Saint Kitts and Nevis" data-code="KN"> Saint Kitts and Nevis </option>
											<option data-mobile_code="1758" value="Saint Lucia" data-code="LC"> Saint Lucia </option>
											<option data-mobile_code="590" value="Saint Martin" data-code="MF"> Saint Martin </option>
											<option data-mobile_code="508" value="Saint Pierre and Miquelon" data-code="PM"> Saint Pierre and Miquelon </option>
											<option data-mobile_code="1784" value="Saint Vincent and the Grenadines" data-code="VC"> Saint Vincent and the Grenadines </option>
											<option data-mobile_code="685" value="Samoa" data-code="WS"> Samoa </option>
											<option data-mobile_code="378" value="San Marino" data-code="SM"> San Marino </option>
											<option data-mobile_code="239" value="Sao Tome and Principe" data-code="ST"> Sao Tome and Principe </option>
											<option data-mobile_code="966" value="Saudi Arabia" data-code="SA"> Saudi Arabia </option>
											<option data-mobile_code="221" value="Senegal" data-code="SN"> Senegal </option>
											<option data-mobile_code="381" value="Serbia" data-code="RS"> Serbia </option>
											<option data-mobile_code="248" value="Seychelles" data-code="SC"> Seychelles </option>
											<option data-mobile_code="232" value="Sierra Leone" data-code="SL"> Sierra Leone </option>
											<option data-mobile_code="65" value="Singapore" data-code="SG"> Singapore </option>
											<option data-mobile_code="421" value="Slovakia" data-code="SK"> Slovakia </option>
											<option data-mobile_code="386" value="Slovenia" data-code="SI"> Slovenia </option>
											<option data-mobile_code="677" value="Solomon Islands" data-code="SB"> Solomon Islands </option>
											<option data-mobile_code="252" value="Somalia" data-code="SO"> Somalia </option>
											<option data-mobile_code="27" value="South Africa" data-code="ZA"> South Africa </option>
											<option data-mobile_code="211" value="South Sudan" data-code="SS"> South Sudan </option>
											<option data-mobile_code="500" value="South Georgia and the South Sandwich Islands" data-code="GS"> South Georgia and the South Sandwich Islands </option>
											<option data-mobile_code="34" value="Spain" data-code="ES"> Spain </option>
											<option data-mobile_code="94" value="Sri Lanka" data-code="LK"> Sri Lanka </option>
											<option data-mobile_code="249" value="Sudan" data-code="SD"> Sudan </option>
											<option data-mobile_code="597" value="Suricountry" data-code="SR"> Suricountry </option>
											<option data-mobile_code="47" value="Svalbard and Jan Mayen" data-code="SJ"> Svalbard and Jan Mayen </option>
											<option data-mobile_code="268" value="Swaziland" data-code="SZ"> Swaziland </option>
											<option data-mobile_code="46" value="Sweden" data-code="SE"> Sweden </option>
											<option data-mobile_code="41" value="Switzerland" data-code="CH"> Switzerland </option>
											<option data-mobile_code="963" value="Syrian Arab Republic" data-code="SY"> Syrian Arab Republic </option>
											<option data-mobile_code="886" value="Taiwan" data-code="TW"> Taiwan </option>
											<option data-mobile_code="992" value="Tajikistan" data-code="TJ"> Tajikistan </option>
											<option data-mobile_code="255" value="Tanzania" data-code="TZ"> Tanzania </option>
											<option data-mobile_code="66" value="Thailand" data-code="TH"> Thailand </option>
											<option data-mobile_code="670" value="Timor-Leste" data-code="TL"> Timor-Leste </option>
											<option data-mobile_code="228" value="Togo" data-code="TG"> Togo </option>
											<option data-mobile_code="690" value="Tokelau" data-code="TK"> Tokelau </option>
											<option data-mobile_code="676" value="Tonga" data-code="TO"> Tonga </option>
											<option data-mobile_code="1868" value="Trinidad and Tobago" data-code="TT"> Trinidad and Tobago </option>
											<option data-mobile_code="216" value="Tunisia" data-code="TN"> Tunisia </option>
											<option data-mobile_code="90" value="Turkey" data-code="TR"> Turkey </option>
											<option data-mobile_code="993" value="Turkmenistan" data-code="TM"> Turkmenistan </option>
											<option data-mobile_code="1649" value="Turks and Caicos Islands" data-code="TC"> Turks and Caicos Islands </option>
											<option data-mobile_code="688" value="Tuvalu" data-code="TV"> Tuvalu </option>
											<option data-mobile_code="256" value="Uganda" data-code="UG"> Uganda </option>
											<option data-mobile_code="380" value="Ukraine" data-code="UA"> Ukraine </option>
											<option data-mobile_code="971" value="United Arab Emirates" data-code="AE"> United Arab Emirates </option>
											<option data-mobile_code="44" value="United Kingdom" data-code="GB"> United Kingdom </option>
											<option data-mobile_code="1" value="United States" data-code="US"> United States </option>
											<option data-mobile_code="598" value="Uruguay" data-code="UY"> Uruguay </option>
											<option data-mobile_code="998" value="Uzbekistan" data-code="UZ"> Uzbekistan </option>
											<option data-mobile_code="678" value="Vanuatu" data-code="VU"> Vanuatu </option>
											<option data-mobile_code="58" value="Venezuela" data-code="VE"> Venezuela </option>
											<option data-mobile_code="84" value="Vietnam" data-code="VN"> Vietnam </option>
											<option data-mobile_code="1284" value="British Virgin Islands" data-code="VG"> British Virgin Islands </option>
											<option data-mobile_code="1340" value="U.S. Virgin Islands" data-code="VI"> U.S. Virgin Islands </option>
											<option data-mobile_code="681" value="Wallis and Futuna" data-code="WF"> Wallis and Futuna </option>
											<option data-mobile_code="967" value="Yemen" data-code="YE"> Yemen </option>
											<option data-mobile_code="260" value="Zambia" data-code="ZM"> Zambia </option>
											<option data-mobile_code="263" value="Zimbabwe" data-code="ZW"> Zimbabwe </option>
										</select>
									</div>
									<div class="form-group">
										<label class="form--label required">Phone</label>
										<input type="hidden" name="mobile_code">
										<input type="text" class="form--control" name="phone" value="<?=$phone?>" placeholder="+0123 456 789" required> </div>
								
									 
								   <button type="submit" name="submit_volunteers" class="btn btn--base w-100 mt-2">Join Now</button>
								</form>
							</div>
						</div>
						 <div class="post-sidebar__card" data-aos="fade-up" data-aos-duration="1500">
							<h3 class="post-sidebar__card__header">Share This Campaign</h3>
							<div class="post-sidebar__card__body">
								<div class="input--group mb-4">
									<input type="text" class="form--control" id="shareLink" readonly> <span class="badge bg--success share-link__badge">Copied</span>
									<button class="btn btn--base share-link__copy px-3"> <i class="fa-solid fa-copy"></i> </button>
								</div>
								<ul class="social-list social-list-2">
									<li class="social-list__item">
										<a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fphinix.digital%2Fpnixfund%2Fcampaign%2Fclean-water-initiative-providing-safe-drinking-water" class="social-list__link flex-center" target="_blank"> <i class="fab fa-facebook-f"></i> </a>
									</li>
									<li class="social-list__item">
										<a href="https://twitter.com/intent/tweet?text=my share text&amp;url=https%3A%2F%2Fphinix.digital%2Fpnixfund%2Fcampaign%2Fclean-water-initiative-providing-safe-drinking-water" class="social-list__link flex-center" target="_blank"> <i class="fab fa-x-twitter"></i> </a>
									</li>
									<li class="social-list__item">
										<a href="http://www.linkedin.com/shareArticle?url=https%3A%2F%2Fphinix.digital%2Fpnixfund%2Fcampaign%2Fclean-water-initiative-providing-safe-drinking-water" class="social-list__link flex-center" target="_blank"> <i class="fab fa-linkedin-in"></i> </a>
									</li>
									<li class="social-list__item">
										<a href="https://pinterest.com/pin/create/bookmarklet/?media=assets/universal/images/campaign/66030f26a822f1711476518.jpg&url=https%3A%2F%2Fphinix.digital%2Fpnixfund%2Fcampaign%2Fclean-water-initiative-providing-safe-drinking-water&is_video=[is_video]&description=Clean Water Initiative: Providing Safe Drinking Water" class="social-list__link flex-center" target="_blank"> <i class="fab fa-pinterest-p"></i> </a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<?php include 'footer.php'; ?>
	<script src="assets/universal/js/jquery-3.7.1.min.js"></script>
	<script src="assets/universal/js/bootstrap.js"></script>
	<script src="assets/themes/primary/js/slick.min.js"></script>
	<script src="assets/themes/primary/js/viewport.jquery.js"></script>
	<script src="assets/themes/primary/js/lightbox.min.js"></script>
	<script src="assets/themes/primary/js/aos.js"></script>
	<script src="assets/themes/primary/js/main.js"></script>
	<link rel="stylesheet" href="assets/universal/css/iziToast.min.css">
	<script src="assets/universal/js/iziToast.min.js"></script>
	<script>
	"use strict";

	function showToasts(status, message) {
		if(typeof message == 'string') {
			iziToast[status]({
				message: message,
				position: "topRight"
			});
		} else {
			$.each(message, function(i, val) {
				iziToast[status]({
					message: val,
					position: "topRight"
				});
			});
		}
	}
	</script>
	<script src="assets/universal/js/select2.js"></script>
	<script>
	(function($) {
		"use strict"
		let showComments = 5
		$('.loadCommentButton').on('click', function() {
			$(this).addClass('btn-disabled').attr("disabled", true)
			let url = $(this).data('url')
			let skip = showComments
			let _this = $(this)
			$.ajax({
				type: "GET",
				url: url,
				data: {
					skip,
				},
				success: function(response) {
					$('#loadMoreComment').append(response.html)
					_this.removeClass('btn-disabled').attr("disabled", false)
					showComments += 5
					if(response.remaining_comments == 0) {
						$('.loadComment').addClass('d-none')
					}
				},
				error: function(errorData) {
					if(errorData.status === 400) {
						console.log(errorData.responseJSON.error.skip[0])
					} else {
						showToasts('error', errorData.responseJSON.message)
					}
					_this.removeClass('btn-disabled').attr("disabled", false)
				}
			})
		})
	})(jQuery)
	</script>
	<script>
	(function($) {
		"use strict";
		$(".langSel").on("change", function() {
			window.location.href = "change/" + $(this).val();
		});
		$('.policy').on('click', function() {
			$.get('cookie/accept', function(response) {
				$('.cookies-card').addClass('d-none');
			});
		});
		setTimeout(function() {
			$('.cookies-card').removeClass('hide');
		}, 2000);
		Array.from(document.querySelectorAll('table')).forEach(table => {
			let heading = table.querySelectorAll('thead tr th');
			Array.from(table.querySelectorAll('tbody tr')).forEach((row) => {
				Array.from(row.querySelectorAll('td')).forEach((colum, i) => {
					colum.setAttribute('data-label', heading[i].innerText)
				});
			});
		});
	})(jQuery);
	</script>
	<script>
	(function($) {
		'use strict'
		$('select[name=country]').change(function() {
			$('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
			$('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));
		});
		$('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
		$('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));
		$('#anonymousDonation').on('change', function() {
			if($(this).is(':checked')) {
				$('.anonymous-alert-text').removeClass('d-none')
			} else {
				$('.anonymous-alert-text').addClass('d-none')
			}
		})
		$('.select-2').select2({
			containerCssClass: ':all:',
		})
		$('[name=gateway]').change(function() {
			if(!$('[name=gateway]').val()) {
				$('.preview-details').addClass('d-none')
				return false
			}
			var resource = $('[name=gateway] option:selected').data('gateway')
			var fixed_charge = parseFloat(resource.fixed_charge)
			var percent_charge = parseFloat(resource.percent_charge)
			var rate = parseFloat(resource.rate)
			$('.min').text(parseFloat(resource.min_amount).toFixed(2))
			$('.max').text(parseFloat(resource.max_amount).toFixed(2))
			var amount = parseFloat($('[name=amount]').val())
			if(!amount) amount = 0
			if(amount <= 0) {
				$('.preview-details').addClass('d-none')
				return false
			}
			$('.preview-details').removeClass('d-none')
			var charge = parseFloat(fixed_charge + (amount * percent_charge / 100)).toFixed(2)
			$('.charge').text(charge)
			var payable = parseFloat(parseFloat(amount) + parseFloat(charge)).toFixed(2)
			$('.payable').text(payable)
			var final_amount = (parseFloat(parseFloat(amount) + parseFloat(charge)) * rate).toFixed(2)
			$('.final_amount').text(final_amount)
			if(resource.currency != 'USD') {
				var rateElement = `<span>Conversion Rate</span> <span class="fw-bold">1 USD = <span class="rate">${rate}</span> <span class="method_currency">${resource.currency}</span></span>`;
				$('.rate-element').html(rateElement)
				$('.rate-element').removeClass('d-none')
				$('.rate-element').addClass('d-flex')
				$('.in-site-cur').removeClass('d-none')
				$('.in-site-cur').addClass('d-flex')
			} else {
				$('.rate-element').html('')
				$('.rate-element').addClass('d-none')
				$('.rate-element').removeClass('d-flex')
				$('.in-site-cur').addClass('d-none')
				$('.in-site-cur').removeClass('d-flex')
			}
			$('.method_currency').text(resource.currency)
			$('[name=currency]').val(resource.currency)
		})
		$('[name=amount]').on('input', function() {
			$('[name=gateway]').change()
		})
		$(document).on('change', '[name=donationAmount]', function() {
			$('[name=gateway]').change()
		})
	})(jQuery)
	</script>
</body>

</html>