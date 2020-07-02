<?php

function select ($columns, $table,  $where , $value = null, $join = [], $dt = null, $fetch = 'all', $on = [], $desk = '')
{
	if (!empty($join)) {
		$joinKey = key($join); $joinValue = $join[$joinKey];

		if ($joinValue === '') {
			$joinn = "JOIN $joinKey ON $table.$on[0] = $joinKey.$on[1]";
		} else {
			$joinn = "JOIN $joinKey USING ($joinValue)";
		}

	} else {
		$joinn = '';
	}

	if ($dt !== null) {
		if ($desk !=='') {
			$order = "ORDER BY $dt DESC";
		} else {
			$order = "ORDER BY $dt";
		}

	} else {
		$order = '';
	}

	$columns = implode(",", $columns);
	if ($where === null) {
		$sql = "SELECT $columns FROM $table $joinn $order";
		$data = dbQuery($sql, null);
	} else {
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
	}

	if ($fetch != 'all') {
		$data = $data->fetch();
	} else {
		$data = $data->fetchAll();
	}

	return $data;
}

function insert ($table, $columns, $params, $values = null)
{
	$column = implode(",", $columns);
	for ($i = 0; $i<count($columns); $i++) {
		$columns[$i] = ':' . $columns[$i];
		next($columns);
	}
	$columns = implode(",", $columns);

	$sql = "INSERT INTO $table ($column) VALUES ($columns) ";

	if ($values !== null) {
		dbQuery($sql, [$column => $values]);
	} else {
		dbQuery($sql, $params);
	}

	return true;
}