<h1 class="homecatname">Forum</h1>

<p class="forumConsigne">Vous avez des questions? Vous êtes au bon endroit (っ▀¯▀)つ</p>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<body>
	<div class="contentforum">
		<div id="messages"></div>

    <!-- formulaire d'envoie d'un nouveau message -->
		<div class="sendForum">
			<input type="text" id="input-text" placeholder="Entrez votre message ici">
			<button id="btn-submit">Envoyer</button>
		</div>
	</div>



<script>
  $(document).ready(function() {
    $('#btn-submit').click(function() {
      var inputText = $('#input-text').val(); // Récupération du texte saisi
      sendData(inputText); // Appel de la fonction sendData() pour envoyer les données
    });

    $('#input-text').keypress(function(event) {
      if (event.which == 13) { // Vérification si la touche "Enter" a été pressée
        var inputText = $('#input-text').val(); // Récupération du texte saisi
        sendData(inputText); // Appel de la fonction sendData() pour envoyer les données
      }
    });
  });

  function sendData(inputText) {
    $.ajax({
      url: './assets/php/forum_send.php',
      type: 'POST',
      data: {inputText: inputText}, // Envoi du texte saisi
      success: function(response) {
        console.log(response); // Affichage de la réponse reçue du serveur
        $('#input-text').val(''); // Effacement du texte saisi dans l'input
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
      }
    });
  }

function getMessages() {
        $.ajax({ // Appel de la fonction php pour recuperer tout les messages déjà envoyé
            url: "./assets/php/forum_recup.php",
            success: function(response) {
                $("#messages").html(response);
            }
        });
    }

    // Récuperation des message toute les 1000 ms pour l'instantanéité des envoie et receptions
    $(document).ready(function() {
        setInterval(getMessages, 1000); 
    });

    window.onload = getMessages();


</script>
