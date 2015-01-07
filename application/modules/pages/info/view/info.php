<?php
/*
	This is a Full Featured CMS for all.
	You may also have problems with this. Please report issues. we will fix that soon.
	Copyright (C) 2015  AmirHosein.L Email:AmirOperator@gmail.com

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
include "application/modules/pages/info/control/info.php";
include ("application/languages/".$_SESSION['language']."/info.php");
?>
<div class="content-title"><h3><?= $p_info['1'] ?></h3></div>
<div class="news-info"></div>
<div class="content-body">
   <div class="text">
    <?= (isset($message)) ? $message : ''; ?>
    <div class="messages"><p><?= $p_info['2'] ?></p><p><?= $p_info['3'] ?></p><p><?= $p_info['4'] ?></p></div>
    <form class="form-horizontal" method="post" id="form" action="">
        <div class="form-group">
          <label for="fname" class="col-sm-2 control-label"><?= $p_info['5'] ?></label>
          <div class="col-sm-5">
               <input type="text" class="form-control" id="fname" name="fname"  placeholder="<?= $p_info['6'] ?>"
                     data-bv-message="<?= $p_info['7'] ?>"
                     required data-bv-notempty-message="<?= $p_info['8'] ?>"
					 </div>
         </div>
          <div class="col-sm-5">
               <input type="text" class="form-control" id="lname" name="lname"  placeholder="<?= $p_info['9'] ?>"
                     data-bv-message="<?= $p_info['10'] ?>"
                     required data-bv-notempty-message="<?= $p_info['11'] ?>"
      </div>
          </div>
        </div>
      <div class="form-group">
          <label class="col-sm-2 control-label"><?= $p_info['12'] ?></label>
              <div class="col-sm-5">
                <select class="form-control" id="country" name="country" data-bv-notempty data-bv-notempty-message="<?= $p_info['13'] ?>">
                      <option value="">-- <?= $p_info['14'] ?> --</option>
                      <option value="IR">ایران, جمهوری اسلامی</option>
                      <option value="AF">Afghanistan</option>
                      <option value="AX">?land Islands</option>
                      <option value="AL">Albania</option>
                      <option value="DZ">Algeria</option>
                      <option value="AS">American Samoa</option>
                      <option value="AD">Andorra</option>
                      <option value="AO">Angola</option>
                      <option value="AI">Anguilla</option>
                      <option value="AQ">Antarctica</option>
                      <option value="AG">Antigua and Barbuda</option>
                      <option value="AR">Argentina</option>
                      <option value="AM">Armenia</option>
                      <option value="AW">Aruba</option>
                      <option value="AU">Australia</option>
                      <option value="AT">Austria</option>
                      <option value="AZ">Azerbaijan</option>
                      <option value="BS">Bahamas</option>
                      <option value="BH">Bahrain</option>
                      <option value="BD">Bangladesh</option>
                      <option value="BB">Barbados</option>
                      <option value="BY">Belarus</option>
                      <option value="BE">Belgium</option>
                      <option value="BZ">Belize</option>
                      <option value="BJ">Benin</option>
                      <option value="BM">Bermuda</option>
                      <option value="BT">Bhutan</option>
                      <option value="BO">Bolivia, Plurinational State of</option>
                      <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                      <option value="BA">Bosnia and Herzegovina</option>
                      <option value="BW">Botswana</option>
                      <option value="BV">Bouvet Island</option>
                      <option value="BR">Brazil</option>
                      <option value="IO">British Indian Ocean Territory</option>
                      <option value="BN">Brunei Darussalam</option>
                      <option value="BG">Bulgaria</option>
                      <option value="BF">Burkina Faso</option>
                      <option value="BI">Burundi</option>
                      <option value="KH">Cambodia</option>
                      <option value="CM">Cameroon</option>
                      <option value="CA">Canada</option>
                      <option value="CV">Cape Verde</option>
                      <option value="KY">Cayman Islands</option>
                      <option value="CF">Central African Republic</option>
                      <option value="TD">Chad</option>
                      <option value="CL">Chile</option>
                      <option value="CN">China</option>
                      <option value="CX">Christmas Island</option>
                      <option value="CC">Cocos (Keeling) Islands</option>
                      <option value="CO">Colombia</option>
                      <option value="KM">Comoros</option>
                      <option value="CG">Congo</option>
                      <option value="CD">Congo, the Democratic Republic of the</option>
                      <option value="CK">Cook Islands</option>
                      <option value="CR">Costa Rica</option>
                      <option value="CI">Côte d'Ivoire</option>
                      <option value="HR">Croatia</option>
                      <option value="CU">Cuba</option>
                      <option value="CW">Curaçao</option>
                      <option value="CY">Cyprus</option>
                      <option value="CZ">Czech Republic</option>
                      <option value="DK">Denmark</option>
                      <option value="DJ">Djibouti</option>
                      <option value="DM">Dominica</option>
                      <option value="DO">Dominican Republic</option>
                      <option value="EC">Ecuador</option>
                      <option value="EG">Egypt</option>
                      <option value="SV">El Salvador</option>
                      <option value="GQ">Equatorial Guinea</option>
                      <option value="ER">Eritrea</option>
                      <option value="EE">Estonia</option>
                      <option value="ET">Ethiopia</option>
                      <option value="FK">Falkland Islands (Malvinas)</option>
                      <option value="FO">Faroe Islands</option>
                      <option value="FJ">Fiji</option>
                      <option value="FI">Finland</option>
                      <option value="FR">France</option>
                      <option value="GF">French Guiana</option>
                      <option value="PF">French Polynesia</option>
                      <option value="TF">French Southern Territories</option>
                      <option value="GA">Gabon</option>
                      <option value="GM">Gambia</option>
                      <option value="GE">Georgia</option>
                      <option value="DE">Germany</option>
                      <option value="GH">Ghana</option>
                      <option value="GI">Gibraltar</option>
                      <option value="GR">Greece</option>
                      <option value="GL">Greenland</option>
                      <option value="GD">Grenada</option>
                      <option value="GP">Guadeloupe</option>
                      <option value="GU">Guam</option>
                      <option value="GT">Guatemala</option>
                      <option value="GG">Guernsey</option>
                      <option value="GN">Guinea</option>
                      <option value="GW">Guinea-Bissau</option>
                      <option value="GY">Guyana</option>
                      <option value="HT">Haiti</option>
                      <option value="HM">Heard Island and McDonald Islands</option>
                      <option value="VA">Holy See (Vatican City State)</option>
                      <option value="HN">Honduras</option>
                      <option value="HK">Hong Kong</option>
                      <option value="HU">Hungary</option>
                      <option value="IS">Iceland</option>
                      <option value="IN">India</option>
                      <option value="ID">Indonesia</option>
                      <option value="IQ">Iraq</option>
                      <option value="IE">Ireland</option>
                      <option value="IM">Isle of Man</option>
                      <option value="IL">Israel</option>
                      <option value="IT">Italy</option>
                      <option value="JM">Jamaica</option>
                      <option value="JP">Japan</option>
                      <option value="JE">Jersey</option>
                      <option value="JO">Jordan</option>
                      <option value="KZ">Kazakhstan</option>
                      <option value="KE">Kenya</option>
                      <option value="KI">Kiribati</option>
                      <option value="KP">Korea, Democratic People's Republic of</option>
                      <option value="KR">Korea, Republic of</option>
                      <option value="KW">Kuwait</option>
                      <option value="KG">Kyrgyzstan</option>
                      <option value="LA">Lao People's Democratic Republic</option>
                      <option value="LV">Latvia</option>
                      <option value="LB">Lebanon</option>
                      <option value="LS">Lesotho</option>
                      <option value="LR">Liberia</option>
                      <option value="LY">Libya</option>
                      <option value="LI">Liechtenstein</option>
                      <option value="LT">Lithuania</option>
                      <option value="LU">Luxembourg</option>
                      <option value="MO">Macao</option>
                      <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                      <option value="MG">Madagascar</option>
                      <option value="MW">Malawi</option>
                      <option value="MY">Malaysia</option>
                      <option value="MV">Maldives</option>
                      <option value="ML">Mali</option>
                      <option value="MT">Malta</option>
                      <option value="MH">Marshall Islands</option>
                      <option value="MQ">Martinique</option>
                      <option value="MR">Mauritania</option>
                      <option value="MU">Mauritius</option>
                      <option value="YT">Mayotte</option>
                      <option value="MX">Mexico</option>
                      <option value="FM">Micronesia, Federated States of</option>
                      <option value="MD">Moldova, Republic of</option>
                      <option value="MC">Monaco</option>
                      <option value="MN">Mongolia</option>
                      <option value="ME">Montenegro</option>
                      <option value="MS">Montserrat</option>
                      <option value="MA">Morocco</option>
                      <option value="MZ">Mozambique</option>
                      <option value="MM">Myanmar</option>
                      <option value="NA">Namibia</option>
                      <option value="NR">Nauru</option>
                      <option value="NP">Nepal</option>
                      <option value="NL">Netherlands</option>
                      <option value="NC">New Caledonia</option>
                      <option value="NZ">New Zealand</option>
                      <option value="NI">Nicaragua</option>
                      <option value="NE">Niger</option>
                      <option value="NG">Nigeria</option>
                      <option value="NU">Niue</option>
                      <option value="NF">Norfolk Island</option>
                      <option value="MP">Northern Mariana Islands</option>
                      <option value="NO">Norway</option>
                      <option value="OM">Oman</option>
                      <option value="PK">Pakistan</option>
                      <option value="PW">Palau</option>
                      <option value="PS">Palestinian Territory, Occupied</option>
                      <option value="PA">Panama</option>
                      <option value="PG">Papua New Guinea</option>
                      <option value="PY">Paraguay</option>
                      <option value="PE">Peru</option>
                      <option value="PH">Philippines</option>
                      <option value="PN">Pitcairn</option>
                      <option value="PL">Poland</option>
                      <option value="PT">Portugal</option>
                      <option value="PR">Puerto Rico</option>
                      <option value="QA">Qatar</option>
                      <option value="RE">Réunion</option>
                      <option value="RO">Romania</option>
                      <option value="RU">Russian Federation</option>
                      <option value="RW">Rwanda</option>
                      <option value="BL">Saint Barthélemy</option>
                      <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                      <option value="KN">Saint Kitts and Nevis</option>
                      <option value="LC">Saint Lucia</option>
                      <option value="MF">Saint Martin (French part)</option>
                      <option value="PM">Saint Pierre and Miquelon</option>
                      <option value="VC">Saint Vincent and the Grenadines</option>
                      <option value="WS">Samoa</option>
                      <option value="SM">San Marino</option>
                      <option value="ST">Sao Tome and Principe</option>
                      <option value="SA">Saudi Arabia</option>
                      <option value="SN">Senegal</option>
                      <option value="RS">Serbia</option>
                      <option value="SC">Seychelles</option>
                      <option value="SL">Sierra Leone</option>
                      <option value="SG">Singapore</option>
                      <option value="SX">Sint Maarten (Dutch part)</option>
                      <option value="SK">Slovakia</option>
                      <option value="SI">Slovenia</option>
                      <option value="SB">Solomon Islands</option>
                      <option value="SO">Somalia</option>
                      <option value="ZA">South Africa</option>
                      <option value="GS">South Georgia and the South Sandwich Islands</option>
                      <option value="SS">South Sudan</option>
                      <option value="ES">Spain</option>
                      <option value="LK">Sri Lanka</option>
                      <option value="SD">Sudan</option>
                      <option value="SR">Suriname</option>
                      <option value="SJ">Svalbard and Jan Mayen</option>
                      <option value="SZ">Swaziland</option>
                      <option value="SE">Sweden</option>
                      <option value="CH">Switzerland</option>
                      <option value="SY">Syrian Arab Republic</option>
                      <option value="TW">Taiwan, Province of China</option>
                      <option value="TJ">Tajikistan</option>
                      <option value="TZ">Tanzania, United Republic of</option>
                      <option value="TH">Thailand</option>
                      <option value="TL">Timor-Leste</option>
                      <option value="TG">Togo</option>
                      <option value="TK">Tokelau</option>
                      <option value="TO">Tonga</option>
                      <option value="TT">Trinidad and Tobago</option>
                      <option value="TN">Tunisia</option>
                      <option value="TR">Turkey</option>
                      <option value="TM">Turkmenistan</option>
                      <option value="TC">Turks and Caicos Islands</option>
                      <option value="TV">Tuvalu</option>
                      <option value="UG">Uganda</option>
                      <option value="UA">Ukraine</option>
                      <option value="AE">United Arab Emirates</option>
                      <option value="GB">United Kingdom</option>
                      <option value="US">United States</option>
                      <option value="UM">United States Minor Outlying Islands</option>
                      <option value="UY">Uruguay</option>
                      <option value="UZ">Uzbekistan</option>
                      <option value="VU">Vanuatu</option>
                      <option value="VE">Venezuela, Bolivarian Republic of</option>
                      <option value="VN">Viet Nam</option>
                      <option value="VG">Virgin Islands, British</option>
                      <option value="VI">Virgin Islands, U.S.</option>
                      <option value="WF">Wallis and Futuna</option>
                      <option value="EH">Western Sahara</option>
                      <option value="YE">Yemen</option>
                      <option value="ZM">Zambia</option>
                      <option value="ZW">Zimbabwe</option>
                  </select>
              </div>
              <div class="col-sm-5">
                  <select class="form-control" id="language" name="language" data-bv-notempty data-bv-notempty-message="<?= $p_info['15'] ?>">
                      <option value="">-- <?= $p_info['16'] ?> --</option>
                      <option value="PE">پارسی</option>
                      <option value="EN">English</option>
                      <option value="FR">French</option>
                      <option value="GR">Germany</option>
                      <option value="RU">Russian</option>
                      <option value="OT">Other</option>
                  </select>
              </div>
          </div>
          <div class="form-group">
              <label class="col-sm-2 control-label"><?= $p_info['17'] ?></label>
              <div class="col-sm-5" >
                  <input type="text" class="form-control" id="birthday" name="birthday" 
                  required data-bv-notempty-message="<?= $p_info['18'] ?>";
                  data-bv-date="true" data-bv-date-format="DD/MM/YYYY" data-bv-date-message="<?= $p_info['19'] ?>" placeholder="(YYYY/MM/DD)" />
              </div>
              <div class="col-sm-5">
                  <select class="form-control" id="gender" name="gender" data-bv-notempty data-bv-notempty-message="<?= $p_info['20'] ?>">
                      <option value="">-- <?= $p_info['21'] ?>--</option>
                      <option value="male"><?= $p_info['22'] ?></option>
                      <option value="female"><?= $p_info['23'] ?></option>
                  </select>
              </div>
          </div>
          
        <div class="form-group">
          <label class="col-sm-2 control-label"><?= $p_info['24'] ?></label>
          <div class="col-sm-5">
              <input type="text" class="form-control" id="number" name="number" placeholder="<?= $p_info['25'] ?>"
                 data-bv-message="<?= $p_info['26'] ?>"
                 required data-bv-notempty-message="<?= $p_info['27'] ?>"
                 pattern="^[0123456798]+$" data-bv-regexp-message="<?= $p_info['28'] ?>"
                 data-bv-stringlength="true" data-bv-stringlength-min="9" data-bv-stringlength-max="11" data-bv-stringlength-message="<?= $p_info['29'] ?>">

          </div>
          <div class="col-sm-5">
               <input type="text" class="form-control required" id="mellicode" name="mellicode" placeholder="<?= $p_info['30'] ?>"
                 data-bv-message="<?= $p_info['31'] ?>"
                 required data-bv-notempty-message="<?= $p_info['32'] ?>"
                 pattern="^[1234567890]+$" data-bv-regexp-message="<?= $p_info['33'] ?>"
                 data-bv-stringlength="true" data-bv-stringlength-min="9" data-bv-stringlength-max="11" data-bv-stringlength-message="<?= $p_info['34'] ?>">
          </div>
        </div>
        <div class="form-group">
              <label class="col-sm-2 control-label"><?= $p_info['35'] ?></label>
              <div class="col-sm-5">
                  <select class="form-control" name="question" id="question" data-bv-notempty data-bv-notempty-message="<?= $p_info['36'] ?>">
                      <option value="">-- <?= $p_info['37'] ?> --</option>
                      <option value="1"><?= $p_info['38'] ?></option>
                      <option value="2"><?= $p_info['39'] ?></option>
                      <option value="3"><?= $p_info['40'] ?></option>
                      <option value="4"><?= $p_info['41'] ?></option>
                      <option value="5"><?= $p_info['42'] ?></option>
                      <option value="6"><?= $p_info['43'] ?></option>
                      <option value="7"><?= $p_info['44'] ?></option>
                  </select>
              </div>
              <div class="col-sm-5" >
                  <input type="text" class="form-control required" id="answer" name="answer" placeholder="<?= $p_info['45'] ?>"
                     data-bv-message="<?= $p_info['46'] ?>"
                     required data-bv-notempty-message="<?= $p_info['47'] ?>"
                     pattern="^[a-zابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهی]+$" data-bv-regexp-message="<?= $p_info['48'] ?>">
             </div>
          </div>
        <div class="form-group">
          <label class="col-sm-2 control-label"><?= $p_info['49'] ?></label>
          <div class="col-sm-5">
                <?= dsp_crypt(0,1); ?>
              </div>
             <div class="col-sm-5">
               <input type="text" class="form-control required" id="captcha" name="captcha" placeholder="<?= $p_info['50'] ?>"
                     data-bv-message="<?= $p_info['51'] ?>"
                     required data-bv-notempty-message="<?= $p_info['52'] ?>"
                     pattern="^[0-9]+$" data-bv-regexp-message="<?= $p_info['53'] ?>"
                     data-bv-stringlength="true" data-bv-stringlength-min="6" data-bv-stringlength-max="6" data-bv-stringlength-message="<?= $p_info['54'] ?>">
             </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label"></label>
            <div class="col-sm-5">
              <input type="hidden" name="info" />
              <button type="submit" class="btn btn-primary" id="send" name="send"><?= $p_info['55'] ?></button>
            </div>
        </div>
     </form>
   </div>
</div>
<div class="content-footer"></div>
<div class="content-end">&nbsp;</div>
<script type="text/javascript">
  $(document).ready(function() {
      $('#form').bootstrapValidator();
  });
</script>