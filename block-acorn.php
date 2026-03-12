<?php
/**
 * Plugin Name: Block Acorn
 * Plugin URI: https://example.com/acorn-block
 * Description: Registers a custom block and related assets for the Block Acorn plugin.
 * Version: 0.1.0
 * Author: Your Name
 * Author URI: https://example.com
 * Text Domain: acorn-block
 * Domain Path: /languages
 * Requires at least: 5.0
 * Requires PHP: 7.4
 * License: GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
use Roots\Acorn\Application;
use Roots\Acorn\Configuration\Middleware;
use Roots\Acorn\Configuration\Exceptions;

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
    require_once __DIR__ . '/vendor/autoload.php';
}

add_action('after_setup_theme', function () {
    Application::configure()
        ->withProviders([
            // Register your service providers
            App\Providers\AppServiceProvider::class,
            \Livewire\LivewireServiceProvider::class,
        ])
        ->withMiddleware(function (Middleware $middleware) {
            // Configure HTTP middleware for WordPress requests
            $middleware->wordpress([
                Illuminate\Cookie\Middleware\EncryptCookies::class,
                Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
                Illuminate\Session\Middleware\StartSession::class,
                Illuminate\View\Middleware\ShareErrorsFromSession::class,
                Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
                Illuminate\Routing\Middleware\SubstituteBindings::class,
            ]);

            // You can also configure middleware for web and API routes
            // $middleware->web([...]);
            // $middleware->api([...]);
        })
        ->withExceptions(function (Exceptions $exceptions) {
            // Configure exception handling
            // $exceptions->reportable(function (\Throwable $e) {
            //     Log::error($e->getMessage());
            // });
        })
        ->withRouting(
            // Configure routing with named parameters
            web: plugin_dir_path(__FILE__) . 'routes/web.php',
            api: plugin_dir_path(__FILE__) . 'routes/api.php',
            wordpress: true,                     // Enable WordPress request handling
        )
        ->boot();
}, 0);





/**
 * Automatically register blocks from the 'dist/blocks' directory and set up a render callback that uses Livewire to render the block's content.
 * This assumes that each block's metadata is defined in a 'block.json' file within its respective directory, and that the block's name corresponds to a Livewire component.
 * For example, a block with the name 'acorn/example-block' would correspond to a Livewire component named 'ExampleBlock' (after stripping the 'acorn/' prefix). Make sure to adjust the component naming logic as needed to fit your specific conventions.
 */
add_action('init', function () {

    $metadataDir = __DIR__ . '/dist/blocks';
  
    foreach (glob($metadataDir . '/*/block.json') as $metadataFile) {

        register_block_type_from_metadata(
            dirname($metadataFile),
            [
                'render_callback' => function ($attributes, $content, $block) {

                    $blockName = $block->name;
                    $component =  str_replace('acorn/', '', $blockName);
                 
                    return \Livewire\Livewire::mount(
                        $component,
                        $attributes
                    );

                }
            ]
        );

    }

});

/**
 * Output Livewire scripts in the footer.
 * TODO: You might want to conditionally load these scripts only on pages where your Livewire components are used for better performance.
 */
add_action('wp_footer', 'livewire_scripts_output', 20);
function livewire_scripts_output() {
    if (! class_exists('\Livewire\Mechanisms\FrontendAssets\FrontendAssets')) return;

    echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts();
}
