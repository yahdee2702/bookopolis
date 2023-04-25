<?php

namespace App\Providers;

use DOMDocument;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Blade::directive('svg', function ($arguments) {
            list($path, $classVal) = array_pad(explode(',', trim($arguments, "() ")), 2, '');

            return implode("", [
                "<?php\n",
                "\$svg9992 = new DOMDocument();",
                "\$svg9992->load(public_path({$path}));",
                $classVal !== null && isset($classVal) && !empty($classVal) ? "\$svg9992->documentElement->setAttribute(\"class\", {$classVal});": "",
                "\$svg9992->documentElement->removeAttribute(\"fill\");",
                "foreach (\$svg9992->getElementsByTagName(\"path\") as \$item401) {\$item401->removeAttribute(\"fill\");}",
                "echo \$svg9992->saveXML(\$svg9992->documentElement);unset(\$svg9992);",
                "?>",
            ]);
        });
    }

    public function boot(): void
    {

    }
}
?>
