<?php

return [
    'webistes' => json_decode(env('WHITELIST_WEBSITES', null), true)
];