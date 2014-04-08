<!DOCTYPE html>  
<html lang="en">  
<head>
<meta charset="utf-8" />  
<title>AJAX Test</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>  

<body>
<script type="text/javascript">

function get_fixture(tournament_id)
{
	$.ajax({ url: '/ajax/request.php',
	 data: {for: 'fixtures', tournamentid: tournament_id},
	 type: 'get',
	 success: function(output) {
				  $('#fixtures').text(output);
	}});
}


function get_team(id)
{
	$.ajax({ url: '/ajax/request.php',
	 data: {for: 'team', teamid: id},
	 type: 'get',
	 success: function(output) {
		$('#teams').append(output)
	 }});
}

get_fixture(1);
get_team(1);
get_team(2);

</script>
<div id="fixtures">

</div>

<div id="teams">

</div>
</body>
</html>