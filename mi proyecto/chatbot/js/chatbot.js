document.addEventListener('DOMContentLoaded', function() {
    const chatMessages = document.getElementById('chat-messages');
    const userInput = document.getElementById('user-input');
    const sendBtn = document.getElementById('send-btn');

    // Sample bot responses
    const botResponses = [
        "Puedo ayudarte con información sobre nuestros servicios.",
        "Para consultas de pagos, por favor proporciona tu número de cliente.",
        "¿Necesitas ayuda con algún ticket en particular?",
        "Puedo generarte un reporte si me especificas qué necesitas.",
        "Lo siento, no entendí tu pregunta. ¿Podrías reformularla?"
    ];

    // Function to add a message to the chat
    function addMessage(message, isUser = false) {
        const messageDiv = document.createElement('div');
        messageDiv.className = isUser ? 'user-message mb-3' : 'bot-message mb-3';
        
        const bubbleDiv = document.createElement('div');
        bubbleDiv.className = 'message-bubble p-3 rounded';
        bubbleDiv.innerHTML = `<p class="m-0">${message}</p>`;
        
        messageDiv.appendChild(bubbleDiv);
        chatMessages.appendChild(messageDiv);
        
        // Scroll to bottom
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    // Function to get a random bot response
    function getBotResponse() {
        const randomIndex = Math.floor(Math.random() * botResponses.length);
        return botResponses[randomIndex];
    }

    // Send button click event
    sendBtn.addEventListener('click', function() {
        const message = userInput.value.trim();
        if (message) {
            addMessage(message, true);
            userInput.value = '';
            
            // Simulate bot thinking
            setTimeout(() => {
                addMessage(getBotResponse());
            }, 1000);
        }
    });

    // Enter key event
    userInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            sendBtn.click();
        }
    });

    // Nav buttons event (optional)
    const navButtons = document.querySelectorAll('.nav-btn');
    navButtons.forEach(button => {
        button.addEventListener('click', function() {
            navButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Optional: Specific functionality for Citas button
document.querySelectorAll('.nav-btn')[0].addEventListener('click', function() {
    // Clear chat and show appointment-related message
    chatMessages.innerHTML = '';
    addMessage("Has seleccionado el módulo de Citas. ¿En qué puedo ayudarte con tus citas?");
});
function toggleActive(button) {
    // Remueve la clase 'active' de todos los botones
    document.querySelectorAll('.nav-btn').forEach(btn => {
        btn.classList.remove('active');
        btn.classList.add('bg-light-blue');
    });
    
    // Agrega la clase 'active' al botón clickeado
    button.classList.add('active');
    button.classList.remove('bg-light-blue');
}
});