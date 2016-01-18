<?php

class Ad {

	private $db;

	public function __construct($host,$user,$pass,$db)	{
		try {
			$this->db = new PDO("mysql:host=".$host.";dbname=".$db,$user,$pass);
		} catch(PDOException $e) {
			echo 'Error: ' . $e->getMessage();
		}
	}

	public function getAds(){
		$sth = $this->db->prepare("SELECT * FROM ad");
		$sth->execute();
		return $sth->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getAd($id){
		$sth = $this->db->prepare("SELECT * FROM ad,user WHERE user.id=id_user AND ad.id=?");
		$sth->execute(array($id));
		return $sth->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getAdsJSON(){
		$adList = $this->getAds();
		header("HTTP/1.1 200 OK");
		header("Content-Type: application/json");
		return json_encode($adList);
	}

	public function deleteAdsFile(){
		$file = 'Ads.json';
		if (file_exists($file)) {
			unlink($file);
			echo '<h1>File was deleted</h1>';
		}
	}

	public function saveAdsFile(){
		$file = 'Ads.json';
		$adList = $this->getAds();

		file_put_contents($file, json_encode($adList));
		if (file_exists($file)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename="'.basename($file).'"');
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			readfile($file);
			exit;
		}
	}

	public function contactUs(){
		if ($_POST['email']){
			$message = "Contact from Web Art\r\n".$_POST['name']."\r\n".$_POST['email'];
			$result = mail('evaristo@live.ca', 'WebArt Contact', $message);
			if($result){
				echo '<h1>Your contact has been sent.</h1>';
			}
		}
	}

	public function getAdJSON($id){
		$adList = $this->getAd($id);
		header("HTTP/1.1 200 OK");
		header("Content-Type: application/json");
		return json_encode($adList);
	}

}

?>
