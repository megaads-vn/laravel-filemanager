<?php

namespace Megaads\LaravelFilemanager\Middlewares;

use Closure;
use Megaads\LaravelFilemanager\Traits\LfmHelpers;

class CreateDefaultFolder
{
    use LfmHelpers;

    public function handle($request, Closure $next)
    {
        $this->checkDefaultFolderExists('user');
        $this->checkDefaultFolderExists('share');

        return $next($request);
    }

    private function checkDefaultFolderExists($type = 'share')
    {
        if ($type === 'user' && ! $this->allowMultiUser()) {
            return;
        }

        if ($type === 'share' && ! $this->allowShareFolder()) {
            return;
        }

        $path = $this->getRootFolderPath($type);

        $this->createFolderByPath($path);
    }
}
