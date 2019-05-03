<?php

function make_query ( $resource, $query )
{
	$q = oci_parse($resource, $query);
	if (oci_execute($q))
	{
		echo "Query succeed";
	}

}

$resource = oci_connect('ORACLE', 'ORACLE', 'oracle-xe-11/XE');
make_query($resource, 'alter profile "DEFAULT" limit password_life_time unlimited');

make_query($resource, 'alter profile "DEFAULT" limit password_grace_time 14');
make_query($resource, 'alter user ORACLE identified by ORACLE');
make_query($resource, 'alter profile "DEFAULT" limit password_reuse_max 10 password_reuse_time 365');%
