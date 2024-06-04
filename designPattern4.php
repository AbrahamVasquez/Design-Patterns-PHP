<?php 


interface OutputStrategy {
    public function show( $message );
}

// Concrete Strategies : Each class implements a specific algorithm

// Output for console
class ConsoleOutput implements OutputStrategy {
    public function show( $message ) {
        echo $message . "\n";
    }
}

// Output for JSON
class JsonOutput implements OutputStrategy {
    public function show( $message ) {
        echo json_encode( $message ). "\n";
    }
}

// Output for txet file
class TxtFileOutput implements OutputStrategy {

    private $file;

    public function __construct( $file ) {
        $this->file = $file;
    }

    public function show( $message ) {
        file_put_contents( $this->file, $message. "\n", FILE_APPEND );
    }
}

// Context creation : Uses a reference to call methods
class MessageStrategy {
    private $output;

    public function __construct( OutputStrategy $output ) {
        $this->output = $output;
    }

    public function setOutputStrategy( OutputStrategy $output ) {
        $this->output = $output;
    }

    public function showMessage( $message ) {
        $this->output->show( $message );
    }
}

// Example of creating strategy output instances
$console_output = new ConsoleOutput();
$json_output = new JsonOutput();
$txt_file_output = new TxtFileOutput( "Hello wachos!");

// Creates an instance of MessageStrategy
$message_strategy = new MessageStrategy( $console_output );

$message_strategy->showMessage( "This message is for the console");

// Changes strategy output to JSON en shows message
$message_strategy->setOutputStrategy( $json_output );
$message_strategy->showMessage( "This message is for JSON format");

// Changes strategy output to a text file en shows message
$message_strategy->setOutputStrategy( $txt_file_output );
$message_strategy->showMessage( "This message is for the txt file");

?>
