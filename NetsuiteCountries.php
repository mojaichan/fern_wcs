<?php 
	// define mapping of countries - updated 11/11/2013.
	$countries = array(
		"_afghanistan" => "Afghanistan",
		"_alandIslands" => "Aland Islands",
		"_albania" => "Albania",
		"_algeria" => "Algeria",
		"_americanSamoa" => "American Samoa",
		"_andorra" => "Andorra",
		"_angola" => "Angola",
		"_anguilla" => "Anguilla",
		"_antarctica" => "Antarctica",
		"_antiguaAndBarbuda" => "Antigua and Barbuda",
		"_argentina" => "Argentina",
		"_armenia" => "Armenia",
		"_aruba" => "Aruba",
		"_australia" => "Australia",
		"_austria" => "Austria",
		"_azerbaijan" => "Azerbaijan",
		"_bahamas" => "Bahamas",
		"_bahrain" => "Bahrain",
		"_bangladesh" => "Bangladesh",
		"_barbados" => "Barbados",
		"_belarus" => "Belarus",
		"_belgium" => "Belgium",
		"_belize" => "Belize",
		"_benin" => "Benin",
		"_bermuda" => "Bermuda",
		"_bhutan" => "Bhutan",
		"_bolivia" => "Bolivia",
		"_bosniaAndHerzegovina" => "Bosnia and Herzegovina",
		"_botswana" => "Botswana",
		"_bouvetIsland" => "Bouvet Island",
		"_brazil" => "Brazil",
		"_britishIndianOceanTerritory" => "British Indian Ocean Territory",
		"_bruneiDarussalam" => "Brunei Darussalam",
		"_bulgaria" => "Bulgaria",
		"_burkinaFaso" => "Burkina Faso",
		"_burundi" => "Burundi",
		"_cambodia" => "Cambodia",
		"_cameroon" => "Cameroon",
		"_canada" => "Canada",
		"_canaryIslands" => "Canary Islands",
		"_capeVerde" => "Cape Verde",
		"_caymanIslands" => "Cayman Islands",
		"_centralAfricanRepublic" => "Central African Republic",
		"_ceutaAndMelilla" => "Ceuta and Melilla",
		"_chad" => "Chad",
		"_chile" => "Chile",
		"_china" => "China",
		"_christmasIsland" => "Christmas Island",
		"_cocosKeelingIslands" => "Cocos (Keeling) Islands",
		"_colombia" => "Colombia",
		"_comoros" => "Comoros",
		"_congoDemocraticPeoplesRepublic" => "Congo, Democratic People's Republic",
		"_congoRepublicOf" => "Congo, Republic of",
		"_cookIslands" => "Cook Islands",
		"_costaRica" => "Costa Rica",
		"_coteDIvoire" => "Cote d'Ivoire",
		"_croatiaHrvatska" => "Croatia/Hrvatska",
		"_cuba" => "Cuba",
		"_cyprus" => "Cyprus",
		"_czechRepublic" => "Czech Republic",
		"_denmark" => "Denmark",
		"_djibouti" => "Djibouti",
		"_dominica" => "Dominica",
		"_dominicanRepublic" => "Dominican Republic",
		"_eastTimor" => "East Timor",
		"_ecuador" => "Ecuador",
		"_egypt" => "Egypt",
		"_elSalvador" => "El Salvador",
		"_equatorialGuinea" => "Equatorial Guinea",
		"_eritrea" => "Eritrea",
		"_estonia" => "Estonia",
		"_ethiopia" => "Ethiopia",
		"_falklandIslands" => "Falkland Islands",
		"_faroeIslands" => "Faroe Islands",
		"_fiji" => "Fiji",
		"_finland" => "Finland",
		"_france" => "France",
		"_frenchGuiana" => "French Guiana",
		"_frenchPolynesia" => "French Polynesia",
		"_frenchSouthernTerritories" => "French Southern Territories",
		"_gabon" => "Gabon",
		"_gambia" => "Gambia",
		"_georgia" => "Georgia",
		"_germany" => "Germany",
		"_ghana" => "Ghana",
		"_gibraltar" => "Gibraltar",
		"_greece" => "Greece",
		"_greenland" => "Greenland",
		"_grenada" => "Grenada",
		"_guadeloupe" => "Guadeloupe",
		"_guam" => "Guam",
		"_guatemala" => "Guatemala",
		"_guernsey" => "Guernsey",
		"_guinea" => "Guinea",
		"_guineaBissau" => "Guinea-Bissau",
		"_guyana" => "Guyana",
		"_haiti" => "Haiti",
		"_heardAndMcDonaldIslands" => "Heard and McDonald Islands",
		"_holySeeCityVaticanState" => "Holy See (City Vatican State)",
		"_honduras" => "Honduras",
		"_hongKong" => "Hong Kong",
		"_hungary" => "Hungary",
		"_iceland" => "Iceland",
		"_india" => "India",
		"_indonesia" => "Indonesia",
		"_iranIslamicRepublicOf" => "Iran (Islamic Republic of)",
		"_iraq" => "Iraq",
		"_ireland" => "Ireland",
		"_isleOfMan" => "Isle of Man",
		"_israel" => "Israel",
		"_italy" => "Italy",
		"_jamaica" => "Jamaica",
		"_japan" => "Japan",
		"_jersey" => "Jersey",
		"_jordan" => "Jordan",
		"_kazakhstan" => "Kazakhstan",
		"_kenya" => "Kenya",
		"_kiribati" => "Kiribati",
		"_koreaDemocraticPeoplesRepublic" => "Korea, Democratic People's Republic",
		"_koreaRepublicOf" => "Korea, Republic of",
		"_kosovo" => "Kosovo",
		"_kuwait" => "Kuwait",
		"_kyrgyzstan" => "Kyrgyzstan",
		"_laoPeoplesDemocraticRepublic" => "Lao, People's Democratic Republic",
		"_latvia" => "Latvia",
		"_lebanon" => "Lebanon",
		"_lesotho" => "Lesotho",
		"_liberia" => "Liberia",
		"_libyanArabJamahiriya" => "Libyan Arab Jamahiriya",
		"_liechtenstein" => "Liechtenstein",
		"_lithuania" => "Lithuania",
		"_luxembourg" => "Luxembourg",
		"_macau" => "Macau",
		"_macedonia" => "Macedonia",
		"_madagascar" => "Madagascar",
		"_malawi" => "Malawi",
		"_malaysia" => "Malaysia",
		"_maldives" => "Maldives",
		"_mali" => "Mali",
		"_malta" => "Malta",
		"_marshallIslands" => "Marshall Islands",
		"_martinique" => "Martinique",
		"_mauritania" => "Mauritania",
		"_mauritius" => "Mauritius",
		"_mayotte" => "Mayotte",
		"_mexico" => "Mexico",
		"_micronesiaFederalStateOf" => "Micronesia, Federal State of",
		"_moldovaRepublicOf" => "Moldova, Republic of",
		"_monaco" => "Monaco",
		"_mongolia" => "Mongolia",
		"_montenegro" => "Montenegro",
		"_montserrat" => "Montserrat",
		"_morocco" => "Morocco",
		"_mozambique" => "Mozambique",
		"_myanmar" => "Myanmar",
		"_namibia" => "Namibia",
		"_nauru" => "Nauru",
		"_nepal" => "Nepal",
		"_netherlands" => "Netherlands",
		"_newCaledonia" => "New Caledonia",
		"_newZealand" => "New Zealand",
		"_nicaragua" => "Nicaragua",
		"_niger" => "Niger",
		"_nigeria" => "Nigeria",
		"_niue" => "Niue",
		"_norfolkIsland" => "Norfolk Island",
		"_northernMarianaIslands" => "Northern Mariana Islands",
		"_norway" => "Norway",
		"_oman" => "Oman",
		"_pakistan" => "Pakistan",
		"_palau" => "Palau",
		"_palestinianTerritories" => "Palestinian Territories",
		"_panama" => "Panama",
		"_papuaNewGuinea" => "Papua New Guinea",
		"_paraguay" => "Paraguay",
		"_peru" => "Peru",
		"_philippines" => "Philippines",
		"_pitcairnIsland" => "Pitcairn Island",
		"_poland" => "Poland",
		"_portugal" => "Portugal",
		"_puertoRico" => "Puerto Rico",
		"_qatar" => "Qatar",
		"_reunionIsland" => "Reunion Island",
		"_romania" => "Romania",
		"_russianFederation" => "Russian Federation",
		"_rwanda" => "Rwanda",
		"_saintBarthelemy" => "Saint Barth�mlemy",
		"_saintHelena" => "Saint Helena",
		"_saintKittsAndNevis" => "Saint Kitts and Nevis",
		"_saintLucia" => "Saint Lucia",
		"_saintMartin" => "Saint Martin",
		"_saintVincentAndTheGrenadines" => "Saint Vincent and the Grenadines",
		"_Samoa" => "Samoa",
		"_sanMarino" => "San Marino",
		"_saoTomeAndPrincipe" => "Sao Tome and Principe",
		"_saudiArabia" => "Saudi Arabia",
		"_senegal" => "Senegal",
		"_serbia" => "Serbia",
		"_seychelles" => "Seychelles",
		"_sierraLeone" => "Sierra Leone",
		"_singapore" => "Singapore",
		"_slovakRepublic" => "Slovak Republic",
		"_slovenia" => "Slovenia",
		"_solomonIslands" => "Solomon Islands",
		"_somalia" => "Somalia",
		"_southAfrica" => "South Africa",
		"_southGeorgia" => "South Georgia",
		"_southSudan" => "South Sudan",
		"_spain" => "Spain",
		"_sriLanka" => "Sri Lanka",
		"_stPierreAndMiquelon" => "St. Pierre and Miquelon",
		"_sudan" => "Sudan",
		"_suriname" => "Suriname",
		"_svalbardAndJanMayenIslands" => "Svalbard and Jan Mayen Islands",
		"_swaziland" => "Swaziland",
		"_sweden" => "Sweden",
		"_switzerland" => "Switzerland",
		"_syrianArabRepublic" => "Syrian Arab Republic",
		"_taiwan" => "Taiwan",
		"_tajikistan" => "Tajikistan",
		"_tanzania" => "Tanzania",
		"_thailand" => "Thailand",
		"_togo" => "Togo",
		"_tokelau" => "Tokelau",
		"_tonga" => "Tonga",
		"_trinidadAndTobago" => "Trinidad and Tobago",
		"_tunisia" => "Tunisia",
		"_turkey" => "Turkey",
		"_turkmenistan" => "Turkmenistan",
		"_turksAndCaicosIslands" => "Turks and Caicos Islands",
		"_tuvalu" => "Tuvalu",
		"_uganda" => "Uganda",
		"_ukraine" => "Ukraine",
		"_unitedArabEmirates" => "United Arab Emirates",
		"_unitedKingdomGB" => "United Kingdom (GB)",
		"_unitedStates" => "United States",
		"_uruguay" => "Uruguay",
		"_uSMinorOutlyingIslands" => "US Minor Outlying Islands",
		"_uzbekistan" => "Uzbekistan",
		"_vanuatu" => "Vanuatu",
		"_venezuela" => "Venezuela",
		"_vietnam" => "Vietnam",
		"_virginIslandsBritish" => "Virgin Islands, British",
		"_virginIslandsUSA" => "Virgin Islands, USA",
		"_wallisAndFutunaIslands" => "Wallis and Futuna Islands",
		"_westernSahara" => "Western Sahara",
		"_yemen" => "Yemen",
		"_zambia" => "Zambia",
		"_zimbabwe" => "Zimbabwe",
	
	);
	
	//Generate a drop down list from $countries array(line 2)
	function generate_country_select ($input, $html_nameid,$preSelect){
		echo '<select name="'.$html_nameid.'" id="'. $html_nameid.'" class="form-control">';
		echo '<option value="">-- Please Select --</option>';
		foreach($input as $key => $value){
			$selected = ($key == $preSelect) ? 'selected' : '';
			echo '<option '.$selected.' value="'.$key.'">'.$value.'</option>';
			
		}
		echo '</select>';
	}
?>
