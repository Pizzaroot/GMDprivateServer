<?php
//credits to pavlukivan for decoding and to IAD for most of genSolo
class generateHash {
	public function genMultiplayer($lvlsmultistring) {
		$lvlsarray = explode(",", $lvlsmultistring);
		include "connection.php";
		$hash = "";
		foreach($lvlsarray as $id){
			$query=$db->prepare("select * from levels where levelID = :id");
			$query->execute([':id' => $id]);
			$result2 = $query->fetchAll();
			$result = $result2[0];
			$hash = $hash . $result["levelID"][0].$result["levelID"][strlen($result["levelID"])-1].$result["starStars"].$result["starCoins"];
		}
		return sha1($hash . "xI25fpAapCQg");
	}
	public function genSoloMan($lvlsmultistring) {
		include "connection.php";
		$levelstring = $lvlsmultistring;
		$hash = "aaaaa";
		$len = strlen($levelstring);
		$divided = intval($len/40);
		$p = 0;
		for($k = 0; $k < $len ; $k= $k+$divided){
			if($p > 39) break;
			$hash[$p] = $levelstring[$k]; 
			$p++;
		}
		return sha1($hash . "xI25fpAapCQg");
	}
	public function genSolo2Bad4Me($lvlsmultistring) {
		return sha1($lvlsmultistring . "xI25fpAapCQg");
	}
	public function genSolo3Hard5Me($lvlsmultistring) {
		return sha1($lvlsmultistring . "oC36fpYaPtdg");
	}
	public function genSolo4ValentinesDay($lvlsmultistring){
		return sha1($lvlsmultistring . "pC26fpYaQCtg");
	}
	public function genSixPack($lvlsmultistring) {
		$lvlsarray = explode(",", $lvlsmultistring);
		include "connection.php";
		$hash = "";
		foreach($lvlsarray as $id){
			$query=$db->prepare("select * from mappacks where ID = :id");
			$query->execute([':id' => $id]);
			$result2 = $query->fetchAll();
			$result = $result2[0];
			$hash = $hash . $result["ID"][0].$result["ID"][strlen($result["ID"])-1].$result["stars"].$result["coins"];
		}
		return sha1($hash . "xI25fpAapCQg");
	}
}
?>
