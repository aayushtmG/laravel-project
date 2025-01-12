namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     */
    protected $middleware = [
        // Add global middleware here
    ];

    /**
     * The application's route middleware groups.
     */
    protected $middlewareGroups = [
        'web' => [
            // Web middleware
        ],
        'api' => [
            // API middleware
        ],
    ];
    /**
     * The application's route middleware.
     */
    protected $routeMiddleware = [
        'example' => \App\Http\Middleware\ExampleMiddleware::class,
    ];
}
