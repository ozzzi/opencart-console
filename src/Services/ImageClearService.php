<?php

namespace Ozzzi\Console\Services;

class ImageClearService extends BaseClearService
{
    public function process()
    {
        $this->clear(DIR_IMAGE . 'cache');
    }
}