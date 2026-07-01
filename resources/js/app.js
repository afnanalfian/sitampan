// resources/js/app.js
import './bootstrap';

// Import Alpine.js
import Alpine from 'alpinejs';
import axios from 'axios';

// Setup axios
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// IMPORTANT: Daftarkan Alpine ke window
window.Alpine = Alpine;

// Start Alpine
// Alpine.start();
if (!window.Alpine) {
    window.Alpine = Alpine;
    Alpine.start();
}