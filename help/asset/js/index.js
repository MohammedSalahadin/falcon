//get result of search 
$('body').delegate('#search', 'input', function () {
  search_result($(this));
});
$('body').delegate('#clear_search_btn', 'click', function () {
  search_result($('#search'));
});
function search_result(x){
	var result= $(x).val().toLowerCase();

  $( ".bio_list" ).each(function( index ) {
    title=$(this).find('.bio_title').text().toLowerCase();
    desc=$(this).find('.bio_title').next().text().toLowerCase();
  
		if(title.includes(result) || desc.includes(result)){
			$(this).css('display','block');
		}else{
			$(this).css('display','none');
		}
  });
}