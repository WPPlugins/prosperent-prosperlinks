<?php
require_once(PROSPERLINKS_MODEL . '/Admin.php');
$prosperAdmin = new Model_Links_Admin();

$options = get_option('prosper_advanced');

$prosperAdmin->adminHeader( __( 'Advanced', 'prosperent-suite' ), true, 'prosperent_advanced_options', 'prosper_advanced' );

echo '<p class="prosper_settingDesc" style="font-size:16px;">' . __( 'These are the more <strong>advanced</strong> settings. <br><br>They are not necessary to get everything running correctly. ', 'prosperent-suite' ) . '</p>';

echo '<h2 class="prosper_h2">' . __( 'Delete Options on Uninstall', 'prosperent-suite' ) . '</h2>';
echo $prosperAdmin->checkbox( 'Option_Delete', __( 'Delete Options on Plugin Uninstall', 'prosperent-suite' ) );
echo '<p class="prosper_desc">' . __( "<strong>Checking this will delete options on Uninstall. On reinstallation, some options will be added automatically.</strong>", 'prosperent-suite' ) . '</p>';

$prosperAdmin->adminFooter();
