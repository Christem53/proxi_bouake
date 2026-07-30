import Alpine from 'alpinejs';
import { createIcons, icons } from 'lucide';
import 'leaflet/dist/leaflet.css';
import L from 'leaflet';


window.Alpine = Alpine;
window.L = L;


Alpine.start();


document.addEventListener('DOMContentLoaded', () => {

    createIcons({
        icons: icons
    });

});

if ('serviceWorker' in navigator) {

    navigator.serviceWorker.register('/service-worker.js')

    .then(() => {

        console.log("Service Worker actif");

    });

}