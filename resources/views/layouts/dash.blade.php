<html>
<head>
<title>Dashboard</title>
<meta name="csrf_token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="{{ URL::asset('css/dash.css') }}" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
</head>
<body>
<div id="left-Side">
	<div class="bufferZone">
	<div id="dashBox1">@yield('content')
	<div id="logOutButton"><a href="{{URL::to('logout')}}" class="btn btn-danger btn-sm">Logout</a></div>
	</div>
	<div id="dashBox2">@yield('userDetails')</div>
	</div>
</div>
<div id="right-Side">
	<div class="bufferZone">
		<div id="dashBox3">
		<div class="barSearch">Sorry this book is not available at this time.</div>
		<div id="dash3Bar">@yield('navButtons')
		<div id="addListDash">
		<span id="addT2Txt">Add New List</span>
		<div id="addT2FormBx"><input id="addT2F" type="text" placeholder="Favorite Stories, Summer Reading List 1, etc"/></div>
		<div id="addT2SubmitBx"><button id="addListSubmit">Submit</button></div>
		</div>
		</div>
		<div id="titleBox">
			<div id="tBoxTextBx"><div id="tBxHeader">Enter a Title and Create a New Book List</div></div>
			<div id="tBoxFormBx"><input id="tBoxTitleF" type="text" placeholder="Favorite Stories, Summer Reading List 1, etc"/></div>
			<div id="tBoxSubmitBx"><button id="tListSubmit">Submit</button></div>
		</div>
		<div id="bookAdd">
		<div id="bookSearch">
		<label for="txtBookSearch" style="float:left; margin-top:1.5vh;">Search For A Book:</label>
			<input id="txtBookSearch" type="text">
			<select id="orderByList"><option value="0">No Sorting</option><option value="1">Authors First Name - Asc</option><option value="2">Authors First Name - Dsc</option><option value="3">Authors Last Name - Dsc</option><option value="4">Authors Last Name - Dsc</option></select>
			<label for="orderByList" style="float:right; margin-top:1.5vh;">Order By:</label>
			</div>
			<div class="divDescription">
			<div class="bookDiv-Left"></div>
			<div class="bookDiv-Right">
				<div class="detailContent"></div>
				<div class="detailMore"></div>
				<div class="DescPrev"></div>
				<div class="DescPrev2"></div>
				<div class="openDetail">Show Details</div>
				<button class="addBookBtn">Add Book To List</button>
			</div>
			</div>
		</div>
		</div>
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
	@yield('taskList')
	$(document).ready(function () {
	if (list_count != 0) { $('#bookAdd').fadeIn(400); }
	else { $('#titleBox').fadeIn(400); }
	
	var showBarOne = 0;
	$(".borderZone").sortable({
	 stop: function( event, ui ) {
	 if (showBarOne == 0) { $(this).parent().find(".changeOrder").fadeIn(400); }
		}
	 });
	
	$('#tListSubmit, #addListSubmit').on('mousedown', function() {
	var gOpenTab = $('.d-active').attr('id');
	gOpenTab = gOpenTab.split('-');
	gOpenTab = gOpenTab[1];
	var findV2 = $(this).attr("id");
	var tempPlus = parseInt(list_count) + 1;
	if (list_count != 0) { var titleVal = $("#addT2F").val(); }
	else { $('#bookAdd').fadeIn(400); var titleVal = $("#tBoxTitleF").val();
		}
	$.ajax({
        type: 'POST',
        url: '/createList',
        data: { 'userID':id, 'listID':gOpenTab, 'listCount':list_count, 'allCount':all_count, 'statID':stat_id, 'listTitle':titleVal, _token:'{{ csrf_token() }}' },
        success: function(data) {
		console.log(data);
        $("#dash3Bar").append("<div id='listTab-"+tempPlus+"' class='dash3Button currently_off'>"+titleVal+"</div>");
		$("#dashBox3").append('<div id="dash3-'+tempPlus+'" class="dash3content inactive" style="display: none;"><div class="borderZone"></div></div>');
		list_count = tempPlus; 
		if (findV2 == 'tListSubmit') { $("#titleBox").fadeOut(400); $('#bookAdd').fadeIn(400); $("#tBoxTitleF").empty(); $("#dash3-1").css({"top":"auto","bottom":"0","height":"93%"});
		}
		else { $("#addT2F").empty(); }
				},
		error: function(data){
        var errors = data.responseJSON;
        console.log(errors); }
			})
		});
	 
	$("#orderByList").change(function() {
	var findChange = $(this).val();
	findChange = parseInt(findChange);
	var oCheck2 = $('.d-active').attr('id');
	oCheck = oCheck2.split('-');
	oCheck = oCheck[1];
	oCheck = parseInt(oCheck);
	var NewChar = 'abcdefghijklmnopqrstuvwxyz';
	var startArray = new Array;
	var pullData1 = new Array;
	var pullData3 = new Array;
	var pullData5 = new Array;
	var reverseOrNo = 0;
	if (findChange == 1 || findChange == 2) { var getAuthor = "#Fauthor-"; if (findChange == 2) { reverseOrNo = 1; }
	}
	else { 	var getAuthor = "#Lauthor-"; if (findChange == 4) { reverseOrNo = 1; }
	}
	$(".bookData1").each(function(){ var posArray2 = $(this).attr("id"); 
	var cutPos2 = posArray2.split("-"); var crntPos2 = cutPos2[1]; var nextPos2 = cutPos2[2]; crntPos2 = parseInt(crntPos2);
	if (crntPos2 == oCheck) { var getAuthor1 = $(getAuthor+crntPos2+"-"+nextPos2).text();
	var removeKey = jQuery.inArray(getAuthor1[0],pullData5); if (removeKey == -1) { startArray.push(nextPos2); var cutDataN1 = getAuthor1[0]; pullData5.push(cutDataN1); 
	var cutLow1 = cutDataN1.toLowerCase(); var getPos1 = NewChar.search(cutLow1);
	pullData1.push(getPos1); pullData3.push(getPos1); }
		}
	});
	function compareNumbers(a, b){ return a - b; }
	var key1 = new Array; var key2 = new Array;
	pullData1.sort(compareNumbers);
	for (p = 0; p < pullData1.length; p++) { var p1 = pullData3[p]; var p2 = pullData1.indexOf(p1); key1.push(p2); key2.push(p2); }
	key2.sort(compareNumbers);
	var listData1 = new Array;
	var getLTarget = $("#"+oCheck2).find(".borderZone");
	for (f = 0; f < pullData1.length; f++) { var comp1 = key2[f]; var comp2 = key1.indexOf(comp1); var comp3 = startArray[comp2]; listData1.push(comp3); }
	if (reverseOrNo == 1) { listData1.reverse(); }
	for (t = 0; t < listData1.length; t++) { var crntE = listData1[t]; $("#book-"+oCheck+"-"+crntE).appendTo(getLTarget); }
	});
	 
	$('.orderBtn').on('mousedown', function() {
	var wID = $(this).parent().parent().attr("id");
	var splitW = wID.split('-');
	wID2 = splitW[0];
	wID = splitW[1];
	var currentDList = new Array();
	$(".fullBook").each(function(){ var posArray = $(this).attr("id"); 
	var cutPos = posArray.split("-"); var crntPos = cutPos[1]; var nextPos = cutPos[2]; crntPos = parseInt(crntPos);
	if (crntPos == wID) { var takeISBN = $("#ISBN-"+crntPos+"-"+nextPos).text(); currentDList.push(takeISBN); }
		});
	$.ajax({
			type: 'POST',
			url: '/orderBook',
			data: { 'ownerID':id, 'listID':wID, 'changeArr':currentDList, _token:'{{ csrf_token() }}' },
			success: function(data) {
			console.log(data);
					},
			error: function(data){
			var errors = data.responseJSON;
			console.log(errors); }
			})
	});
		
	var detailOpen = 0;
	$('.openDetail').on('mousedown', function() {
	var gActive = $(this).parent();
	var descItem = gActive.find('.DescPrev');
	var descItem2 = gActive.find('.DescPrev2');
	var picItem = gActive.parent().parent().find('.bookDiv-Left');
	if (detailOpen == 0) {
	gActive.find('.detailMore').stop().animate({"height":"5vh"},300);
	descItem.css({"height":"0"});
	descItem2.css({"height":"9vh"});
	descItem2.stop().animate({"height":"auto"},300);
	$(this).empty();
	$(this).text("Close Details");
	picItem.stop().animate({"height":"26vh"},300);
	detailOpen = 1;
	} else { 
	gActive.find('.detailMore').stop().animate({"height":"0"},300);
	descItem2.css({"height":"0"});
	descItem.css({"height":"9vh"});
	$(this).empty();
	$(this).text("Show Details");
	picItem.stop().animate({"height":"20vh"},300);
	detailOpen = 0;
			}
		});
		
	$('.openDetail2').on('mousedown', function() {
	var bookIDN =  $(this).parent().parent().attr("id");
	bookIDN = bookIDN.split('-');
	bookIDN1 = bookIDN[1];
	bookIDN2 = bookIDN[2];
	var wStatus = $("#book-"+bookIDN1+"-"+bookIDN2).attr("class");
	wStatus = wStatus.split(' ');
	wStatus = wStatus[1];
	if (wStatus == 'closedBook') {
	$("#detailMore-"+bookIDN1+"-"+bookIDN2).stop().animate({"height":"5vh"},300);
	$("#DescPrev-"+bookIDN1+"-"+bookIDN2).css({"height":"0"});
	$("#DescPrev2-"+bookIDN1+"-"+bookIDN2).css({"height":"9vh"});
	$("#DescPrev2-"+bookIDN1+"-"+bookIDN2).stop().animate({"height":"auto"},300);
	$(this).empty();
	$(this).text("Close Details");
	$("#bookDivLeft-"+bookIDN1+"-"+bookIDN2).stop().animate({"height":"26vh"},300);
	$(this).parent().parent().removeClass("closedBook").addClass("openBook");
	} else { 
	$("#detailMore-"+bookIDN1+"-"+bookIDN2).stop().animate({"height":"0"},300);
	$("#DescPrev2-"+bookIDN1+"-"+bookIDN2).css({"height":"0"});
	$("#DescPrev-"+bookIDN1+"-"+bookIDN2).css({"height":"9vh"});
	$(this).empty();
	$(this).text("Show Details");
	$("#bookDivLeft-"+bookIDN1+"-"+bookIDN2).stop().animate({"height":"21.5vh"},300);
	$(this).parent().parent().removeClass("openBook").addClass("closedBook");
			}
		});
		
	$(document).on('mousedown', '.dash3Button', function(){
	var dButton = $(this).attr("id");
	var activeBtn = $(this).attr("class");
	activeBtn = activeBtn.split(' ');
	var checkBtn = activeBtn[1];
	if (checkBtn == "currently_off") {
	$(".d-active").fadeOut(400); 
	function TurnOn() {
	$(".d-active").addClass("inactive").removeClass("d-active");
	$(".currently_on").addClass("currently_off").removeClass("currently_on");
	$(this).addClass("currently_on").removeClass("currently_off");
	var findCont = dButton.split("-");
	dButton = findCont[1];
	$("#dash3-"+dButton).addClass("d-active").removeClass("inactive").fadeIn(400); 
			}
	setTimeout(TurnOn,400); 
		}
	});
	
		
	$('.addBookBtn').on('mousedown', function() {
		var gOpenTab2 = $('.d-active').attr('id');
		var nChange = gOpenTab2;
		gOpenTab2 = gOpenTab2.split('-');
		gOpenTab2 = gOpenTab2[1];
		var cBData = new Array();
		cBData.push(gOpenTab2);
		$(".b-data-"+gOpenTab2).each(function(){ var bookField = $(this).text(); 
		cBData.push(bookField); });
		var thisSearch = $(this).parent().parent();
		var thisPar2 = $(this).parent();
		var r1 = $(this).parent().parent().find('.bookDiv-Left');
		var r2 = thisPar2.find('.detailContent');
		var r3 = thisPar2.find('.detailMore');
		var r4 = thisPar2.find('.DescPrev');
		var r5 = thisPar2.find('.DescPrev2');
		$.ajax({
			type: 'POST',
			url: '/addBook',
			data: { 'ownerID':id, 'listID':cBData[0], 'bookID':cBData[5], 'googleID':cBData[1], 'title':cBData[2], 'author':cBData[3], 'published':cBData[4], 'publisher':cBData[6], 'category':cBData[7], 'rating':cBData[8], 'description':cBData[9], _token:'{{ csrf_token() }}' },
			success: function(data) {
			thisSearch.stop().animate({"height":"0"}, 300, function() {
			$("#dash3-"+gOpenTab2).append(data);
			r1.empty(); r2.empty(); r3.empty(); r4.empty(); r5.empty();
			$("#txtBookSearch").empty();
			thisSearch.css({"height":"auto","display":"none"});
						});
			$("#"+nChange).stop().animate({"height":"93%"}, 300);
			$(".borderZone").sortable("refresh");
					},
			error: function(data){
			var errors = data.responseJSON;
			console.log(errors); }
			})
		});
		
		$('.deleteBookBtn').on('mousedown', function() {
		var getDElem = $(this).parent().parent();
		var dSplit = getDElem.attr("id");
		dSplit = dSplit.split('-');
		var dList = dSplit[1];
		var dBook = dSplit[2];
		var getISBN = $("#ISBN-"+dList+"-"+dBook).text();
		$.ajax({
			type: 'POST',
			url: '/deleteBook',
			data: { 'ownerID':id, 'listID':dList, 'bookID':dBook, 'currentISBN':getISBN, _token:'{{ csrf_token() }}' },
			success: function(data) {
			console.log(data);
			$("#book-"+dList+"-"+dBook).remove();
					},
			error: function(data){
			var errors = data.responseJSON;
			console.log(errors); }
			})
		});
	});
	</script>
	</div>
</div>
</body>
</html>