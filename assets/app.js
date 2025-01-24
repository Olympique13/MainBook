import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';

// View : AfficherArticles
// Ajoute un écouteur d'événement pour intercepter la soumission du formulaire
// document.getElementById( 'search-form' ).addEventListener( 'submit', function ( event ) {
//     event.preventDefault(); // Empêche la soumission normale du formulaire
//     let form = event.target; // Récupère le formulaire soumis
//     let formData = new FormData( form ); // Crée un objet FormData avec les données du formulaire

//     // Envoie une requête fetch avec les données du formulaire
//     fetch( form.action, {
//         method: form.method, // Utilise la méthode du formulaire (GET ou POST)
//         body: formData, // Envoie les données du formulaire
//         headers: {
//             'X-Requested-With': 'XMLHttpRequest' // Indique que la requête est faite en AJAX
//         }
//     } )
//         .then( response => response.json() ) // Convertit la réponse en JSON
//         .then( data => {
//             let articlesContainer = document.getElementById( 'articles-container' ); // Récupère le conteneur des articles
//             articlesContainer.innerHTML = data.content; // Met à jour le contenu du conteneur avec les nouveaux articles
//         } )
//         .catch( error => console.error( 'Error:', error ) ); // Affiche une erreur en cas de problème
// } );