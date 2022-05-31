<?php

use App\Exceptions\NotFound;
use DDTrace\SpanData;

if (false) {
    return;
}

\DDTrace\trace_function(
    'App\some_utility_function',
    function (SpanData $span, $args, $ret, $exception) {
    }
);

\DDTrace\trace_method(
    'App\Services\SampleRegistry',
    'put',
    function (SpanData $span, $args, $ret, $exception) {
        $span->meta['app.cache.item_id'] = $ret;
    }
);

\DDTrace\trace_method(
    'App\Services\SampleRegistry',
    'faultyMethod',
    function (SpanData $span, $args, $ret, $exception) {
    }
);

\DDTrace\trace_method(
    'App\Services\SampleRegistry',
    'get',
    function (SpanData $span, $args, $ret, $exception) {
        if ($exception instanceof NotFound) {
            unset($span->exception);
            $span->resource = 'cache.get.not_found';
        }
    }
);

\DDTrace\trace_method(
    'App\Services\SampleRegistry',
    'compact',
    function (SpanData $span, $args, $ret, $exception) {
    }
);
