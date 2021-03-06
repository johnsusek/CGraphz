<?php
$connSQL=new DB();
$all_server=$connSQL->query('SELECT * FROM config_server ORDER BY server_name');
$cpt_server=count($all_server);

/* Listing des serveurs présent dans le RRD DIR et pas déjà affectés */
$filelist=array_values(array_diff(scandir($CONFIG['datadir']), array('..', '.', 'lost+found')));

$lib='
CREATE TEMPORARY TABLE server_list (
	`server_name` varchar(45) NOT NULL default \'\'
)';
$connSQL->query($lib);


$find='0';
$lib= 'INSERT INTO server_list (server_name) VALUES (';  
$cpt_filelist=count($filelist);
for($i=0; $i<$cpt_filelist; $i++) {
	if (strpos($filelist[$i],':')==false && is_dir($CONFIG['datadir'].'/'.$filelist[$i])) {
		if($find=='1')  {
			$lib.=" ), (";
		}  
		$lib.= '\''.$filelist[$i].'\'';
		$find='1';
	}
}  
$lib.=' )';

if ($find=='1') $connSQL->query($lib);

$lib='
	SELECT * 
	FROM server_list 
	WHERE server_name NOT IN (
		SELECT server_name FROM config_server
	) ORDER BY server_name';

$all_rrdserver=$connSQL->query($lib);
$cpt_rrdserver=count($all_rrdserver);
?>
