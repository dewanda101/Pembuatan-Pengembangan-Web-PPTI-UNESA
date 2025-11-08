// Fungsi untuk mengatur ukuran font
function changeFontSize(action) {
    let body = document.body;
    let currentSize = parseFloat(window.getComputedStyle(body, null).getPropertyValue('font-size'));
    if (action === 'increase') {
        body.style.fontSize = (currentSize + 2) + 'px';
    } else if (action === 'decrease') {
        body.style.fontSize = (currentSize - 2) + 'px';
    }
}

// Fungsi untuk mengaktifkan mode skala abu-abu
function toggleGrayscale() {
    let body = document.body;
    if (body.style.filter === "grayscale(100%)") {
        body.style.filter = "none";
    } else {
        body.style.filter = "grayscale(100%)";
    }
}

// Fungsi untuk mengaktifkan mode gelap
function toggleDarkMode() {
    document.body.classList.toggle('dark-mode');
}

// Fungsi untuk mengaktifkan mode suara (membaca teks)
function toggleVoice() {
    let synth = window.speechSynthesis;
    let text = document.body.innerText;
    let utterance = new SpeechSynthesisUtterance(text);
    synth.speak(utterance);
}
