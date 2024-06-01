
<?php
require '../config_database.php';
require 'opinion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    $nameVisitor = $_POST['name_visitor'];
    $opinionText = $_POST['visitor_opinion'];

    // Validation des données
    if (empty($nameVisitor) || empty($opinionText)) {
        echo "Tous les champs sont obligatoires.";
        exit;
    }

    try {
        // Connexion à la base de données
        $pdo = new PDO($dsn, $username, $password, $options);

        // Vérification de l'existence de la table
        $result = $pdo->query("SHOW TABLES LIKE 'opinion'");
        if ($result->rowCount() == 0) {
            throw new Exception("La table 'opinion' n'existe pas.");
        }

        // Création d'une instance de la classe Opinion
        $opinion = new Opinion(null, $nameVisitor, $opinionText, true, date('Y-m-d H:i:s'));

        // Préparation de la requête SQL
        $stmt = $pdo->prepare("INSERT INTO opinion (name_visitor, visitor_opinion, is_visible, created_at) VALUES (:name_visitor, :visitor_opinion, :is_visible, :created_at)");

        // Liaison des paramètres
        $stmt->bindValue(':name_visitor', $opinion->getNameVisitor());
        $stmt->bindValue(':visitor_opinion', $opinion->getVisitorOpinion());
        $stmt->bindValue(':is_visible', $opinion->getIsVisible(), PDO::PARAM_BOOL);
        $stmt->bindValue(':created_at', $opinion->getCreatedAt()->format('Y-m-d H:i:s'));

        // Exécution de la requête
        $stmt->execute();

     // 
        exit;
    } catch (PDOException $e) {
        echo "Erreur PDO : " . $e->getMessage();
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
