<?php

require __DIR__ . '/vendor/autoload.php';

$registry = new \App\Services\SampleRegistry();

$registry->put('some_key', 'a value');
\usleep(2000);

try {
    $registry->faultyMethod();
} catch (Exception $e) {
}
\usleep(2000);

try {
    $registry->get('non_existing_key');
} catch (\App\Exceptions\NotFound $e) {
}
\usleep(2000);

$registry->compact();
\usleep(2000);

echo "Hello\n";
