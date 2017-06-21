$(document).ready(function () { 
    $("#txtBookSearch").autocomplete({
        source: function (request, response) {
            var booksUrl = "https://www.googleapis.com/books/v1/volumes?printType=books&q=" + encodeURIComponent(request.term);
            $.ajax({
                url: booksUrl,
                dataType: "jsonp",
                success: function(data) {
                    response($.map(data.items, function (item) {
                        if (item.volumeInfo.authors && item.volumeInfo.title && item.volumeInfo.industryIdentifiers && item.volumeInfo.publishedDate)
                        {
                            return {
                                label: item.volumeInfo.title + ', ' + item.volumeInfo.authors[0] + ', ' + item.volumeInfo.publishedDate,
                                value: item.volumeInfo.title,
                                title: item.volumeInfo.title,
                                author: item.volumeInfo.authors[0],
                                isbn: item.volumeInfo.industryIdentifiers,
                                publishedDate: item.volumeInfo.publishedDate,
								publisher: item.volumeInfo.publisher,
								googleID: item.id,
								category: item.volumeInfo.categories,
								preview: item.accessInfo.viewability,
								rating: item.volumeInfo.averageRating,
                                image: (item.volumeInfo.imageLinks == null ? "" : item.volumeInfo.imageLinks.thumbnail),
                                description: item.volumeInfo.description,
                            };
                        }
                    }));
                }
            });
        },
        select: function (event, ui) {
		if (ui.item.description === undefined) {
		$(".barSearch").fadeIn(400); setTimeout(function() { $(".barSearch").fadeOut(400); },2000);
		} else {
		$('.bookDiv-Left').empty();;
		$('.detailContent').empty();;
		$('.detailMore').empty();;
		$('.DescPrev').empty();;
		$('.DescPrev2').empty();;
            var grabCrntIDA = $('.d-active').attr('id');
			$("#"+grabCrntIDA).stop().animate({"height":"70%"},300);
			grabCrntID = grabCrntIDA.split('-');
			grabCrntID = grabCrntID[1];
            if (ui.item.image != '') { $('.bookDiv-Left').append('<img class="bookImg" src="'+ui.item.image+'"/>'); }
			var callID = '<span class="b-data-'+grabCrntID+'">';
			var hiddenElements = '<span class="b-data-'+grabCrntID+'" style="display:none;">'+ui.item.googleID+'</span>';
			var addTextN = hiddenElements+'<span class="spanBk-Left"><b>Title:</b> '+callID+ui.item.title+'</span></span><span class="spanBk-Right"><b>Author:</b> '+callID+ui.item.author+'</span></span><span class="spanBk-Left"><b>Publish Date:</b> '+callID+ui.item.publishedDate+'</span></span><span class="spanBk-Right"><b>ISBN: </b>'+callID; 
			if (ui.item.isbn && ui.item.isbn[0].identifier) { addTextN = addTextN+ui.item.isbn[0].identifier+'</span></span>'; } else { addTextN = addTextN+"Unknown</span></span>"; }
			$('.detailContent').append(addTextN);
			var fLength = ui.item.description.substr(0,420);
			fLength = fLength+"...";
			var detailTextN = '<span class="spanBk-Left"><b>Publisher:</b> '+callID+ui.item.publisher+'</span></span><span class="spanBk-Right"><b>Category: </b> '+callID+ui.item.category+'</span></span><span class="spanBk-Left"><b>Rating: </b> '+callID+ui.item.rating+'</span></span><span class="spanBk-Right"><b>Preview: </b>';
			if (ui.item.preview == 'NO_PAGES') { detailTextN = detailTextN + "None</span>"; } else { detailTextN = detailTextN + "<a class='prevLink' href='http://books.google.com/books?id="+ui.item.googleID+"&dq=isbn:"+ui.item.isbn[0].identifier+"&hl=&cd=1&source=gbs_api'>Yes</a></span>"; } 
			$('.detailMore').append(detailTextN);
			$('.DescPrev').append('<b>Description:</b> '+fLength);
			$('.DescPrev2').append('<b>Description:</b> '+callID+ui.item.description+'</span>');
			$('.divDescription').fadeIn(400);
			}
        },
        minLength: 2 // set minimum length of text the user must enter
    });
});
