window.onload = function() {
	//focus on search input
	$( "#search" ).focus();
};
//display close button for search field when input
$('body').delegate('#search', 'input', function () {
	if($(this).val()==""){
		$('#clear_search_btn').hide();
	}else{
		$('#clear_search_btn').show();
		}

});
$('body').delegate('#search', 'click', function () {
	if($(this).val()==""){
		$('#clear_search_btn').hide();
	}else{
		$('#clear_search_btn').show();
	}
});
//hide close button for search field when clicked and clear search field
$('body').delegate('#clear_search_btn', 'click', function () {
	$(this).hide();
	$(this).parent().find('input').val("");
	$(this).parent().find('input').focus();

});

//hide when click outside
$(document).mouseup(function(e) {

	if (!$('#search').is(e.target) && $('#search').has(e.target).length === 0) {
		$('#clear_search_btn').hide();
	}

});

