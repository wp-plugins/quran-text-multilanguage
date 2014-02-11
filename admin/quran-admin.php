<?php
    wp_register_script('quran_admin_color',plugin_dir_url( __FILE__ ).'js/jscolor/jscolor.js');	
	wp_enqueue_script('quran_admin_color');
?>
<style>

</style>
<div class="wrap">
<h3>Quran Text Multilanguage Options</h3>
</div> 
<form method="post" action="options.php">

<?php settings_fields( 'quran-options' ); ?>

<table class="form-table">

<tr valign="top">

<th scope="row">Choose recitator</th>


<td>Maher Al Me-aqly <input type="radio" name="quran_recitator" value="Maher_al_me-aqly" <?php if (get_option('quran_recitator') == "Maher_al_me-aqly") {echo "checked";} ?> />
Saad El Galmidi <input type="radio" name="quran_recitator" value="ElGhamidi" <?php if (get_option('quran_recitator') == "ElGhamidi") {echo "checked";}?> />
Abderrahman Al Soudais <input type="radio" name="quran_recitator" value="Soudais" <?php if (get_option('quran_recitator') == "Soudais") {echo "checked";}?> />
Abdallah Ali Basfar <input type="radio" name="quran_recitator" value="Alafasy" <?php if (get_option('quran_recitator') == "Alafasy") {echo "checked";}?> />
</td>

</tr>

<tr valign="top">

<th scope="row">language</th>

<td>
			<select name="quran_languages">
			<option value="arabe"<?php if (get_option('quran_languages') == "arabe"){echo 'selected="selected"';}?>>Arabe</option>				
			<option value="english"<?php if (get_option('quran_languages') == "english"){echo 'selected="selected"';}?>>English</option>			
			<option value="francais"<?php if (get_option('quran_languages') == "francais"){echo 'selected="selected"';}?>>Français</option>
			<option value="german"<?php if (get_option('quran_languages') == "german"){echo 'selected="selected"';}?>>German</option>
			<option value="russian"<?php if (get_option('quran_languages') == "russian"){echo 'selected="selected"';}?>>Russian</option>	
			<option value="albanian"<?php if (get_option('quran_languages') == "albanian"){echo 'selected="selected"';}?>>Albanian</option>
			<option value="azerbaijani"<?php if (get_option('quran_languages') == "azerbaijani"){echo 'selected="selected"';}?>>Azerbaijani</option>
			<option value="bengali"<?php if (get_option('quran_languages') == "bengali"){echo 'selected="selected"';}?>>Bengali</option>			
			<option value="bulgarian"<?php if (get_option('quran_languages') == "bulgarian"){echo 'selected="selected"';}?>>Bulgarian</option>	
			<option value="chinese"<?php if (get_option('quran_languages') == "chinese"){echo 'selected="selected"';}?>>Chinese</option>
			<option value="czech"<?php if (get_option('quran_languages') == "czech"){echo 'selected="selected"';}?>>Czech</option>
			<option value="indonesian"<?php if (get_option('quran_languages') == "indonesian"){echo 'selected="selected"';}?>>Indonesian</option>
			<option value="italian"<?php if (get_option('quran_languages') == "italian"){echo 'selected="selected"';}?>>Italian</option>
			<option value="kurdish"<?php if (get_option('quran_languages') == "kurdish"){echo 'selected="selected"';}?>>Kurdish</option>
			<option value="malay"<?php if (get_option('quran_languages') == "malay"){echo 'selected="selected"';}?>>Malay</option>
			<option value="norwegian"<?php if (get_option('quran_languages') == "norwegian"){echo 'selected="selected"';}?>>Norwegian</option>
			<option value="portuguese"<?php if (get_option('quran_languages') == "portuguese"){echo 'selected="selected"';}?>>Portuguese</option>
			<option value="romanian"<?php if (get_option('quran_languages') == "romanian"){echo 'selected="selected"';}?>>Romanian</option>
			<option value="somali"<?php if (get_option('quran_languages') == "somali"){echo 'selected="selected"';}?>>Somali</option>
			<option value="spanish"<?php if (get_option('quran_languages') == "spanish"){echo 'selected="selected"';}?>>Spanish</option>	
			<option value="swedish"<?php if (get_option('quran_languages') == "swedish"){echo 'selected="selected"';}?>>Swedish</option>	
			<option value="turkish"<?php if (get_option('quran_languages') == "turkish"){echo 'selected="selected"';}?>>Turkish</option>				
			</select>
</td>

</tr>

<tr valign="top">
<th scope="row">Color title</th>
<td>Text : <input name="text_quran_title" class="color" value="<?php echo get_option('text_quran_title'); ?>" />
Background : <input name="background_quran_title" class="color" value="<?php echo get_option('background_quran_title'); ?>" />
</td>
</tr>

<tr valign="top">
<th scope="row">Color number</th>
<td>Num :<input name="verse_quran_number" class="color" value="<?php echo get_option('verse_quran_number'); ?>" />
</td>
</tr>

<tr valign="top">
<th scope="row">Color translate</th>
<td>Text : <input name="text_quran_trans" class="color" value="<?php echo get_option('text_quran_trans'); ?>" />
Background : <input name="background_quran_trans" class="color" value="<?php echo get_option('background_quran_trans'); ?>" />
</td>
</tr>

<tr valign="top">

<th scope="row">Color arabic</th>
<td>Text : <input name="text_quran_arabic" class="color" value="<?php echo get_option('text_quran_arabic'); ?>" />
Background : <input name="background_quran_arabic" class="color" value="<?php echo get_option('background_quran_arabic'); ?>" />
</td>
</tr>


</table>

<?php submit_button(); ?>

</form>

</div> 