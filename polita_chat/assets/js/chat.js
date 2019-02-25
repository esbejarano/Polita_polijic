var urlAjax = "http://127.0.0.1/crudpreguntas/organizer.php";

var ws = new WebSocket("ws://localhost:8000");

$(window).on('beforeunload', function(){ ws.close(); });

ws.onerror = function(event) { location.reload();}

ws.onmessage = function(event)  { 
	var message_received = event.data;
	chat_add_message(message_received, false);
};

function chat_add_message(message, isUser) {
	var class_prefix = 'chatbox__body__message chatbox__body__message';
	var icon_person = '<span class="oi oi-person"></span>';
	var class_suffix = isUser ? '--right' : '--left';
	var html = '<div class="' + class_prefix + class_suffix + '">' + icon_person + '<p>' + message + '</p>';
	chat_add_html(html);
}
	
function chat_add_html(html) {
	$(".chatbox__body").append(html);
	chat_scrolldown();
}

function chat_scrolldown() {
	$(".chatbox__body").animate({ 
		scrollTop: $(".chatbox__body")[0].scrollHeight 
	}, 500);
}

function sendFQ(message){
	
	$.post({
		url: urlAjax, 
		data: {
			"option": "registerFQ",
			"mail": $("#inputEmail").val(),
			"name": $("#inputName").val(),
			"question": message
		},
		type: "POST",
		headers: {
			"Access-Control-Allow-Origin": "*"
		},
		success: function(result, status, xhr){
			console.log('result: ', result);
			console.log('status: ', status);
			console.log('xhr: ', xhr);
		},
		error: function(xhr, status, error){
			console.log('error: ', error);
			console.log('status: ', status);
			console.log('xhr: ', xhr);
		}
	});
}
	
$(document).ready(function() {
		
	$('.chatbox__title').on('click', function() {
		$('.chatbox').toggleClass('chatbox--tray');
	});

	$('.chatbox__title__close').on('click', function(e) {
		e.stopPropagation();
		$('.chatbox').addClass('chatbox--closed');
	});
	
	$('.chatbox').on('transitionend', function() {
		if ($('.chatbox').hasClass('chatbox--closed')) {
			$('.chatbox').remove();
		}
	});
	
	$('.chatbox__message').on('keypress', function(event) {
		if (event.which === 13 && $(this).val() != ""){
			
			var message = $(this).val();
			$(this).val("");
			chat_add_message(message, true);
			ws.send(message);
			
			sendFQ(message);
		}
	});
	
	$('.chatbox__credentials').on('submit', function(e) {
		e.preventDefault();
		$('.chatbox').removeClass('chatbox--empty');
	});
});
