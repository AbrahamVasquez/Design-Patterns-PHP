<?php 

// Interface for Characters
interface Characters {
    public function getDetails();
}


// Implementing Characters

class Warrior implements Characters {
    public function getDetails() {
        echo "Warrior";
    }
}

class Sniper implements Characters {
    public function getDetails() {
        echo "Sniper";
    }
}

// Decorator class implementing characters interface
abstract class CharacterDecorator implements Characters {

    protected $character;

    public function __construct(Characters $character) {
        $this->character = $character;
    }

    abstract public function getDetails();
}

// Adding some weapons to use 

class Sword extends CharacterDecorator {
    public function getDetails() {
        return $this->character->getDetails() . " with a Sword ⚔️";
    }
}

class Bow extends CharacterDecorator {
    public function getDetails() {
        return $this->character->getDetails(). " with a Bow 🏹";
    }
} 

class M16 extends CharacterDecorator {
    public function getDetails() {
        return $this->character->getDetails(). " with a M16 🔫";
    }
}

// Creating Example Characters
$warrior = new Warrior();
$sniper = new Sniper();

// Decorating Example Characters
$warriorWithSword = new Sword( $warrior );

$sniperWithGun = new M16( $sniper );

$sniperWithBow = new Bow( $sniper );

// To show descriptions
echo $warriorWithSword->getDetails(). "\n";

echo $sniperWithGun->getDetails(). "\n";

echo $sniperWithBow->getDetails(). "\n";

?>
