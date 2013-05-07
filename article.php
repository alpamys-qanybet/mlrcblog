<html>
<head>
<?php
	$id = $_GET['id'];
?>

<script type="text/javascript" src="static/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	var dataString = 'content=article' +
	 				 '&id=<?php echo $id; ?>';

	$.ajax
	(
		{
			type: 'POST',
			url: 'http://localhost:8080/mlrc/oper/cmsaasservlet.seam',
			dataType: 'json',
			data: dataString,
			success: function(article)
			{
				getArticleReadMore(article);
			}
		}
	);
});


function getArticleReadMore(article)
{
	var id = article.id;
	$('#content').append('<div id = "article_' + id + '"></div>');
	$('div#article_' + id).append('<img/>');
	$('div#article_' + id).append('<div></div>');
	
	$('div#article_' + id + ' img').attr('src', article.icon_host);
	$('div#article_' + id + ' img').css({ 'height': '300px' });
	$('div#article_' + id +' div').append(article.full_text);
}
</script>
</head>

<body>
	<h2>Article</h2>
	<div id="content"></div> 
</body>
</html>