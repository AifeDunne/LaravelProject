@extends('layouts.dash')

@section('content')
			<div style="color:#000;">
			<?php
			$aKey = $array_guide;
			$xLength = count($aKey);
			$aLength = $xLength - 1;
			$cVar = array();
			$totalVar = 0;
			for ($a = 1; $a <= $aLength; $a++) {
				$cIndex = $aKey[$a];
				$cArray = $data[$cIndex];
				$eCount = intval(count($cArray));
				$cVar[] = $eCount;
				$totalVar += $eCount; }
			$listTotal = $data['primary']['list_count'];
			$bookTotal = $data['primary']['book_count'];
			$underVar = $totalVar - 1;
			$arrNotch = 0; $arrNotch2 = 1; $arrNotch3 = 0; $arrNotch4 = 1; $addAll = 0; $secondC = ""; global $secondC; $listTabs = ""; global $listTabs; 
			$scriptVar = array("id", "user_name", "stat_id", "book_count", "list_count", "all_count", "detail_id"); 
			$script_arr = ""; global $script_arr; $scriptArray = array(); global $scriptArray;
			$section1 = array("user_name", "real_name", "gender"); $sec1 = array(); $sec1B = array(); 
			$section2 = array("book_count", "list_count", "all_count", "fav_book", "fav_genre", "fav_author"); $sec2 = array(); $sec2B = array();
			$secTitle = array('book_count' => 'Books Saved', 'list_count' => 'Lists Created', 'all_count' => 'Total Edits', 'fav_book' => 'Favorite Book', 'fav_genre' => 'Favorite Genre', 'fav_author' => 'Favorite Author');
			$orderLength = array();	$listGate = array(); $listGate2 = array();
			$markList = array(); $placeOrder = array(); $bookClump = array(); $fullList = array("");
			global $fullList, $orderLength, $markList;
			$customSec = array("region", "country");
			for ($b = 1; $b <= $totalVar; $b++) {
				$addAll++;
				$gKey = $aKey[$arrNotch2];
				$nCount = intval($cVar[$arrNotch3]);
				$aFind = array_keys($data[$gKey]);
				$dKey = $aFind[$arrNotch];
				$dContent = $data[$gKey][$dKey];
				if ($gKey === "primary") { if (in_array($dKey, $scriptVar)) { $script_arr.= "var ".$dKey." = '".$dContent."';\n"; $scriptArray[$dKey] = $dContent; } }
				else if ($gKey === "user_details") { 
					if ($dKey === "gender") { if ($dContent === 1) { $dContent = "Mr. "; } else if ($dContent === 2) { $dContent = "Miss "; } else { $dContent = ""; } }
					if (in_array($dKey, $section1)) { $lastKeyA = array_keys($sec1); $lastKeyA = end($lastKeyA); $lastKeyA = intval($lastKeyA)+1; $sec1[$lastKeyA] = $dContent; $sec1B[$dKey] = $lastKeyA;}
					if (in_array($dKey, $section2)) { $n2Title = $secTitle[$dKey]; $secondC.= "<div id='e-".$b."'>".$n2Title.": ".$dContent."</div></br>"; }
					if (in_array($dKey, $customSec)) { $lastKeyB = array_keys($sec2); $lastKeyB = end($lastKeyB); $lastKeyB = intval($lastKeyB)+1; $sec2[$lastKeyB] = $dContent; $sec2B[$dKey] = $lastKeyB; }
				}
				else if ($gKey === "list_details") {
				$callNum = $dContent['list_id'];
				if ($dContent['list_id'] === 1) { $markDiv = "currently_on"; } else { $markDiv = "currently_off"; }
				$listTabs.= '<div id="listTab-'.$dContent['list_id'].'" class="dash3Button '.$markDiv.'">'.$dContent['list_title'].'</div>';
				if ($dContent['list_array'] !== 'None') {
				$noOrder = $dContent['list_array'];
				$unClutter = unserialize(urldecode($noOrder));
				if (in_array($callNum,$listGate) === false) {
				$listGate[] = $callNum;
				$markList[$callNum] = 1;
				$getSLength = count($unClutter);
				$orderLength[] = $getSLength; } 
				$placeOrder[] = $unClutter; } else { $markList[$callNum] = 0; }
				$fullList[] = $callNum;
				}
				else if ($gKey === "book_catalog") {
				$listFind = $dContent['list_id'];
				$legitID = $dContent['cat_id'];
				$oneLower = $listFind - 1;
				$getDesc = $dContent['description'];
				$getDesc2 = substr($getDesc, 0, 420);
				$getDesc2.= "...";
				$getOrder = $dContent['book_id'];
				$getArr = $placeOrder[$oneLower];
				$getPlace = $getArr[$getOrder];
				$getBookPic = "http://books.google.com/books/content?id=".$dContent['google']."&printsec=frontcover&img=1&zoom=1&source=gbs_api";
				$getFullBook = '<div id="book-'.$listFind.'-'.$legitID.'" class="fullBook closedBook"><div id="bookDivLeft-'.$listFind.'-'.$legitID.'" style="position:relative; float:left; width:9vw; height:23vh; padding-top:1vh;"><img class="bookImg" src="'.$getBookPic.'"/></div>
				<div id="bookDivRight-'.$listFind.'-'.$legitID.'" style="position:relative; float:right; width:80%; margin-right:2.5%; height:100%; font-size:0.9vw; padding-top: 1vh; height:25%;">
					<div id="detailContent-'.$listFind.'-'.$legitID.'" style="position:relative; float:left; width:100%; clear:both;">
					<span class="spanE-Left">Title: '.$dContent['book_title'].'</span><span class="spanE-Right">Author: <span id="Fauthor-'.$listFind.'-'.$legitID.'" class="bookData1">'.$dContent['author_first'].'</span> <span id="Lauthor-'.$listFind.'-'.$legitID.'" class="bookData1">'.$dContent['author_last'].'</span></span>
					<span class="spanE-Left">Publish Date: '.$dContent['year'].'</span><span class="spanE-Right">ISBN: <span id="ISBN-'.$listFind.'-'.$legitID.'">'.$dContent['book_id'].'</span></span></div>
					<div id="detailMore-'.$listFind.'-'.$legitID.'" style="position:relative; float:left; width:100%; height:0px; overflow:hidden; font-size:0.9vw;">
					<span class="spanE-Left">Publisher: '.$dContent['publisher'].'</span><span class="spanE-Right">Category: '.$dContent['categories'].'</span>
					<span class="spanE-Left">Rating: '.$dContent['rating'].'</span><span class="spanE-Right"><a class="prevLink" href="http://books.google.com/books?id='.$dContent['google'].'&dq=isbn:'.$dContent['book_id'].'&hl=&cd=1&source=gbs_api">Yes</a></span></span></div>
					<div id="DescPrev-'.$listFind.'-'.$legitID.'" style="position:relative; float:left; height:9vh; clear:both; font-size:0.9vw; overflow:hidden;">Description: '.$getDesc2.'</div>
					<div id="DescPrev2-'.$listFind.'-'.$legitID.'" style="position:relative; float:left; height:0; max-height:18vh; margin-bottom:1.5vh; clear:both; font-size:0.9vw; overflow:hidden; overflow-y:scroll;">Description: '.$getDesc.'</div>
					<div class="openDetail2">Show Details</div>
					<button class="deleteBookBtn">Delete Book</button>
				</div>
				</div>';
				$bookClump[$oneLower][$getPlace] = $getFullBook;
				}
				if ($arrNotch4 >= $nCount && $addAll !== $totalVar) { $arrNotch = 0; $arrNotch4 = 1; $arrNotch2++; $arrNotch3++; $gKey = $aKey[$arrNotch2]; $nCount = $cVar[$arrNotch3]; }
				else { $arrNotch++; $arrNotch4++; }
			}

			$newClump = array(); global $newClump;
			foreach($bookClump as $Clump) { ksort($Clump); $newClump[] = $Clump; }
			?>
			</div>
@endsection

@section('userDetails')
	<?php global $secondC; echo $secondC; ?>
@endsection

@section('taskList')
	<?php
	global $scriptArray, $newClump, $orderLength, $fullList, $markList;
	$forCount = 0; 
	$finishedClump = "";
	$fullCount = intval(count($fullList));
	if ($fullCount > 0) {
	for($f = 1; $f <= $fullCount; $f++) {
	$determineType = $markList[$f]; 
	if ($f === 1) { $dStyle = "d-active"; } else { $dStyle = "inactive"; }
	$finishedClump.= "<div id='dash3-".$f."' class='dash3content ".$dStyle."'><div id='borderZ-".$f."' class='borderZone'>";
	if( $determineType === 1) {	$oc1 = $orderLength[$forCount];
	$targetArr = $newClump[$forCount];
	foreach ($targetArr as $target) { $finishedClump.= $target; }
	$forCount++; }
	$finishedClump.= "</div><div class='changeOrder'><button class='orderBtn'>Save Format</button></div></div>"; }
	} else { $finishedClump = "<div id='dash3-1' class='dash3content d-active' style='background:grey; top:0; left:0; height:100%;'><div id='borderZ-1' class='borderZone'></div></div>"; }
	echo $finishedClump;
	echo "<script>\n";
	global $script_arr;
	echo $script_arr;
	?>
@endsection

@section('navButtons')
	<?php global $listTabs; echo $listTabs; ?>
@endsection