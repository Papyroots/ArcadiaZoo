// Importation des modules nécessaires
import Route from "./Route.js";
import { allRoutes, websiteName } from "./allRoutes.js";

// Création d'une route pour la page 404 (page introuvable)
const route404 = new Route("404", "Page introuvable", "./pages/404.html");

// Fonction pour récupérer la route correspondant à une URL donnée
const getRouteByUrl = (url) => {
  // Initialisation de la variable currentRoute à null
  let currentRoute = null;

  // Parcours de toutes les routes pour trouver la correspondance
  allRoutes.forEach((element) => {
    // Comparaison de l'url de l'élément avec l'url passée en paramètre
    if (element.url === url) {
      // Affectation de l'élément à currentRoute si une correspondance est trouvée
      currentRoute = element;
    }
  });

  // Si aucune correspondance n'est trouvée, on retourne la route 404
  return currentRoute || route404;
};

// Fonction pour charger le contenu de la page
const loadContentPage = async () => {
  // Récupération du chemin actuel (pathname)
  const path = window.location.pathname;

  // Récupération de la route correspondant au chemin actuel
  const actualRoute = getRouteByUrl(path);

  // Chargement du contenu HTML de la route
  const html = await fetch(actualRoute.pathHtml).then((response) => response.text());

  // Ajout du contenu HTML à l'élément avec l'ID "main-page"
  document.getElementById("main-page").innerHTML = html;

  // Chargement du contenu JavaScript si nécessaire
  if (actualRoute.pathJS !== "") {
    // Création d'une balise script
    const scriptTag = document.createElement("script");
    scriptTag.setAttribute("type", "text/javascript");
    scriptTag.setAttribute("src", actualRoute.pathJS);

    // Ajout de la balise script au corps du document
    document.querySelector("body").appendChild(scriptTag);
  }

  // Mise à jour du titre de la page
  document.title = `${actualRoute.title} - ${websiteName}`;
};

// Fonction pour gérer les événements de routage (clic sur les liens)
const routeEvent = (event) => {
  // Empêche le comportement par défaut du lien
  event.preventDefault();

  // Mise à jour de l'URL dans l'historique du navigateur
  window.history.pushState({}, "", event.target.href);

  // Chargement du contenu de la nouvelle page
  loadContentPage();
};

// Gestion de l'événement de retour en arrière dans l'historique du navigateur
window.onpopstate = loadContentPage;

// Assignation de la fonction routeEvent à la propriété route de la fenêtre
window.route = routeEvent;

// Chargement du contenu de la page au chargement initial
loadContentPage();