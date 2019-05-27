{include file="$template/irnic_handle_header.tpl"}
	 <form method="POST" action="{$smarty.server.PHP_SELF}?a=add_handle">
	 <input name="handle_class" value="Education" type="hidden">
<table width="100%" cellspacing="0" cellpadding="0" class="frame">
<tr>
	<td>	 
      <table width="100%" border="0" cellpadding="10" cellspacing="0">
        <colgroup>
          <col width="20%">
          <col width="20%">
          <col width="60%">
        </colgroup>
        <tbody>
          <tr>
            <td colspan="3"><table class="admonition" style="width: 100%;">
              <tbody>
                <tr>
                  <td class="notice" width="5%"><img src="templates/{$template}/images/note.gif" alt=""></td>
                  <td><ul>
                    <li>خواهشمند است اطلاعات خواسته شده در فرم زیر را دقیق و مطابق با اطلاعات مثبِت وارد نمایید.</li>
                    <li>جهت کسب اطلاعات بیشتر، <a href="https://www.nic.ir/applications/IRNIC_Handle_Terms_and_Conditions.pdf">ضوابط و شرایط شناسهٔ ایرنیک</a> را پیش از پرکردن اطلاعات مطالعه نمایید.</li>
                  </ul></td>
                </tr>
              </tbody>
            </table>
              <br></td>
          </tr>
          <tr>
            <td colspan="3"><h3>نام سازمان و رابط (لاتین)</h3></td>
          </tr>
          <tr>
            <td colspan="2" class="fieldarea">ایمیل:<span class="mandatory">*</span></td>
            <td><input name="email" class="" tabindex="6" size="40" type="text">
              <div class="example">مثال: <span dir="ltr">exampl@example.com</span></div></td>
          </tr>			  
          <tr>
            <td colspan="2" class="fieldarea">نام موسسه:<span class="mandatory">*</span></td>
            <td><input name="org" class="" tabindex="7" size="40" type="text">
              <div class="example">مثال: <span dir="ltr">Institute for Research in Fundamental Sciences</span></div></td>
          </tr>
          <tr>
            <td rowspan="2" class="fieldarea">صاحب‌امتیاز یا مدیر مدرسه، دانشگاه، یا موسسه:</td>
            <td class="fieldarea">نام:<span class="mandatory">*</span></td>
            <td><input name="firstname" class="" tabindex="8" size="40" type="text">
              <div class="example">مثال: <span dir="ltr">AliReza</span></div></td>
          </tr>
          <tr>
            <td class="fieldarea">نام خانوادگی:<span class="mandatory">*</span></td>
            <td><input name="lastname" class="" tabindex="9" size="40" type="text">
              <div class="example">مثال: <span dir="ltr">Mohammadi</span></div></td>
          </tr>
          <tr>
            <td colspan="3"></td>
          </tr>
          <tr>
            <td colspan="3"><h3>اطلاعات احراز هویت</h3></td>
          </tr>
          <tr>
            <td colspan="3"><table class="admonition" style="width: 100%;">
              <tbody>
                <tr>
                  <td class="notice" width="5%"><img src="templates/{$template}/images/note.gif" alt=""></td>
                  <td><ul>
                    <li>این اطلاعات نزد ایرنیک به صورت محرمانه جهت احراز هویت نگهداری خواهد شد.</li>
                  </ul></td>
                </tr>
              </tbody>
            </table>
              <br></td>
          </tr>
          <tr>
            <td colspan="2" class="fieldarea">استان/ایالت:<span class="mandatory">*</span></td>
            <td><input name="edu_state" class="" tabindex="13" type="text">
              <div class="example">مثال: <span dir="ltr">Tehran</span></div></td>
          </tr>
          <tr>
            <td colspan="2" class="fieldarea">شهر:<span class="mandatory">*</span></td>
            <td><input name="edu_city" class="" tabindex="14" type="text">
              <div class="example">مثال: <span dir="ltr">Tehran</span></div></td>
          </tr>
          <tr>
            <td colspan="2" class="fieldarea">نوع موسسه:<span class="mandatory">*</span></td>
            <td><select name="edu_catsub" id="edu_catsub" class="" style="text-align: right; direction: rtl;" tabindex="15">
              <option value="" label="لطفا انتخاب کنید..." class="lang_fa" dir="rtl" align="right" selected="selected" lang="fa">لطفا انتخاب کنید...</option>
              <option value="MoEdu__PrimarySch" label="دبستان">دبستان</option>
              <option value="MoEdu__SecondarySch" label="مدرسه راهنمایی">مدرسه راهنمایی</option>
              <option value="MoEdu__HighSch" label="دبیرستان">دبیرستان</option>
              <option value="MoEdu__PreUni" label="مرکز پیش‌دانشگاهی">مرکز پیش‌دانشگاهی</option>
              <option value="MoEdu__Vocational" label="مرکز فنی و حرفه‌ای">مرکز فنی و حرفه‌ای</option>
              <option value="MoEdu__OtherSch" label="مدرسه (غیره)">مدرسه (غیره)</option>
              <option value="MoEdu__Center" label="مرکز آموزشی">مرکز آموزشی</option>
              <option value="MoSRT__PublicUni" label="دانشگاه سراسری (غیرپزشکی)">دانشگاه سراسری (غیرپزشکی)</option>
              <option value="MoSRT__AzadUni" label="دانشگاه آزاد">دانشگاه آزاد</option>
              <option value="MoSRT__PayameNoorUni" label="دانشگاه پیام نور">دانشگاه پیام نور</option>
              <option value="MoSRT__AppSciTechUni" label="دانشگاه علمی‐کاربردی">دانشگاه علمی‐کاربردی</option>
              <option value="MoSRT__OtherUni" label="دانشگاه (غیره)">دانشگاه (غیره)</option>
              <option value="MoSRT__Center" label="مرکز آموزش عالی">مرکز آموزش عالی</option>
              <option value="MoSRT__ResearchInst" label="مرکز تحقیقاتی (غیرپزشکی)">مرکز تحقیقاتی (غیرپزشکی)</option>
              <option value="MOHMS__MedPublicUni" label="دانشگاه سراسری (پزشکی)">دانشگاه سراسری (پزشکی)</option>
              <option value="MoHMS__MedResearchInst" label="مرکز تحقیقاتی (پزشکی)">مرکز تحقیقاتی (پزشکی)</option>
            </select></td>
          </tr>
          <tr>
            <td colspan="3"></td>
          </tr>
          <tr>
            <td colspan="3"><h3>نشانی پستی</h3></td>
          </tr>
          <tr>
            <td colspan="3"><table class="admonition" style="width: 100%;">
              <tbody>
                <tr>
                  <td class="notice" width="5%"><img src="templates/{$template}/images/note.gif" alt=""></td>
                  <td><ul>
                    <li>نشانی ارایه شده توسط متقاضی دریافت شناسه کاربری باید صحیح و منطبق با واقع باشد.</li>
                    <li>توجه
                      کنید که در موارد لازم، مطابقِ شرایط و ضوابط ثبت‌نام دامنه، هرگونه 
                      مکاتبه با صاحب امتیاز نام دامنه به نشانیِ وی که در شناسه کاربری خود 
                      ارایه نموده صورت خواهد گرفت و عواقب ناشی از عدم اطلاع یافتن صاحب امتیاز 
                      نام دامنه از اقدامات و تصمیمات مرکز و یا اقدامات اشخاص ثالث، به دلیل عدم
                      ارائه نشانی صحیح بر عهده خود شخص می‌باشد.</li>
                    <li>ارائهٔ صندوق پستی به عنوان نشانی پستی قابل قبول نمی‌باشد.</li>
                  </ul></td>
                </tr>
              </tbody>
            </table>
              <br></td>
          </tr>
          <tr>
            <td colspan="2" class="fieldarea">کشور:<span class="mandatory">*</span></td>
            <td><select name="country" id="country" class="" style="text-align: left; direction: ltr;" tabindex="16">
              <option value="" label="لطفا انتخاب کنید..." class="lang_fa" dir="rtl" align="right" lang="fa">لطفا انتخاب کنید...</option>
              <option value="IR" label="Iran (Islamic Republic Of)" selected="selected">Iran (Islamic Republic Of)</option>
              <option value="AF" label="Afghanistan">Afghanistan</option>
              <option value="AL" label="Albania">Albania</option>
              <option value="DZ" label="Algeria">Algeria</option>
              <option value="AS" label="American Samoa">American Samoa</option>
              <option value="AD" label="Andorra">Andorra</option>
              <option value="AO" label="Angola">Angola</option>
              <option value="AI" label="Anguilla">Anguilla</option>
              <option value="AQ" label="Antarctica">Antarctica</option>
              <option value="AG" label="Antigua And Barbuda">Antigua And Barbuda</option>
              <option value="AR" label="Argentina">Argentina</option>
              <option value="AM" label="Armenia">Armenia</option>
              <option value="AW" label="Aruba">Aruba</option>
              <option value="AU" label="Australia">Australia</option>
              <option value="AT" label="Austria">Austria</option>
              <option value="AZ" label="Azerbaijan">Azerbaijan</option>
              <option value="BS" label="Bahamas">Bahamas</option>
              <option value="BH" label="Bahrain">Bahrain</option>
              <option value="BD" label="Bangladesh">Bangladesh</option>
              <option value="BB" label="Barbados">Barbados</option>
              <option value="BY" label="Byelorussian SSR">Byelorussian SSR</option>
              <option value="BE" label="Belgium">Belgium</option>
              <option value="BZ" label="Belize">Belize</option>
              <option value="BJ" label="Benin">Benin</option>
              <option value="BM" label="Bermuda">Bermuda</option>
              <option value="BT" label="Bhutan">Bhutan</option>
              <option value="BO" label="Bolivia">Bolivia</option>
              <option value="BA" label="Bosnia Hercegovina">Bosnia Hercegovina</option>
              <option value="BW" label="Botswana">Botswana</option>
              <option value="BV" label="Bouvet Island">Bouvet Island</option>
              <option value="BR" label="Brazil">Brazil</option>
              <option value="IO" label="British Indian Ocean Territory">British Indian Ocean Territory</option>
              <option value="BN" label="Brunei Darussalam">Brunei Darussalam</option>
              <option value="BG" label="Bulgaria">Bulgaria</option>
              <option value="BF" label="Burkina Faso">Burkina Faso</option>
              <option value="BI" label="Burundi">Burundi</option>
              <option value="KH" label="Cambodia">Cambodia</option>
              <option value="CM" label="Cameroon">Cameroon</option>
              <option value="CA" label="Canada">Canada</option>
              <option value="CV" label="Cape Verde">Cape Verde</option>
              <option value="KY" label="Cayman Islands">Cayman Islands</option>
              <option value="CF" label="Central African Republic">Central African Republic</option>
              <option value="TD" label="Chad">Chad</option>
              <option value="CL" label="Chile">Chile</option>
              <option value="CN" label="China">China</option>
              <option value="CX" label="Christmas Island">Christmas Island</option>
              <option value="CC" label="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
              <option value="CO" label="Colombia">Colombia</option>
              <option value="KM" label="Comoros">Comoros</option>
              <option value="CG" label="Congo">Congo</option>
              <option value="CD" label="Congo, The Democratic Republic Of">Congo, The Democratic Republic Of</option>
              <option value="CK" label="Cook Islands">Cook Islands</option>
              <option value="CR" label="Costa Rica">Costa Rica</option>
              <option value="CI" label="Cote D'Ivoire">Cote D'Ivoire</option>
              <option value="HR" label="Croatia">Croatia</option>
              <option value="CU" label="Cuba">Cuba</option>
              <option value="CY" label="Cyprus">Cyprus</option>
              <option value="CZ" label="Czech Republic">Czech Republic</option>
              <option value="CS" label="Czechoslovakia">Czechoslovakia</option>
              <option value="DK" label="Denmark">Denmark</option>
              <option value="DJ" label="Djibouti">Djibouti</option>
              <option value="DM" label="Dominica">Dominica</option>
              <option value="DO" label="Dominican Republic">Dominican Republic</option>
              <option value="TP" label="East Timor">East Timor</option>
              <option value="EC" label="Ecuador">Ecuador</option>
              <option value="EG" label="Egypt">Egypt</option>
              <option value="SV" label="El Salvador">El Salvador</option>
              <option value="GB" label="Great Britain">Great Britain</option>
              <option value="GQ" label="Equatorial Guinea">Equatorial Guinea</option>
              <option value="ER" label="Eritrea">Eritrea</option>
              <option value="EE" label="Estonia">Estonia</option>
              <option value="ET" label="Ethiopia">Ethiopia</option>
              <option value="FK" label="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
              <option value="FO" label="Faroe Islands">Faroe Islands</option>
              <option value="FJ" label="Fiji">Fiji</option>
              <option value="FI" label="Finland">Finland</option>
              <option value="FR" label="France">France</option>
              <option value="GF" label="French Guiana">French Guiana</option>
              <option value="PF" label="French Polynesia">French Polynesia</option>
              <option value="TF" label="French Southern Territories">French Southern Territories</option>
              <option value="GA" label="Gabon">Gabon</option>
              <option value="GM" label="Gambia">Gambia</option>
              <option value="GE" label="Georgia">Georgia</option>
              <option value="DE" label="Germany">Germany</option>
              <option value="GH" label="Ghana">Ghana</option>
              <option value="GI" label="Gibraltar">Gibraltar</option>
              <option value="GR" label="Greece">Greece</option>
              <option value="GL" label="Greenland">Greenland</option>
              <option value="GD" label="Grenada">Grenada</option>
              <option value="GP" label="Guadeloupe">Guadeloupe</option>
              <option value="GU" label="Guam">Guam</option>
              <option value="GT" label="Guatemela">Guatemela</option>
              <option value="GG" label="Guernsey">Guernsey</option>
              <option value="GN" label="Guinea">Guinea</option>
              <option value="GW" label="Guinea-Bissau">Guinea-Bissau</option>
              <option value="GY" label="Guyana">Guyana</option>
              <option value="HT" label="Haiti">Haiti</option>
              <option value="HM" label="Heard and McDonald Islands">Heard and McDonald Islands</option>
              <option value="HN" label="Honduras">Honduras</option>
              <option value="HK" label="Hong Kong">Hong Kong</option>
              <option value="HU" label="Hungary">Hungary</option>
              <option value="IS" label="Iceland">Iceland</option>
              <option value="IN" label="India">India</option>
              <option value="ID" label="Indonesia">Indonesia</option>
              <option value="IQ" label="Iraq">Iraq</option>
              <option value="IE" label="Ireland">Ireland</option>
              <option value="IM" label="Isle Of Man">Isle Of Man</option>
              <option value="IT" label="Italy">Italy</option>
              <option value="JM" label="Jamaica">Jamaica</option>
              <option value="JP" label="Japan">Japan</option>
              <option value="JE" label="Jersey">Jersey</option>
              <option value="JO" label="Jordan">Jordan</option>
              <option value="KZ" label="Kazakhstan">Kazakhstan</option>
              <option value="KE" label="Kenya">Kenya</option>
              <option value="KI" label="Kiribati">Kiribati</option>
              <option value="KP" label="Korea, Democratic People's Republic Of">Korea, Democratic People's Republic Of</option>
              <option value="KR" label="Korea, Republic Of">Korea, Republic Of</option>
              <option value="KW" label="Kuwait">Kuwait</option>
              <option value="KG" label="Kyrgyzstan">Kyrgyzstan</option>
              <option value="LA" label="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
              <option value="LV" label="Latvia">Latvia</option>
              <option value="LB" label="Lebanon">Lebanon</option>
              <option value="LS" label="Lesotho">Lesotho</option>
              <option value="LR" label="Liberia">Liberia</option>
              <option value="LY" label="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
              <option value="LI" label="Liechtenstein">Liechtenstein</option>
              <option value="LT" label="Lithuania">Lithuania</option>
              <option value="LU" label="Luxembourg">Luxembourg</option>
              <option value="MO" label="Macau">Macau</option>
              <option value="MK" label="Macedonia">Macedonia</option>
              <option value="MG" label="Madagascar">Madagascar</option>
              <option value="MW" label="Malawi">Malawi</option>
              <option value="MY" label="Malaysia">Malaysia</option>
              <option value="MV" label="Maldives">Maldives</option>
              <option value="ML" label="Mali">Mali</option>
              <option value="MT" label="Malta">Malta</option>
              <option value="MH" label="Marshall Islands">Marshall Islands</option>
              <option value="MQ" label="Martinique">Martinique</option>
              <option value="MR" label="Mauritania">Mauritania</option>
              <option value="MU" label="Mauritius">Mauritius</option>
              <option value="YT" label="Mayotte">Mayotte</option>
              <option value="MX" label="Mexico">Mexico</option>
              <option value="FM" label="Micronesia, Federated States Of">Micronesia, Federated States Of</option>
              <option value="MD" label="Moldova, Republic Of">Moldova, Republic Of</option>
              <option value="MC" label="Monaco">Monaco</option>
              <option value="MN" label="Mongolia">Mongolia</option>
              <option value="MS" label="Montserrat">Montserrat</option>
              <option value="MA" label="Morocco">Morocco</option>
              <option value="MZ" label="Mozambique">Mozambique</option>
              <option value="MM" label="Myanmar">Myanmar</option>
              <option value="NA" label="Namibia">Namibia</option>
              <option value="NR" label="Nauru">Nauru</option>
              <option value="NP" label="Nepal">Nepal</option>
              <option value="NL" label="Netherlands">Netherlands</option>
              <option value="AN" label="Netherlands Antilles">Netherlands Antilles</option>
              <option value="NT" label="Neutral Zone">Neutral Zone</option>
              <option value="NC" label="New Caledonia">New Caledonia</option>
              <option value="NZ" label="New Zealand">New Zealand</option>
              <option value="NI" label="Nicaragua">Nicaragua</option>
              <option value="NE" label="Niger">Niger</option>
              <option value="NG" label="Nigeria">Nigeria</option>
              <option value="NU" label="Niue">Niue</option>
              <option value="NF" label="Norfolk Island">Norfolk Island</option>
              <option value="MP" label="Northern Mariana Islands">Northern Mariana Islands</option>
              <option value="NO" label="Norway">Norway</option>
              <option value="OM" label="Oman">Oman</option>
              <option value="PK" label="Pakistan">Pakistan</option>
              <option value="PW" label="Palau">Palau</option>
              <option value="PA" label="Panama">Panama</option>
              <option value="PG" label="Papua New Guinea">Papua New Guinea</option>
              <option value="PY" label="Paraguay">Paraguay</option>
              <option value="PE" label="Peru">Peru</option>
              <option value="PH" label="Philippines">Philippines</option>
              <option value="PN" label="Pitcairn">Pitcairn</option>
              <option value="PL" label="Poland">Poland</option>
              <option value="PT" label="Portugal">Portugal</option>
              <option value="QA" label="Qatar">Qatar</option>
              <option value="RE" label="Reunion">Reunion</option>
              <option value="RO" label="Romania">Romania</option>
              <option value="RU" label="Russian Federation">Russian Federation</option>
              <option value="RW" label="Rwanda">Rwanda</option>
              <option value="SH" label="Saint Helena">Saint Helena</option>
              <option value="KN" label="Saint Kitts And Nevis">Saint Kitts And Nevis</option>
              <option value="LC" label="Saint Lucia">Saint Lucia</option>
              <option value="PM" label="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
              <option value="VC" label="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
              <option value="WS" label="Samoa">Samoa</option>
              <option value="SM" label="San Marino">San Marino</option>
              <option value="ST" label="Sao Tome and Principe">Sao Tome and Principe</option>
              <option value="SA" label="Saudi Arabia">Saudi Arabia</option>
              <option value="SN" label="Senegal">Senegal</option>
              <option value="SC" label="Seychelles">Seychelles</option>
              <option value="SL" label="Sierra Leone">Sierra Leone</option>
              <option value="SG" label="Singapore">Singapore</option>
              <option value="SK" label="Slovakia">Slovakia</option>
              <option value="SI" label="Slovenia">Slovenia</option>
              <option value="SB" label="Solomon Islands">Solomon Islands</option>
              <option value="SO" label="Somalia">Somalia</option>
              <option value="ZA" label="South Africa">South Africa</option>
              <option value="GS" label="South Georgia and The Sandwich Islands">South Georgia and The Sandwich Islands</option>
              <option value="ES" label="Spain">Spain</option>
              <option value="LK" label="Sri Lanka">Sri Lanka</option>
              <option value="SD" label="Sudan">Sudan</option>
              <option value="SR" label="Suriname">Suriname</option>
              <option value="SJ" label="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option>
              <option value="SZ" label="Swaziland">Swaziland</option>
              <option value="SE" label="Sweden">Sweden</option>
              <option value="CH" label="Switzerland">Switzerland</option>
              <option value="SY" label="Syrian Arab Republic">Syrian Arab Republic</option>
              <option value="TW" label="Taiwan, Province Of China">Taiwan, Province Of China</option>
              <option value="TJ" label="Tajikista">Tajikista</option>
              <option value="TZ" label="Tanzania, United Republic Of">Tanzania, United Republic Of</option>
              <option value="TH" label="Thailand">Thailand</option>
              <option value="TG" label="Togo">Togo</option>
              <option value="TK" label="Tokelau">Tokelau</option>
              <option value="TO" label="Tonga">Tonga</option>
              <option value="TT" label="Trinidad and Tobago">Trinidad and Tobago</option>
              <option value="TN" label="Tunisia">Tunisia</option>
              <option value="TR" label="Turkey">Turkey</option>
              <option value="TM" label="Turkmenistan">Turkmenistan</option>
              <option value="TC" label="Turks and Caicos Islands">Turks and Caicos Islands</option>
              <option value="TV" label="Tuvalu">Tuvalu</option>
              <option value="UG" label="Uganda">Uganda</option>
              <option value="UA" label="Ukraine">Ukraine</option>
              <option value="AE" label="United Arab Emirates">United Arab Emirates</option>
              <option value="UK" label="United Kingdom">United Kingdom</option>
              <option value="US" label="United States">United States</option>
              <option value="UM" label="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
              <option value="UY" label="Uruguay">Uruguay</option>
              <option value="SU" label="USSR">USSR</option>
              <option value="UZ" label="Uzbekistan">Uzbekistan</option>
              <option value="VU" label="Vanuatu">Vanuatu</option>
              <option value="VA" label="Vatican City State">Vatican City State</option>
              <option value="VE" label="Venezuela">Venezuela</option>
              <option value="VN" label="Vietnam">Vietnam</option>
              <option value="VG" label="Virgin Islands (British)">Virgin Islands (British)</option>
              <option value="VI" label="Virgin Islands (U.S.)">Virgin Islands (U.S.)</option>
              <option value="WF" label="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
              <option value="EH" label="Western Sahara">Western Sahara</option>
              <option value="YE" label="Yemen, Republic of">Yemen, Republic of</option>
              <option value="YU" label="Yugoslavia">Yugoslavia</option>
              <option value="ZR" label="Zaire">Zaire</option>
              <option value="ZM" label="Zambia">Zambia</option>
              <option value="ZW" label="Zimbabwe">Zimbabwe</option>
            </select></td>
          </tr>
          <tr>
            <td colspan="2" class="fieldarea">استان/ایالت:<span class="mandatory">*</span></td>
            <td><input name="state" class="" tabindex="17" type="text">
              <div class="example">مثال: <span dir="ltr">Tehran</span></div></td>
          </tr>
          <tr>
            <td colspan="2" class="fieldarea">شهر:<span class="mandatory">*</span></td>
            <td><input name="city" class="" tabindex="18" type="text">
              <div class="example">مثال: <span dir="ltr">Tehran</span></div></td>
          </tr>
          <tr>
            <td colspan="2" class="fieldarea">نشانی:<span class="mandatory">*</span></td>
            <td><textarea name="address" cols="30" rows="7" class="" tabindex="19"></textarea>
              <div class="example">مثال: <span dir="ltr">No. 5, Example Sq., Sample St.</span></div></td>
          </tr>
          <tr>
            <td colspan="2" class="fieldarea">کد پستی:<span class="mandatory">*</span></td>
            <td><input name="postcode" class="" tabindex="20" type="text">
              <div class="example">مثال: <span dir="ltr">12345</span></div>
              <div class="example">مثال: <span dir="ltr">12345-67890</span></div></td>
          </tr>
          <tr>
            <td colspan="2" class="fieldarea">تلفن:<span class="mandatory">*</span></td>
            <td><input name="phone" class="" tabindex="21" type="text">
              <div class="example">مثال: <span dir="ltr">+98 21 1234 5678</span></div></td>
          </tr>
          <tr>
            <td colspan="2" class="fieldarea">نمابر:</td>
            <td><input name="fax" class="" tabindex="22" type="text">
              <div class="example">مثال: <span dir="ltr">+98 21 1234 5678</span></div></td>
          </tr>
          <tr>
            <td colspan="3" style="text-align: center;"><input type="submit" value="ثبت شناسه" tabindex="30"></td>
          </tr>
        </tbody>
      </table>

	</td>
</tr>
</table>