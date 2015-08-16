<?php
	function foodlist($result){
		//Saves the retrieved data as an array
	    $json = array();
	    while($row = sqlsrv_fetch_array($result))     
	    {
	        $json[]= array(
	            'id' => $row['id'],
	            'foodcode' => $row['foodcode'],
	            'foodname' => $row['foodname'],
	            'edibleproportion' => $row['edibleproportion'],
	            'water_g' => $row['water_g'],
	            'protein_g' => $row['protein_g'],
	            'fat_g' => $row['fat_g'],
	            'carbohydrate_g' => $row['carbohydrate_g'],
	            'energy_kcal' => $row['energy_kcal'],
	            'energy_kj' => $row['energy_kj'],
	            'starch_g' => $row['starch_g']
	        );
	    }
	    //Converts the array to a JSON string
	    return json_encode($json);
	}

	function userfoodlist($result){
	    $json = array();
	    while($row = sqlsrv_fetch_array($result))     
	    {
	        $json[]= array(
	            'foodcode' => $row['foodcode'],
	        	'userid' => $row['userid'],
	        	'datetime' => $row['datetime'],
	            'foodname' => $row['foodname'],
	            'edibleproportion' => $row['edibleproportion'],
	            'energy_kcal' => $row['energy_kcal'],
	            'protein_g' => $row['protein_g'],
	            'water_g' => $row['water_g'],
	            'fat_g' => $row['fat_g']
	        );
	    }
	    return json_encode($json);
	}

	function usermeallist($result){
	    $json = array();
	    while($row = sqlsrv_fetch_array($result))     
	    {
	        $json[]= array(
	        	'id' => $row['id'],
	        	'userid' => $row['userid'],
	        	'datetime' => $row['datetime'],
	        	'mealname' => $row['mealname'],
	        	'foodtable' => $row['foodtable'],
	            'foodcode' => $row['foodcode'],
	            'edibleproportion' => $row['edibleproportion'],
	            'foodname' => $row['foodname'],
	        	'quantity' => $row['quantity'],
	            'energy_kcal' => $row['energy_kcal'],
	            'protein_g' => $row['protein_g'],
	            'water_g' => $row['water_g'],
	            'fat_g' => $row['fat_g']
	        );
	    }
	    return json_encode($json);
	}

	function userweightmanifest($result){
	    $json = array();
	    while($row = sqlsrv_fetch_array($result))     
	    {
	        $json[]= array(
	        	'id' => $row['id'],
	        	'userid' => $row['userid'],
	        	'datetime' => $row['datetime'],
	        	'weight' => $row['weight'],
	        	'swollenfeet' => $row['swollenfeet'],
	        	'swollenlegs' => $row['swollenlegs'],
	        	'swollenabdomen' => $row['swollenabdomen']
	        );
	    }
	    return json_encode($json);
	}

	function userfoodmanifest($result){
	    $json = array();
	    while($row = sqlsrv_fetch_array($result))     
	    {
	        $json[]= array(
	        	'id' => $row['id'],
	        	'userid' => $row['userid'],
	        	'datetime' => $row['datetime'],
	        	'foodtable' => $row['foodtable'],
	            'foodcode' => $row['foodcode'],
	            'foodname' => $row['foodname'],
	        	'quantity' => $row['quantity'],
	            'edibleproportion' => $row['edibleproportion'],
	            'energy_kcal' => $row['energy_kcal'],
	            'protein_g' => $row['protein_g'],
	            'water_g' => $row['water_g'],
	            'carbohydrate_g' => $row['carbohydrate_g'],
	            'fat_g' => $row['fat_g'],
	            'meal' => $row['meal']
	        );
	    }
	    return json_encode($json);
	}

	function userrequirementsmanifest($result){
	    $json = array();
	    while($row = sqlsrv_fetch_array($result))     
	    {
	        $json[]= array(
	        	'id' => $row['id'],
	        	'userid' => $row['userid'],
	        	'datetime' => $row['datetime'],
	        	'gender' => $row['gender'],
	        	'weight' => $row['weight'],
	        	'activitylevel' => $row['activitylevel'],
	        	'formulacalories' => $row['formulacalories'],
	        	'formulaprotein' => $row['formulaprotein'],
	        	'formulafluid' => $row['formulafluid'],
	        	'additionalcalories' => $row['additionalcalories'],
	        	'additionalprotein' => $row['additionalprotein'],
	        	'additionalfluid' => $row['additionalfluid'],
	        	'additionalactivitylevel' => $row['additionalactivitylevel'],
	        	'finalcalories' => $row['finalcalories'],
	        	'finalprotein' => $row['finalprotein'],
	        	'finalfluid' => $row['finalfluid']
	        );
	    }
	    return json_encode($json);
	}

	function symptomslist($result){
	    $json = array();
	    while($row = sqlsrv_fetch_array($result))     
	    {
	        $json[]= array(
	        	'id' => $row['id'],
	        	'symptom' => $row['symptom'],
	        	'rateable' => $row['rateable']
	        );
	    }
	    return json_encode($json);
	}

	function usersymptomlist($result){
	    $json = array();
	    while($row = sqlsrv_fetch_array($result))     
	    {
	        $json[]= array(
	        	'id' => $row['id'],
	        	'userid' => $row['userid'],
	        	'datetime' => $row['datetime'],
	        	'symptom' => $row['symptom']
	        );
	    }
	    return json_encode($json);
	}

	function usersymptommanifest($result){
	    $json = array();
	    while($row = sqlsrv_fetch_array($result))     
	    {
	        $json[]= array(
	        	'id' => $row['id'],
	        	'userid' => $row['userid'],
	        	'datetime' => $row['datetime'],
	        	'symptomtable' => $row['symptomtable'],
	        	'symptomid' => $row['symptomid'],
	        	'symptom' => $row['symptom'],
	        	'rating' => $row['rating'],
	        	'comment' => $row['comment']
	        );
	    }
	    return json_encode($json);
	}
?>