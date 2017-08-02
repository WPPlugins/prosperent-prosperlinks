<?php
require_once(PROSPERLINKS_MODEL . '/Admin.php');
$prosperAdmin = new Model_Links_Admin();

$options = get_option('prosperSuite');

$prosperAdmin->adminHeader( __( 'General Settings', 'prosperent-suite' ), true, 'prosperent_options', 'prosperSuite' );

echo '<p class="prosper_settingDesc">' . __( 'Go to <a href="http://wordpress.prosperentdemo.com">WordPress Prosperent Demo</a> for more information and tutorials.', 'prosperent-suite' ) . '</p>';

echo '<h2 class="prosper_h2">' . __( 'Your Settings (Required)', 'prosperent-suite' ) . '</h2>';
echo __( '<ol><li><a href="http://prosperent.com/join" target="_blank">Sign Up (It\'s free)</a>, if you haven\'t already.</li><li>Go to the <a href="http://prosperent.com/account/wordpress" target="_blank">Prosperent WordPress Install</a> screen.</li><li>Either Create a New Installation or use the API Key from a previous setup.</li><li>Copy the API Key, and paste it into the box below.</li><li>Save your Settings!</li></ol>', 'prosperent-suite' );

echo $prosperAdmin->textinput( 'Api_Key', __( '<strong>Prosperent API Key</strong>', 'prosperent-suite' ), '');
echo '<p class="prosper_descb">' . __( '', 'prosperent-suite' ) . '</p>';

echo '<h2 class="prosper_h2">' . __( 'Links', 'prosperent-suite' ) . '</h2>';
echo $prosperAdmin->checkbox( 'Target', __( 'Open Links in New Window/Tab', 'prosperent-suite' ));
echo '<p class="prosper_descb">' . __( "<strong>Checked</strong> : opens link in a new window/tab <br><strong>Unchecked</strong> : opens link in the same window<br><strong>Will only work for Auto-Linker.</strong>", 'prosperent-suite' ) . '</p>';

echo '<h2 class="prosper_h2">' . __( 'SID Tracking', 'prosperent-suite' ) . '</h2>';
echo $prosperAdmin->multiCheckbox( 'prosperSid',  array( 'blogname' => 'Blog Name', 'interface' => 'Interface', 'query' => 'Query/Topic', 'page' => 'Page', 'pageNumber' => 'Page Number', 'widgetTitle' => 'Widget Title', 'widgetName' => 'Widget Name' ), 'Select what you\'d like to be included in the SID ', '', '<a href="#" class="prosper_tooltip"><span>Choose a SID Tracking for your blog.<br><strong>Blog Name:</strong> Your Blog\'s Name<br><strong>Interface:</strong> Interface that the click/commission came from (api, pa, pl, pi, al).<br><strong>Query/Topic:</strong> Query or Topic (pa) that the click originated from<br><strong>Page:</strong> What page the click came from<br><strong>Page Number:</strong> If click came from Shop, which page the user was on<br><br>Defaults to <strong>blogname_interface</strong>.</span></a>' );
echo '<p>';
echo $prosperAdmin->textinput( 'prosperSidText', __( 'Other', 'prosperent-suite' ), '', '<a href="#" class="prosper_tooltip"><span>Additional info for SID tracking, can be a SESSION, SERVER, or COOKIE variable <br><strong>(eg. $_SERVER[\'HTTP_HOST\'] or $_SERVER[\"HTTP_HOST\"])</strong>.</span></a>', 'prosper_textinputsmallindent');
echo '<p class="prosper_desc">' . __( "Each piece will be added to one another with an underscore (_) separator.", 'prosperent-suite' ) . '</p>';

$prosperAdmin->adminFooter();