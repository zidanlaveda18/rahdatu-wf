<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel 10 - BotMan Chatbot - Code Shotcut</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <!-- Chatbot widget will be injected here -->
    </body>
    <script>
        var botmanWidget = {
            frameEndpoint: '/botman/chat',
            title: 'Rahdatu Furniture Assistant',
            introMessage: "Hai, apa yang bisa saya bantu?",
            placeholderText: 'Ketik pesan Anda...',
            mainColor: '#0084ff',
            bubbleBackground: '#0084ff',
            aboutText: 'Start the conversation with Hi',
            aboutLink: 'https://yourwebsite.com'
        };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js"></script>
</html>
