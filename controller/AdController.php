<?php

	require('./model/Ad.php');

	function processAdRequest($urlData) 
	{ 
		if (strlen($urlData) == 0) {
			echo "Invalid Request";
			exit;
		}
		
		$request_parts = explode('/', $urlData);
		
		$verb = $request_parts[0];
		$format = "";
		$index = strpos($verb, '.');
		if ($index > 0) {
			$format = substr($verb, $index+1, strlen($verb));
			$verb = substr($verb, 0, $index);
		}
			
		$func = trim($verb) . strtoupper($format);
			
		switch ($verb) {
			case 'getAds':
			case 'saveAdsFile':
			case 'deleteAdsFile':
				// get data for all ads
				$clsAd = new Ad("localhost","evarbdec_root","root123","evarbdec_websalesdb");
				if ((int)method_exists($clsAd,$func) > 0) {
					echo $clsAd->$func();
				} else {
					echo "Invalid Request";
					exit;
				}
				break;
			case 'contactUs':
				// get data for all ads
				$clsAd = new Ad("localhost","evarbdec_root","root123","evarbdec_websalesdb");
				if ((int)method_exists($clsAd,$func) > 0) {
					echo $clsAd->$func();
				} else {
					echo "Invalid Request";
					exit;
				}
				break;
			case 'getAd':
				if (!isset($request_parts[1])) {
					echo "Invalid Request";
					exit;
				}
				$adId = $request_parts[1];
				if (isset($adId) && is_numeric($adId)) {
					// get data for given ad id
					$clsAd = new Ad("localhost","evarbdec_root","root123","websalesdb");
					if ((int)method_exists($clsAd,$func) > 0) {
						echo $clsAd->$func($adId);
					} else {
						echo "Invalid Request";
						exit;
					}
				} else {
					echo "Invalid Request";
					exit;
				}
				break;
				
			default:
				echo "Invalid Request";
				exit;
		}
	
	}

?>