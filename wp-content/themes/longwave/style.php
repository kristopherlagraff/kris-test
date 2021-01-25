<?php
	header("Content-Type: text/css; charset=utf-8");
	//Basics & WordPress Standards
		$absolute_path = __FILE__;
		$path_to_file = explode( 'wp-content', $absolute_path );
		$path_to_wp = $path_to_file[0];
		require_once( $path_to_wp.'/wp-load.php' );
		require_once( $path_to_wp.'/wp-includes/functions.php');

		$template_uri = get_template_directory_uri();

	//Theme Options
		$themeoptions = getThemeOptions();
		//Style
			// hex (incl. #) 
			$themeoptions["tb_longwave_highlight_color"] = $themeoptions["tb_longwave_highlight_color"];
			$themeoptions["tb_longwave_highlight_hover_color"] = $themeoptions["tb_longwave_highlight_hover_color"];
			// from colorpicker (preview) via URL
			if(isset($_GET["maincolor"])) $themeoptions["tb_longwave_highlight_color"] = $_GET["maincolor"];
			if(isset($_GET["hover"])) $themeoptions["tb_longwave_highlight_hover_color"] = $_GET["hover"];
			if(isset($_GET["backg"])) $themeoptions["tb_longwave_body_background_image"] = $_GET["backg"];
			// rgb (only numbers, e.g. 255,255,255)
			$themeoptions["tb_longwave_highlight_color_rgb"] = HexToRGB("#".$themeoptions["tb_longwave_highlight_color"]);
			$themeoptions["tb_longwave_main_fontfamily"] = htmlspecialchars_decode($themeoptions["tb_longwave_main_fontfamily"],ENT_QUOTES);
?>

/*-----------------------------------------------------------------------------------*/
/*	RESET
/*-----------------------------------------------------------------------------------*/
html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, acronym, address, big, cite, code, del, dfn, em, font, img, ins, kbd, q, s, samp, small, strike, strong, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend {
	margin:0;
	padding:0;
	border:0;
	outline:0;
	font-size:100%;
	vertical-align:baseline;
	background:transparent
}

html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, acronym, address, big, cite, code, del, dfn, em, font, img, ins, kbd, q, s, samp, small, strike, strong, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend {
	margin:0;
	padding:0;
	border:0;
	outline:0;
	font-size:100%;
	vertical-align:baseline;
	background:transparent
}
body {
	line-height:1
}
blockquote, q {
	quotes:none
}
blockquote:before, blockquote:after, q:before, q:after {
	content:'';
	content:none
}
:focus {
	outline:0
}
ins {
	text-decoration:none
}
del {
	text-decoration:line-through
}
table {
	border-collapse:collapse;
	border-spacing:0
}
.clear {
	clear:both;
	display:block;
	overflow:hidden;
	visibility:hidden;
	width:0;
	height:0
}
th, td {
	margin:0;
	padding:0
}
table {
	border-collapse:collapse;
	border-spacing:0
}
.clear {
	clear: both;
}
br {
	line-height: 10px;
}
input[type="submit"]::-moz-focus-inner, input[type="button"]::-moz-focus-inner {
 border : 0px;
}
input[type="submit"]:focus, input[type="button"]:focus {
	outline : none;
}

::selection {
	background: #fefac7; /* Safari */
	color: #555555;
}
::-moz-selection {
	background: #fefac7; /* Firefox */
	color: #555555;
}

*, *:before, *:after {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.clearfix:before,
.clearfix:after {
    content: " ";
    display: table;
}
.clearfix:after {
    clear: both;
}
.clearfix {
    *zoom: 1;
}
input, textarea {
  -webkit-appearance: none;
  border-radius: 0;
}
/*-----------------------------------------------------------------------------------*/
/*	GENERAL
/*-----------------------------------------------------------------------------------*/
body {
    background: #FFF;
    -webkit-font-smoothing: antialiased;
    -webkit-text-size-adjust: 100%;
    <?php echo $themeoptions["tb_longwave_main_fontfamily"]; ?>
    font-size: 14px;
    line-height: 24px;
    font-weight: 400;
    color: #797979;
    letter-spacing: 0.2px;
}
input,
textarea,
select {
    <?php echo $themeoptions["tb_longwave_main_fontfamily"]; ?>
    font-size: 14px;
    width: 100%;
    letter-spacing: 0.2px;
}
p {
    padding-bottom: 20px
}
h1,
h2,
h3,
h4,
h5,
h6 {
    font-weight: 900;
    color: #707070;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    word-spacing: 1px;
    margin-bottom: 10px;
}
h1 {
    font-size: 24px
}
h2 {
    font-size: 20px
}
h3 {
    font-size: 18px
}
h4 {
    font-size: 16px
}
h5 {
    font-size: 14px
}
h6 {
    font-size: 12px
}
.colored {
    color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>;
    margin-bottom: 25px;
}
.colored:after {
    content: "--";
    display: inline-block;
    padding-left: 25px;
}
h3.widget-title {
    margin-bottom: 15px;
    font-size: 16px;
}
h3.widget-title.colored:after {
    padding-left: 15px
}
.post h2 {
    font-size: 18px;
    margin-bottom: 3px;
}
h5 span {
    font-weight: 400;
    text-transform: none;
    font-size: 11px;
    color: #999999;
    padding-left: 5px;
    letter-spacing: 0.5px;
}
.line {
    padding-bottom: 13px;
    background: transparent url(style/images/line.png) repeat-x center bottom;
}
hr {
    border: none;
    background: transparent url(style/images/line.png) repeat-x top left;
    height: 3px;
    margin-top: 30px;
    margin-bottom: 50px;
}
a {
    text-decoration: none;
    color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>;
    -webkit-transition: all 200ms ease-in;
    -o-transition: all 200ms ease-in;
    -moz-transition: all 200ms ease-in;
}
a:hover {
    color: #<?php echo $themeoptions["tb_longwave_highlight_hover_color"]; ?>
}
a.button,
.forms fieldset .btn-submit, .wpcf7-form .wpcf7-submit,
#comment-form .btn-submit {
    font-weight: 900;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    color: #616161;
    display: inline-block;
    background-color: #ebebeb;
    padding: 7px 20px;
    margin: 0;
    display: inline-block;
    -webkit-transition: all 200ms ease-in;
    -o-transition: all 200ms ease-in;
    -moz-transition: all 200ms ease-in;
    cursor: pointer;
    margin-bottom: 20px;
    width: auto;
    border: none;
}
a.button:hover,
.forms fieldset .btn-submit:hover, .wpcf7-form .wpcf7-submit:hover,
#comment-form .btn-submit:hover {
    background-color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>;
    color: #FFF;
}
a.button.green:hover {
    background-color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>
}
a.button.blue:hover {
    background-color: #88b7d5
}
a.button.purple:hover {
    background-color: #aa95d6
}
a.button.red:hover {
    background-color: #d58888
}
a.button.black:hover {
    background-color: #555
}
a.button.pink:hover {
    background-color: #e0abd7
}
a.button.yellow:hover {
    background-color: #d5cd88
}
a.button.brown:hover {
    background-color: #c09b7c
}
a.button.orange:hover {
    background-color: #f4a85e
}
img {
    max-width: 100%;
    display: block;
    height:auto;
}
img.margin {
    margin-bottom: 20px
}
.alignleft {
    float: left
}
.alignright {
    float: right
}
.aligncenter {
    text-align: center;
    display: block;
    margin: 0 auto;
}
.center {
    text-align: center
}
ul {
    padding-bottom: 20px;padding-left: 20px;
   }


.unordered ul,.pricing ul, .footer-wrapper ul, .sidebar ul, ul.item-info, .twitter_shortcode ul, ul.testimonials, ul.latest, #comments ol, #comments ul , #portfolio ul , .page-navi ul, ul.retina-icons, ul.share, ul.progress-bar{
	list-style:none; padding-left:0;padding-bottom:0;
}
ul.client-list{
	list-style:none;
}

ol {
    list-style: decimal;
    list-style-position: inside;
    padding-bottom: 20px;
}
ol li {
    padding: 0;
    margin: 0;
}
.dropcap {
    font-weight: 900;
    display: block;
    float: left;
    font-size: 45px;
    padding: 0;
    margin: 0;
    margin: 10px 8px 0 0;
    text-transform: uppercase;
}
.lite1 {
    color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>;
    border-bottom: 1px dotted #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>;
}
.lite2 {
    background: #fefac7
}
.download-box,
.warning-box,
.info-box,
.note-box {
    clear: both;
    margin: 10px 0px;
    padding: 13px 15px;
}
.info-box {
    background: #c2ddf9;
    border: 1px solid #80bbef;
    color: #4783b7;
}
.warning-box {
    background: #ffcccc;
    border: 1px solid #ff9999;
    color: #c31b00;
}
.download-box {
    background: #d1f7b6;
    border: 1px solid #8bca61;
    color: #5e9537;
}
.note-box {
    background: #fdebae;
    border: 1px solid #e6c555;
    color: #9e660d;
}
pre {
    margin: 0 0px 20px 0px;
    padding: 5px 10px;
    display: block;
    clear: both;
    background: #f9f9f9;
    border: 1px solid #e7e7e7;
}
/*-----------------------------------------------------------------------------------*/
/*	STUCTURE
/*-----------------------------------------------------------------------------------*/
.header-wrapper {
    background: #FFF
}
.light-wrapper {
    background: #FFF
}
.dark-wrapper {
    background: #f9f9f9;
    border-top: 1px solid #e7e7e7;
    border-bottom: 1px solid #e7e7e7;
}
.footer-wrapper {
    background: #444
}
.subfooter-wrapper {
    background: #3d3d3d
}
.inner {
    width: 1040px;
    margin: 0 auto;
    padding: 50px 0;
}
.header-wrapper .inner {
    padding: 40px 0
}
.intro .inner {
    padding: 38px 0 40px
}
.page-title .inner {
    padding: 23px 0 25px
}
.subfooter-wrapper .inner {
    padding: 25px 0;
    overflow: hidden;
}
.header-wrapper .inner .logo {
    float: left
}
.header-wrapper .inner img {
    display: block
}
.header-wrapper .inner .menu {
    float: right
}
.footer-wrapper .inner {
	padding-bottom: 0;
}
/*-----------------------------------------------------------------------------------*/
/*	COLUMNS
/*-----------------------------------------------------------------------------------*/
.one-half {
    width: 48%
}
.one-third {
    width: 30.66%
}
.two-third {
    width: 65.33%
}
.one-fourth {
    width: 22%
}
.three-fourth {
    width: 74%
}
.one-fifth {
    width: 16.8%
}
.two-fifth {
    width: 37.6%
}
.three-fifth {
    width: 58.4%
}
.four-fifth {
    width: 67.2%
}
.one-sixth {
    width: 13.33%
}
.five-sixth {
    width: 82.67%
}
.one-half,
.one-third,
.two-third,
.three-fourth,
.one-fourth,
.one-fifth,
.two-fifth,
.three-fifth,
.four-fifth,
.one-sixth,
.five-sixth {
    position: relative;
    margin-right: 4%;
    float: left;
}
.last {
    margin-right: 0 !important;
    clear: right;
}
.column-wrapper {
    overflow: hidden;
    width: 100%;
}
/*-----------------------------------------------------------------------------------*/
/*	SERVICES
/*-----------------------------------------------------------------------------------*/
.services {
    text-align: center
}
.services h5 {
    margin-bottom: 10px
}
i.special {
    background-color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>;
    color: #FFF !important;
    font-size: 31px;
    padding-top: 15px;
    width: 60px;
    height: 60px;
    display: inline-block;
    -webkit-border-radius: 60px;
    border-radius: 60px;
    line-height: 1;
    letter-spacing: normal;
    margin-bottom: 10px;
    text-align: center;
}
i.special.large {
    font-size: 41px;
    padding-top: 28px;
    width: 100px;
    height: 100px;
    -webkit-border-radius: 100px;
    border-radius: 100px;
    margin-bottom: 20px;
}
.special.small {
    padding-top: 5px;
    font-size : 18px;
    width: 30px;
    height: 30px;
    -webkit-border-radius: 30px;
    border-radius: 30px;
    margin-bottom: 5px;
}
i.special.blue {
    background-color: #86b7d1
}
i.special.red {
    background-color: #<?php echo $themeoptions["tb_longwave_highlight_hover_color"]; ?>
}
i.special.green {
    background-color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>
}
i.special.purple {
    background-color: #a188d5
}
i.special.black {
    background-color: #555
}
i.special.pink {
    background-color: #e0abd7
}
i.special.yellow {
    background-color: #d5cd88
}
i.special.brown {
    background-color: #c09b7c
}
i.special.orange {
    background-color: #f4a85e
}
/*-----------------------------------------------------------------------------------*/
/*	RETINA ICONS
/*-----------------------------------------------------------------------------------*/
ul.retina-icons {
    width: 110%;
    overflow: hidden;
    margin-right: -3%;
}
ul.retina-icons li {
    width: 22%;
    display: block;
    padding-left: 1px;
    margin-right: 3%;
    float: left;
    line-height: 30px;
}
ul.retina-icons li span {
    margin-left: 10px
}

i.blue {
    color: #86b7d1
}
i.red {
    color: #<?php echo $themeoptions["tb_longwave_highlight_hover_color"]; ?>
}
i.green {
    color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>
}
i.purple {
    color: #a188d5
}
i.black {
    color: #555
}
i.pink {
    color: #e0abd7
}
i.yellow {
    color: #d5cd88
}
i.brown {
    color: #c09b7c
}
i.orange {
    color: #f4a85e
}
i.highlight {
	color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>;
}

/*-----------------------------------------------------------------------------------*/
/*	MENU
/*-----------------------------------------------------------------------------------*/
.menu ul {
    margin: 0;
    padding: 0;
    list-style-type: none;
    position: relative;
    overflow: inherit;
    z-index: 1000;
    font-weight: 900;
    letter-spacing: 1.5px;
    margin-top: 12px;
    max-width:870px;
}
.menu ul li {
    position: relative;
    display: inline-block;
    padding: 0;
    margin-left: 40px;
}
.menu ul li a {
    display: block;
    text-decoration: none;
    text-transform: uppercase;
    font-size: 13px;
    color: #c0c0c0;
    -webkit-transition: all 200ms ease-in;
    -o-transition: all 200ms ease-in;
    -moz-transition: all 200ms ease-in;
}
.menu ul li.active a,
.menu ul li a:hover,
.menu ul li a.selected {
    color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>
}
.menu ul li.active ul li a {
    color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>
}
.menu ul li.active ul li a:hover {
    color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>
}
.menu ul li ul {
    position: absolute;
    left: 0;
    display: none;
    visibility: hidden;
    width: 168px;
    margin-top: 10px;
    padding: 0;
}
.menu ul li ul li {
    display: list-item;
    margin: 0;
    border-top: 1px solid #3b3b3b;
    background: #454545;
}
.menu ul li ul li:first-child {
    border-top: none;
}
.menu ul li ul li ul {
    top: 0
}
.menu ul li ul li a {
    margin: 0;
    border: none;
    padding: 13px;
    line-height: 1;
    font-size: 11px;
    color: #dfdfdf;
    white-space: nowrap;
}
.menu ul li ul li a:hover {
    background-color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>;
    color: #FFF;
}
* html .menu {
    height: 1%
}
.selectnav {
    display: none;
    width: 280px;
    margin: 0 auto;
    background: transparent url(style/images/dropdown-arrow.png) no-repeat right center;
    border-radius: 0;
    border: 0;
    background-color: #ebebeb;
    max-width: 100%;
    padding: 7px 10px;
    line-height: 20px;
    background-size: 30px 28px;
    -webkit-appearance: none;
}
@media only screen and (-Webkit-min-device-pixel-ratio: 1.5), only screen and (-moz-min-device-pixel-ratio: 1.5), only screen and (-o-min-device-pixel-ratio: 3/2), only screen and (min-device-pixel-ratio: 1.5) { 
	.selectnav {
	    background-image: url(style/images/dropdown-arrow@2x.png)
	}
}
/*-----------------------------------------------------------------------------------*/
/*	INTRO
/*-----------------------------------------------------------------------------------*/
.intro p {
    font-weight: 300;
    font-size: 33px;
    line-height: 45px;
    padding: 0;
}
blockquote {
    font-weight: 300;
    font-size: 22px;
    line-height: 32px;
    padding-bottom: 20px;
}
.intro h1.title,
.page-title h1.title {
    font-weight: 300;
    font-size: 33px;
    line-height: 45px;
    padding: 0;
    text-transform: none;
    letter-spacing: 0.2px;
    margin: 0;
}
/*-----------------------------------------------------------------------------------*/
/*	ISOTOPE PORTFOLIO GRID
/*-----------------------------------------------------------------------------------*/
#portfolio {
    overflow: hidden;
    margin-bottom: 5px;
}
.items {
    width: 110%;
    clear: both;
}
.items li {
    float: left;
    position: relative;
    background: none;
    padding: 0;
}
.items.col4 {
    margin-right: -4px
}
.items.col4 li {
    margin: 0 4px 4px 0;
    width: 257px;
}
.items li img {
    display: block
}
.items:after {
    content: '';
    display: block;
    height: 0;
    clear: both;
    visibility: hidden;
}
.items li a,
.items li a img {
    display: block;
    position: relative;
}
.items li a {
    overflow: hidden
}
.items li a div {
    position: absolute;
    background: rgba(0,0,0,0.8) url(style/images/image-hover.png) repeat;
    width: 100%;
    height: 100%;
}
.items li a div h5 {
    display: block;
    padding: 10px 0;
    margin: 63px 20px 20px 20px;
    text-transform: uppercase;
    font-weight: normal;
    color: #e9e9e9;
    font-weight: 400;
    text-align: center;
    text-shadow: 0px 1px 0px rgba(0,0,0,0.75);
}
.items li a div h5 span {
    font-size: 12px;
    display: block;
    color: #ababab;
    font-weight: 400;
    text-transform: none;
    letter-spacing: 0.2px;
    margin-top: 5px;
}
#portfolio {
    padding-top: 4px
}
.filter {
    padding: 0;
    margin : 0 !important;
    margin-bottom: 30px !important;
    margin-top: -4px !important;
}
.filter li {
    margin: 0;
    background: none;
    display: inline;
    font-size: 12px;
    font-weight: 900;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    border: none;
    cursor: pointer;
    color: #616161;
    margin-left: 4px;
}
.filter li a:hover,
.filter li a.active {
    background-color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>;
    color: #FFF;
}
.filter li a {
    color: #616161;
    display: inline-block;
    background-color: #ebebeb;
    padding: 6px 20px 5px;
    margin-bottom: 4px;
}
/* FIREFOX FIX */
@-moz-document url-prefix() { 
	.filter li a {
	    padding: 5px 20px 6px
	}
}
.isotope-item {
    z-index: 2;
    display: block !important;
}
.isotope-hidden.isotope-item {
    pointer-events: none;
    z-index: 1;
}
.isotope,
.isotope .isotope-item {
    -webkit-transition-duration: 1s;
    -moz-transition-duration: 1s;
    -ms-transition-duration: 1s;
    -o-transition-duration: 1s;
    transition-duration: 1s;
}
.isotope {
    -webkit-transition-property: height, width;
    -moz-transition-property: height, width;
    -ms-transition-property: height, width;
    -o-transition-property: height, width;
    transition-property: height, width;
}
.isotope .isotope-item {
    -webkit-transition-property: -webkit-transform, opacity;
    -moz-transition-property: -moz-transform, opacity;
    -ms-transition-property: -ms-transform, opacity;
    -o-transition-property: top, left, opacity;
    transition-property: transform, opacity;
}
.isotope.no-transition,
.isotope.no-transition .isotope-item,
.isotope .isotope-item.no-transition {
    -webkit-transition-duration: 0s;
    -moz-transition-duration: 0s;
    -ms-transition-duration: 0s;
    -o-transition-duration: 0s;
    transition-duration: 0s;
}
/*-----------------------------------------------------------------------------------*/
/*	POST LIST
/*-----------------------------------------------------------------------------------*/
.grid-wrapper {
    overflow: hidden
}
.grid {
    width: 110%;
    margin-right: -50px;
    margin-bottom: -40px;
}
.grid .post {
    float: left;
    width: 495px;
    margin-right: 50px;
    margin-bottom: 40px;
    padding: 1px;
}
.grid .post .post-content {
    margin-left: 172px
}
.post h5 {
    margin: 0
}
.post h5 a,
.post h2 a {
    color: #707070
}
.post h5 a:hover,
.post h2 a:hover {
    color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>
}
.dark-wrapper .post .frame {
    background: #FFF;
    padding: 4px;
    box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.08);
    -webkit-box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.08);
}
.post .frame img {
    display: block
}
.grid .post .post-content p {
    padding-bottom: 10px
}
.post .post-content .meta,
.post .post-content .meta a {
    font-size: 12px;
    color: #a6a6a6;
}
.post .post-content .meta a:hover {
    color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>
}
.post .post-content .meta {
    margin-bottom: 10px
}
.post .post-content .meta .sep {
    margin: 0 3px
}
.share {
    margin-top: -5px;
    margin-bottom: -4px;
}
.share li {
    display: inline;
    margin-left: 4px;
}
.share li div {
    width: 80px;
    display: inline-block;
    padding: 5px 10px;
    text-align: center;
    text-transform: uppercase;
    font-weight: 900;
    font-size: 12px;
    color: #FFF;
    margin-bottom: 4px;
}
.share li div.like {
    background-color: #65779e;
    cursor: pointer;
}
.share li div.tweet {
    background-color: #7fc0e1;
    cursor: pointer;
}
.share li div.google {
    background-color: #626262;
    cursor: pointer;
}
.share li div.pinterest {
    background-color: #e6e5e5;
    color: #c65044;
    cursor: pointer;
}
/*-----------------------------------------------------------------------------------*/
/*	CLIENTS
/*-----------------------------------------------------------------------------------*/
.client-list {
    padding: 1px;
    width: 110%;
    margin-right: -17px;
    margin-bottom: -17px;
}
.client-list .frame {
    background: #FFF;
    padding: 4px;
    box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.08);
    -webkit-box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.08);
    width: 194px;
    margin-right: 17px;
    margin-bottom: 17px;
    display: block;
    float: left;
}
.client-list .frame img {
    background: #f9f9f9
}
/*-----------------------------------------------------------------------------------*/
/*	BLOG
/*-----------------------------------------------------------------------------------*/
.content {
    width: 730px;
    float: left;
}
.blog_content .post , .content .post , .post_content .post{
    clear: both;
    background: transparent url(style/images/line.png) left bottom repeat-x;
    padding-bottom: 50px;
    margin-bottom: 50px;
}
.blog_content .post .post-content, .content .post .post-content {
  /*  margin-left: 280px; */
    padding-left: 30px;
    overflow: hidden;
}
.blog_content.full .post .post-content {
    padding-left: 0
}
.blog_content.full .post .frame, .post_content.full .post .frame, .post_content.full .post .video ,
.blog_content.full .post .video {
	overflow: hidden;
    margin-bottom: 25px;
}
.blog_content .post img {
    width: 100%;
}
.blog_content.full .post img {
    width: 100%;
}

.blog_content .frame.alignleft {
	margin-bottom:0;
}

.post_content .sharingwrapper{
	margin-bottom:0 !important;
}

.post_content .sharingwrapper .share{
	padding-bottom:0 !important;
}

/*-----------------------------------------------------------------------------------*/
/*	RELATED
/*-----------------------------------------------------------------------------------*/
.grid-wrapper {
    overflow: hidden
}
.post_content .related:after {
    content: '';
    display: block;
    height: 0;
    clear: both;
    visibility: hidden;
}
.post_content .related {
    width: 110%;
    margin-right: -29px;
    overflow: hidden;
  /*  background: transparent url(style/images/line.png) left bottom repeat-x;
    padding-bottom: 50px;
    margin-bottom: 50px; */
}
.post_content .related .post {
    width: 224px;
    float: left;
    clear: none;
    background: none;
    padding: 0;
    margin: 0 29px 0 0;
}
.post_content .related h2 {
    font-size: 14px
}

.post_content .post-content {
	padding-left: 0 !important;
}
/*-----------------------------------------------------------------------------------*/
/*	SIDEBAR
/*-----------------------------------------------------------------------------------*/
.sidebar {
    width: 260px;
    float: right;
}
.sidebox {
    background: transparent url(style/images/line.png) left top repeat-x;
    padding-top: 50px;
    margin-top: 30px;
    overflow: hidden;
}
.sidebox h3 {
    font-size: 14px;
    margin-bottom: 15px;
}
.sidebox:first-child {
    background: none;
    margin: 0;
    padding: 0;
}
/*-----------------------------------------------------------------------------------*/
/*	POPULAR POSTS
/*-----------------------------------------------------------------------------------*/
.post-list {
    padding: 0
}
.post-list li {
    clear: both;
    margin-bottom: 15px;
    display: block;
    overflow: hidden;
}
.post-list h6 {
    font-size: 13px;
    line-height: 22px;
    margin: 0;
    font-weight: normal;
    text-transform: none;
    letter-spacing: 0.2px;
}
.post-list h6 a {
    color: #797979
}
.post-list h6 a:hover {
    color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>
}
.post-list .frame {
    float: left;
    width: 70px;
    height: 70px;
}
.post-list .meta {
    margin-left: 80px;
    overflow: hidden;
}
.post-list .meta em {
    font-size: 12px;
    color: #a6a6a6;
    font-style: normal;
}
/*-----------------------------------------------------------------------------------*/
/*	WIDGETS
/*-----------------------------------------------------------------------------------*/
.widget_calendar {
    
}
#wp-calendar {
    width: 100%;
}
#wp-calendar caption {
    text-align: left;
    font-size: 12px;
    margin-top: 10px;
    margin-bottom: 15px;
}
#wp-calendar thead {
    font-size: 11px
}
#wp-calendar thead th {
    padding-bottom: 10px
}
#wp-calendar tbody {
   
}
#wp-calendar tbody td {
    background: #f9f9f9;
    border: 1px solid #FFF;
    text-align: center;
    padding: 8px;
}
#wp-calendar tbody td:hover {
    background: #e7e7e7
}
#wp-calendar tbody .pad,
#wp-calendar tbody .pad:hover {
    background: none
}
#wp-calendar tfoot #next {
    font-size: 10px;
    text-transform: uppercase;
    text-align: right;
}
#wp-calendar tfoot #prev {
    font-size: 10px;
    text-transform: uppercase;
    padding-top: 10px;
}
footer #wp-calendar tbody td {
    background: #3a3a3a;
    border: 1px solid #444;
    text-align: center;
    padding: 8px;
}
footer #wp-calendar tbody td:hover {
    background: #303030
}
footer #wp-calendar tbody .pad,
footer #wp-calendar tbody .pad:hover {
    background: none
}
footer .widget .wp-caption {
	background: #3a3a3a;
	max-width: 96%;
	border: none;
	padding: 5px 2px 10px 5px;
	text-align: center;
}
.sidebar .widget .wp-caption {
	background: #f9f9f9;
	max-width: 96%;
	border: none;
	padding: 5px 2px 10px 5px;
	text-align: center;
}
.widget_rss .rss-date {
	display:block;
	color: #949494;
	font-size: 11px;
}
.widget_rss ul li {
	margin-top: 20px;
}
.widget_rss ul li:first-child {
	margin-top: none;
}
.widget {
	padding-bottom: 20px;
}
footer .widget {
	/*padding-bottom: 40px; */
}
.widget .searchform input {
	margin:0;
}
footer .widget .searchform input {
	background: #3a3a3a;
	color: #d9d9d9;
	border-color: #363636;
}
footer .widget .searchform input:focus {
    border-color: #303030;
}
.widget .menu ul {
    font-weight: normal;
    margin: 0;
    letter-spacing: 0.2px;
}
.widget .menu ul li {
	margin: 0;
	display: block;
}
.widget .menu ul li a {
    text-transform: none;
    font-size: 14px;
    color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>;
}
.widget .menu ul li ul li a {
	font-size: 14px;
	color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>;
}
.widget .sub-menu {
	padding-left: 20px;
}
.widget .menu ul li.active a,
.widget .menu ul li a:hover,
.widget .menu ul li a.selected,
.widget .menu ul li.active ul li a,
.widget .menu ul li.active ul li a:hover {
    color: #<?php echo $themeoptions["tb_longwave_highlight_hover_color"]; ?>
}
footer .widget .menu ul li a,
footer .widget .menu ul li ul li a {
    color: #d9d9d9;
}
footer .widget .menu ul li.active a,
footer .widget .menu ul li a:hover,
footer .widget .menu ul li a.selected,
footer .widget .menu ul li.active ul li a,
footer .widget .menu ul li.active ul li a:hover {
    color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>;
}
/*-----------------------------------------------------------------------------------*/
/*	PAGE NAVIGATION
/*-----------------------------------------------------------------------------------*/
.page-navi ul {
    list-style: none
}
.page-navi ul li {
    display: inline;
    background: none;
    padding: 0;
}
.page-navi ul li a {
    color: #616161;
    display: inline-block;
    background-color: #ebebeb;
    padding: 5px 15px;
    text-align: center;
    font-size: 12px;
    font-weight: 900;
    letter-spacing: 1.5px;
    text-transform: uppercase;
}
.page-navi ul li a:hover,
.page-navi ul li a.current {
    background-color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>;
    color: #FFF;
}
/*-----------------------------------------------------------------------------------*/
/*	COMMENTS
/*-----------------------------------------------------------------------------------*/
#comments {
    margin: 0;
    margin-bottom: 50px;
    margin-top: 50px;
   }
#comments ol.commentlist {
    list-style: none;
    margin: -5px 0 0 0;
}
#comments ol.commentlist li {
    padding: 20px 0 0 0;
    background: none;
}
#comments .user {
    float: left;
    width: 70px;
    height: 70px;
    margin-right: 20px;
}
#comments .message {
    overflow: hidden;
    padding: 15px 20px 0 20px;
    background-color: #f9f9f9;
    border: 1px solid #e7e7e7;
    position: relative;
}
#comments ul.children {
    margin: 0;
    overflow: inherit;
    padding: 0 0 0 55px;
}
#comments ol.commentlist ul.children li {
    padding-right: 0;
    border: none;
}
#comments .info h2 {
    font-size: 12px;
    margin: 0;
    display: inline;
    margin-right: 5px;
}
#comments .info {
    margin-bottom: 12px
}
#comments .info h2 a {
    color: #505050
}
#comments .info h2 a:hover {
    color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>
}
#comments .info .meta {
    font-size: 11px;
    color: #999999;
    display: inline;
}
#comments .info .meta:before {
    content: "-";
    display: inline-block;
    margin-right: 10px;
}
#comments a.comment-reply-link {
    position: absolute;
    right: 20px;
    top: 20px;
    line-height: 1;
    font-size: 9px;
    color: #707070;
    text-transform: uppercase;
}
#comments a.comment-reply-link:hover {
    color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>
}
.comment-form-wrapper {
    margin-top: 50px
}
/*-----------------------------------------------------------------------------------*/
/*	DIRECTION AWARE HOVER ON FRAME
/*-----------------------------------------------------------------------------------*/
.frame a,
.frame a img {
    display: block;
    position: relative;
}
.frame a {
    overflow: hidden
}
.frame a div {
    position: absolute;
    background: rgba(0,0,0,0.8) url(style/images/image-hover.png) repeat;
    width: 100%;
    height: 100%;
}
.frame a div:before {
    font-family: 'fontello';
    font-style: normal;
    font-weight: normal;
    speak: none;
    display: inline-block;
    text-decoration: inherit;
    position: absolute;
    width: 30px;
    height: 30px;
    text-align: center;
    content: '\f517';
    padding-top: 3px;
    font-size: 16px;
    color: #FFF;
    top: 50%;
    left: 50%;
    margin: -15px 0 0 -15px;
    text-shadow: 0px 1px 0px rgba(0,0,0,0.75);
}
.content.full .frame a div:before {
    font-size: 21px
}
.content.full .related .frame a div:before {
    font-size: 16px
}
.items li div.da-animate,
.frame a div.da-animate {
    -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}
.da-slideFromTop {
    left: 0px;
    top: -100%;
}
.da-slideFromBottom {
    left: 0px;
    top: 100%;
}
.da-slideFromLeft {
    top: 0px;
    left: -100%;
}
.da-slideFromRight {
    top: 0px;
    left: 100%;
}
.da-slideTop {
    top: 0px;
}
.da-slideLeft {
    left: 0px;
}
/*-----------------------------------------------------------------------------------*/
/*	PORTFOLIO POST
/*-----------------------------------------------------------------------------------*/
.portfolio-content.two-col .image {
    width: 730px
}
.portfolio-content.two-col .details {
    width: 260px
}
.portfolio-content .item {
    margin-bottom: 80px;
    clear: both;
    display: block;
    overflow: hidden;
}
.portfolio-content .item:last-child {
    margin: 0px
}
.portfolio-content .details ul li strong {
    margin-right: 3px
}
/*-----------------------------------------------------------------------------------*/
/*	PORTFOLIO NAVIGATION
/*-----------------------------------------------------------------------------------*/
.navigation {
    margin-top: 6px
}
.navigation a i {
    background: #ebebeb;
    width: 34px;
    height: 34px;
    display: block;
    text-align: center;
    color: #8e8e8e;
    float: left;
    margin-left: 4px;
    font-size: 15px;
    padding-top: 4px;
    -webkit-transition: all 200ms ease-in;
    -o-transition: all 200ms ease-in;
    -moz-transition: all 200ms ease-in;
}
.navigation a:hover i {
    background-color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>;
    color: #FFF;
}
.navigation a .icon-left-open-1 {
    padding-right: 1px
}
.navigation a .icon-right-open-1 {
    padding-left: 1px
}
.navigation a .icon-th {
    font-size: 20px;
    padding-top: 4px;
    width: 35px;
    padding-left: 1px;
}
/* FIREFOX FIX */
@-moz-document url-prefix() { 
	.navigation a .icon-right-open-1 {
	    padding-left: 2px
	}
}
/*-----------------------------------------------------------------------------------*/
/*	FOOTER
/*-----------------------------------------------------------------------------------*/
i.contact {
    margin-right: 8px;
    color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>;
}
.footer-wrapper,
.footer-wrapper a {
    color: #d9d9d9
}
.footer-wrapper a:hover {
    color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>
}
.widget .tagcloud {
    line-height: 28px
}
/*-----------------------------------------------------------------------------------*/
/*	TWITTER
/*-----------------------------------------------------------------------------------*/
.twitter em {
    font-style: normal;
    font-size: 11px;
}
.twitter em a {
    color: #999
}
.twitter em a:hover {
    color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>
}
.twitter ul {
    padding: 0;
    margin-bottom: -20px;
}
.twitter ul li {
    position: relative;
    margin-bottom: 20px;
}
.twitter ul li {
    word-wrap: break-word;
}
.twitter ul li .twitterStatus,
.twitter ul li .twitterTime {
    margin-left: 20px;
    display: block;
}
.twitter ul li:before {
    font-family: 'fontello-social';
    font-style: normal;
    font-weight: normal;
    speak: none;
    display: block;
    text-decoration: inherit;
    content: '\f309';
    font-size: 12px;
    color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>;
    position: absolute;
    top: 0;
    left: 0;
}
/*-----------------------------------------------------------------------------------*/
/*	DRIBBBLE
/*-----------------------------------------------------------------------------------*/
ul.dribbble.feed {
    width: 110%;
    margin-right: -6px;
    margin-bottom: -6px;
}
ul.dribbble.feed li {
    width: 75px;
    margin-right: 6px;
    margin-bottom: 6px;
    padding: 4px;
    background: #303030;
    float: left;
}
/*-----------------------------------------------------------------------------------*/
/*	SUBFOOTER
/*-----------------------------------------------------------------------------------*/
.subfooter-wrapper,
.subfooter-wrapper a {
    color: #d9d9d9
}
.subfooter-wrapper a:hover {
    color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>
}
.subfooter-wrapper a:hover {
    color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>
}

.subfooter-left {
	float: left;
}

.subfooter-right {
	float: right;
}

/*-----------------------------------------------------------------------------------*/
/*	SOCIAL ICONS
/*-----------------------------------------------------------------------------------*/
.social {
    float: right;
    padding: 0;
    font-size: 15px;
}
.social.team {
    float: none;
    margin-bottom: 20px;
}
.social li {
    display: inline;
    font-family: 'fontello-social';
    margin-left: 6px;
}
.social.team li {
    margin: 0 6px 0 0
}
.social a i {
    color: #4c4c4c;
    background-color: #FFF;
    width: 31px;
    height: 31px;
    -webkit-border-radius: 31px;
    border-radius: 31px;
    padding-top: 4px;
    padding-left: 1px;
    display: inline-block;
    text-align: center;
    -webkit-transition: all 200ms ease-in;
    -o-transition: all 200ms ease-in;
    -moz-transition: all 200ms ease-in;
}
.social.team a i {
    background-color: #ededed
}
/* WEBKIT FIX */
@media screen and (-webkit-min-device-pixel-ratio:0) { 
	.social a i {
	    padding-left: 0
	}
}
.social .icon-s-rss {
    padding-top: 3px
}
.social a:hover .icon-s-pinterest {
    color: #c53942
}
.social a:hover .icon-s-rss {
    color: #e86f04
}
.social a:hover .icon-s-facebook {
    color: #4470cf
}
.social a:hover .icon-s-twitter {
    color: #5daed5
}
.social a:hover .icon-s-flickr {
    color: #ff0088
}
.social a:hover .icon-s-dribbble {
    color: #d07ead
}
.social a:hover .icon-s-behance {
    color: #098ffa
}
.social a:hover .icon-s-linkedin {
    color: #3393c1
}
.social a:hover .icon-s-vimeo {
    color: #099fc7
}
.social a:hover .icon-s-youtube {
    color: #c8312b
}
.social a:hover .icon-s-skype {
    color: #2ebbf0
}
.social a:hover .icon-s-tumblr {
    color: #5d82a4
}
.social a:hover .icon-s-delicious {
    color: #3274d1
}
.social a:hover .icon-s-500px {
    color: #00a6df
}
.social a:hover .icon-s-grooveshark {
    color: #f66c00
}
.social a:hover .icon-s-forrst {
    color: #2f7935
}
.social a:hover .icon-s-digg {
    color: #1b5891
}
.social a:hover .icon-s-blogger {
    color: #fc6605
}
.social a:hover .icon-s-klout {
    color: #d8390f
}
.social a:hover .icon-s-dropbox {
    color: #016aab
}
.social a:hover .icon-s-github {
    color: #4073a6
}
.social a:hover .icon-s-songkick {
    color: #ff0030
}
.social a:hover .icon-s-posterous {
    color: #eac954
}
.social a:hover .icon-s-appnet {
    color: #0291c9
}
.social a:hover .icon-s-gplus {
    color: #a84539
}
.social a:hover .icon-s-stumbleupon {
    color: #eb4923
}
.social a:hover .icon-s-lastfm {
    color: #be0c02
}
.social a:hover .icon-s-spotify {
    color: #7cc011
}
.social a:hover .icon-s-instagram {
    color: #a4765c
}
.social a:hover .icon-s-evernote {
    color: #82d15c
}
.social a:hover .icon-s-paypal {
    color: #2a608e
}
.social a:hover .icon-s-picasa {
    color: #9864ae
}
.social a:hover .icon-s-soundcloud {
    color: #ff680d
}
/*-----------------------------------------------------------------------------------*/
/*	FORMS
/*-----------------------------------------------------------------------------------*/
.forms , .wpcf7-form {
    position: relative;
    padding: 0;
    width: 100%;
}
.form-container .response {
    display: none;
    margin: 0 0 15px 0;
    background: #d1f7b6;
    border: 1px solid #8bca61;
    color: #5e9537;
    padding: 10px 15px;
}
.forms ol , .wpcf7-form ol {
    margin: 0;
    padding: 0;
}
.forms ol li , .wpcf7-form  ol li{
    line-height: auto;
    list-style: none;
}
.forms li.form-row , .wpcf7-form li.form-row {
    margin-bottom: 15px
}
.forms li.hidden-row , .wpcf7-form li.hidden-row{
    display: none
}
.forms fieldset .text-input, .wpcf7-form input, .wpcf7-form textarea,
.forms fieldset .text-area,
.searchform input,
#comment-form input,
#comment-form textarea {
    background-color: #f9f9f9;
    margin: 0;
    border: 1px solid #e7e7e7;
    height: 35px;
    line-height: 1;
    padding: 3px 10px 5px;
    color: #797979;
    resize: none;
    -webkit-transition: all 200ms ease-in;
    -o-transition: all 200ms ease-in;
    -moz-transition: all 200ms ease-in;
}
.forms fieldset .text-input:focus, .wpcf7 input:focus,
.forms fieldset .text-area:focus, .wpcf7 textarea:focus,
.searchform input:focus,
#comment-form input:focus,
#comment-form textarea:focus {
    border: 1px solid #d4d4d4
}
.forms fieldset .text-area, .wpcf7 textarea,
#comment-form textarea {
    min-height: 200px;
    padding: 10px;
    resize: vertical;
}
.searchform input {
    margin-bottom: 20px
}
.forms li.error input,
.forms li.error textarea {
    border: 1px solid #d18282
}
.forms input.btn-submit, .wpcf7 textarea input.btn-submit {
    height: 35px;
    margin-top: -5px;
}
#comment-form input.btn-submit {
    padding-bottom: 5px
}
.forms span.error {
    display: none
}
.forms .button-row span.error {
    padding: 0;
    display: none;
}
.forms label {
    display: block;
    float: left;
    width: 95px;
    padding-top: 7px;
    font-size: 13px;
    clear: both;
}
.forms fieldset .text-input-row , .wpcf7 .text-input-row ,
#comment-form div.name-field,
#comment-form div.email-field,
#comment-form div.website-field {
    position: relative;
    width: 32%;
    float: left;
    margin-right: 2%;
    margin-bottom: 15px;
}
.forms fieldset .text-input-row.subject-field, .wpcf7 .last ,
#comment-form div.website-field {
    margin-right: 0
}
#comment-form div.message-field {
    margin-bottom: 10px
}
#comment-form div label {
    position: absolute;
    top: 0;
    left: 0;
}
.form-container:after {
    content: '';
    display: block;
    height: 0;
    clear: both;
    visibility: hidden;
}
/*-----------------------------------------------------------------------------------*/
/*	TABS
/*-----------------------------------------------------------------------------------*/
.etabs {
    margin: 0;
    padding: 0;
    overflow: inherit;
}
.tab {
    margin: 0;
    padding: 0;
    display: inline-block;
    zoom: 1;
    *display: inline;
    background: #f9f9f9;
    border: 1px solid #e7e7e7;
    border-bottom: none;
    top: 1px;
    position: relative;
    z-index: 1;
    margin-right: 4px;
}
.tab a {
    display: block;
    padding: 7px 17px;
    font-size: 12px;
    font-weight: 900;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: #616161;
}
.tab a.active,
.tab a:hover {
    color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>
}
.tab.active {
    background: #fff;
    position: relative;
    z-index: 3;
}
.tab-container .panel-container {
    border-top: 1px solid #e7e7e7;
    position: relative;
    z-index: 1;
}
.tab-container .panel-container div {
    padding: 20px 0 0 0
}
/*-----------------------------------------------------------------------------------*/
/*	TOGGLE
/*-----------------------------------------------------------------------------------*/
.toggle {
    width: 100%;
    padding-bottom: 15px;
    clear: both;
}
.toggle h4.title {
    cursor: pointer;
    color: #616161;
    background-color: #f5f5f5;
    margin: 0;
    padding: 10px 15px;
    font-size: 12px;
    -webkit-transition: all 200ms ease-in;
    -o-transition: all 200ms ease-in;
    -moz-transition: all 200ms ease-in;
}
.toggle h4.title:hover,
.toggle h4.title.active {
    background-color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>;
    color: #FFF;
}
.togglebox {
    height: auto;
    overflow: hidden;
    margin: 0;
    background-color: #f5f5f5;
}
.togglebox div {
    padding: 15px 15px 0 15px
}
/*-----------------------------------------------------------------------------------*/
/*	TESTIMONIALS
/*-----------------------------------------------------------------------------------*/
ul.testimonials li {
    position: relative;
    clear: both;
    margin-bottom: 55px;
}
ul.testimonials li .quote {
    background-color: #f5f5f5;
    padding: 20px 20px 0 20px;
    margin-bottom: 20px;
}
ul.testimonials li .author {
    font-weight: 900;
    text-transform: uppercase;
    font-size: 11px;
}
ul.testimonials li.odd .author {
    float: right
}
ul.testimonials li.even .author {
    float: left
}
ul.testimonials li.odd .quote:after {
    border-color: #ebebeb transparent;
    border-style: solid;
    border-width: 20px 0 0 20px;
    bottom: -20px;
    content: "";
    display: block;
    position: absolute;
    width: 0;
    right: 30px;
}
ul.testimonials li.even .quote:after {
    border-color: #ebebeb transparent;
    border-style: solid;
    border-width: 20px 20px 0 0;
    bottom: -20px;
    content: "";
    display: block;
    position: absolute;
    width: 0;
    left: 30px;
}
/*-----------------------------------------------------------------------------------*/
/*	PROGRESS BAR
/*-----------------------------------------------------------------------------------*/
.progress-bar li p {
    padding-bottom: 5px;
}
.progress-bar li  {
    margin-bottom: 20px;
}
.progress-bar li em {
    padding-left: 8px;
    color: #a6a6a6;
}
.progress-bar li em:before {
    content: "-";
    padding-right: 10px;
    display: inline-block;
}
.meter {
    height: 15px;
    position: relative;
    background: #f5f5f5;
}
.meter > span {
    display: block;
    height: 100%;
    background-color: #<?php echo $themeoptions["tb_longwave_highlight_color"]; ?>;
    position: relative;
    overflow: hidden;
}
.animate > span:after {
    display: none
}
@-webkit-keyframes move { 
	0% {
	    background-position: 0 0
	}
	100% {
	    background-position: 50px 50px
	}
}
/*-----------------------------------------------------------------------------------*/
/*	DETAILVIEW
/*-----------------------------------------------------------------------------------*/
.navfake {
    z-index: 1005;
    position: fixed;
    width: 100%;
    top: 0px;
    left: 100%;
    background: #fff;
}
.navcoverpage {
    z-index: 1000;
    position: fixed;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 100%;
    background-color: #fff;
    left: 100%;
}
/* SOME HELPER CLASS FOR ANIMATING */
.fullcontent-slider-getaway-wrapper {
    width: 100%;
    position: absolute;
    top: 0px;
    left: 0px;
    overflow: visible;
}
.fullcontent-slider-getaway-slide {
    width: 100%;
    position: absolute;
    top: 0px;
    left: 0px;
}
.fullcontent-content-wrapper-new {
    width: 100%;
    position: absolute;
    top: 0px;
    left: 0px;
}
.preparedtostart.fullcontent-content-wrapper-new {
    z-index: 1002
}
.preparedtoleave.fullcontent-content-wrapper-new {
    z-index: 1001
}
.fullcontent-content-wrapper-new.right {
    left: 100%
}
.fullcontent-content-wrapper-new.left {
    left: -100%
}
.fullcontent-content-wrapper-new.right.fader,
.fullcontent-content-wrapper-new.left.fader {
    left: 0px;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
    /* IE 5-7 */
    filter: alpha(opacity=0); /* Netscape */
    -moz-opacity: 0;
    /* Safari 1.x */
    -khtml-opacity: 0;
    /* Good browsers */
    opacity: 0;
}
.novisibility {
    visibility: hidden
}
/*-----------------------------------------------------------------------------------*/
/*	BOX LAYOUT
/*-----------------------------------------------------------------------------------*/
.box-layout {
	padding: 50px 0;
	background: transparent url(<?php echo $themeoptions["tb_longwave_body_background_image"];?>) repeat fixed;
}
.box-layout .body-wrapper {
	width: 1140px;
	margin: 0 auto;
	-webkit-box-shadow: 0 0 3px 0 rgba(0,0,0,0.17);
	-moz-box-shadow: 0 0 3px 0 rgba(0,0,0,0.17);
	box-shadow: 0 0 3px 0 rgba(0,0,0,0.17);
}
.box-layout .fullcontent-slider-getaway-wrapper { 
	max-width:1140px; 
	width:100%;
	top:auto;
	left:auto;
}


.isotope.no-transition,
.isotope.no-transition .isotope-item,
.isotope .isotope-item.no-transition {
  -webkit-transition-duration: 0s;
     -moz-transition-duration: 0s;
      -ms-transition-duration: 0s;
       -o-transition-duration: 0s;
          transition-duration: 0s;
}
/*-----------------------------------------------------------------------------------*/
/*	WPML
/*-----------------------------------------------------------------------------------*/
img.iclflag {display:inline;}
#menu .iclflag{display:none;}
#lang_sel {position:absolute}

/*-----------------------------------------------------------------------------------*/
/*	CUSTOM CSS VIA OPTIONS
/*-----------------------------------------------------------------------------------*/
<?php echo $themeoptions["tb_longwave_css"]; ?>