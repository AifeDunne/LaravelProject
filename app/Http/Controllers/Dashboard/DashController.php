<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use View;
use App\list_catalog;
use App\user_stats;
use App\book_catalog;
use App\book_detail;
use App\add_id;
use App\add_book_id;
use DB;

class DashController extends Controller
{
    public function getDash() {
	if (Auth::check()) {
	$fResults = array();
	$fGuide = array('array_guide','primary');
	$firstID = Auth::user()->id;
	$firstName = Auth::user()->name;
	$userID = Auth::user()->join('user_stats', 'user_stats.owner_id', '=', 'users.id')->where('users.id', '=', Auth::user()->id)->first();
	if (is_null($userID)) {
	$makeNewStats = new user_stats();
	$makeNewStats->owner_id = $firstID;
	$makeNewStats->crnt_count = 0;
	$makeNewStats->list_count = 0;
	$makeNewStats->all_count = 0; 
	$makeNewStats->save();
	$userID = Auth::user()->join('user_stats', 'user_stats.owner_id', '=', 'users.id')->where('users.id', '=', Auth::user()->id)->first();}
	$dbKey = intval($userID->owner_id);
	$b1 = intval($userID->crnt_count);
	$b2 = intval($userID->list_count);
	$b3 = intval($userID->all_count);
	$fResults['primary'] = array('id' => $firstID,'user_name' => $userID->name,'stat_id' => $userID->id, 'book_count' => $b1, 'list_count' => $b2, 'all_count' => $b3); 
	$profile = Auth::user()->join('user_details', 'user_details.owner_id', '=', 'users.id')->where('users.id', '=', Auth::user()->id)->first();
	if (!is_null($profile)) {
	$fResults['user_details'] = array('detail_id' => $profile->id,'real_name' => $profile->real_name,'gender' => $profile->gender,'fav_book' => $profile->fav_book,'fav_genre' => $profile->fav_genre,'fav_author' => $profile->fav_author,'region' => $profile->region, 'country' => $profile->country);
	$fGuide[] = 'user_details';
	}
	if ($b2 !== 0) {
	if ($b2 === 1) { 
	$bookDetails = Auth::user()->join('list_catalog', 'list_catalog.owner_id', '=', 'users.id')->where('users.id', '=', Auth::user()->id)->first(); 
	$fResults['list_details'][] = array('list_id' => $bookDetails->list_id,'list_array' => $bookDetails->list_array,'list_title' => $bookDetails->list_title,'fullCount' => $bookDetails->fullCount); }
	else { 
	$bookDetails = Auth::user()->join('list_catalog', 'list_catalog.owner_id', '=', 'users.id')->where('users.id', '=', Auth::user()->id)->get(); 
	foreach ($bookDetails as $bookDetail) {
	$fResults['list_details'][] = array('list_id' => $bookDetail->list_id,'list_array' => $bookDetail->list_array,'list_title' => $bookDetail->list_title,'list_order' => $bookDetail->list_order, 'fullCount' => $bookDetail->fullCount);}
	}
	$fGuide[] = 'list_details';
	if ($b1 && $b3 !== 0) {
	if ($b1 === 1) {
	$books = Auth::user()->join('book_catalog', 'book_catalog.owner_id', '=', 'users.id')->join('book_detail', 'book_detail.book_id', '=', 'book_catalog.book_id')->where('users.id', '=', Auth::user()->id)->first();
	$fResults['book_catalog'] = array(1 => array('cat_id' => $books->id,'book_id' => $books->book_id,'google' => $books->google_id,'list_id'=>$books->list_id, 'book_title' => $books->title,'author_last' => $books->author_last,'author_first' => $books->author_first,'year' => $books->year,'publisher' => $books->publisher, 'categories' => $books->categories,'rating' => $books->rating, 'description' => $books->description)); }
	else {
	$books = Auth::user()->join('book_catalog', 'book_catalog.owner_id', '=', 'users.id')->join('book_detail', 'book_detail.book_id', '=', 'book_catalog.book_id')->where('users.id', '=', Auth::user()->id)->get(); 
	foreach ($books as $book) {
	$fResults['book_catalog'][] = array('cat_id' => $book->id,'book_id' => $book->book_id,'google' => $book->google_id,'list_id' => $book->list_id, 'book_title' => $book->title,'author_last' => $book->author_last,'author_first' => $book->author_first,'year' => $book->year,'publisher' => $book->publisher, 'categories' => $book->categories,'rating' => $book->rating, 'description' => $book->description); }
	}
	$fGuide[] = 'book_catalog'; 
		}
	}
		return view('dash\front', array('array_guide' => $fGuide, 
						'data' => $fResults, 
						));  
					}
	else { return redirect('/'); }
	}
	
	public function addNewList() {
		$fID = intval($_POST["userID"]);
		$list_num = intval($_POST["listCount"]);
		$list_num = $list_num + 1;
		$updateList = new list_catalog();
		$updateList->owner_id = $fID;
		$updateList->list_id = $list_num;
		$updateList->list_array = 'None';
		$updateList->list_title = $_POST["listTitle"];
		$updateList->fullCount = 0;
		$updateList->save();
		$addList = list_catalog::get();
		$convertTo = $addList->toArray();
		$sKey = $fID.$list_num;
		$sKey = intval($sKey);
		$takeID = 0;
		foreach ($addList as $list) {
		$tryKey = $list['owner_id'].$list['list_id'];
		$tryKey = intval($tryKey);
		if ($tryKey === $sKey) { $takeID = $list['id']; }
		}
		$addIDArray = new add_id();
		$addIDArray->arr_id = $takeID;
		$addIDArray->all_id = $sKey;
		$addIDArray->owner_id = $fID;
		$addIDArray->save();
		
		$all_count_num = $_POST["allCount"];
		$stat_key = $_POST["statID"];
		$all_count_num = $all_count_num + 1;
		 DB::table('user_stats')
        ->where('owner_id', $nID)
        ->limit(1)
		->update(array('crnt_count' => $list_num, 'all_count' => $all_count_num));
	}
	
	public function addNewBook() {
		$checkID = intval($_POST["ownerID"]);
		$listID = intval($_POST["listID"]);
		$searchID = $checkID."-".$listID;
		$newID = $checkID.$listID;
		$newID = intval($newID);
		$bookID = $_POST["bookID"];
		$googleID = $_POST["googleID"];
		$bookAuthor = $_POST["author"];
		$nameSplit = explode(" ",$bookAuthor);
		$firstName = $nameSplit[0];
		$lastName = $nameSplit[1];
		$publishedBook = $_POST["publisher"];
		if ($publishedBook === "undefined") { $publishedBook = "Unknown"; }
		
		$addBook = new book_catalog();
		$addBook->owner_id = $checkID;
		$addBook->book_id = $bookID;
		$addBook->google_id = $googleID;
		$addBook->list_id = $listID;
		$addBook->title = $_POST["title"];
		$addBook->author_last = $lastName;
		$addBook->author_first = $firstName;
		$addBook->year = $_POST["published"];
		$addBook->save();
		
		$addDetails = new book_detail();
		$addDetails->owner_id = $checkID;
		$addDetails->book_id = $bookID;
		$addDetails->publisher = $publishedBook;
		$addDetails->categories = $_POST["category"];
		$addDetails->rating = $_POST["rating"];
		$addDetails->description = $_POST["description"];
		$addDetails->save();
		
		$searchList = add_id::find($newID);
		$convertL = $searchList->toArray();
		$fMultiKey = $convertL['arr_id'];
		$grabList = list_catalog::find($fMultiKey);
		$catalogArray = $grabList->toArray();
		$checkArr = $catalogArray['list_array'];
		$addFCount = $catalogArray['fullCount'];
		$addFCount = intval($addFCount)+1;
		if ($checkArr === 'None') { $list_arr = array($bookID => 1); }
		else { $list_arr = unserialize($checkArr); $cntList = count($list_arr)+1; $list_arr[$bookID] = $cntList; }
		$up_arr = serialize($list_arr);
		$grabList->list_array = $up_arr;
		$grabList->fullCount = $addFCount;
		$grabList->save();
		
		$nID = Auth::user()->id;
		$grabStats = Auth::user()->join('user_stats', 'user_stats.owner_id', '=', 'users.id')->where('users.id', '=', Auth::user()->id)->first();
		$checkStatCount = $grabStats->toArray();
		$getCrntID = $checkStatCount['owner_id'];
		$addCrntCnt = $checkStatCount['crnt_count'];
		$addCrntCnt = intval($addCrntCnt)+1;
		$addAllCnt = $checkStatCount['all_count'];
		$addAllCnt = intval($addAllCnt)+1;
		 DB::table('user_stats')
        ->where('owner_id', $nID)
        ->limit(1)
		->update(array('crnt_count' => $addCrntCnt, 'all_count' => $addAllCnt));

		$getDesc = $_POST["description"];
		$getDesc2 = substr($getDesc, 0, 420);
		$getDesc2.= "...";
		$getBookPic = "http://books.google.com/books/content?id=".$googleID."&printsec=frontcover&img=1&zoom=1&source=gbs_api";
		$getFullBook = '<div id="book-'.$listID.'-'.$addFCount.'" class="fullBook closedBook"><div id="bookDivLeft-'.$listID.'-'.$addFCount.'" style="position:relative; float:left; width:9vw; height:23vh; padding-top:1vh;"><img class="bookImg" src="'.$getBookPic.'"/></div>
				<div id="bookDivRight-'.$listID.'-'.$addFCount.'" style="position:relative; float:right; width:80%; margin-right:2.5%; height:100%; font-size:0.9vw; padding-top: 1vh; height:25%;">
					<div id="detailContent-'.$listID.'-'.$addFCount.'" style="position:relative; float:left; width:100%; clear:both;">
					<span class="spanE-Left">Title: '.$_POST["title"].'</span><span class="spanE-Right">Author: <span id="Fauthor-'.$listID.'-'.$addFCount.'" class="bookData1">'.$firstName.'</span> <span id="Lauthor-'.$listID.'-'.$addFCount.'" class="bookData1">'.$lastName.'</span></span>
					<span class="spanE-Left">Publish Date: '.$_POST["published"].'</span><span class="spanE-Right">ISBN: <span id="ISBN-'.$listID.'-'.$addFCount.'">'.$bookID.'</span></span></div>
					<div id="detailMore-'.$listID.'-'.$addFCount.'" style="position:relative; float:left; width:100%; height:0px; overflow:hidden; font-size:0.9vw;">
					<span class="spanE-Left">Publisher: '.$publishedBook.'</span><span class="spanE-Right">Category: '.$_POST["category"].'</span>
					<span class="spanE-Left">Rating: '.$_POST["rating"].'</span><span class="spanE-Right"><a class="prevLink" href="http://books.google.com/books?id='.$googleID.'&dq=isbn:'.$bookID.'&hl=&cd=1&source=gbs_api">Yes</a></span></span></div>
					<div id="DescPrev-'.$listID.'-'.$addFCount.'" style="position:relative; float:left; height:9vh; clear:both; font-size:0.9vw; overflow:hidden;">Description: '.$getDesc.'</div>
					<div id="DescPrev2-'.$listID.'-'.$addFCount.'" style="position:relative; float:left; height:0; max-height:18vh; margin-bottom:1.5vh; clear:both; font-size:0.9vw; overflow:hidden; overflow-y:scroll;">Description: '.$getDesc.'</div>
					<div class="openDetail2">Show Details</div>
					<button class="deleteBookBtn">Delete Book</button>
				</div>
				</div>';
		return($getFullBook);
	}
	public function removeBook() {
	$deleteID = intval($_POST["ownerID"]);
	$modList = intval($_POST["listID"]);
	$findList = $deleteID."-".$modList;
	$findList = $deleteID.$modList;
	$findList = intval($findList);
	$removeBook = $_POST["bookID"];
	$removeISBN = $_POST['currentISBN'];
	
		$foundList = list_catalog::find($modList)->first();
		$locateList = add_id::find($findList);
		$convertD = $locateList->toArray();
		$dMultiKey = $convertD['arr_id'];
		$foundList = list_catalog::find($dMultiKey);
		$unpackData = $foundList->toArray();
		$grabArray = $unpackData['list_array'];
		$grabCount = $unpackData['fullCount'];
		$grabCount = intval($grabCount)-1;
		$unpackArray = unserialize($grabArray);
		unset($unpackArray[$removeISBN]);
		$packKeys = array_keys($unpackArray);
		$packCount = count($unpackArray);
		$newPack = array();
		for ($u = 0; $u < $packCount; $u++) { $pDat = $packKeys[$u]; $plusArr = $u + 1; $newPack[$pDat] = $plusArr; }
		$newSerial = serialize($newPack);
		$foundList->list_array = $newSerial;
		$foundList->fullCount = $grabCount;
		$foundList->save();
		
		$foundBook = book_catalog::find($removeBook);
		$foundBook->delete();
		$foundDetail = book_detail::find($removeBook);
		$foundDetail->delete();
		
		$lowerStats = Auth::user()->join('user_stats', 'user_stats.owner_id', '=', 'users.id')->where('users.id', '=', Auth::user()->id)->first();
		$alterStats = $lowerStats->toArray();
		$lowerCnt = $alterStats['crnt_count'];
		$lowerCnt = intval($lowerCnt)-1;
		$lowerACnt = $alterStats['all_count'];
		$lowerACnt = intval($lowerACnt)-1;
		DB::table('user_stats')
        ->where('owner_id', $deleteID)
        ->limit(1)
		->update(array('crnt_count' => $lowerCnt, 'all_count' => $lowerACnt));
		return "SUCCESS";
	}
	
	public function orderBook() {
	$orderID = intval($_POST["ownerID"]);
	$thisList = intval($_POST["listID"]);
	$changeID = $orderID.$thisList;
	$changeID = intval($changeID);
	$changeArr = $_POST['changeArr'];
	$takeArr = array();
	$takeCount = 1;
	foreach ($changeArr as $change) { 
	$takeArr[$change] = $takeCount;
	asort($takeArr);
	$takeCount++;
	}
	$pullList = list_catalog::find($thisList)->first();
	$mineList = add_id::find($changeID);
	$convertT = $mineList->toArray();
	$TMultiKey = $convertT['arr_id'];
	$takeList = list_catalog::find($TMultiKey);
	$serial = serialize($takeArr);
	$takeList->list_array = $serial;
	$takeList->save();
	return $takeArr;
	}
}
