<?php
if (isset($_POST['f_submit_user'])) {
	
	$f_id_auth_user=intval($_POST['f_id_auth_user']);
	$f_nom=mysql_escape_string($_POST['f_nom']);
	$f_prenom=mysql_escape_string($_POST['f_prenom']);
	$f_user=mysql_escape_string($_POST['f_user']);
	$f_mail=mysql_escape_string($_POST['f_mail']);
	$f_passwd=mysql_escape_string($_POST['f_passwd']);
	$f_type=mysql_escape_string($_POST['f_type']);
		
	if ($_POST['f_id_auth_user'] && $_POST['f_id_auth_user']==$_SESSION['S_ID_USER']) { // UPDATE
		$lib='
			UPDATE `auth_user` SET
				`nom`="'.$f_nom.'",
				`prenom`="'.$f_prenom.'",
				`user`="'.$f_user.'",
				`mail`="'.$f_mail.'",
				`passwd`=PASSWORD("'.$f_passwd.'"),
				`type`="'.$f_type.'"
			WHERE
				`id_auth_user`="'.$f_id_auth_user.'"';
				
		$connSQL=new DB();
		$connSQL->query($lib);
	} 
}
?>