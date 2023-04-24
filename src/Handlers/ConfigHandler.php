<?php

namespace Megaads\LaravelFilemanager\Handlers;

class ConfigHandler
{
    public function userField()
    {
        return auth()->user()->id;
    }
}
