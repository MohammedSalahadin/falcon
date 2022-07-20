$('body').delegate('.feedback li', 'click', function () {

  reaction=$(this).attr('class');
  $( ".feedback li" ).each(function( index ) {
    $(this).removeClass('active');
  });
	$(this).addClass('active');
  if(reaction=="angry"){
    $('.message_form').delay(500).show(90);
    $('.chat_area').delay(500).show(90);
    
    setTimeout(function () {
      $('#audio').get(0).play();
    }, 100);
  }
});
//close button for chat
$('body').delegate('.chat_close', 'click', function () {
  $('.message_form').hide();
  $('.chat_area').hide(100);
});
// open emojies list button for chat
$('body').delegate('#open_emoji_list', 'click', function () {
  if($('.emoojies_list').attr('status')=="0"){
    
    $('.emoojies_list').css('display','flex');
    $('.emoojies_list').attr('status','1');

  }else if($('.emoojies_list').attr('status')=="1"){
    $('.emoojies_list').css('display','none');
    $('.emoojies_list').attr('status','0');

  }

});

//send message to chat area
$('#send_chat').keypress(function (e) {
  message=$(this).val();
  if (e.which == 13) {
    if($(this).val()==''){return false;}
    $('.messages_area').append(`<div class="client_msg">${message}</div>`);
    $('.chat_area').animate({ scrollTop: $(document).height() }, 1000);
    $('.emoojies_list').css('display','none');
    $('.emoojies_list').attr('status','0');
    $('#send_chat').val('');
  }

});
//send emoji to chat area
$('body').delegate('.emoojies_list span', 'click', function () {
  emoji=$(this).text();
  $('.messages_area').append(`<div class="client_msg">${emoji}</div>`);
  $('.chat_area').animate({ scrollTop: $(document).height() }, 1000);
  $('.emoojies_list').css('display','none');
  $('.emoojies_list').attr('status','0');
});