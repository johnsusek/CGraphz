<table border="0" cellpadding="0" cellspacing="0" id="table_environment_server" class="table_admin">
<thead>
<tr>
	<th>Environnements</th>
	<th>Descriptions</th>
</tr>
</thead>
<tbody>
<?php 


for ($i=0; $i<$cpt_environment_server;$i++) {

	echo '
	<tr>
		<td><a href="index.php?module=config&amp;component=environment&amp;f_id_config_environment='.$_GET['f_id_config_environment'].'&amp;f_id_config_server='.$all_environment_server[$i]->id_config_server.'">'.$all_environment_server[$i]->server_name.'</a></td>
		<td>'.$all_environment_server[$i]->server_description.'</td>
	</tr>';
}
?>
</tbody>
</table>