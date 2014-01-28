<?php
    wp_register_script('quran_admin_color',plugin_dir_url( __FILE__ ).'js/jscolor/jscolor.js');	
	wp_enqueue_script('quran_admin_color');
?>
<style>

</style>
<div class="wrap">
<h3>Quran Text Multilanguage Options Colors</h3>
</div> 
<form method="post" action="options.php">

<?php settings_fields( 'quran-options' ); ?>

<table class="form-table">

<tr valign="top">

<th scope="row">language</th>

<td>Français <input type="radio" name="quran_languages" value="francais" <?php if (get_option('quran_languages') == "francais") {echo "checked";} ?> />
English <input type="radio" name="quran_languages" value="english" <?php if (get_option('quran_languages') == "english") {echo "checked";}?> />
German <input type="radio" name="quran_languages" value="german" <?php if (get_option('quran_languages') == "german") {echo "checked";}?> />
Russian <input type="radio" name="quran_languages" value="russian" <?php if (get_option('quran_languages') == "russian") {echo "checked";}?> />
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