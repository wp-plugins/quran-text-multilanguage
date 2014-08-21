<?php
/*
Plugin Name: Quran Multilanguage Text Audio Verse
Description: Quran Text Multilanguage translated into 22 languages.You can change the background color and text color.audio of each verse is added, you can choose the reciter in the administration of the plugin.To listen to audio, just click the number of the verse.
Version: 1.2.7
Author: Karim Bahmed
Author URI: http://gp-codex.fr
*/
session_start() ;
function quran_menu(){
     add_options_page('Quran  Multilanguage', 'Quran  Multilanguage', 'manage_options', 'quran-menu', 'quran_options');
	//call register settings function
	add_action( 'admin_init', 'register_options' );
	 }
add_action('admin_menu','quran_menu');


function register_options() {
//register our settings
	register_setting( 'quran-options', 'quran_recitator');
	register_setting( 'quran-options', 'quran_languages' );
	register_setting( 'quran-options', 'text_quran_title' );	
	register_setting( 'quran-options', 'background_quran_title' );	
	register_setting( 'quran-options', 'verse_quran_number' );	
	register_setting( 'quran-options', 'text_quran_trans' );	
	register_setting( 'quran-options', 'background_quran_trans' );
	register_setting( 'quran-options', 'color_quran_number' );	
	register_setting( 'quran-options', 'background_quran_number' );	
	register_setting( 'quran-options', 'background_quran_trans' );
	register_setting( 'quran-options', 'text_quran_arabic' );	
	register_setting( 'quran-options', 'background_quran_arabic' );
} 


function quran_options(){
     include('admin/quran-admin.php');
} 

//COPY TITLE SURA IN BDD
function quran_install(){

global $wpdb;

   $sql = "
CREATE TABLE IF NOT EXISTS `quran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) NOT NULL,
  `nom_id` int(11) NOT NULL,
  `url` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=115 ;
INSERT INTO `quran` (`id`, `nom`, `nom_id`, `url`) VALUES
(1, '002. Al-Baqarah', 2, 'al-baqarah'),
(2, '004. An-Nisa', 4, 'an-nisa'),
(3, '005. Al-Maidah', 5, 'al-maidah'),
(4, '006. Al-Anam', 6, 'al-anam'),
(5, '007. Al-Araf', 7, 'al-araf'),
(6, '008. Al-Anfal', 8, 'al-anfal'),
(7, '009. At-Tawbah', 9, 'at-tawbah'),
(8, '010. Yunes', 10, 'yunes'),
(9, '011. Hud', 11, 'hud'),
(10, '012. Youssouf', 12, 'youssouf'),
(11, '013. Ar-Rad', 13, 'ar-rad'),
(12, '014. Ibrahim', 14, 'ibrahim'),
(13, '015. Al-Hijr', 15, 'al-hijr'),
(14, '016. An-Nahl', 16, 'an-nahl'),
(15, '017. Al-Isra', 17, 'al-isra'),
(16, '018. Al-Kahf', 18, 'al-kahf'),
(17, '019. Maryam', 19, 'maryam'),
(18, '020. Ta-Ha', 20, 'ta-ha'),
(19, '021. Al-Anbiya', 21, 'al-anbiya'),
(20, '022. Al-Hajj', 22, 'al-hajj'),
(21, '023. Al-Mouminoune', 23, 'al-mouminoune'),
(22, '024. An-Nour', 24, 'an-nour'),
(23, '025. Al-Furqane', 25, 'al-furqane'),
(24, '026. Ash-Shuara', 26, 'ash-shuara'),
(25, '027. An-Naml', 27, 'an-naml'),
(26, '028. Al-Qasas', 28, 'al-qasas'),
(27, '030. Ar-Rum', 30, 'ar-rum'),
(28, '031. Luqman', 31, 'luqman'),
(29, '032. As-Sajda', 32, 'as-sajda'),
(30, '033. Al-Ahzab', 33, 'al-ahzab'),
(31, '034. Saba', 34, 'saba'),
(32, '035. Fatir', 35, 'fatir'),
(33, '036. Ya-Sin', 36, 'ya-sin'),
(34, '037. As-Saffat', 37, 'as-saffat'),
(35, '038. Sad', 38, 'sad'),
(36, '039. Az-Zumar', 39, 'az-zumar'),
(37, '040. Ghafir', 40, 'ghafir'),
(38, '041. Fussilat', 41, 'fussilat'),
(39, '042. Ash-shoura', 42, 'ash-shoura'),
(40, '044. Ad-Dukhan', 44, 'ad-dukhan'),
(41, '046. Al-Ahqaf', 46, 'al-ahqaf'),
(42, '047. Muhammad', 47, 'muhammad'),
(43, '048. Al-Fath', 48, 'al-fath'),
(44, '049. Al. Hujurat', 49, 'al-hujurat'),
(45, '050. Qaf', 50, 'qaf'),
(46, '051. Ad-Dariyat', 51, 'ad-dariyat'),
(47, '052. At-Tur', 52, 'at-tur'),
(48, '054. Al-Qamar', 54, 'al-qamar'),
(49, '055. Ar-Rahman', 55, 'ar-rahman'),
(50, '057. Al-Hadid - le fer', 57, 'al-hadid'),
(51, '058. Al-Mujadalah', 58, 'al-mujadalah'),
(52, '059. Al-Hashr', 59, 'al-hashr'),
(53, '061. As-Saff', 61, 'as-saff'),
(54, '062. Al-Jumua', 62, 'al-jumua'),
(55, '063. Al-Munafiqun', 63, 'al-munafiqun'),
(56, '064. At-Tagabun', 64, 'at-tagabun'),
(57, '065. At-Talaq', 65, 'at-talaq'),
(58, '067. Al-Mulk', 67, 'al-mulk'),
(59, '068. Al-Qalam', 68, 'al-qalam'),
(60, '069. Al-Haqqah', 69, 'al-haqqah'),
(61, '070. Al-Ma arij', 70, 'al-ma-arij'),
(62, '071. Nuh', 71, 'nuh-noe'),
(63, '072. Al-Jinn', 72, 'al-jinn'),
(64, '073. Al-Muzzammil', 73, 'al-muzzammil'),
(65, '074. Al-Muddattir', 74, 'al-muddattir'),
(66, '075. Al-Qiyamah', 75, 'al-qiyamah'),
(67, '076. Al-Insan', 76, 'al-insan'),
(68, '077. Al-Mursalate', 77, 'al-mursalate'),
(69, '078. An-Naba', 78, 'an-naba'),
(70, '079. An-Naziate', 79, 'an-naziate'),
(71, '082. Al-Infitar', 82, 'al-infitar'),
(72, '083. Al-Mutaffifine', 83, 'al-mutaffifine'),
(73, '084. Al-Inshiqaq', 84, 'al-inshiqaq'),
(74, '085. Al-Buraj', 85, 'al-buraj'),
(75, '087. Al-Ala', 87, 'al-ala'),
(76, '089. Al-Fajr', 89, 'al-fajr'),
(77, '090. Al-Balad', 90, 'al-balad'),
(78, '091. Ash-Shams', 91, 'ash-shams'),
(79, '092. Al-Layl', 92, 'al-layl'),
(80, '093 .Ad-Duha', 93, 'ad-duha'),
(81, '095. At-Tin', 95, 'at-tin'),
(82, '097. Al-Qadr', 97, 'al-qadr'),
(83, '098. Al-Bayyinah', 98, 'al-bayyinah'),
(84, '099. Az-Zalzalah', 99, 'az-zalzalah'),
(85, '100. Al-Adiyate', 100, 'al-adiyate'),
(86, '101. Al-Qariah', 101, 'al-qariah'),
(87, '102. At-Takathur', 102, 'at-takafur'),
(88, '103. Al-Asr', 103, 'al-asr'),
(89, '104. Al-Humazah ', 104, 'al-humazah'),
(90, '105. Al-Fil', 105, 'al-fil'),
(91, '106. Quraysh', 106, 'quraysh'),
(92, '109. Al-Kafiroune', 109, 'al-kafiroune'),
(93, '110. An-Nasr', 110, 'an-nasr'),
(94, '111. Al-Masad', 111, 'al-masad'),
(95, '112. Al-Ikhlas', 112, 'al-ikhlas'),
(96, '113. Al-Falaq', 113, 'al-falaq'),
(97, '114. An-Nass', 114, 'an-nass'),
(98, '001. Al-Fatiha', 1, 'al-fatiha'),
(99, '003. Al-Imran', 3, 'al-imran'),
(100, '096 AL-ALAQ', 96, 'al-alaq'),
(101, '056 AL-WAQI', 56, 'al-waqi'),
(102, '043 AZZUKHRUF', 43, 'azzukhruf'),
(103, '045 AL-JATHYA', 45, 'al-jathya'),
(104, '053 AN-NAJM ', 53, 'an-najm'),
(105, '060 AL-MUMTAHANAH', 60, 'al-mumtahanah'),
(106, '066 AT-TAHRIM', 66, 'at-tahrim'),
(107, '080 ABASA', 80, 'abasa'),
(108, '081 AT-TAKWIR', 81, 'at-takwir'),
(109, '094 AS-SARH', 94, 'as-sarh'),
(110, '107 AL-MAUN', 107, 'al-maun'),
(111, '108 AL-KAWTAR', 108, 'al-kawtar'),
(112, '029 AL-ANKABUT', 29, 'al-ankabut'),
(113, '088 . AL-GASIYAH', 88, 'al-gasiyah'),
(114, '086.AT-TARIQ', 86, 'at-tariq');
";

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );

//DEFAUT OPTIONS COLORS
add_option( 'quran_languages', 'english', '', 'yes' );
add_option( 'text_quran_title', '000000', '', 'yes' );
add_option( 'background_quran_title', 'english', '', 'yes' );
add_option( 'verse_quran_number', 'english', '', 'yes' );
add_option( 'text_quran_trans', '000000', '', 'yes' );
add_option( 'background_quran_trans', 'FFFFFF', '', 'yes' );
add_option( 'text_quran_arabic', '000000', '', 'yes' );
add_option( 'background_quran_arabic', 'EFF0F0', '', 'yes' );
add_option( 'background_quran_number', '3A87AD', '', 'yes' );
add_option( 'color_quran_number', 'FFFFFF', '', 'yes' );
add_option('quran_recitator', 'Maher_al_me-aqly', '', 'yes');
}

function quran_uninstall(){

	// delete options
	delete_option('quran_recitator');	
	delete_option('quran_languages');
	delete_option('text_quran_title');
	delete_option('background_quran_title');
	delete_option('verse_quran_number');
	delete_option('text_quran_trans');
	delete_option('background_quran_trans');
	delete_option('text_quran_arabic');
	delete_option('background_quran_arabic');	
	delete_option('background_quran_number');		
	delete_option('color_quran_number');	
	// delete transients
	delete_transient('quran-options');
	 
	// delete custom tables
	global $wpdb;
	$table_name = 'quran';
	$wpdb->query("DROP TABLE IF EXISTS {$table_name}");

}


//ACTIVATION PLUGIN INSTALL
register_activation_hook(__FILE__,'quran_install'); 

//DELETE PLUGIN
register_uninstall_hook(__FILE__, 'quran_uninstall'); 

//SCRIPTS DU PLUGIN
function quran_scripts(){
    wp_register_script('quran_admin_color',plugin_dir_url( __FILE__ ).'admin/js/jscolor/jscolor.js');	
	wp_register_script('quran_soundmanager',plugin_dir_url( __FILE__ ).'js/soundmanager.js');	
    wp_register_script('quran_player',plugin_dir_url( __FILE__ ).'js/player.js');				
    wp_enqueue_script('quran_admin_color');
	wp_enqueue_script('quran_soundmanager');	
    wp_enqueue_script('quran_player');	
	wp_enqueue_script( 'jquery' );	
}
add_action('wp_enqueue_scripts','quran_scripts'); 
global $language;


function rendu_quran(){

if(isset($_GET['sourate'])){

	$urlSura = $_GET['sourate'];
	$sura = explode('_', $urlSura);
	$name_sura = $sura[0];
	$sura = $sura[1];

}
else {$sura = 1;}
	global $wpdb;
	$req_sourate = $wpdb->get_results( 
	"
	SELECT nom,nom_id,url
	FROM quran
	ORDER BY nom_id
	"
);
if(isset($_POST['select_language'])){
$_SESSION['select_language'] = $_POST['select_language'];
}
if(isset($_POST['cheikh_quran'])){
$_SESSION['cheikh_quran'] = $_POST['cheikh_quran'];
}
$myurl = get_permalink( $post->ID );

$findme   = '?';
$pos = strpos($myurl, $findme);
if ($pos !== false) {
$separateur = '&';
} else {
$separateur = '?';
}
?>

<div id="quran_main">
<script>
jQuery(function(){

      jQuery('#change_sura').bind('change', function () {
          var url = jQuery(this).val(); 
          if (url) { 
              window.location = url;
          }
          return false;
      });
	  
});
</script>

<style>
	.suraName {border-bottom: 1px solid #<?php echo get_option('background_quran_title'); ?>;text-align: center; font-size: 20px; padding: 10px 0px; background-color: #<?php echo get_option('background_quran_title'); ?>; margin-top: 7px;color:#<?php echo get_option('text_quran_title'); ?>;}
	.aya {margin:auto;background-color: #fff; border: 1px solid #fff; border-top: 0px;}
	.aya2 {width:38%;padding-top:5px;margin-left:100px;background-color: #fff; color:grey;height:40px;font-size:16px;float:left;}
	.aya1 {width:auto;margin:auto;margin-top:20px;}	
	.quran { padding: 10px;font-family: Traditional Arabic;color:#<?php echo get_option('text_quran_arabic'); ?>;border-right: 1px solid #<?php echo get_option('background_quran_arabic'); ?>;border-left: 1px solid #<?php echo get_option('background_quran_arabic'); ?>; font-size: 28px; direction: rtl;background-color:#<?php  echo get_option('background_quran_arabic');?>}
	.trans { font-family: Calibri;text-align:justify;border-right: 1px solid #<?php echo get_option('background_quran_trans'); ?>;border-left: 1px solid #<?php echo get_option('background_quran_trans'); ?>;border-bottom: 1px solid #<?php echo get_option('background_quran_trans');?>;border-top: 1px solid #<?php echo get_option('background_quran_trans'); ?>; color:#<?php echo get_option('text_quran_trans'); ?>;font-size: 16px; background-color: #<?php echo get_option('background_quran_trans'); ?>;}
	.tabSura{margin-top:20px;position:relative;width:auto;}
	.ayaNum{color:#<?php echo get_option('verse_quran_number'); ?>;}
	.sign {font-family: times new roman; font-size: 0.9em; color: #FB7600;}
	background-color: #f4f4ff; border: 1px solid #ccd; padding: 3px; font: 12px Verdana;}
	.upCoran{position:fixed;margin-left:990px;margin-top:20px;}
	.chooseSura{font-weight:bold;color:grey;margin-left:25px;font-size:20px;padding-top:7px;}
	#quran_main{float:left;width:100%}
	#select_language{padding-top:5px;height:40px;font-size:16px;float:right;margin-right:30px;}
	#audio_sura audio { width: 320px; margin-left:150px;margin-top:10px;}
	.quranbadge{float: right;margin-left:5px;padding:1px 8px 1px;font-size:20px;font-weight:bold;white-space:nowrap;color:#ffffff;background-color:#999999;-webkit-border-radius:9px;-moz-border-radius:9px;border-radius:9px;}
	.quranbadge-info{background-color:#<?php echo get_option('background_quran_number'); ?>;color:#<?php echo get_option('color_quran_number'); ?>}
	
	</style>
<form  class="aya1">

<select name="sourate" id="change_sura" class="aya2" '>

<?php
	foreach ( $req_sourate as $sourate ) 
	{
$sourate->nom = ltrim($sourate->nom, "0");
		echo '<option value="'.$myurl.''.$separateur.'sourate='.$sourate->url.'_'.$sourate->nom_id.'"';
	if($sura == $sourate->nom_id){ echo ' selected="selected">';}	
	else{
	
	echo '>';}	
		echo ''.ucwords(strtolower($sourate->nom)).'</option>';
	}

	if(get_option('quran_recitator') == "Maher_al_me-aqly"){$recitator = "Maheralmeaqly";$nbr = sprintf( "%03d", $sura );}
	if(get_option('quran_recitator') == "ElGhamidi"){$recitator = "ElGhamidi";$nbr = $sura ;}
	if(get_option('quran_recitator') == "Soudais"){$recitator = "Soudais";$nbr = sprintf( "%03d", $sura );}

?>


</select>
</form>
		<form method="post" id="select_language">
		<select name="select_language" onchange="this.form.submit()">
			<option disabled="disabled" selected="selected">Choose language</option>				
			<option value="english" <?php if($_SESSION['select_language'] == 'english'):echo 'selected="selected"';endif;?>>English</option>			
			<option value="francais" <?php if($_SESSION['select_language'] == 'francais'):echo 'selected="selected"';endif;?>>Français</option>
			<option value="german" <?php if($_SESSION['select_language'] == 'german'):echo 'selected="selected"';endif;?>>German</option>
			<option value="russian" <?php if($_SESSION['select_language'] == 'russian'):echo 'selected="selected"';endif;?>>Russian</option>	
			<option value="albanian" <?php if($_SESSION['select_language'] == 'albanian'):echo 'selected="selected"';endif;?>>Albanian</option>
			<option value="azerbaijani" <?php if($_SESSION['select_language'] == 'azerbaijani'):echo 'selected="selected"';endif;?>>Azerbaijani</option>
			<option value="bengali" <?php if($_SESSION['select_language'] == 'bengali'):echo 'selected="selected"';endif;?>>Bengali</option>			
			<option value="bulgarian" <?php if($_SESSION['select_language'] == 'bulgarian'):echo 'selected="selected"';endif;?>>Bulgarian</option>	
			<option value="bosnian" <?php if($_SESSION['select_language'] == 'bosnian'):echo 'selected="selected"';endif;?>>Bosnian</option>				
			<option value="chinese" <?php if($_SESSION['select_language'] == 'chinese'):echo 'selected="selected"';endif;?>>Chinese</option>
			<option value="czech" <?php if($_SESSION['select_language'] == 'czech'):echo 'selected="selected"';endif;?>>Czech</option>
			<option value="indonesian" <?php if($_SESSION['select_language'] == 'indonesian'):echo 'selected="selected"';endif;?>>Indonesian</option>
			<option value="italian" <?php if($_SESSION['select_language'] == 'italian'):echo 'selected="selected"';endif;?>>Italian</option>
			<option value="kurdish" <?php if($_SESSION['select_language'] == 'kurdish'):echo 'selected="selected"';endif;?>>Kurdish</option>
			<option value="malay" <?php if($_SESSION['select_language'] == 'malay'):echo 'selected="selected"';endif;?>>Malay</option>
			<option value="norwegian" <?php if($_SESSION['select_language'] == 'norwegian'):echo 'selected="selected"';endif;?>>Norwegian</option>
			<option value="portuguese" <?php if($_SESSION['select_language'] == 'portuguese'):echo 'selected="selected"';endif;?>>Portuguese</option>
			<option value="romanian" <?php if($_SESSION['select_language'] == 'romanian'):echo 'selected="selected"';endif;?>>Romanian</option>
			<option value="somali" <?php if($_SESSION['select_language'] == 'somali'):echo 'selected="selected"';endif;?>>Somali</option>
			<option value="spanish" <?php if($_SESSION['select_language'] == 'spanish'):echo 'selected="selected"';endif;?>>Spanish</option>	
			<option value="swedish" <?php if($_SESSION['select_language'] == 'swedish'):echo 'selected="selected"';endif;?>>Swedish</option>	
			<option value="turkish" <?php if($_SESSION['select_language'] == 'turkish'):echo 'selected="selected"';endif;?>>Turkish</option>		
		</select>
		</form>
	<div id="audio_sura">
		<audio controls><source src="http://www.islamaudio.fr/recitateur/<?=$recitator;?>/<?=$nbr;?>.mp3" type="audio/mp3">Your browser does not support this audio format.</audio>
	</div>

<?php

	function initSuraData()
	{

	global $suraData, $metadataFile;
	echo $language;	
		$metadataFile = plugins_url( '/quran/data.xml' , __FILE__ ); 
		$dataItems = Array("index", "start", "ayas", "name", "tname", "ename", "type", "rukus");
		$quranData = file_get_contents($metadataFile);
		$parser = xml_parser_create();
		xml_parse_into_struct($parser, $quranData, $values, $index);
		xml_parser_free($parser);

		for ($i=1; $i<=114; $i++) 
		{
			$j = $index['SURA'][$i-1];
			foreach ($dataItems as $item)
				$suraData[$i][$item] = $values[$j]['attributes'][strtoupper($item)]; 
		}
	}
		initSuraData();  
	function getSuraData($sura, $property) 
	{
		global $suraData;
		return $suraData[$sura][$property]; 
	}


	function getSuraContents($sura, $file) 
	{
		$text = file($file);
		$startAya = getSuraData($sura, 'start');
		$endAya = $startAya+ getSuraData($sura, 'ayas');
		$content = array_slice($text, $startAya, $endAya- $startAya); 
		return $content;
	}


	if (@$sura < 1) @$sura = 1; 
	if (@$sura > 114) @$sura = 114; 


	function showSura($sura)
	{
		global $quranFile, $transFile, $language;
		$quranFile =  plugins_url( '/quran/arabe.txt' , __FILE__ );
		if(isset($_SESSION['select_language'])){
	    $transFile = plugins_url( '/quran/'.$_SESSION['select_language'].'.txt' , __FILE__ );		
		}else{
	    $transFile = plugins_url( '/quran/'.get_option('quran_languages').'.txt' , __FILE__ );
		}
		$suraName = getSuraData($sura, 'tname');
		$suraText = getSuraContents($sura, $quranFile);
		$transText = getSuraContents($sura, $transFile);
		$showBismillah = false; 
		$ayaNum = 1;
		
		echo "<div class=suraName>$suraName</div>";
		foreach ($suraText as $aya)
		{
			$trans = $transText[$ayaNum- 1];

			if (!$showBismillah && $ayaNum == 1 && $sura !=1 && $sura !=9)
				$aya = preg_replace('/^(([^ ]+ ){4})/u', '', $aya);

			$aya = preg_replace('/ ([ۖ-۩])/u', '<span class="sign">&nbsp;$1</span>', $aya);

			echo "<div class=aya>";
			echo "<div class=quran><span class=ayaNum>$ayaNum. </span>$aya</div>";
			echo "<div class=trans>$trans </div>";
			echo "</div>";
			$ayaNum++;
		}
	}
echo "<div class='tabSura'>";
showSura($sura);
?>
<script type="text/javascript">
jQuery(document).ready(function(){
jQuery('span.ayaNum, .sm2_link').replaceWith(function(){
var sura = '<?php echo $sura; ?>';
return "<a class='sm2_link' href='http://www.islamaudio.fr/verset/<?=get_option('quran_recitator');?>/" +sura+ "/"+jQuery(this).html().match(/[0-9]+/)+".mp3'><span class='quranbadge quranbadge-info'>  "+jQuery(this).html().match(/[0-9]+/)+" </span></a>";
});
});

</script>
<?php
echo "
</div></div>";
		
}
add_shortcode('quran', 'quran_shortcode');
function quran_shortcode() {
	return rendu_quran();
}