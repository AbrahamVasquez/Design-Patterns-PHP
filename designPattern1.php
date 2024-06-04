<?php 

interface Character {
    public function attack();
    public function getSpeed();
}


class Skeleton implements Character {
    public function attack() {
        echo "Skeleton attacks with axe";
    }

    public function getSpeed() {
        echo "Skeleton's speed is 2 units";
    }
}

class Zombie implements Character {
    public function attack() {
        echo "Zombie attacks biting his opponent";
    }

    public function getSpeed() {
        echo "Zombie's speed is 1 unit";
    }
}

class CharactersFactory {
    public static function createCharacter($level) {
        switch ($level) {
            case 'easy':
                return new Skeleton();
            case 'hard':
                return new Zombie();
            default:
                echo "Level not found";
        }
    }
}

try {
    $character = CharactersFactory::createCharacter('easy'); // Change to hard to create a Zombie
    echo $character->attack() . "\n";
    echo $character->getSpeed() . "\n";
} catch (Exception $e) {
    echo $e->getMessage();
}


?>
