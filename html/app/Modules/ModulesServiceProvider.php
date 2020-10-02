<?php

namespace App\Modules;

class ModulesServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $modules = config("module.modules");
        if ($modules) {
            foreach ($modules as $module){
                if (file_exists(__DIR__ . '/' . $module . '/Routes/routes.php')) {
                    $this->loadRoutesFrom(__DIR__ . '/' . $module . '/Routes/routes.php');
                }

                if (is_dir(__DIR__ . '/' . $module . '/Views')) {
                    $this->loadViewsFrom(__DIR__ . '/' . $module . '/Views', $module);
                    $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'Main');
                }

                if (is_dir(__DIR__ . '/' . $module . '/Migration')) {
                    $this->loadMigrationsFrom(__DIR__ . '/' . $module . '/Migration');
                }

                if (is_dir(__DIR__ . '/' . $module . '/Lang')) {
                    $this->loadTranslationsFrom(__DIR__ . '/' . $module . '/Lang', $module);
                    $this->loadViewsFrom(__DIR__ . '/../../resources/lang', 'Main');
                }
            }
        }
    }

    public function register()
    {

    }
}
