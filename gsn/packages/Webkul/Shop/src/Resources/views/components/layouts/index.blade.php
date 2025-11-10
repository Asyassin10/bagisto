@props([
    'hasHeader' => true,
    'hasFeature' => true,
    'hasFooter' => true,
])
@php
    $routename = Route::currentRouteName();
@endphp
<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}" dir="{{ core()->getCurrentLocale()->direction }}">

<head>
    {!! view_render_event('bagisto.shop.layout.head.before') !!}

    <title>{{ $title ?? '' }}</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-language" content="{{ app()->getLocale() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="base-url" content="{{ url()->to('/') }}">
    <meta name="currency" content="{{ core()->getCurrentCurrency()->toJson() }}">

    @stack('meta')

    <link rel="icon" sizes="16x16" href="{{ asset('favicon-32x32.png') }}" />
    @if ($routename == 'admin.catalog.products.visualize')
        @bagistoVite(['src/Resources/assets/css/app.css', 'src/Resources/assets/js/app.js'], 'shop')
    @else
        @bagistoVite(['src/Resources/assets/css/app.css', 'src/Resources/assets/js/app.js'])
    @endif

    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        as="style">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" as="style">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap">
    <link rel="stylesheet" href="{{ asset('app.css') }}">

    @stack('styles')

    <style>
        /* ========== CHATBOT STYLES ========== */

        /* Chat Button */
        .chat-button {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3F4565 0%, #5a6282 100%);
            color: white;
            border: none;
            font-size: 28px;
            cursor: pointer;
            box-shadow: 0 4px 20px rgba(63, 69, 101, 0.4);
            transition: all 0.3s ease;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .chat-button:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 30px rgba(63, 69, 101, 0.6);
        }

        .chat-button.active {
            background: #FFEB3B;
            color: #3F4565;
        }

        /* Chat Window */
        .chat-window {
            position: fixed;
            bottom: 110px;
            right: 30px;
            width: 900px;
            height: 600px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            display: none;
            flex-direction: row;
            overflow: hidden;
            z-index: 999;
            animation: slideUp 0.3s ease-out;
        }

        .chat-window.active {
            display: flex;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Chat Section */
        .chat-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            background: white;
        }

        .chat-header {
            background: linear-gradient(135deg, #3F4565 0%, #5a6282 100%);
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .chat-header h3 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .chat-header small {
            font-size: 12px;
            opacity: 0.9;
        }

        .close-btn {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            font-size: 20px;
            cursor: pointer;
            padding: 8px 12px;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .close-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: rotate(90deg);
        }

        /* Messages Container */
        .messages-container {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
            background: linear-gradient(to bottom, #fafafa 0%, #f5f5f5 100%);
        }

        .start-message {
            text-align: center;
            color: #999;
            padding: 60px 20px;
        }

        .start-message-icon {
            font-size: 48px;
            margin-bottom: 16px;
        }

        .start-message-text {
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .start-message-subtext {
            font-size: 14px;
            color: #bbb;
        }

        /* Message */
        .message {
            display: flex;
            margin-bottom: 20px;
            animation: fadeInMessage 0.4s ease;
        }

        @keyframes fadeInMessage {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .message.user {
            flex-direction: row-reverse;
        }

        .message-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
            flex-shrink: 0;
        }

        .message.user .message-avatar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .message.bot .message-avatar {
            background: linear-gradient(135deg, #3F4565 0%, #5a6282 100%);
        }

        .message-content {
            max-width: 70%;
            margin: 0 12px;
        }

        .message-bubble {
            background: white;
            padding: 14px 18px;
            border-radius: 18px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            font-size: 14px;
            line-height: 1.6;
            word-wrap: break-word;
        }

        .message.user .message-bubble {
            background: linear-gradient(135deg, #3F4565 0%, #5a6282 100%);
            color: white;
        }

        .message.bot .message-bubble {
            background: white;
            border: 1px solid #e0e0e0;
        }

        /* Typing Animation */
        .typing-indicator {
            display: flex;
            gap: 4px;
            padding: 14px 18px;
        }

        .typing-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #999;
            animation: typingDot 1.4s infinite;
        }

        .typing-dot:nth-child(2) {
            animation-delay: 0.2s;
        }

        .typing-dot:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes typingDot {

            0%,
            60%,
            100% {
                transform: translateY(0);
                opacity: 0.7;
            }

            30% {
                transform: translateY(-10px);
                opacity: 1;
            }
        }

        /* Input Area */
        .input-area {
            padding: 16px 20px;
            border-top: 1px solid #e0e0e0;
            display: flex;
            gap: 10px;
            background: white;
        }

        .input-area input {
            flex: 1;
            padding: 12px 16px;
            border: 2px solid #ddd;
            border-radius: 24px;
            font-size: 14px;
            outline: none;
            transition: all 0.3s;
        }

        .input-area input:focus {
            border-color: #3F4565;
            box-shadow: 0 0 0 3px rgba(63, 69, 101, 0.1);
        }

        .input-area input:disabled {
            background: #f5f5f5;
            cursor: not-allowed;
        }

        .send-btn {
            background: #FFEB3B;
            color: #3F4565;
            border: none;
            padding: 12px 28px;
            border-radius: 24px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 14px;
        }

        .send-btn:hover:not(:disabled) {
            background: #fdd835;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 235, 59, 0.4);
        }

        .send-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Examples Section */
        .examples-section {
            width: 280px;
            display: flex;
            flex-direction: column;
            background: #f8f9fa;
            border-left: 1px solid #e0e0e0;
            transition: all 0.3s ease;
        }

        .examples-section.hidden {
            width: 0;
            overflow: hidden;
            border: none;
        }

        .examples-header {
            background: linear-gradient(135deg, #3F4565 0%, #5a6282 100%);
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .examples-header h4 {
            font-size: 16px;
            font-weight: 600;
        }

        .toggle-examples {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            font-size: 18px;
            cursor: pointer;
            padding: 8px 12px;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .toggle-examples:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .examples-list {
            flex: 1;
            overflow-y: auto;
            padding: 16px;
        }

        .example-btn {
            width: 100%;
            text-align: left;
            padding: 12px 16px;
            margin-bottom: 8px;
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-size: 13px;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .example-btn:hover {
            background: #FFEB3B;
            color: #3F4565;
            border-color: #FFEB3B;
            transform: translateX(4px);
            box-shadow: 0 2px 8px rgba(255, 235, 59, 0.3);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .chat-window {
                width: calc(100vw - 40px);
                max-width: 600px;
            }

            .examples-section {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .chat-window {
                bottom: 20px;
                right: 20px;
                width: calc(100vw - 40px);
                height: calc(100vh - 120px);
            }

            .chat-button {
                bottom: 20px;
                right: 20px;
            }

            .message-content {
                max-width: 80%;
            }
        }

        /* Custom Scrollbar */
        .messages-container::-webkit-scrollbar,
        .examples-list::-webkit-scrollbar {
            width: 6px;
        }

        .messages-container::-webkit-scrollbar-track,
        .examples-list::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .messages-container::-webkit-scrollbar-thumb,
        .examples-list::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 3px;
        }

        .messages-container::-webkit-scrollbar-thumb:hover,
        .examples-list::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        {!! core()->getConfigData('general.content.custom_scripts.custom_css') !!} #main {
            background: #FBFBFB 0% 0% no-repeat padding-box;
            opacity: 1;
        }
    </style>

    {!! view_render_event('bagisto.shop.layout.head.after') !!}
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Urbanist' rel='stylesheet'>

    <!-- Matomo -->
    <script>
        var _paq = window._paq = window._paq || [];
        _paq.push(["setDoNotTrack", true]);
        _paq.push(["setExcludedQueryParams", ["ticket"]]);
        _paq.push(["disableCookies"]);
        _paq.push(['trackPageView']);
        _paq.push(['enableLinkTracking']);
        (function() {
            var u = "{{ config('matomo.url') }}";
            _paq.push(['setTrackerUrl', u + 'matomo.php']);
            _paq.push(['setSiteId', "{{ config('matomo.id') }}"]);
            var d = document,
                g = d.createElement('script'),
                s = d.getElementsByTagName('script')[0];
            g.async = true;
            g.src = u + 'matomo.js';
            s.parentNode.insertBefore(g, s);
        })();
    </script>
    <noscript>
        <p><img src="{{ config('matomo.url') }}matomo.php?idsite={{ config('matomo.id') }}&amp;rec=1"
                style="border:0;" alt="" /></p>
    </noscript>

    <!-- tarteaucitron -->
    <script src="{{ asset('tarteaucitron/tarteaucitron.js') }}"></script>
    <script type="text/javascript">
        tarteaucitron.init({
            "privacyUrl": "",
            "bodyPosition": "bottom",
            "hashtag": "#tarteaucitron",
            "cookieName": "tarteaucitron",
            "orientation": "middle",
            "groupServices": false,
            "showDetailsOnClick": true,
            "serviceDefaultState": "wait",
            "showAlertSmall": false,
            "cookieslist": false,
            "closePopup": false,
            "showIcon": true,
            "iconPosition": "BottomRight",
            "adblocker": false,
            "DenyAllCta": true,
            "AcceptAllCta": true,
            "highPrivacy": true,
            "alwaysNeedConsent": false,
            "handleBrowserDNTRequest": false,
            "removeCredit": false,
            "moreInfoLink": true,
            "useExternalCss": false,
            "useExternalJs": false,
            "readmoreLink": "",
            "mandatory": true,
            "mandatoryCta": true,
            "googleConsentMode": true,
            "partnersList": false
        });
    </script>
</head>

<body>
    {!! view_render_event('bagisto.shop.layout.body.before') !!}

    <!-- Chat Window -->
    <div class="chat-window" id="chatWindow">
        <!-- Chat Section -->
        <div class="chat-section">
            <div class="chat-header">
                <div>
                    <h3>💬 Assistant IA</h3>
                    <small>Posez vos questions sur nos solutions</small>
                </div>
                <button class="close-btn" id="closeChat">✕</button>
            </div>

            <div class="messages-container" id="messagesContainer">
                <div class="start-message">
                    <div class="start-message-icon">🤖</div>
                    <div class="start-message-text">Bonjour ! Comment puis-je vous aider ?</div>
                    <div class="start-message-subtext">Posez-moi une question sur nos logiciels et partenaires</div>
                </div>
            </div>

            <div class="input-area">
                <input type="text" id="messageInput" placeholder="Posez votre question..." />
                <button class="send-btn" id="sendButton">Envoyer</button>
            </div>
        </div>

        <!-- Examples Section -->
        <div class="examples-section" id="examplesSection">
            <div class="examples-header">
                <h4>💡 Exemples</h4>
                <button class="toggle-examples" id="toggleExamples">→</button>
            </div>

            <div class="examples-list">
                <button class="example-btn" data-question="Combien de partenaires congrès ?">
                    🤝 Combien de partenaires congrès ?
                </button>
                <button class="example-btn" data-question="Combien de logiciels dans Social - RH ?">
                    📊 Logiciels dans Social - RH
                </button>
                <button class="example-btn" data-question="Liste des catégories">
                    📂 Liste des catégories
                </button>
                <button class="example-btn" data-question="Quels logiciels dans Data ?">
                    💾 Logiciels dans Data
                </button>
                <button class="example-btn" data-question="Détails sur NETexcom">
                    🔍 Détails sur un logiciel
                </button>
                <button class="example-btn" data-question="Société de Agrume Experts">
                    🏢 Éditeur d'un logiciel
                </button>
                <button class="example-btn" data-question="Total de solutions">
                    📦 Total de solutions
                </button>
            </div>
        </div>
    </div>

    <!-- Chat Button -->
    <button class="chat-button" id="chatButton">🤖</button>

    <div id="app" class="bg-[#FBFBFB]">
        <x-shop::flash-group />
        <x-shop::modal.confirm />

        @if ($hasHeader)
            <x-shop::layouts.header />
        @endif

        {!! view_render_event('bagisto.shop.layout.content.before') !!}

        <main id="main">
            {{ $slot }}
        </main>

        {!! view_render_event('bagisto.shop.layout.content.after') !!}

        @if ($hasFooter)
            <x-shop::layouts.footer />
        @endif
    </div>

    {!! view_render_event('bagisto.shop.layout.body.after') !!}

    @stack('scripts')

    {!! view_render_event('bagisto.shop.layout.vue-app-mount.before') !!}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const chatButton = document.getElementById('chatButton');
            const chatWindow = document.getElementById('chatWindow');
            const closeChat = document.getElementById('closeChat');
            const messagesContainer = document.getElementById('messagesContainer');
            const messageInput = document.getElementById('messageInput');
            const sendButton = document.getElementById('sendButton');
            const examplesSection = document.getElementById('examplesSection');
            const toggleExamples = document.getElementById('toggleExamples');

            let isProcessing = false;

            // Toggle Chat Window
            chatButton.addEventListener('click', function() {
                chatWindow.classList.toggle('active');
                chatButton.classList.toggle('active');
                if (chatWindow.classList.contains('active')) {
                    messageInput.focus();
                }
            });

            closeChat.addEventListener('click', function() {
                chatWindow.classList.remove('active');
                chatButton.classList.remove('active');
            });

            // Toggle Examples Section
            toggleExamples.addEventListener('click', function() {
                examplesSection.classList.toggle('hidden');
                toggleExamples.textContent = examplesSection.classList.contains('hidden') ? '←' : '→';
            });

            // Example Buttons
            document.querySelectorAll('.example-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const question = this.getAttribute('data-question');
                    messageInput.value = question;
                    messageInput.focus();
                });
            });

            // Send Message
            sendButton.addEventListener('click', sendMessage);
            messageInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter' && !isProcessing) {
                    sendMessage();
                }
            });

            async function sendMessage() {
                const message = messageInput.value.trim();
                if (!message || isProcessing) return;

                // Add user message
                addMessage(message, 'user');
                messageInput.value = '';

                // Disable input
                isProcessing = true;
                messageInput.disabled = true;
                sendButton.disabled = true;

                // Show typing indicator
                const typingMsg = addTypingIndicator();

                try {
                    // Call Ollama API
                    const response = await fetch('/ollama?prompt=' + encodeURIComponent(message));

                    // Remove typing indicator
                    typingMsg.remove();

                    if (!response.ok) {
                        throw new Error('Erreur réseau');
                    }

                    const reader = response.body.getReader();
                    const decoder = new TextDecoder();
                    let botMessageDiv = null;
                    let botMessageBubble = null;
                    let fullText = '';

                    while (true) {
                        const {
                            done,
                            value
                        } = await reader.read();
                        if (done) break;

                        const chunk = decoder.decode(value);
                        const lines = chunk.split('\n');

                        for (const line of lines) {
                            if (line.startsWith('data: ')) {
                                try {
                                    const data = JSON.parse(line.substring(6));

                                    if (data.text) {
                                        fullText += data.text;

                                        if (!botMessageDiv) {
                                            botMessageDiv = createBotMessage();
                                            botMessageBubble = botMessageDiv.querySelector('.message-bubble');
                                        }

                                        botMessageBubble.textContent = fullText;
                                        scrollToBottom();
                                    }
                                } catch (e) {
                                    console.error('Parse error:', e);
                                }
                            }
                        }
                    }

                } catch (error) {
                    console.error('Error:', error);
                    addMessage('Désolé, une erreur s\'est produite. Veuillez réessayer.', 'bot');
                } finally {
                    // Re-enable input
                    isProcessing = false;
                    messageInput.disabled = false;
                    sendButton.disabled = false;
                    messageInput.focus();
                }
            }

            function addMessage(text, sender) {
                const startMessage = messagesContainer.querySelector('.start-message');
                if (startMessage) startMessage.remove();

                const messageDiv = document.createElement('div');
                messageDiv.className = `message ${sender}`;

                const avatar = document.createElement('div');
                avatar.className = 'message-avatar';
                avatar.textContent = sender === 'user' ? '👤' : '🤖';

                const content = document.createElement('div');
                content.className = 'message-content';

                const bubble = document.createElement('div');
                bubble.className = 'message-bubble';
                bubble.textContent = text;

                content.appendChild(bubble);
                messageDiv.appendChild(avatar);
                messageDiv.appendChild(content);

                messagesContainer.appendChild(messageDiv);
                scrollToBottom();

                return messageDiv;
            }

            function createBotMessage() {
                const startMessage = messagesContainer.querySelector('.start-message');
                if (startMessage) startMessage.remove();

                const messageDiv = document.createElement('div');
                messageDiv.className = 'message bot';

                const avatar = document.createElement('div');
                avatar.className = 'message-avatar';
                avatar.textContent = '🤖';

                const content = document.createElement('div');
                content.className = 'message-content';

                const bubble = document.createElement('div');
                bubble.className = 'message-bubble';

                content.appendChild(bubble);
                messageDiv.appendChild(avatar);
                messageDiv.appendChild(content);

                messagesContainer.appendChild(messageDiv);
                scrollToBottom();

                return messageDiv;
            }

            function addTypingIndicator() {
                const messageDiv = document.createElement('div');
                messageDiv.className = 'message bot';

                const avatar = document.createElement('div');
                avatar.className = 'message-avatar';
                avatar.textContent = '🤖';

                const content = document.createElement('div');
                content.className = 'message-content';

                const bubble = document.createElement('div');
                bubble.className = 'message-bubble';

                const typingDiv = document.createElement('div');
                typingDiv.className = 'typing-indicator';
                typingDiv.innerHTML =
                    '<div class="typing-dot"></div><div class="typing-dot"></div><div class="typing-dot"></div>';

                bubble.appendChild(typingDiv);
                content.appendChild(bubble);
                messageDiv.appendChild(avatar);
                messageDiv.appendChild(content);

                messagesContainer.appendChild(messageDiv);
                scrollToBottom();

                return messageDiv;
            }

            function scrollToBottom() {
                messagesContainer.scrollTop = messagesContainer.scrollHeight;
            }
        });
    </script>

    <script>
        window.addEventListener("load", function(event) {
            app.mount("#app");
        });
    </script>

    {!! view_render_event('bagisto.shop.layout.vue-app-mount.after') !!}

    <script type="text/javascript">
        {!! core()->getConfigData('general.content.custom_scripts.custom_javascript') !!}
    </script>

    @if ($routename == 'shop.compare.index')
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const excludedPaths = ["/mentions-legales", "/compare"];
                const excludedIds = ["excluded_space", "excluded_logout"];

                document.body.addEventListener("click", (event) => {
                    const element = event.target;

                    if (element.tagName === "A" && element.href) {
                        if (excludedIds.includes(element.id)) {
                            return;
                        }
                        const targetUrl = new URL(element.href);
                        const targetPath = targetUrl.pathname + targetUrl.hash;
                        if (!excludedPaths.includes(targetPath)) {
                            event.preventDefault();
                            const confirmMessage =
                                "Les critères de comparaison vont être réinitialisés en quittant cette page.";
                            if (confirm(confirmMessage)) {
                                window.location.href = element.href;
                            }
                        }
                    }
                });

                window.addEventListener("beforeunload", (event) => {
                    const currentPath = window.location.pathname + window.location.hash;
                    if (!excludedPaths.includes(currentPath)) {
                        const confirmMessage =
                            "Les critères de comparaison vont être réinitialisés en quittant cette page.";
                        event.returnValue = confirmMessage;
                        return confirmMessage;
                    }
                });
            });
        </script>
    @endif
</body>

</html>
