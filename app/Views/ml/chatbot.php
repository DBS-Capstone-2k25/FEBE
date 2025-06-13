<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bedah Sampah - Asisten Pengelolaan Sampah Cerdas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/icon/logo2.png') ?>">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                        'typing': 'typing 1s ease-in-out infinite',
                        'slide-up': 'slideUp 0.3s ease-out',
                        'bounce-subtle': 'bounceSubtle 2s ease-in-out infinite'
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0px)'
                            },
                            '50%': {
                                transform: 'translateY(-10px)'
                            }
                        },
                        glow: {
                            '0%': {
                                boxShadow: '0 0 20px rgba(34, 197, 94, 0.5)'
                            },
                            '100%': {
                                boxShadow: '0 0 30px rgba(34, 197, 94, 0.8)'
                            }
                        },
                        typing: {
                            '0%': {
                                opacity: '0.4'
                            },
                            '50%': {
                                opacity: '1'
                            },
                            '100%': {
                                opacity: '0.4'
                            }
                        },
                        slideUp: {
                            '0%': {
                                transform: 'translateY(20px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateY(0)',
                                opacity: '1'
                            }
                        },
                        bounceSubtle: {
                            '0%, 100%': {
                                transform: 'translateY(0)'
                            },
                            '50%': {
                                transform: 'translateY(-5px)'
                            }
                        }
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="min-h-screen bg-gradient-to-br from-emerald-50 via-blue-50 to-teal-50">
    <?php include(APPPATH . 'Views/landing-page/navbar.php'); ?>

    <!-- Floating Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 w-72 h-72 bg-gradient-to-r from-green-200 to-blue-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-float"></div>
        <div class="absolute top-40 right-10 w-96 h-96 bg-gradient-to-r from-blue-200 to-teal-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-float" style="animation-delay: 2s;"></div>
        <div class="absolute bottom-20 left-1/3 w-80 h-80 bg-gradient-to-r from-teal-200 to-green-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-float" style="animation-delay: 4s;"></div>
    </div>

    <div class="relative min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-4xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-8 animate-slide-up">
                <div class=" inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-green-500 to-blue-500 rounded-full mt-20 animate-bounce-subtle">
                    <i class="fas fa-robot text-2xl text-white"></i>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent mb-2">
                    EcoBot
                </h1>
                <p class="text-lg text-gray-600 mb-2">Asisten Pengelolaan Sampah Cerdas</p>
                <div class="flex justify-center space-x-6 text-sm text-gray-500">
                    <span class="flex items-center"><i class="fas fa-recycle mr-1 text-green-500"></i> Ramah Lingkungan</span>
                    <span class="flex items-center"><i class="fas fa-brain mr-1 text-blue-500"></i> AI Powered</span>
                    <span class="flex items-center"><i class="fas fa-leaf mr-1 text-teal-500"></i> Berkelanjutan</span>
                </div>
            </div>

            <!-- Chat Container -->
            <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-2xl border border-white/20 overflow-hidden animate-slide-up" style="animation-delay: 0.2s;">
                <!-- Chat Header -->
                <div class="bg-gradient-to-r from-green-500 to-blue-500 p-6 text-white">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center animate-glow">
                                <i class="fas fa-comments text-xl"></i>
                            </div>
                            <div>
                                <h2 class="text-xl font-semibold">Chat dengan EcoBot</h2>
                                <p class="text-green-100 text-sm">Tanyakan apapun tentang pengelolaan sampah</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="flex space-x-1">
                                <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                                <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse" style="animation-delay: 0.2s;"></div>
                                <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse" style="animation-delay: 0.4s;"></div>
                            </div>
                            <span class="text-xs text-green-100">Online</span>
                        </div>
                    </div>
                </div>

                <!-- Chat Messages -->
                <div id="chat-messages" class="h-96 overflow-y-auto p-6 space-y-4 bg-gradient-to-b from-white/50 to-gray-50/50">
                    <!-- Welcome Message -->
                    <div class="flex items-start space-x-3 animate-slide-up">
                        <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-r from-green-500 to-blue-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-robot text-white text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <div class="bg-gradient-to-r from-green-500 to-blue-500 text-white px-4 py-3 rounded-2xl rounded-tl-md shadow-lg">
                                <p class="text-sm">👋 Halo! Saya EcoBot, asisten cerdas untuk pengelolaan sampah. Tanyakan kepada saya tentang:</p>
                                <ul class="mt-2 text-sm space-y-1">
                                    <li>• Cara memilah sampah dengan benar</li>
                                    <li>• Tips mengurangi limbah rumah tangga</li>
                                    <li>• Informasi daur ulang</li>
                                    <li>• Solusi pengelolaan sampah</li>
                                </ul>
                            </div>
                            <span class="text-xs text-gray-500 mt-1 block">EcoBot • Baru saja</span>
                        </div>
                    </div>
                </div>

                <!-- Typing Indicator -->
                <div id="typing-indicator" class="hidden p-6 pt-0">
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-r from-green-500 to-blue-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-robot text-white text-sm"></i>
                        </div>
                        <div class="bg-gray-100 px-4 py-3 rounded-2xl rounded-tl-md">
                            <div class="flex space-x-1">
                                <div class="w-2 h-2 bg-gray-400 rounded-full animate-typing"></div>
                                <div class="w-2 h-2 bg-gray-400 rounded-full animate-typing" style="animation-delay: 0.2s;"></div>
                                <div class="w-2 h-2 bg-gray-400 rounded-full animate-typing" style="animation-delay: 0.4s;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Input Area -->
                <div class="p-6 bg-white/70 backdrop-blur-sm border-t border-gray-200/50">
                    <div class="flex space-x-4">
                        <div class="flex-1 relative">
                            <input
                                type="text"
                                id="message-input"
                                placeholder="Ketik pertanyaan Anda tentang sampah..."
                                class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 pr-12 placeholder-gray-400"
                                maxlength="500">
                            <div class="absolute right-4 top-1/2 transform -translate-y-1/2 text-xs text-gray-400">
                                <span id="char-count">0</span>/500
                            </div>
                        </div>
                        <button
                            id="send-button"
                            class="bg-gradient-to-r from-green-500 to-blue-500 hover:from-green-600 hover:to-blue-600 text-white px-8 py-4 rounded-2xl font-medium transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none shadow-lg hover:shadow-xl"
                            disabled>
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>

                    <!-- Quick Actions -->
                    <div class="mt-4">
                        <p class="text-xs text-gray-500 mb-2">Pertanyaan Cepat:</p>
                        <div class="flex flex-wrap gap-2">
                            <button class="quick-question px-3 py-1 bg-green-100 hover:bg-green-200 text-green-700 text-xs rounded-full transition-colors duration-200">
                                Cara memilah sampah organik
                            </button>
                            <button class="quick-question px-3 py-1 bg-blue-100 hover:bg-blue-200 text-blue-700 text-xs rounded-full transition-colors duration-200">
                                Tips mengurangi sampah plastik
                            </button>
                            <button class="quick-question px-3 py-1 bg-teal-100 hover:bg-teal-200 text-teal-700 text-xs rounded-full transition-colors duration-200">
                                Cara mendaur ulang kertas
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-6 text-sm text-gray-500 animate-slide-up" style="animation-delay: 0.4s;">
                <p>Powered by AI • Membantu lingkungan yang lebih bersih 🌱</p>
            </div>
        </div>
    </div>

    <script>
        class EcoChatbot {
            constructor() {
                this.initializeElements();
                this.bindEvents();
                this.setupCharacterCounter();
            }

            initializeElements() {
                this.messageInput = document.getElementById('message-input');
                this.sendButton = document.getElementById('send-button');
                this.chatMessages = document.getElementById('chat-messages');
                this.typingIndicator = document.getElementById('typing-indicator');
                this.charCount = document.getElementById('char-count');
                this.quickQuestions = document.querySelectorAll('.quick-question');
            }

            bindEvents() {
                this.sendButton.addEventListener('click', () => this.sendMessage());
                this.messageInput.addEventListener('keypress', (e) => {
                    if (e.key === 'Enter' && !e.shiftKey) {
                        e.preventDefault();
                        this.sendMessage();
                    }
                });

                this.messageInput.addEventListener('input', () => {
                    this.updateSendButton();
                });

                this.quickQuestions.forEach(btn => {
                    btn.addEventListener('click', () => {
                        this.messageInput.value = btn.textContent.trim();
                        this.updateSendButton();
                        this.sendMessage();
                    });
                });
            }

            setupCharacterCounter() {
                this.messageInput.addEventListener('input', () => {
                    const length = this.messageInput.value.length;
                    this.charCount.textContent = length;

                    if (length > 450) {
                        this.charCount.parentElement.classList.add('text-red-500');
                    } else {
                        this.charCount.parentElement.classList.remove('text-red-500');
                    }
                });
            }

            updateSendButton() {
                const hasText = this.messageInput.value.trim().length > 0;
                this.sendButton.disabled = !hasText;

                if (hasText) {
                    this.sendButton.classList.add('animate-glow');
                } else {
                    this.sendButton.classList.remove('animate-glow');
                }
            }

            async sendMessage() {
                const message = this.messageInput.value.trim();
                if (!message) return;

                // Add user message
                this.addMessage(message, 'user');

                // Clear input and disable button
                this.messageInput.value = '';
                this.updateSendButton();
                this.charCount.textContent = '0';

                // Show typing indicator
                this.showTyping();

                try {
                    const response = await fetch('<?= base_url('chatbot/send') ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: JSON.stringify({
                            prompt: message,
                            max_new_tokens: 512
                        })
                    });

                    const data = await response.json();

                    // Hide typing indicator
                    this.hideTyping();

                    if (data.success) {
                        this.addMessage(data.response, 'bot');

                        // Debug info (only show in console)
                        if (data.debug) {
                            console.log('Debug info:', data.debug);
                        }
                    } else {
                        let errorMsg = 'Maaf, terjadi kesalahan: ' + (data.message || data.error_detail || 'Silakan coba lagi.');
                        this.addMessage(errorMsg, 'bot', true);

                        // Log detailed error to console for debugging
                        console.error('Chatbot error:', data);
                    }
                } catch (error) {
                    this.hideTyping();
                    this.addMessage('Maaf, tidak dapat terhubung ke server. Silakan periksa koneksi internet Anda dan coba lagi.', 'bot', true);
                    console.error('Error:', error);
                }
            }

            addMessage(text, sender, isError = false) {
                const messageDiv = document.createElement('div');
                messageDiv.className = 'flex items-start space-x-3 animate-slide-up';

                const now = new Date();
                const timeString = now.toLocaleTimeString('id-ID', {
                    hour: '2-digit',
                    minute: '2-digit'
                });

                if (sender === 'user') {
                    messageDiv.innerHTML = `
                        <div class="flex-1 flex justify-end">
                            <div class="max-w-xs lg:max-w-md">
                                <div class="bg-gradient-to-r from-green-500 to-blue-500 text-white px-4 py-3 rounded-2xl rounded-tr-md shadow-lg">
                                    <p class="text-sm">${this.escapeHtml(text)}</p>
                                </div>
                                <span class="text-xs text-gray-500 mt-1 block text-right">Anda • ${timeString}</span>
                            </div>
                        </div>
                        <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-white text-sm"></i>
                        </div>
                    `;
                } else {
                    const bgColor = isError ? 'bg-red-100 border border-red-200' : 'bg-white shadow-lg border border-gray-100';
                    const textColor = isError ? 'text-red-700' : 'text-gray-800';
                    const iconColor = isError ? 'from-red-500 to-red-600' : 'from-green-500 to-blue-500';
                    const icon = isError ? 'fas fa-exclamation-triangle' : 'fas fa-robot';

                    messageDiv.innerHTML = `
                        <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-r ${iconColor} rounded-full flex items-center justify-center">
                            <i class="${icon} text-white text-sm"></i>
                        </div>
                        <div class="flex-1 max-w-xs lg:max-w-md">
                            <div class="${bgColor} px-4 py-3 rounded-2xl rounded-tl-md">
                                <p class="text-sm ${textColor}">${this.escapeHtml(text)}</p>
                            </div>
                            <span class="text-xs text-gray-500 mt-1 block">EcoBot • ${timeString}</span>
                        </div>
                    `;
                }

                this.chatMessages.appendChild(messageDiv);
                this.scrollToBottom();
            }

            showTyping() {
                this.typingIndicator.classList.remove('hidden');
                this.scrollToBottom();
            }

            hideTyping() {
                this.typingIndicator.classList.add('hidden');
            }

            scrollToBottom() {
                setTimeout(() => {
                    this.chatMessages.scrollTop = this.chatMessages.scrollHeight;
                }, 100);
            }

            escapeHtml(text) {
                const div = document.createElement('div');
                div.textContent = text;
                return div.innerHTML;
            }
        }

        // Initialize chatbot when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            new EcoChatbot();
        });
    </script>
</body>
<?php include(APPPATH . 'Views/landing-page/footer.php'); ?>

</html>