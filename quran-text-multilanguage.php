<?php
/*
Plugin Name: Quran Multilanguage Text Audio Verse
Description: Quran Text Multilanguage translated into 22 languages.You can change the background color and text color.audio of each verse is added, you can choose the reciter in the administration of the plugin.To listen to audio, just click the number of the verse.
Version: 1.2.6
Author: Karim Bahmed
Author URI: http://gp-codex.fr
*/
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
(1, '002. Al-Baqarah - La vache', 2, 'al-baqarah-la-vache'),
(2, '004. An-Nisa - Les femmes', 4, 'an-nisa-les-femmes'),
(3, '005. Al-Maidah - La Table Servie', 5, 'al-maidah-la-table-servie'),
(4, '006. Al-Anam - Les bestiaux', 6, 'al-anam-les-bestiaux'),
(5, '007. Al-Araf', 7, 'al-araf'),
(6, '008. Al-Anfal - Le Butin', 8, 'al-anfal-le-butin'),
(7, '009. At-Tawbah - Le repentir', 9, 'at-tawbah-le-repentir'),
(8, '010. Yunes - Jonas', 10, 'yunes-jonas'),
(9, '011. Hud', 11, 'hud'),
(10, '012. Youssouf - Joseph', 12, 'youssouf-joseph'),
(11, '013. Ar-Rad - Le tonnerre', 13, 'ar-rad-le-tonnerre'),
(12, '014. Ibrahim - Abraham', 14, 'ibrahim-abraham'),
(13, '015. Al-Hijr', 15, 'al-hijr'),
(14, '016. An-Nahl - Les abeilles', 16, 'an-nahl-les-abeilles'),
(15, '017. Al-Isra - Le voyage nocturne', 17, 'al-isra-le-voyage-nocturne'),
(16, '018. Al-Kahf - La caverne', 18, 'al-kahf-la-caverne'),
(17, '019. Maryam - Marie', 19, 'maryam-marie'),
(18, '020. Ta-Ha', 20, 'ta-ha'),
(19, '021. Al-Anbiya - Les Prophetes', 21, 'al-anbiya-les-prophetes'),
(20, '022. Al-Hajj - Le pelerinage', 22, 'al-hajj-le-pelerinage'),
(21, '023. Al-Mouminoune - Les croyants', 23, 'al-mouminoune-les-croyants'),
(22, '024. An-Nour - La lumiere', 24, 'an-nour-la-lumiere'),
(23, '025. Al-Furqane - Le discernement', 25, 'al-furqane-le-discernement'),
(24, '026. Ash-Shuara - Les poetes', 26, 'ash-shuara-les-poetes'),
(25, '027. An-Naml - Les fourmis', 27, 'an-naml-les-fourmis'),
(26, '028. Al-Qasas - Le recit', 28, 'al-qasas-le-recit'),
(27, '030. Ar-Rum - Les romains', 30, 'ar-rum-les-romains'),
(28, '031. Luqman', 31, 'luqman'),
(29, '032. As-Sajda - La prosternation', 32, 'as-sajda-la-prosternation'),
(30, '033. Al-Ahzab - Les coalises', 33, 'al-ahzab-les-coalises'),
(31, '034. Saba', 34, 'saba'),
(32, '035. Fatir - Le Createur', 35, 'fatir-le-createur'),
(33, '036. Ya-Sin', 36, 'ya-sin'),
(34, '037. As-Saffat - Les ranges', 37, 'as-saffat-les-ranges'),
(35, '038. Sad', 38, 'sad'),
(36, '039. Az-Zumar - Les groupes', 39, 'az-zumar-les-groupes'),
(37, '040. Ghafir - Le Pardonneur', 40, 'ghafir-le-pardonneur'),
(38, '041. Fussilat - Les versets detailles', 41, 'fussilat-les-versets-detailles'),
(39, '042. Ash-shoura - La consultation', 42, 'ash-shoura-la-consultation'),
(40, '044. Ad-Dukhan - La fumee', 44, 'ad-dukhan-la-fumee'),
(41, '046. Al-Ahqaf', 46, 'al-ahqaf'),
(42, '047. Muhammad', 47, 'muhammad'),
(43, '048. Al-Fath - La victoire eclatante', 48, 'al-fath-la-victoire-eclatante'),
(44, '049. Al. Hujurat - Les appartements', 49, 'al-hujurat-les-appartements'),
(45, '050. Qaf', 50, 'qaf'),
(46, '051. Ad-Dariyat - Qui eparpillent', 51, 'ad-dariyat-qui-eparpillent'),
(47, '052. At-Tur', 52, 'at-tur'),
(48, '054. Al-Qamar - La lune', 54, 'al-qamar-la-lune'),
(49, '055. Ar-Rahman. Le Tout Misericordieux', 55, 'ar-rahman-le-tout-misericordieux'),
(50, '057. Al-Hadid - le fer', 57, 'al-hadid-le-fer'),
(51, '058. Al-Mujadalah - La discussion', 58, 'al-mujadalah-la-discussion'),
(52, '059. Al-Hashr - Lexode', 59, 'al-hashr-lexode'),
(53, '061. As-Saff - Le rang', 61, 'as-saff-le-rang'),
(54, '062. Al-Jumua - Le vendredi', 62, 'al-jumua-le-vendredi'),
(55, '063. Al-Munafiqun - Les hypocrites', 63, 'al-munafiqun-les-hypocrites'),
(56, '064. At-Tagabun - La grande perte', 64, 'at-tagabun-la-grande-perte'),
(57, '065. At-Talaq - Le divorce', 65, 'at-talaq-le-divorce'),
(58, '067. Al-Mulk - La royaute', 67, 'al-mulk-la-royaute'),
(59, '068. Al-Qalam - La plume', 68, 'al-qalam-la-plume'),
(60, '069. Al-Haqqah - Celle qui montre la verite', 69, 'al-haqqah-celle-qui-montre-la-verite'),
(61, '070. Al-Ma arij - Les voies dascension', 70, 'al-ma-arij-les-voies-dascension'),
(62, '071. Nuh - Noe', 71, 'nuh-noe'),
(63, '072. Al-Jinn - Les djinns', 72, 'al-jinn-les-djinns'),
(64, '073. Al-Muzzammil - Lenveloppe', 73, 'al-muzzammil-lenveloppe'),
(65, '074. Al-Muddattir - Le revetu dun manteau', 74, 'al-muddattir-le-revetu-dun-manteau'),
(66, '075. Al-Qiyamah - La resurrection', 75, 'al-qiyamah-la-resurrection'),
(67, '076. Al-Insan - Lhomme', 76, 'al-insan-lhomme'),
(68, '077. Al-Mursalate - Les envoyes', 77, 'al-mursalate-les-envoyes'),
(69, '078. An-Naba - La nouvelle', 78, 'an-naba-la-nouvelle'),
(70, '079. An-Naziate - Les anges qui arrachent les ames', 79, 'an-naziate-les-anges-qui-arrachent-les-ames'),
(71, '082. Al-Infitar - La rupture', 82, 'al-infitar-la-rupture'),
(72, '083. Al-Mutaffifine - Les fraudeurs', 83, 'al-mutaffifine-les-fraudeurs'),
(73, '084. Al-Inshiqaq - La dechirure', 84, 'al-inshiqaq-la-dechirure'),
(74, '085. Al-Buraj - Les constellations', 85, 'al-buraj-les-constellations'),
(75, '087. Al-Ala - Le Tres-Haut', 87, 'al-ala-le-tres-haut'),
(76, '089. Al-Fajr - Laube', 89, 'al-fajr-laube'),
(77, '090. Al-Balad - La cite', 90, 'al-balad-la-cite'),
(78, '091. Ash-Shams - Le soleil', 91, 'ash-shams-le-soleil'),
(79, '092. Al-Layl - La nuit', 92, 'al-layl-la-nuit'),
(80, '093 .Ad-Duha  - Le jour montant', 93, 'ad-duha-le-jour-montant'),
(81, '095. At-Tin - Le figuier', 95, 'at-tin-le-figuier'),
(82, '097. Al-Qadr - La destine', 97, 'al-qadr-la-destine'),
(83, '098. Al-Bayyinah - La preuve', 98, 'al-bayyinah-la-preuve'),
(84, '099. Az-Zalzalah - La secousse', 99, 'az-zalzalah-la-secousse'),
(85, '100. Al-Adiyate - Les coursiers', 100, 'al-adiyate-les-coursiers'),
(86, '101. Al-Qariah - Le fracas', 101, 'al-qariah-le-fracas'),
(87, '102. At-Takathur - La course aux richesses', 102, 'at-takafur-la-course-aux-richesses'),
(88, '103. Al-Asr - Le temps', 103, 'al-asr-le-temps'),
(89, '104. Al-Humazah - Les calomniateurs', 104, 'al-humazah-les-calomniateurs'),
(90, '105. Al-Fil - Lelephant', 105, 'al-fil-lelephant'),
(91, '106. Quraysh - Les Corach', 106, 'quraysh-les-corach'),
(92, '109. Al-Kafiroune - Les infideles', 109, 'al-kafiroune-les-infideles'),
(93, '110. An-Nasr - Le secours', 110, 'an-nasr-le-secours'),
(94, '111. Al-Masad - Les fibres', 111, 'al-masad-les-fibres'),
(95, '112. Al-Ikhlas - Le monotheisme pur', 112, 'al-ikhlas-le-monotheisme-pur'),
(96, '113. Al-Falaq - Laube naissante', 113, 'al-falaq-laube-naissante'),
(97, '114. An-Nass - Les hommes', 114, 'an-nass-les-hommes'),
(98, '001. Al-Fatiha - L''ouverture', 1, 'al-fatiha-l-ouverture'),
(99, '003. AL-IMRAN (LA FAMILLE D''IMRAN) ', 3, 'al-imran-la-famille-d-imran'),
(100, '096 AL-ALAQ L''adhérence', 96, 'al-alaq-l-adherence'),
(101, '056 AL-WAQI''A L''événement', 56, 'al-waqi-a-l-evenement'),
(102, '043 AZZUKHRUF L''ORNEMENT', 43, 'azzukhruf-l-ornement'),
(103, '045 AL-JATHYA L''AGENOUILLÉE', 45, 'al-jathya-l-agenouillee'),
(104, '053 AN-NAJM L''ÈTOILE', 53, 'an-najm-l-etoile'),
(105, '060 AL-MUMTAHANAH L''ÉPROUVÉE', 60, 'al-mumtahanah-l-eprouvee'),
(106, '066 AT-TAHRIM L''INTERDICTION', 66, 'at-tahrim-l-interdiction'),
(107, '080 ABASA IL S''EST RENFROGNÉ', 80, 'abasa-il-s-est-renfrogne'),
(108, '081 AT-TAKWIR L''OBSCURCISSEMENT', 81, 'at-takwir-l-obscurcissement'),
(109, '094 AS-SARH L''OUVERTURE', 94, 'as-sarh-l-ouverture'),
(110, '107 AL-MAUN L''USTENSILE', 107, 'al-maun-l-ustensile'),
(111, '108 AL-KAWTAR L''ABONDANCE', 108, 'al-kawtar-l-abondance'),
(112, '029 AL-ANKABUT l'' alraignée', 29, 'al-ankabut-l-araignee'),
(113, '088 . AL-GASIYAH (L''ENVELOPPANTE)', 88, 'al-gasiyah-l-enveloppante'),
(114, '086.AT-TARIQ (L''ASTRE NOCTURNE) ', 86, 'at-tariq-l-astre-nocturne');
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
    wp_register_style('quran_player_css',plugin_dir_url( __FILE__ ).'css/player.css');			
    wp_enqueue_script('quran_admin_color');
	wp_enqueue_script('quran_soundmanager');	
    wp_enqueue_script('quran_player');	
    wp_enqueue_style('quran_player_css');	
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

   jQuery(function(){

      jQuery('#change_sura').bind('change', function () {
          var url = jQuery(this).val(); 
          if (url) { 
              window.location = url;
          }
          return false;
      });
    });

});
</script>

<style>
	.suraName {border-bottom: 1px solid #<?php echo get_option('background_quran_title'); ?>;text-align: center; font-size: 20px; padding: 10px 0px; background-color: #<?php echo get_option('background_quran_title'); ?>; margin-top: 7px;color:#<?php echo get_option('text_quran_title'); ?>;}
	.aya {margin:auto;background-color: #fff; border: 1px solid #fff; border-top: 0px;}
	.aya2 {padding-top:5px;margin-left:20px;background-color: #fff; color:grey;height:40px;width:80%;font-size:22px;}
	.aya1 {width:auto;margin:auto;margin-top:20px;}	
	.quran { padding: 10px;font-family: Traditional Arabic;color:#<?php echo get_option('text_quran_arabic'); ?>;border-right: 1px solid #<?php echo get_option('background_quran_arabic'); ?>;border-left: 1px solid #<?php echo get_option('background_quran_arabic'); ?>; font-size: 28px; direction: rtl;background-color:#<?php  echo get_option('background_quran_arabic');?>}
	.trans { font-family: Calibri;text-align:justify;border-right: 1px solid #<?php echo get_option('background_quran_trans'); ?>;border-left: 1px solid #<?php echo get_option('background_quran_trans'); ?>;border-bottom: 1px solid #<?php echo get_option('background_quran_trans');?>;border-top: 1px solid #<?php echo get_option('background_quran_trans'); ?>; color:#<?php echo get_option('text_quran_trans'); ?>;font-size: 16px; background-color: #<?php echo get_option('background_quran_trans'); ?>;}
	.tabSura{margin-top:20px;position:relative;width:auto;}
	.ayaNum{color:#<?php echo get_option('verse_quran_number'); ?>;}
	.sign {font-family: times new roman; font-size: 0.9em; color: #FB7600;}
	background-color: #f4f4ff; border: 1px solid #ccd; padding: 3px; font: 12px Verdana;}
	.upCoran{position:fixed;margin-left:990px;margin-top:20px;}
	.chooseSura{font-weight:bold;color:grey;margin-left:25px;font-size:20px;padding-top:7px;}
	#quran_main{float:left;width:auto}
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


	<div style="margin-top:10px;text-align:center;">
		<audio controls><source src="http://www.islamaudio.fr/recitateur/<?php echo $recitator;?>/<?php echo $nbr;?>.mp3" type="audio/mp3">Your browser does not support this audio format.</audio>
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
	    $transFile = plugins_url( '/quran/'.get_option('quran_languages').'.txt' , __FILE__ );
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
return "<a class='sm2_link' href='http://www.islamaudio.fr/verset/<?php echo get_option('quran_recitator');?>/" +sura+ "/"+jQuery(this).html().match(/[0-9]+/)+".mp3'><span class='quranbadge quranbadge-info'>  "+jQuery(this).html().match(/[0-9]+/)+" </span></a>";
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