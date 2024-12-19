<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatGPT-like UI</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f7f7f7;
        }

        .chat-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            margin: auto;
            width: 100%;
            max-width: 900px; /* Set maximum width for desktop view */
            background: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .chat-header {
            background: #10a37f;
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
            background: #f7f7f7;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .message {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 16px;
        }

        .message.user {
            justify-content: flex-end;
        }

        .message.bot {
            justify-content: flex-start;
        }

        .bubble {
            max-width: 75%;
            padding: 15px;
            border-radius: 10px;
            line-height: 1.5;
        }

        .message.user .bubble {
            background: #10a37f;
            color: white;
            border-bottom-right-radius: 0;
        }

        .message.bot .bubble {
            background: #e9e9e9;
            color: #333;
            border-bottom-left-radius: 0;
        }

        .chat-input {
            display: flex;
            padding: 10px;
            border-top: 1px solid #ddd;
            background: white;
        }

        .chat-input textarea {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            resize: none;
            outline: none;
            height: 50px;
        }

        .chat-input button {
            background: #10a37f;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-left: 10px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        .chat-input button:hover {
            background: #0e8f6d;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .chat-container {
                width: 95%;
            }

            .bubble {
                max-width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <div class="chat-header">ChatGPT</div>
        <div class="chat-messages" id="chat-messages">
            <!-- Example messages -->
            <div class="message bot">
                <div class="bubble">Hi! How can I help you today?</div>
            </div>
            <div class="message user">
                <div class="bubble">Can you tell me more about OpenAI?</div>
            </div>
            <div class="message bot">
                <div class="bubble">Sure! OpenAI is an AI research and deployment company...</div>
            </div>
        </div>
        <div class="chat-input">
            <textarea id="user-input" placeholder="Type your message..."></textarea>
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

            // Auto scroll to the bottom
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        function sendMessage() {
            const userInput = document.getElementById('user-input');
            const message = userInput.value.trim();

            if (message) {
                addMessage(message, 'user');

                setTimeout(() => {
                    addMessage('This is a bot response.', 'bot');
                }, 1000);

                userInput.value = '';
            }
        }
    </script>
</body>
</html>
