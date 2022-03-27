<?php

namespace Ozzzi\Console\Services;

class CacheClearService
{
    public function process()
    {
        $files = new \RecursiveDirectoryIterator(DIR_CACHE, \FilesystemIterator::SKIP_DOTS);

        foreach ($files as $file) {
            if ($file->isFile()) {
                if ($file->getFilename() === 'index.html') {
                    continue;
                }

                unlink($file);
            }
        }
    }
}