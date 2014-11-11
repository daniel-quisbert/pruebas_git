<?php
if (!defined("_ECRIRE_INC_VERSION")) return;
function action_supprimer_editorial() {
	$securiser_action = charger_fonction('securiser_action', 'inc');
	$arg = $securiser_action();
	if (!preg_match(",^(\d+)$,", $arg, $r)) {
		spip_log("action_supprimer_editorial $arg pas compris");
	} else {
		action_supprimer_editorial_post($r[1]);
	}
}
function action_supprimer_editorial_post($id_editorial) {
	sql_delete("spip_editoriales", "id_editorial=" . sql_quote($id_editorial));
	include_spip('inc/invalideur');
	suivre_invalideur("id='id_editorial/$id_editorial'");
}
?>

