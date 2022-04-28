<?php
require "includes/config.inc.php";
require_once "includes/functions.inc.php";

use PHPUnit\Framework\TestCase;

class functionsTest extends TestCase
{

    public function testCalculMoyenne(){
        // Arrange
        $numbers = [3, 7, 6, 1, 5];
        // Act
        $result = moyenne($numbers);
        // Assert
        $this->assertEquals(4.4, $result, "Erreur dans le calcul d'une moyenne!");
    }

    public function testCalculMediane(){        
        // Arrange
        $numbers = [3, 7, 6, 1, 5];
        // Act
        $result = mediane($numbers);
        // Assert
        $this->assertEquals(5, $result, "Erreur dans le calcul d'une mediane!");
    }

    public function testObtenirMessage(){        
        // Arrange
        $age = 17;
        // Act
        $result = obtenirMessage($age);
        // Assert
        $this->assertEquals("un ado", $result, "Erreur dans le message de l'age!");
    }

    public function testObtenirResultatDe(){        
        // Arrange
        $valeurDe = 6;
        // Act
        $result = obtenirResultatDe($valeurDe);
        // Assert
        $this->assertGreaterThan(0, $result, "Erreur dans le lancer de dé, le chiffre est trop petit!");
        $this->assertLessThanOrEqual($valeurDe, $result, "Erreur dans le lancer de dé, le chiffre est trop grand!");
    }

    public function testTrouverPlusGrand(){        
        // Arrange
        $numbers = [3, 7, 6, 1, 5];
        // Act
        $result = trouverPlusGrand($numbers);
        // Assert
        $this->assertEquals(7, $result, "Erreur dans la recherche du plus grand nombre!");
    }
}