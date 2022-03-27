<?php

namespace Ozzzi\Console\Services;

class ModificationClearService extends BaseClearService
{
    public function process()
    {
        $this->clear(DIR_MODIFICATION);
    }
}