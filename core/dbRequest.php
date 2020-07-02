<?php

function where ($sql1, $sql2, $columns, $table,  $where , $value = false)
{

}

function select ($columns, $table,  $where , $value = false, $join = [])
{
	$columns = implode(",", $columns);

	if (!empty($join) && count($join) == 1) {
		$joinKey = key($join); $joinValue = $join[$joinKey];
		$whereKey = key($where); $whereValue = $where[$whereKey];

		if ($whereValue !== '' && $value !== false) {
			for ($i = 0; $i < 2 ; $i++) {
				$whereKey[] = key($where);
				next($where);
			}

			$whereValue = $where[$whereKey[0]];
			$sql1 = "SELECT $columns FROM $table JOIN $joinKey USING ($joinValue) WHERE 
					$whereKey[0] = :val1 AND $whereKey[1] = :val2";
			$data = dbQuery($sql1, ['val1' => $whereValue, 'val2' => $value]);
		} else {
			$sql2 = "SELECT $columns FROM $table JOIN $joinKey USING ($joinValue) WHERE $whereKey = :val ";

			if ($whereValue === '') {
				$data = dbQuery($sql2, ['val' => $value]);
			} else {
				$data = dbQuery($sql2, ['val' => $whereValue]);
			}
		}
	}
	elseif (!empty($join) && count($join) == 2) {
		for ($k = 0; $k < 2 ; $k++) {
			$joinKey[] = key($join);
			next($where);
		}
		$joinValue1 = $join[$joinKey[0]]; $joinValue2 = $join[$joinKey[1]];
	}


}