// Importation du module Route
import Route from "./Route.js";

// Déclaration des routes
export const allRoutes = [
  // Route pour la page d'accueil
  new Route("/", "Accueil", "./pages/home.html"),

  // Route pour la page des services
  new Route("/services", "Services", "./pages/services.html"),

  // Route pour la page des habitats
  new Route("/habitats", "Habitats", "./pages/habitats.html"),

  // Route pour la page de connexion
  new Route("/connexion", "Connexion", "./pages/connexion.html"),

  // Route pour la page de contact
  new Route("/contact", "Contact", "./pages/contact.html"),
];

// Nom du site web
export const websiteName = "Arcadia, le zoo écolo";