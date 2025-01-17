<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot UI</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start; /* Aligned to top for large chat container */
            background-color: #f4f4f4;
            min-height: 100vh;
        }

        .chat-container {
            width: 60%; /* Dynamic width for larger screen */
            max-width: 1200px; /* Limit max width */
            min-width: 400px; /* Minimum width for smaller screens */
            height: 700px; /* Increased height */
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .chat-header {
            background: #4CAF50;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
        }

        .chat-messages {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            background: #f9f9f9;
        }

        .message {
            margin-bottom: 15px;
            display: flex;
        }

        .message.user {
            justify-content: flex-end;
        }

        .message.bot {
            justify-content: flex-start;
        }

        .message .bubble {
            max-width: 70%;
            padding: 12px 15px;
            border-radius: 12px;
            font-size: 16px;
        }

        .message.user .bubble {
            background: #4CAF50;
            color: white;
        }

        .message.bot .bubble {
            background: #e0e0e0;
            color: black;
        }

        .chat-input {
            display: flex;
            border-top: 1px solid #ddd;
        }

        .chat-input textarea {
            flex: 1;
            padding: 12px;
            border: none;
            outline: none;
            resize: none;
            font-size: 16px;
        }

        .chat-input button {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }

        .chat-input button:hover {
            background: #45a049;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .chat-container {
                width: 90%; /* Adjust width for smaller screens */
                height: 600px; /* Reduce height */
            }

            .chat-header {
                font-size: 18px;
                padding: 10px;
            }

            .chat-messages {
                padding: 15px;
            }

            .chat-input textarea {
                font-size: 14px;
            }

            .chat-input button {
                font-size: 14px;
                padding: 8px 15px;
            }
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <div class="chat-header">Chat With Us</div>
        <div class="chat-messages" id="chat-messages"></div>
        <div class="chat-input">
            <textarea id="user-input" rows="1" placeholder="Type your message..."></textarea>
            <button onclick="sendMessage()">Send</button> 
        </div>
    </div>

    <script>
        const chatMessages = document.getElementById('chat-messages');

        function addMessage(message, sender) {
            const messageElement = document.createElement('div');
            messageElement.classList.add('message', sender);

            const bubbleElement = document.createElement('div');
            bubbleElement.classList.add('bubble');
            bubbleElement.textContent = message;

            messageElement.appendChild(bubbleElement);
            chatMessages.appendChild(messageElement);

            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        function sendMessage() {
            const userInput = document.getElementById('user-input');
            const message = userInput.value.trim();

            if (message) {
                addMessage(message, 'user');

                setTimeout(() => {
                    addMessage('This is a response from the bot.', 'bot');
                }, 1000);

                userInput.value = '';
            }
        }
    </script>
</body>
</html>
