<html>
	<head>
		<link href="css/ajax.css?20181201" type="text/css" rel="stylesheet" />
		<script src="js/ajax.js?20181205"></script>
	</head>
	<body>
		
		<div class="box">
			<div id="chat" style="background-color:white; overflow-x:hidden; overflow-y:scroll;"> </div>
			<div id="ips" > </div>
			<input id="msg" autofocus autocomplete="off" placeholder="Mensaje">
			<button id="snd">Send</button>
			<input id="user" autofocus autocomplete="off" placeholder="Usuario">
			
			<div id=emoji>
				<img src='https://cdn.shopify.com/s/files/1/1061/1924/products/Nerd_with_Glasses_Emoji_2a8485bc-f136-4156-9af6-297d8522d8d1_large.png?v=1483276509' onclick="document.getElementById('msg').value += this.outerHTML">
				<img src='https://i.pinimg.com/originals/49/83/74/498374267516c7c6ffd2051c23611da5.png' onclick="document.getElementById('msg').value += this.outerHTML">
				<img src='https://cdn130.picsart.com/269051682030211.png?r1024x1024' onclick="document.getElementById('msg').value += this.outerHTML">
			</div>
			
		</div>


	
			
			
		</div>
	</body>
</html>