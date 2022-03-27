<?php

namespace Ozzzi\Console\Services;

class BaseClearService
{
    public function clear(string $dir)
    {
        $directories = new \RecursiveDirectoryIterator($dir, \FilesystemIterator::SKIP_DOTS);
        $files = new \RecursiveIteratorIterator($directories, \RecursiveIteratorIterator::CHILD_FIRST);

        foreach ($files as $file) {
            if ($file->isFile() && $file->getFilename() === 'index.html') {
                continue;
            }

            $file->isDir() ?  rmdir($file) : unlink($file);
        }
    }
}