<?php 

interface File {
    public function open();
}

class Windows7File implements File {

    private $fileName;

    public function __construct($fileName) {
        $this->fileName = $fileName;
    }

    public function open() {
        echo "Opening Windows 7 file: ".$this->fileName;
    }
}

class Windows10File implements File {
    private $fileName;

    public function __construct($fileName) {
        $this->fileName = $fileName;
    }

    public function open() {
        echo "Opening Windows 10 file: ".$this->fileName;
    }
}

class AdapterWindows10 implements File {
    private $windows7File;

    public function __construct(Windows7File $windows7File) {
        $this->windows7File = $windows7File;
    }

    public function open() {
        $this->windows7File->open();
    }
}

function openFileInWindows10( File $fileName ) {
    echo $fileName->open() . "\n";
}

// Creating a Windows 7 file
$windows7File = new Windows7File("Test.txt");
$old_game = new Windows7File("DOOM 1995.bex");

// Creating a Windows 10 adapter
$adapter1 = new AdapterWindows10($windows7File);
$adapter2 = new AdapterWindows10($old_game);

// To open file in Windows 10 using adapter
openFileInWindows10($adapter1);
openFileInWindows10($adapter2);




?>
`