<?php

require __DIR__ . '/../vendor/autoload.php';

$http = new React\Http\HttpServer(function (Psr\Http\Message\ServerRequestInterface $request) {
    return React\Http\Message\Response::plaintext(
        "Hello World!\n"
    );
});

$listen = getenv('LISTEN') ?: '127.0.0.1:8080';
$socket = new React\Socket\SocketServer($listen);
$http->listen($socket);

echo "Server running at ", $listen, PHP_EOL;
