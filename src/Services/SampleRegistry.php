<?php

namespace App\Services;

use App\Exceptions\NotFound;
use Exception;

class SampleRegistry
{
    public function put($key, $value)
    {
        \usleep(3000);
        \App\some_utility_function('some argument');
        // Return the id of the item inserted
        return 456;
    }

    public function faultyMethod()
    {
        \usleep(6000);
        throw new Exception('Generated at runtime');
    }

    public function get($key)
    {
        \usleep(2000);
        // The service uses an exception to report a key not found.
        throw new NotFound('The key was not found');
    }

    public function compact()
    {
        \usleep(8000);
        // This function execute some operations on the registry and returns nothing.
        // In the middle of the function, we have an interesting value that is not
        // returned but can be related to the slowness of the function
        $numberOfItemsProcessed = 123;

        // Add trcing code in your business logic only if necessary
        if (\function_exists('\DDTrace\active_span') && $span = \DDTrace\active_span()) {
            $span->meta['registry.compact.items_processed'] = $numberOfItemsProcessed;
        }

        // ...
    }
}
