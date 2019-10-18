<!DOCTYPE html> 
<html lang="en">
    <!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Blockchain City Admin</title>

        <!-- Vendors -->

        <!-- Animate CSS -->
        <link
            href="admin/vendors/bower_components/animate.css/animate.min.css"
            rel="stylesheet">

        <!-- Material Design Icons -->
        <link
            href="admin/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css"
            rel="stylesheet">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

        <!-- Malihu Scrollbar -->
        <link
            href="admin/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css"
            rel="stylesheet">

        <!-- Full Calendar -->
        <link
            href="admin/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css"
            rel="stylesheet">

        <!-- Site CSS -->
        <link href="admin/css/app-1.min.css" rel="stylesheet">

        <!-- Page loader -->
        <script src="admin/js/page-loader.min.js"></script>
        <script
            src="https://code.jquery.com/jquery-2.1.1.min.js"
            type="text/javascript"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2-rc.1/js/select2.min.js"
            type="text/javascript"></script>
        <link
            href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css"
            rel="stylesheet"/>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>
    </head>

    <body >
        <!-- Page Loader -->
        <div id="page-loader">
            <div class="preloader preloader--xl preloader--light">
                <svg viewbox="25 25 50 50">
                    <circle cx="50" cy="50" r="20"/>
                </svg>
            </div>
        </div>

        <!-- Header -->
        @include('layouts.admin.header')
        <section id="main">
            @include('layouts.admin.menu')
            <section id="content">
                @yield('content')
            </section>
            @include('layouts.admin.footer')
        </section>

        <!-- Javascript Libraries -->

        <!-- jQuery -->
        <script src="admin/vendors/bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap -->
        <script src="admin/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Malihu ScrollBar -->
        <script
            src="admin/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

        <!-- Bootstrap Notify -->
        <script
            src="admin/vendors/bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js"></script>

        <!-- Moment -->
        <script src="admin/vendors/bower_components/moment/min/moment.min.js"></script>

        <!-- FullCalendar -->
        <script
            src="admin/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>

        <!-- Simple Weather -->
        <script
            src="admin/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>

        <!-- Salvattore -->
        <script src="admin/vendors/bower_components/salvattore/dist/salvattore.min.js"></script>

        <!-- Flot Charts -->
        <script src="admin/vendors/bower_components/flot/jquery.flot.js"></script>
        <script src="admin/vendors/bower_components/flot/jquery.flot.resize.js"></script>
        <script src="admin/vendors/bower_components/flot.curvedlines/curvedLines.js"></script>

        <!-- Sparkline Charts -->
        <script src="admin/vendors/jquery.sparkline/jquery.sparkline.min.js"></script>

        <script
            src="admin/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>

        <script src="/admin/js/flot-charts/curved-line.js"></script>
        <script src="/admin/js/flot-charts/line.js"></script>
        <script src="/admin/js/easy-pie-charts.js"></script>
        <script src="/admin/js/misc.js"></script>
        <script src="/admin/js/sparkline-charts.js"></script>
        <script src="/admin/js/calendar.js"></script>

        <!-- Site Functions & Actions -->
        <script src="/admin/js/app.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                var options = [
                    {
                        id: 'AF',
                        text: 'Afghanistan'
                    }, {
                        id: 'AX',
                        text: 'Aland Islands'
                    }, {
                        id: 'AL',
                        text: 'Albania'
                    }, {
                        id: 'DZ',
                        text: 'Algeria'
                    }, {
                        id: 'AS',
                        text: 'American Samoa'
                    }, {
                        id: 'AD',
                        text: 'Andorra'
                    }, {
                        id: 'AO',
                        text: 'Angola'
                    }, {
                        id: 'AI',
                        text: 'Anguilla'
                    }, {
                        id: 'AQ',
                        text: 'Antarctica'
                    }, {
                        id: 'AG',
                        text: 'Antigua And Barbuda'
                    }, {
                        id: 'AR',
                        text: 'Argentina'
                    }, {
                        id: 'AM',
                        text: 'Armenia'
                    }, {
                        id: 'AW',
                        text: 'Aruba'
                    }, {
                        id: 'AU',
                        text: 'Australia'
                    }, {
                        id: 'AT',
                        text: 'Austria'
                    }, {
                        id: 'AZ',
                        text: 'Azerbaijan'
                    }, {
                        id: 'BS',
                        text: 'Bahamas'
                    }, {
                        id: 'BH',
                        text: 'Bahrain'
                    }, {
                        id: 'BD',
                        text: 'Bangladesh'
                    }, {
                        id: 'BB',
                        text: 'Barbados'
                    }, {
                        id: 'BY',
                        text: 'Belarus'
                    }, {
                        id: 'BE',
                        text: 'Belgium'
                    }, {
                        id: 'BZ',
                        text: 'Belize'
                    }, {
                        id: 'BJ',
                        text: 'Benin'
                    }, {
                        id: 'BM',
                        text: 'Bermuda'
                    }, {
                        id: 'BT',
                        text: 'Bhutan'
                    }, {
                        id: 'BO',
                        text: 'Bolivia'
                    }, {
                        id: 'BA',
                        text: 'Bosnia And Herzegovina'
                    }, {
                        id: 'BW',
                        text: 'Botswana'
                    }, {
                        id: 'BV',
                        text: 'Bouvet Island'
                    }, {
                        id: 'BR',
                        text: 'Brazil'
                    }, {
                        id: 'IO',
                        text: 'British Indian Ocean Territory'
                    }, {
                        id: 'BN',
                        text: 'Brunei Darussalam'
                    }, {
                        id: 'BG',
                        text: 'Bulgaria'
                    }, {
                        id: 'BF',
                        text: 'Burkina Faso'
                    }, {
                        id: 'BI',
                        text: 'Burundi'
                    }, {
                        id: 'KH',
                        text: 'Cambodia'
                    }, {
                        id: 'CM',
                        text: 'Cameroon'
                    }, {
                        id: 'CA',
                        text: 'Canada'
                    }, {
                        id: 'CV',
                        text: 'Cape Verde'
                    }, {
                        id: 'KY',
                        text: 'Cayman Islands'
                    }, {
                        id: 'CF',
                        text: 'Central African Republic'
                    }, {
                        id: 'TD',
                        text: 'Chad'
                    }, {
                        id: 'CL',
                        text: 'Chile'
                    }, {
                        id: 'CN',
                        text: 'China'
                    }, {
                        id: 'CX',
                        text: 'Christmas Island'
                    }, {
                        id: 'CC',
                        text: 'Cocos (Keeling) Islands'
                    }, {
                        id: 'CO',
                        text: 'Colombia'
                    }, {
                        id: 'KM',
                        text: 'Comoros'
                    }, {
                        id: 'CG',
                        text: 'Congo'
                    }, {
                        id: 'CD',
                        text: 'Congo, Democratic Republic Of'
                    }, {
                        id: 'CK',
                        text: 'Cook Islands'
                    }, {
                        id: 'CR',
                        text: 'Costa Rica'
                    }, {
                        id: 'CI',
                        text: 'Cote D\'Ivoire'
                    }, {
                        id: 'HR',
                        text: 'Croatia'
                    }, {
                        id: 'CU',
                        text: 'Cuba'
                    }, {
                        id: 'CY',
                        text: 'Cyprus'
                    }, {
                        id: 'CZ',
                        text: 'Czech Republic'
                    }, {
                        id: 'DK',
                        text: 'Denmark'
                    }, {
                        id: 'DJ',
                        text: 'Djibouti'
                    }, {
                        id: 'DM',
                        text: 'Dominica'
                    }, {
                        id: 'DO',
                        text: 'Dominican Republic'
                    }, {
                        id: 'EC',
                        text: 'Ecuador'
                    }, {
                        id: 'EG',
                        text: 'Egypt'
                    }, {
                        id: 'SV',
                        text: 'El Salvador'
                    }, {
                        id: 'GQ',
                        text: 'Equatorial Guinea'
                    }, {
                        id: 'ER',
                        text: 'Eritrea'
                    }, {
                        id: 'EE',
                        text: 'Estonia'
                    }, {
                        id: 'ET',
                        text: 'Ethiopia'
                    }, {
                        id: 'FK',
                        text: 'Falkland Islands (Malvinas)'
                    }, {
                        id: 'FO',
                        text: 'Faroe Islands'
                    }, {
                        id: 'FJ',
                        text: 'Fiji'
                    }, {
                        id: 'FI',
                        text: 'Finland'
                    }, {
                        id: 'FR',
                        text: 'France'
                    }, {
                        id: 'GF',
                        text: 'French Guiana'
                    }, {
                        id: 'PF',
                        text: 'French Polynesia'
                    }, {
                        id: 'TF',
                        text: 'French Southern Territories'
                    }, {
                        id: 'GA',
                        text: 'Gabon'
                    }, {
                        id: 'GM',
                        text: 'Gambia'
                    }, {
                        id: 'GE',
                        text: 'Georgia'
                    }, {
                        id: 'DE',
                        text: 'Germany'
                    }, {
                        id: 'GH',
                        text: 'Ghana'
                    }, {
                        id: 'GI',
                        text: 'Gibraltar'
                    }, {
                        id: 'GR',
                        text: 'Greece'
                    }, {
                        id: 'GL',
                        text: 'Greenland'
                    }, {
                        id: 'GD',
                        text: 'Grenada'
                    }, {
                        id: 'GP',
                        text: 'Guadeloupe'
                    }, {
                        id: 'GU',
                        text: 'Guam'
                    }, {
                        id: 'GT',
                        text: 'Guatemala'
                    }, {
                        id: 'GG',
                        text: 'Guernsey'
                    }, {
                        id: 'GN',
                        text: 'Guinea'
                    }, {
                        id: 'GW',
                        text: 'Guinea-Bissau'
                    }, {
                        id: 'GY',
                        text: 'Guyana'
                    }, {
                        id: 'HT',
                        text: 'Haiti'
                    }, {
                        id: 'HM',
                        text: 'Heard Island & Mcdonald Islands'
                    }, {
                        id: 'VA',
                        text: 'Holy See (Vatican City State)'
                    }, {
                        id: 'HN',
                        text: 'Honduras'
                    }, {
                        id: 'HK',
                        text: 'Hong Kong'
                    }, {
                        id: 'HU',
                        text: 'Hungary'
                    }, {
                        id: 'IS',
                        text: 'Iceland'
                    }, {
                        id: 'IN',
                        text: 'India'
                    }, {
                        id: 'ID',
                        text: 'Indonesia'
                    }, {
                        id: 'IR',
                        text: 'Iran, Islamic Republic Of'
                    }, {
                        id: 'IQ',
                        text: 'Iraq'
                    }, {
                        id: 'IE',
                        text: 'Ireland'
                    }, {
                        id: 'IM',
                        text: 'Isle Of Man'
                    }, {
                        id: 'IL',
                        text: 'Israel'
                    }, {
                        id: 'IT',
                        text: 'Italy'
                    }, {
                        id: 'JM',
                        text: 'Jamaica'
                    }, {
                        id: 'JP',
                        text: 'Japan'
                    }, {
                        id: 'JE',
                        text: 'Jersey'
                    }, {
                        id: 'JO',
                        text: 'Jordan'
                    }, {
                        id: 'KZ',
                        text: 'Kazakhstan'
                    }, {
                        id: 'KE',
                        text: 'Kenya'
                    }, {
                        id: 'KI',
                        text: 'Kiribati'
                    }, {
                        id: 'KR',
                        text: 'Korea'
                    }, {
                        id: 'KW',
                        text: 'Kuwait'
                    }, {
                        id: 'KG',
                        text: 'Kyrgyzstan'
                    }, {
                        id: 'LA',
                        text: 'Lao People\'s Democratic Republic'
                    }, {
                        id: 'LV',
                        text: 'Latvia'
                    }, {
                        id: 'LB',
                        text: 'Lebanon'
                    }, {
                        id: 'LS',
                        text: 'Lesotho'
                    }, {
                        id: 'LR',
                        text: 'Liberia'
                    }, {
                        id: 'LY',
                        text: 'Libyan Arab Jamahiriya'
                    }, {
                        id: 'LI',
                        text: 'Liechtenstein'
                    }, {
                        id: 'LT',
                        text: 'Lithuania'
                    }, {
                        id: 'LU',
                        text: 'Luxembourg'
                    }, {
                        id: 'MO',
                        text: 'Macao'
                    }, {
                        id: 'MK',
                        text: 'Macedonia'
                    }, {
                        id: 'MG',
                        text: 'Madagascar'
                    }, {
                        id: 'MW',
                        text: 'Malawi'
                    }, {
                        id: 'MY',
                        text: 'Malaysia'
                    }, {
                        id: 'MV',
                        text: 'Maldives'
                    }, {
                        id: 'ML',
                        text: 'Mali'
                    }, {
                        id: 'MT',
                        text: 'Malta'
                    }, {
                        id: 'MH',
                        text: 'Marshall Islands'
                    }, {
                        id: 'MQ',
                        text: 'Martinique'
                    }, {
                        id: 'MR',
                        text: 'Mauritania'
                    }, {
                        id: 'MU',
                        text: 'Mauritius'
                    }, {
                        id: 'YT',
                        text: 'Mayotte'
                    }, {
                        id: 'MX',
                        text: 'Mexico'
                    }, {
                        id: 'FM',
                        text: 'Micronesia, Federated States Of'
                    }, {
                        id: 'MD',
                        text: 'Moldova'
                    }, {
                        id: 'MC',
                        text: 'Monaco'
                    }, {
                        id: 'MN',
                        text: 'Mongolia'
                    }, {
                        id: 'ME',
                        text: 'Montenegro'
                    }, {
                        id: 'MS',
                        text: 'Montserrat'
                    }, {
                        id: 'MA',
                        text: 'Morocco'
                    }, {
                        id: 'MZ',
                        text: 'Mozambique'
                    }, {
                        id: 'MM',
                        text: 'Myanmar'
                    }, {
                        id: 'NA',
                        text: 'Namibia'
                    }, {
                        id: 'NR',
                        text: 'Nauru'
                    }, {
                        id: 'NP',
                        text: 'Nepal'
                    }, {
                        id: 'NL',
                        text: 'Netherlands'
                    }, {
                        id: 'AN',
                        text: 'Netherlands Antilles'
                    }, {
                        id: 'NC',
                        text: 'New Caledonia'
                    }, {
                        id: 'NZ',
                        text: 'New Zealand'
                    }, {
                        id: 'NI',
                        text: 'Nicaragua'
                    }, {
                        id: 'NE',
                        text: 'Niger'
                    }, {
                        id: 'NG',
                        text: 'Nigeria'
                    }, {
                        id: 'NU',
                        text: 'Niue'
                    }, {
                        id: 'NF',
                        text: 'Norfolk Island'
                    }, {
                        id: 'MP',
                        text: 'Northern Mariana Islands'
                    }, {
                        id: 'NO',
                        text: 'Norway'
                    }, {
                        id: 'OM',
                        text: 'Oman'
                    }, {
                        id: 'PK',
                        text: 'Pakistan'
                    }, {
                        id: 'PW',
                        text: 'Palau'
                    }, {
                        id: 'PS',
                        text: 'Palestinian Territory, Occupied'
                    }, {
                        id: 'PA',
                        text: 'Panama'
                    }, {
                        id: 'PG',
                        text: 'Papua New Guinea'
                    }, {
                        id: 'PY',
                        text: 'Paraguay'
                    }, {
                        id: 'PE',
                        text: 'Peru'
                    }, {
                        id: 'PH',
                        text: 'Philippines'
                    }, {
                        id: 'PN',
                        text: 'Pitcairn'
                    }, {
                        id: 'PL',
                        text: 'Poland'
                    }, {
                        id: 'PT',
                        text: 'Portugal'
                    }, {
                        id: 'PR',
                        text: 'Puerto Rico'
                    }, {
                        id: 'QA',
                        text: 'Qatar'
                    }, {
                        id: 'RE',
                        text: 'Reunion'
                    }, {
                        id: 'RO',
                        text: 'Romania'
                    }, {
                        id: 'RU',
                        text: 'Russian Federation'
                    }, {
                        id: 'RW',
                        text: 'Rwanda'
                    }, {
                        id: 'BL',
                        text: 'Saint Barthelemy'
                    }, {
                        id: 'SH',
                        text: 'Saint Helena'
                    }, {
                        id: 'KN',
                        text: 'Saint Kitts And Nevis'
                    }, {
                        id: 'LC',
                        text: 'Saint Lucia'
                    }, {
                        id: 'MF',
                        text: 'Saint Martin'
                    }, {
                        id: 'PM',
                        text: 'Saint Pierre And Miquelon'
                    }, {
                        id: 'VC',
                        text: 'Saint Vincent And Grenadines'
                    }, {
                        id: 'WS',
                        text: 'Samoa'
                    }, {
                        id: 'SM',
                        text: 'San Marino'
                    }, {
                        id: 'ST',
                        text: 'Sao Tome And Principe'
                    }, {
                        id: 'SA',
                        text: 'Saudi Arabia'
                    }, {
                        id: 'SN',
                        text: 'Senegal'
                    }, {
                        id: 'RS',
                        text: 'Serbia'
                    }, {
                        id: 'SC',
                        text: 'Seychelles'
                    }, {
                        id: 'SL',
                        text: 'Sierra Leone'
                    }, {
                        id: 'SG',
                        text: 'Singapore'
                    }, {
                        id: 'SK',
                        text: 'Slovakia'
                    }, {
                        id: 'SI',
                        text: 'Slovenia'
                    }, {
                        id: 'SB',
                        text: 'Solomon Islands'
                    }, {
                        id: 'SO',
                        text: 'Somalia'
                    }, {
                        id: 'ZA',
                        text: 'South Africa'
                    }, {
                        id: 'GS',
                        text: 'South Georgia And Sandwich Isl.'
                    }, {
                        id: 'ES',
                        text: 'Spain'
                    }, {
                        id: 'LK',
                        text: 'Sri Lanka'
                    }, {
                        id: 'SD',
                        text: 'Sudan'
                    }, {
                        id: 'SR',
                        text: 'Suriname'
                    }, {
                        id: 'SJ',
                        text: 'Svalbard And Jan Mayen'
                    }, {
                        id: 'SZ',
                        text: 'Swaziland'
                    }, {
                        id: 'SE',
                        text: 'Sweden'
                    }, {
                        id: 'CH',
                        text: 'Switzerland'
                    }, {
                        id: 'SY',
                        text: 'Syrian Arab Republic'
                    }, {
                        id: 'TW',
                        text: 'Taiwan'
                    }, {
                        id: 'TJ',
                        text: 'Tajikistan'
                    }, {
                        id: 'TZ',
                        text: 'Tanzania'
                    }, {
                        id: 'TH',
                        text: 'Thailand'
                    }, {
                        id: 'TL',
                        text: 'Timor-Leste'
                    }, {
                        id: 'TG',
                        text: 'Togo'
                    }, {
                        id: 'TK',
                        text: 'Tokelau'
                    }, {
                        id: 'TO',
                        text: 'Tonga'
                    }, {
                        id: 'TT',
                        text: 'Trinidad And Tobago'
                    }, {
                        id: 'TN',
                        text: 'Tunisia'
                    }, {
                        id: 'TR',
                        text: 'Turkey'
                    }, {
                        id: 'TM',
                        text: 'Turkmenistan'
                    }, {
                        id: 'TC',
                        text: 'Turks And Caicos Islands'
                    }, {
                        id: 'TV',
                        text: 'Tuvalu'
                    }, {
                        id: 'UG',
                        text: 'Uganda'
                    }, {
                        id: 'UA',
                        text: 'Ukraine'
                    }, {
                        id: 'AE',
                        text: 'United Arab Emirates'
                    }, {
                        id: 'GB',
                        text: 'United Kingdom'
                    }, {
                        id: 'US',
                        text: 'United States'
                    }, {
                        id: 'UM',
                        text: 'United States Outlying Islands'
                    }, {
                        id: 'UY',
                        text: 'Uruguay'
                    }, {
                        id: 'UZ',
                        text: 'Uzbekistan'
                    }, {
                        id: 'VU',
                        text: 'Vanuatu'
                    }, {
                        id: 'VE',
                        text: 'Venezuela'
                    }, {
                        id: 'VN',
                        text: 'Viet Nam'
                    }, {
                        id: 'VG',
                        text: 'Virgin Islands, British'
                    }, {
                        id: 'VI',
                        text: 'Virgin Islands, U.S.'
                    }, {
                        id: 'WF',
                        text: 'Wallis And Futuna'
                    }, {
                        id: 'EH',
                        text: 'Western Sahara'
                    }, {
                        id: 'YE',
                        text: 'Yemen'
                    }, {
                        id: 'ZM',
                        text: 'Zambia'
                    }, {
                        id: 'ZW',
                        text: 'Zimbabwe'
                    }
                ];
                $('#countries').select2(
                    {placeholder: 'Select Country', templateResult: formatCountry, data: options}
                );

                function formatCountry(country) {
                    if (!country.id) {
                        return country.text;
                    }
                    var $country = $(
                        '<span class="flag-icon flag-icon-' + country.id.toLowerCase() + ' flag-icon-sq' +
                        'uared"></span><span style="margin-left:10px">' + country.text + '</span>'
                    );
                    return $country;
                };
            });
        </script>
    </body>
</html>