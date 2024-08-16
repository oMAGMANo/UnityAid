<?php 
include '../config.inc.php';
include 'session.php';
$id = $_GET['uid'];
$msglog='';
extract($_POST);
$res = mysqli_fetch_assoc(mysqli_query($con,"select * from users where id='$id'"));
if(isset($_POST['submit'])){
    $sql = "UPDATE users SET name='$name', email='$email', phone='$phone', state='$state', city='$city', zip='$zip', address='$address', country='$country' WHERE  id = '".$id."'";
    if(mysqli_query($con,$sql)){
        $msglog = '<div class="alert alert-success alert-dismissible fade show">
                                     Profile Updated Successfully
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button>
                                    </div>';
    } else {
        $msglog = '<div class="alert alert-danger alert-dismissible fade show">
                                       Something Went Wrong
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button>
                                    </div>';
    }
}
?>
	<!DOCTYPE html>
	<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed ">

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
		<title>
		UnityAid | Details -
				<?=$res['username']?>
		</title>
		<link rel="shortcut icon" type="image/png" href="../assets/universal/images/logoFavicon/favicon.png">
		<!-- Fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com/">
		<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
		<!-- Css -->
		<link rel="stylesheet" href="../assets/admin/css/style.css">
		<link rel="stylesheet" href="../assets/admin/css/theme.css">
		<link rel="stylesheet" href="../assets/admin/css/custom.css">
		<link rel="stylesheet" href="../assets/admin/css/scrollbar.css">
		<link rel="stylesheet" href="../assets/universal/css/font-awesome.css">
		<link rel="stylesheet" href="../assets/universal/css/line-awesome.css"> </head>

	<body>
		<div class="layout-wrapper layout-content-navbar">
			<div class="layout-container">
				<?php include 'sidebar.php'; ?>
					<div class="layout-page">
						<div class="content-wrapper">
							<div class="container-fluid flex-grow-1 container-p-y">
								<div class="row">
									<div class="col-xxl">
										<div class="card mb-4">
											<div class="card-header d-flex flex-wrap gap-3 justify-content-between align-items-center">
												<h5 class="mb-0">Details - <?=$res['username']?></h5>
												<div class="d-flex flex-wrap justify-content-md-end gap-2 align-items-center"> </div>
											</div>
										</div>
									</div>
								</div>
								 
 
								<div class="row">
									<div class="col-xxl">
										<div class="card mb-4">
											<h5 class="card-header">Information About <?=$res['name']?></h5>
											<hr class="mt-0">
											<form class="card-body" action="" method="POST">
											    <?=$msglog?>
												<input type="hidden" name="id" value="<?=$res['id']?>" autocomplete="off">
												<div class="row">
													<div class="col-md-6">
														<div class="row mb-3">
															<label class="col-lg-3 col-sm-4 col-form-label required"> Name</label>
															<div class="col-lg-9 col-sm-8">
																<input type="text" class="form-control" name="name" value="<?=$res['name']?>" required> </div>
														</div>
														<div class="row mb-3">
															<label class="col-lg-3 col-sm-4 col-form-label required">Username</label>
															<div class="col-lg-9 col-sm-8">
																<input type="text" class="form-control" name="username" value="<?=$res['username']?>" readonly required> </div>
														</div>
														<div class="row mb-3">
															<label class="col-lg-3 col-sm-4 col-form-label required">Email</label>
															<div class="col-lg-9 col-sm-8">
																<input type="email" class="form-control" name="email" value="<?=$res['email']?>" required> </div>
														</div>
														<div class="row mb-3">
															<label class="col-lg-3 col-sm-4 col-form-label required">Mobile</label>
															<div class="col-lg-9 col-sm-8">
																 	<input type="text" class="form-control" name="phone" id="mobile" value="<?=$res['phone']?>" required> 
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="row mb-3">
															<label class="col-lg-3 col-sm-4 col-form-label required">Country</label>
															<div class="col-lg-9 col-sm-8">
																<select class="form-select" name="country" required>
																	<option data-mobile_code="93" value="AF">Afghanistan</option>
																	<option data-mobile_code="358" value="AX">Aland Islands</option>
																	<option data-mobile_code="355" value="AL">Albania</option>
																	<option data-mobile_code="213" value="DZ">Algeria</option>
																	<option data-mobile_code="1684" value="AS">AmericanSamoa</option>
																	<option data-mobile_code="376" value="AD">Andorra</option>
																	<option data-mobile_code="244" value="AO">Angola</option>
																	<option data-mobile_code="1264" value="AI">Anguilla</option>
																	<option data-mobile_code="672" value="AQ">Antarctica</option>
																	<option data-mobile_code="1268" value="AG">Antigua and Barbuda</option>
																	<option data-mobile_code="54" value="AR">Argentina</option>
																	<option data-mobile_code="374" value="AM">Armenia</option>
																	<option data-mobile_code="297" value="AW">Aruba</option>
																	<option data-mobile_code="61" value="AU">Australia</option>
																	<option data-mobile_code="43" value="AT">Austria</option>
																	<option data-mobile_code="994" value="AZ">Azerbaijan</option>
																	<option data-mobile_code="1242" value="BS">Bahamas</option>
																	<option data-mobile_code="973" value="BH">Bahrain</option>
																	<option data-mobile_code="880" value="BD">Bangladesh</option>
																	<option data-mobile_code="1246" value="BB">Barbados</option>
																	<option data-mobile_code="375" value="BY">Belarus</option>
																	<option data-mobile_code="32" value="BE">Belgium</option>
																	<option data-mobile_code="501" value="BZ">Belize</option>
																	<option data-mobile_code="229" value="BJ">Benin</option>
																	<option data-mobile_code="1441" value="BM">Bermuda</option>
																	<option data-mobile_code="975" value="BT">Bhutan</option>
																	<option data-mobile_code="591" value="BO">Plurinational State of Bolivia</option>
																	<option data-mobile_code="387" value="BA">Bosnia and Herzegovina</option>
																	<option data-mobile_code="267" value="BW">Botswana</option>
																	<option data-mobile_code="55" value="BR">Brazil</option>
																	<option data-mobile_code="246" value="IO">British Indian Ocean Territory</option>
																	<option data-mobile_code="673" value="BN">Brunei Darussalam</option>
																	<option data-mobile_code="359" value="BG">Bulgaria</option>
																	<option data-mobile_code="226" value="BF">Burkina Faso</option>
																	<option data-mobile_code="257" value="BI">Burundi</option>
																	<option data-mobile_code="855" value="KH">Cambodia</option>
																	<option data-mobile_code="237" value="CM">Cameroon</option>
																	<option data-mobile_code="1" value="CA">Canada</option>
																	<option data-mobile_code="238" value="CV">Cape Verde</option>
																	<option data-mobile_code=" 345" value="KY">Cayman Islands</option>
																	<option data-mobile_code="236" value="CF">Central African Republic</option>
																	<option data-mobile_code="235" value="TD">Chad</option>
																	<option data-mobile_code="56" value="CL">Chile</option>
																	<option data-mobile_code="86" value="CN">China</option>
																	<option data-mobile_code="61" value="CX">Christmas Island</option>
																	<option data-mobile_code="61" value="CC">Cocos (Keeling) Islands</option>
																	<option data-mobile_code="57" value="CO">Colombia</option>
																	<option data-mobile_code="269" value="KM">Comoros</option>
																	<option data-mobile_code="242" value="CG">Congo</option>
																	<option data-mobile_code="243" value="CD">The Democratic Republic of the Congo</option>
																	<option data-mobile_code="682" value="CK">Cook Islands</option>
																	<option data-mobile_code="506" value="CR">Costa Rica</option>
																	<option data-mobile_code="225" value="CI">Cote d&#039;Ivoire</option>
																	<option data-mobile_code="385" value="HR">Croatia</option>
																	<option data-mobile_code="53" value="CU">Cuba</option>
																	<option data-mobile_code="357" value="CY">Cyprus</option>
																	<option data-mobile_code="420" value="CZ">Czech Republic</option>
																	<option data-mobile_code="45" value="DK">Denmark</option>
																	<option data-mobile_code="253" value="DJ">Djibouti</option>
																	<option data-mobile_code="1767" value="DM">Dominica</option>
																	<option data-mobile_code="1849" value="DO">Dominican Republic</option>
																	<option data-mobile_code="593" value="EC">Ecuador</option>
																	<option data-mobile_code="20" value="EG">Egypt</option>
																	<option data-mobile_code="503" value="SV">El Salvador</option>
																	<option data-mobile_code="240" value="GQ">Equatorial Guinea</option>
																	<option data-mobile_code="291" value="ER">Eritrea</option>
																	<option data-mobile_code="372" value="EE">Estonia</option>
																	<option data-mobile_code="251" value="ET">Ethiopia</option>
																	<option data-mobile_code="500" value="FK">Falkland Islands (Malvinas)</option>
																	<option data-mobile_code="298" value="FO">Faroe Islands</option>
																	<option data-mobile_code="679" value="FJ">Fiji</option>
																	<option data-mobile_code="358" value="FI">Finland</option>
																	<option data-mobile_code="33" value="FR">France</option>
																	<option data-mobile_code="594" value="GF">French Guiana</option>
																	<option data-mobile_code="689" value="PF">French Polynesia</option>
																	<option data-mobile_code="241" value="GA">Gabon</option>
																	<option data-mobile_code="220" value="GM">Gambia</option>
																	<option data-mobile_code="995" value="GE">Georgia</option>
																	<option data-mobile_code="49" value="DE">Germany</option>
																	<option data-mobile_code="233" value="GH">Ghana</option>
																	<option data-mobile_code="350" value="GI">Gibraltar</option>
																	<option data-mobile_code="30" value="GR">Greece</option>
																	<option data-mobile_code="299" value="GL">Greenland</option>
																	<option data-mobile_code="1473" value="GD">Grenada</option>
																	<option data-mobile_code="590" value="GP">Guadeloupe</option>
																	<option data-mobile_code="1671" value="GU">Guam</option>
																	<option data-mobile_code="502" value="GT">Guatemala</option>
																	<option data-mobile_code="44" value="GG">Guernsey</option>
																	<option data-mobile_code="224" value="GN">Guinea</option>
																	<option data-mobile_code="245" value="GW">Guinea-Bissau</option>
																	<option data-mobile_code="595" value="GY">Guyana</option>
																	<option data-mobile_code="509" value="HT">Haiti</option>
																	<option data-mobile_code="379" value="VA">Holy See (Vatican City State)</option>
																	<option data-mobile_code="504" value="HN">Honduras</option>
																	<option data-mobile_code="852" value="HK">Hong Kong</option>
																	<option data-mobile_code="36" value="HU">Hungary</option>
																	<option data-mobile_code="354" value="IS">Iceland</option>
																	<option data-mobile_code="91" value="IN">India</option>
																	<option data-mobile_code="62" value="ID">Indonesia</option>
																	<option data-mobile_code="98" value="IR">Iran, Islamic Republic of Persian Gulf</option>
																	<option data-mobile_code="964" value="IQ">Iraq</option>
																	<option data-mobile_code="353" value="IE">Ireland</option>
																	<option data-mobile_code="44" value="IM">Isle of Man</option>
																	<option data-mobile_code="972" value="IL">Israel</option>
																	<option data-mobile_code="39" value="IT">Italy</option>
																	<option data-mobile_code="1876" value="JM">Jamaica</option>
																	<option data-mobile_code="81" value="JP">Japan</option>
																	<option data-mobile_code="44" value="JE">Jersey</option>
																	<option data-mobile_code="962" value="JO">Jordan</option>
																	<option data-mobile_code="77" value="KZ">Kazakhstan</option>
																	<option data-mobile_code="254" value="KE">Kenya</option>
																	<option data-mobile_code="686" value="KI">Kiribati</option>
																	<option data-mobile_code="850" value="KP">Democratic People&#039;s Republic of Korea</option>
																	<option data-mobile_code="82" value="KR">Republic of South Korea</option>
																	<option data-mobile_code="965" value="KW">Kuwait</option>
																	<option data-mobile_code="996" value="KG">Kyrgyzstan</option>
																	<option data-mobile_code="856" value="LA">Laos</option>
																	<option data-mobile_code="371" value="LV">Latvia</option>
																	<option data-mobile_code="961" value="LB">Lebanon</option>
																	<option data-mobile_code="266" value="LS">Lesotho</option>
																	<option data-mobile_code="231" value="LR">Liberia</option>
																	<option data-mobile_code="218" value="LY">Libyan Arab Jamahiriya</option>
																	<option data-mobile_code="423" value="LI">Liechtenstein</option>
																	<option data-mobile_code="370" value="LT">Lithuania</option>
																	<option data-mobile_code="352" value="LU">Luxembourg</option>
																	<option data-mobile_code="853" value="MO">Macao</option>
																	<option data-mobile_code="389" value="MK">Macedonia</option>
																	<option data-mobile_code="261" value="MG">Madagascar</option>
																	<option data-mobile_code="265" value="MW">Malawi</option>
																	<option data-mobile_code="60" value="MY">Malaysia</option>
																	<option data-mobile_code="960" value="MV">Maldives</option>
																	<option data-mobile_code="223" value="ML">Mali</option>
																	<option data-mobile_code="356" value="MT">Malta</option>
																	<option data-mobile_code="692" value="MH">Marshall Islands</option>
																	<option data-mobile_code="596" value="MQ">Martinique</option>
																	<option data-mobile_code="222" value="MR">Mauritania</option>
																	<option data-mobile_code="230" value="MU">Mauritius</option>
																	<option data-mobile_code="262" value="YT">Mayotte</option>
																	<option data-mobile_code="52" value="MX">Mexico</option>
																	<option data-mobile_code="691" value="FM">Federated States of Micronesia</option>
																	<option data-mobile_code="373" value="MD">Moldova</option>
																	<option data-mobile_code="377" value="MC">Monaco</option>
																	<option data-mobile_code="976" value="MN">Mongolia</option>
																	<option data-mobile_code="382" value="ME">Montenegro</option>
																	<option data-mobile_code="1664" value="MS">Montserrat</option>
																	<option data-mobile_code="212" value="MA">Morocco</option>
																	<option data-mobile_code="258" value="MZ">Mozambique</option>
																	<option data-mobile_code="95" value="MM">Myanmar</option>
																	<option data-mobile_code="264" value="NA">Namibia</option>
																	<option data-mobile_code="674" value="NR">Nauru</option>
																	<option data-mobile_code="977" value="NP">Nepal</option>
																	<option data-mobile_code="31" value="NL">Netherlands</option>
																	<option data-mobile_code="599" value="AN">Netherlands Antilles</option>
																	<option data-mobile_code="687" value="NC">New Caledonia</option>
																	<option data-mobile_code="64" value="NZ">New Zealand</option>
																	<option data-mobile_code="505" value="NI">Nicaragua</option>
																	<option data-mobile_code="227" value="NE">Niger</option>
																	<option data-mobile_code="234" value="NG">Nigeria</option>
																	<option data-mobile_code="683" value="NU">Niue</option>
																	<option data-mobile_code="672" value="NF">Norfolk Island</option>
																	<option data-mobile_code="1670" value="MP">Northern Mariana Islands</option>
																	<option data-mobile_code="47" value="NO">Norway</option>
																	<option data-mobile_code="968" value="OM">Oman</option>
																	<option data-mobile_code="92" value="PK">Pakistan</option>
																	<option data-mobile_code="680" value="PW">Palau</option>
																	<option data-mobile_code="970" value="PS">Palestinian Territory</option>
																	<option data-mobile_code="507" value="PA">Panama</option>
																	<option data-mobile_code="675" value="PG">Papua New Guinea</option>
																	<option data-mobile_code="595" value="PY">Paraguay</option>
																	<option data-mobile_code="51" value="PE">Peru</option>
																	<option data-mobile_code="63" value="PH">Philippines</option>
																	<option data-mobile_code="872" value="PN">Pitcairn</option>
																	<option data-mobile_code="48" value="PL">Poland</option>
																	<option data-mobile_code="351" value="PT">Portugal</option>
																	<option data-mobile_code="1939" value="PR">Puerto Rico</option>
																	<option data-mobile_code="974" value="QA">Qatar</option>
																	<option data-mobile_code="40" value="RO">Romania</option>
																	<option data-mobile_code="7" value="RU">Russia</option>
																	<option data-mobile_code="250" value="RW">Rwanda</option>
																	<option data-mobile_code="262" value="RE">Reunion</option>
																	<option data-mobile_code="590" value="BL">Saint Barthelemy</option>
																	<option data-mobile_code="290" value="SH">Saint Helena</option>
																	<option data-mobile_code="1869" value="KN">Saint Kitts and Nevis</option>
																	<option data-mobile_code="1758" value="LC">Saint Lucia</option>
																	<option data-mobile_code="590" value="MF">Saint Martin</option>
																	<option data-mobile_code="508" value="PM">Saint Pierre and Miquelon</option>
																	<option data-mobile_code="1784" value="VC">Saint Vincent and the Grenadines</option>
																	<option data-mobile_code="685" value="WS">Samoa</option>
																	<option data-mobile_code="378" value="SM">San Marino</option>
																	<option data-mobile_code="239" value="ST">Sao Tome and Principe</option>
																	<option data-mobile_code="966" value="SA">Saudi Arabia</option>
																	<option data-mobile_code="221" value="SN">Senegal</option>
																	<option data-mobile_code="381" value="RS">Serbia</option>
																	<option data-mobile_code="248" value="SC">Seychelles</option>
																	<option data-mobile_code="232" value="SL">Sierra Leone</option>
																	<option data-mobile_code="65" value="SG">Singapore</option>
																	<option data-mobile_code="421" value="SK">Slovakia</option>
																	<option data-mobile_code="386" value="SI">Slovenia</option>
																	<option data-mobile_code="677" value="SB">Solomon Islands</option>
																	<option data-mobile_code="252" value="SO">Somalia</option>
																	<option data-mobile_code="27" value="ZA">South Africa</option>
																	<option data-mobile_code="211" value="SS">South Sudan</option>
																	<option data-mobile_code="500" value="GS">South Georgia and the South Sandwich Islands</option>
																	<option data-mobile_code="34" value="ES">Spain</option>
																	<option data-mobile_code="94" value="LK">Sri Lanka</option>
																	<option data-mobile_code="249" value="SD">Sudan</option>
																	<option data-mobile_code="597" value="SR">Suricountry</option>
																	<option data-mobile_code="47" value="SJ">Svalbard and Jan Mayen</option>
																	<option data-mobile_code="268" value="SZ">Swaziland</option>
																	<option data-mobile_code="46" value="SE">Sweden</option>
																	<option data-mobile_code="41" value="CH">Switzerland</option>
																	<option data-mobile_code="963" value="SY">Syrian Arab Republic</option>
																	<option data-mobile_code="886" value="TW">Taiwan</option>
																	<option data-mobile_code="992" value="TJ">Tajikistan</option>
																	<option data-mobile_code="255" value="TZ">Tanzania</option>
																	<option data-mobile_code="66" value="TH">Thailand</option>
																	<option data-mobile_code="670" value="TL">Timor-Leste</option>
																	<option data-mobile_code="228" value="TG">Togo</option>
																	<option data-mobile_code="690" value="TK">Tokelau</option>
																	<option data-mobile_code="676" value="TO">Tonga</option>
																	<option data-mobile_code="1868" value="TT">Trinidad and Tobago</option>
																	<option data-mobile_code="216" value="TN">Tunisia</option>
																	<option data-mobile_code="90" value="TR">Turkey</option>
																	<option data-mobile_code="993" value="TM">Turkmenistan</option>
																	<option data-mobile_code="1649" value="TC">Turks and Caicos Islands</option>
																	<option data-mobile_code="688" value="TV">Tuvalu</option>
																	<option data-mobile_code="256" value="UG">Uganda</option>
																	<option data-mobile_code="380" value="UA">Ukraine</option>
																	<option data-mobile_code="971" value="AE">United Arab Emirates</option>
																	<option data-mobile_code="44" value="GB">United Kingdom</option>
																	<option data-mobile_code="1" value="US">United States</option>
																	<option data-mobile_code="598" value="UY">Uruguay</option>
																	<option data-mobile_code="998" value="UZ">Uzbekistan</option>
																	<option data-mobile_code="678" value="VU">Vanuatu</option>
																	<option data-mobile_code="58" value="VE">Venezuela</option>
																	<option data-mobile_code="84" value="VN">Vietnam</option>
																	<option data-mobile_code="1284" value="VG">British Virgin Islands</option>
																	<option data-mobile_code="1340" value="VI">U.S. Virgin Islands</option>
																	<option data-mobile_code="681" value="WF">Wallis and Futuna</option>
																	<option data-mobile_code="967" value="YE">Yemen</option>
																	<option data-mobile_code="260" value="ZM">Zambia</option>
																	<option data-mobile_code="263" value="ZW">Zimbabwe</option>
																</select>
															</div>
														</div>
														<div class="row mb-3">
															<label class="col-lg-3 col-sm-4 col-form-label">City</label>
															<div class="col-lg-9 col-sm-8">
																<input type="text" class="form-control" name="city" value="<?=$res['city']?>"> </div>
														</div>
														<div class="row mb-3">
															<label class="col-lg-3 col-sm-4 col-form-label">State</label>
															<div class="col-lg-9 col-sm-8">
																<input type="text" class="form-control" name="state" value=<?=$res['state']?>""> </div>
														</div>
														<div class="row mb-3">
															<label class="col-lg-3 col-sm-4 col-form-label">Zip Code</label>
															<div class="col-lg-9 col-sm-8">
																<input type="text" class="form-control" name="zip" value="<?=$res['zip']?>"> </div>
														</div>
													</div>
													<hr class="mt-4"> </div>
												 
												<div class="row pt-4">
													<div class="col-12 text-center">
														<button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
														<button type="reset" class="btn btn-label-secondary">Cancel</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							 
							</div>
						 	<?php include 'footer.php'; ?>
						</div>
					</div>
			</div>
			<div class="layout-overlay layout-menu-toggle"></div>
			<div class="drag-target"></div>
		</div>
		<script src="../assets/admin/js/helpers.js"></script>
		<script src="../assets/admin/js/config.js"></script>
		<script src="../assets/universal/js/jquery-3.7.1.min.js"></script>
		<script src="../assets/universal/js/bootstrap.js"></script>
		<script src="../assets/admin/js/scrollbar.js"></script>
		<link rel="stylesheet" href="../assets/universal/css/iziToast.min.css">
		<script src="../assets/universal/js/iziToast.min.js"></script>
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
		<script src="../assets/admin/js/page/menu.js"></script>
		<script>
		(function($) {
			"use strict";
			$('.balanceUpdateBtn').on('click', function() {
				let modal = $('#balanceUpdateModal');
				let act = $(this).data('act');
				modal.find('[name=act]').val(act);
				if(act == 'add') {
					modal.find('.modal-title').text(`Add Balance`);
				} else {
					modal.find('.modal-title').text(`Subtract Balance`);
				}
				modal.modal('show');
			});
			let mobileElement = $('.mobile-code');
			$('[name=country]').change(function() {
				mobileElement.text(`+${$('[name=country] :selected').data('mobile_code')}`);
			});
			$('[name=country]').val('IN');
			let dialCode = $('[name=country] :selected').data('mobile_code');
			let mobileNumber = `919064493371`;
			mobileNumber = mobileNumber.replace(dialCode, '');
			$('[name=mobile]').val(mobileNumber);
			mobileElement.text(`+${dialCode}`);
		})(jQuery);
		</script>
		<script src="../assets/admin/js/main.js"></script>
	</body>

	</html>