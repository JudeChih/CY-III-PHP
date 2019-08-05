<?php
require_once ('./websockets.php');
class EchoServer extends WebSocketServer {
    protected function process($user, $message) {
        echo "got message: $message \r\n";
        $this->send ( $user, $message );
    }
    protected function connected($user) {
    }
    protected function closed($user) {
    }
}

$echo = new EchoServer ( "0.0.0.0", "9000" );

try {
    $echo->run ();
} catch ( Exception $e ) {
    $echo->stdout ( $e->getMessage () );
}

?>