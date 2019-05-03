var postId = 0;
var postBodyElement = null;

$('.post').find('.interaction').find('.edit').on('click', function(event){
	event.preventDefault();

	postBodyElement = event.target.parentNode.parentNode.childNodes[1]
	var postBody = postBodyElement.textContent;
	postId = event.target.parentNode.parentNode.dataset['postid'];

	$('#post-body').val(postBody);
	$('#edit-modal').modal();
});

$('input').keyup(function(e){
    if(e.keyCode == 13)
    {
        $(this).trigger("enterKey");
    }
});

$('input').bind('enterKey', function(event){
	event.preventDefault();
	postId = event.target.parentNode.childNodes[3].value;
	comment = event.target.value;

	$.ajax({
		method: 'POST',
		url: urlComment,
		data: {comment: comment, postId: postId, _token: token }
	})
	.done(function(msg){

		user = msg['new_comment'].name;
		comment = msg['new_comment'].comment;
		var commentHtml = "<p><span style='font-weight: bold'>" + user + "</span> " + comment + "</p>";
		eval("$('#commentsPost"+postId+"')").append(commentHtml);
		event.target.value = '';
	})
	
});

$('#post-save').click('on', function(){
	$.ajax({
		method: 'POST',
		url: urlEdit,
		data: {body: $('#post-body').val(), postId: postId, _token: token }
	})
	.done(function(msg){
		$(postBodyElement).text(msg['new_body']);
		$('#edit-modal').modal('hide');
	})
});



$('.like').click('on', function(event){
	event.preventDefault();
	postId = event.target.parentNode.parentNode.dataset['postid'];
	var isLike = event.target.previousElementSibling == null
	$.ajax({
		method: 'POST',
		url: urlLike,	
		data: {isLike: isLike, postId: postId, _token: token}
	})
	.done(function(){
		event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this post' :'Like' : event.target.innerText == 'DisLike' ? 'You don\'t like this post' : 'Dislike';
		if(isLike){
			event.target.nextElementSibling.innerText = 'Dislike';
		}else{
			event.target.previousElementSibling.innerText = 'Like';
		}

	})

});