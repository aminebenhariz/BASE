<?php

/* Are all the letters found in ips-ascii also present in this file?

for i in $(cut -d ":" -f 1 /var/www/html/ips-ascii.txt | sort -u | uniq); do if (! $(grep -q "\"$i\"" /usr/share/base-1.4.4/includes/base_iso3166.inc.php)); then echo $i; fi; done

*/

// The first entries here are not part of ISO 3166. Nevertheless they
// exist as top level domains.
$iso_3166 = array(
    "--" => "unknown",
    "EU" => "European Union",
    "AP" => "non-specific Asia-Pacific location",
    "CS" => "former Czechoslovakia ",
    "FX" => "France, Metropolitan",
    "PS" => "Palestinian Territory, Occupied",
    "YU" => "Serbia and Montenegro",
    "I0" => "private network (rfc 1918)",
    "L0" => "loopback",
    "ZZ" => "private network",
    // From here on the actual iso list begins
    "AD" => "Andorra",
    "AE" => "United Arab Emirates",
    "AF" => "Afghanistan",
    "AG" => "Antigua and Barbuda",
    "AI" => "Anguilla",
    "AL" => "Albania",
    "AM" => "Armenia",
    "AN" => "Netherlands Antilles",
    "AO" => "Angola",
    "AQ" => "Antarctica",
    "AR" => "Argentina",
    "AS" => "American Samoa",
    "AT" => "Austria",
    "AU" => "Australia",
    "AW" => "Aruba",
    "AX" => "Åland Islands",
    "AZ" => "Azerbaijan",
    "BA" => "Bosnia and Herzegovina",
    "BB" => "Barbados",
    "BD" => "Bangladesh",
    "BE" => "Belgium",
    "BF" => "Burkina Faso",
    "BG" => "Bulgaria",
    "BH" => "Bahrain",
    "BI" => "Burundi",
    "BJ" => "Benin",
    "BM" => "Bermuda",
    "BN" => "Brunei Darussalam",
    "BO" => "Bolivia",
    "BR" => "Brazil",
    "BS" => "Bahamas",
    "BT" => "Bhutan",
    "BV" => "Bouvet Island",
    "BW" => "Botswana",
    "BY" => "Belarus",
    "BZ" => "Belize",
    "CA" => "Canada",
    "CC" => "Cocos (Keeling) Islands",
    "CD" => "Congo, The Democratic Republic of the",
    "CF" => "Central African Republic",
    "CG" => "Congo",
    "CH" => "Switzerland",
    "CI" => "Côte d'Ivoire",
    "CK" => "Cook Islands",
    "CL" => "Chile",
    "CM" => "Cameroon",
    "CN" => "China",
    "CO" => "Colombia",
    "CR" => "Costa Rica",
    "CU" => "Cuba",
    "CV" => "Cape Verde",
    "CX" => "Christmas Island",
    "CY" => "Cyprus",
    "CZ" => "Czech Republic",
    "DE" => "Germany",
    "DJ" => "Djibouti",
    "DK" => "Denmark",
    "DM" => "Dominica",
    "DO" => "Dominican Republic",
    "DZ" => "Algeria",
    "EC" => "Ecuador",
    "EE" => "Estonia",
    "EG" => "Egypt",
    "EH" => "Western Sahara",
    "ER" => "Eritrea",
    "ES" => "Spain",
    "ET" => "Ethiopia",
    "FI" => "Finland",
    "FJ" => "Fiji",
    "FK" => "Falkland Islands (Malvinas)",
    "FM" => "Micronesia, Federated States of",
    "FO" => "Faroe Islands",
    "FR" => "France",
    "GA" => "Gabon",
    "GB" => "United Kingdom",
    "GD" => "Grenada",
    "GE" => "Georgia",
    "GF" => "French Guiana",
    "GG" => "Guernsey",
    "GH" => "Ghana",
    "GI" => "Gibraltar",
    "GL" => "Greenland",
    "GM" => "Gambia",
    "GN" => "Guinea",
    "GP" => "Guadeloupe",
    "GQ" => "Equatorial Guinea",
    "GR" => "Greece",
    "GS" => "South Georgia and the South Sandwich Islands",
    "GT" => "Guatemala",
    "GU" => "Guam",
    "GW" => "Guinea-Bissau",
    "GY" => "Guyana",
    "HK" => "Hong Kong",
    "HM" => "Heard Island and McDonald Islands",
    "HN" => "Honduras",
    "HR" => "Croatia",
    "HT" => "Haiti",
    "HU" => "Hungary",
    "ID" => "Indonesia",
    "IE" => "Ireland",
    "IL" => "Israel",
    "IM" => "Isle of Man",
    "IN" => "India",
    "IO" => "British Indian Ocean Territory",
    "IQ" => "Iraq",
    "IR" => "Iran, Islamic Republic of",
    "IS" => "Iceland",
    "IT" => "Italy",
    "JE" => "Jersey",
    "JM" => "Jamaica",
    "JO" => "Jordan",
    "JP" => "Japan",
    "KE" => "Kenya",
    "KG" => "Kyrgyzstan",
    "KH" => "Cambodia",
    "KI" => "Kiribati",
    "KM" => "Comoros",
    "KN" => "Saint Kitts and Nevis",
    "KP" => "Korea, Democratic People's Republic of",
    "KR" => "Korea, Republic of",
    "KW" => "Kuwait",
    "KY" => "Cayman Islands",
    "KZ" => "Kazakhstan",
    "LA" => "Lao People's Democratic Republic",
    "LB" => "Lebanon",
    "LC" => "Saint Lucia",
    "LI" => "Liechtenstein",
    "LK" => "Sri Lanka",
    "LR" => "Liberia",
    "LS" => "Lesotho",
    "LT" => "Lithuania",
    "LU" => "Luxembourg",
    "LV" => "Latvia",
    "LY" => "Libyan Arab Jamahiriya",
    "MA" => "Morocco",
    "MC" => "Monaco",
    "MD" => "Moldova, Republic of",
    "ME" => "Montenegro",
    "MG" => "Madagascar",
    "MH" => "Marshall Islands",
    "MK" => "Macedonia, Republic of",
    "ML" => "Mali",
    "MM" => "Myanmar",
    "MN" => "Mongolia",
    "MO" => "Macao",
    "MP" => "Northern Mariana Islands",
    "MQ" => "Martinique",
    "MR" => "Mauritania",
    "MS" => "Montserrat",
    "MT" => "Malta",
    "MU" => "Mauritius",
    "MV" => "Maldives",
    "MW" => "Malawi",
    "MX" => "Mexico",
    "MY" => "Malaysia",
    "MZ" => "Mozambique",
    "NA" => "Namibia",
    "NC" => "New Caledonia",
    "NE" => "Niger",
    "NF" => "Norfolk Island",
    "NG" => "Nigeria",
    "NI" => "Nicaragua",
    "NL" => "Netherlands",
    "NO" => "Norway",
    "NP" => "Nepal",
    "NR" => "Nauru",
    "NU" => "Niue",
    "NZ" => "New Zealand",
    "OM" => "Oman",
    "PA" => "Panama",
    "PE" => "Peru",
    "PF" => "French Polynesia",
    "PG" => "Papua New Guinea",
    "PH" => "Philippines",
    "PK" => "Pakistan",
    "PL" => "Poland",
    "PM" => "Saint Pierre and Miquelon",
    "PN" => "Pitcairn",
    "PR" => "Puerto Rico",
    "PS" => "Palestinian Territory, Occupied",
    "PT" => "Portugal",
    "PW" => "Palau",
    "PY" => "Paraguay",
    "QA" => "Qatar",
    "RE" => "Reunion",
    "RO" => "Romania",
    "RS" => "Serbia",
    "RU" => "Russian Federation",
    "RW" => "Rwanda",
    "SA" => "Saudi Arabia",
    "SB" => "Solomon Islands",
    "SC" => "Seychelles",
    "SD" => "Sudan",
    "SE" => "Sweden",
    "SG" => "Singapore",
    "SH" => "Saint Helena",
    "SI" => "Slovenia",
    "SJ" => "Svalbard and Jan Mayen",
    "SK" => "Slovakia",
    "SL" => "Sierra Leone",
    "SM" => "San Marino",
    "SN" => "Senegal",
    "SO" => "Somalia",
    "SR" => "Suriname",
    "ST" => "Sao Tome and Principe",
    "SV" => "El Salvador",
    "SY" => "Syrian Arab Republic",
    "SZ" => "Swaziland",
    "TC" => "Turks and Caicos Islands",
    "TD" => "Chad",
    "TF" => "French Southern Territories",
    "TG" => "Togo",
    "TH" => "Thailand",
    "TJ" => "Tajikistan",
    "TK" => "Tokelau",
    "TL" => "Timor-Leste",
    "TM" => "Turkmenistan",
    "TN" => "Tunisia",
    "TO" => "Tonga",
    "TR" => "Turkey",
    "TT" => "Trinidad and Tobago",
    "TV" => "Tuvalu",
    "TW" => "Taiwan",
    "TZ" => "Tanzania, United Republic of",
    "UA" => "Ukraine",
    "UG" => "Uganda",
    "UM" => "United States Minor Outlying Islands",
    "US" => "United States",
    "UY" => "Uruguay",
    "UZ" => "Uzbekistan",
    "VA" => "Holy See (Vatican City State)",
    "VC" => "Saint Vincent and the Grenadines",
    "VE" => "Venezuela",
    "VG" => "Virgin Islands, British",
    "VI" => "Virgin Islands, U.S.",
    "VN" => "Viet Nam",
    "VU" => "Vanuatu",
    "WF" => "Wallis and Futuna",
    "WS" => "Samoa",
    "YE" => "Yemen",
    "YT" => "Mayotte",
    "ZA" => "South Africa",
    "ZM" => "Zambia",
    "ZW" => "Zimbabwe"
);
// vim:tabstop=2:shiftwidth=2:expandtab
?>
