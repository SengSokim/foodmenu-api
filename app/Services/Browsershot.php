<?php

namespace App\Services;

use Spatie\Browsershot\Browsershot as MainBrowsershot;

class Browsershot extends MainBrowsershot
{
    public function toBase64()
    {
        $command = $this->createScreenshotCommand();

        return $this->callBrowser($command);
    }
}
