<?php

function select ($columns, $table,  $where , $value = null, $join = [], $dt = null, $fetch = 'all')
{
	if (!empty($join)) {
		$joinKey = key($join); $joinValue = $join[$joinKey];
		$joinn = "JOIN $joinKey USING ($joinValue)";
	} else {
		$joinn = '';
	}
	if ($dt !== null) {
		$order = "ORDER BY $dt";
	} else {
		$order = '';
	}

	$columns = implode(",", $columns);
	$whereKey = key($where); $whereValue = $where[$whereKey];
	if ($whereValue !== '' && $value !== null) {
		for ($i = 0; $i < 2 ; $i++) {
			$whereK[] = key($where);
			next($where);
		}

		$whereValue = $where[$whereK[0]];
		$sql = "SELECT $columns FROM $table $joinn  WHERE $whereK[0] = :val1 AND $whereK[1] = :val2 $order";
		$data = dbQuery($sql, ['val1' => $whereValue, 'val2' => $value]);
	} else {

			$sql = "SELECT $columns FROM $table $joinn WHERE $whereKey = :val $order";

		if ($whereValue === '') {
			$data = dbQuery($sql, ['val' => $value]);
		} else {
			$data = dbQuery($sql, ['val' => $whereValue]);
		}
	}

	if ($fetch != 'all') {
		$data = $data->fetch();
	} else {
		$data = $data->fetchAll();
	}

	return $data;

}