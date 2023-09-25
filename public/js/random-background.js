// random-background.js

// Liste des noms de fichier des images d'arrière-plan
const backgrounds = [
    'background.avif',
    'background2.avif',
    'background3.avif',
    'background5.avif',
    'background6.avif',
    'background7.avif',
    'background9.avif',
    'background11.avif',
    'background12.avif',
    'background13.avif',
    'background14.avif',
    'background15.avif',
    // Ajoutez d'autres noms de fichiers d'arrière-plan au besoin
];

// Sélectionnez une image d'arrière-plan aléatoire parmi la liste
const randomBackground = backgrounds[Math.floor(Math.random() * backgrounds.length)];

// Définissez l'image d'arrière-plan sur le corps de la page
document.body.style.backgroundImage = `url('/images/${randomBackground}')`;
