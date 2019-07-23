<?php
if($_SERVER["HTTPS"] != "on")
{
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}
function adminer_object() {
    // required to run any plugin
    include_once "./plugins/plugin.php";
    
    // autoloader
    foreach (glob("plugins/*.php") as $filename) {
        include_once "./$filename";
    }
    
    $plugins = array(
        // specify enabled plugins here
        // new AdminerDumpXml,
        // new AdminerTinymce,
        // new AdminerFileUpload("data/"),
        // new AdminerSlugify,
        // new AdminerTranslation,
        // new AdminerForeignSystem,
        new AdminerTablesFilter,
    );
    
    /* It is possible to combine customization and plugins:
    class AdminerCustomization extends AdminerPlugin {
    }
    return new AdminerCustomization($plugins);
    */
    
    return new AdminerPlugin($plugins);
}

// include original Adminer or Adminer Editor
include "./adminer-4.7.2-en.php";
?>
<script <?=nonce();?>>
window.onload = function(){
	//document.getElementsByClassName('scrollable')[0].style.overflow = 'visible';
	//document.getElementsByClassName('footer')[0].style.width = ((document.getElementById('table').offsetWidth) + 20) + 'px';
	// OR THIS
	//document.getElementsByTagName('body')[0].style.display = 'inline-block';
	//document.getElementsByClassName('footer')[0].style.position = 'fixed';
	//document.getElementsByClassName('footer')[0].style.marginLeft = '-35px';
	//document.getElementsByClassName('footer')[0].style.paddingLeft = '35px';
	// OR ...
};
</script>
</body>
</html>