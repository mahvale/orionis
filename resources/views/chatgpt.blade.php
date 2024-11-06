<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot avec ChatGPT</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Chatbot</h1>

    <div>
        <textarea id="message" rows="4" cols="50" placeholder="Posez une question..."></textarea><br>
        <button id="send">Envoyer</button>
    </div>

    <div id="response">
        <!-- La réponse du chatbot s'affichera ici -->
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#send').click(function () {
                var message = $('#message').val();

                // Envoi d'une requête AJAX vers Laravel
                $.ajax({
                    url: '/chatbot',
                    type: 'POST',
                    data: {
                        message: message,
                        _token: "{{ csrf_token() }}"  // Laravel CSRF Token
                    },
                    success: function (response) {
                        console.log(response)
                        $('#response').html('<p>Chatbot : ' + response.choices[0].message.content + '</p>');
                    },
                    error: function () {
                        $('#response').html('<p>Erreur lors de la communication avec l\'API.</p>');
                    }
                });
            });
        });
    </script>
</body>
</html>