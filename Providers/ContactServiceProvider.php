<?php namespace Modules\Contact\Providers;

use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Contact\Repositories\ContactRepository',
            function () {
                $repository = new \Modules\Contact\Repositories\Eloquent\EloquentContactRepository(new \Modules\Contact\Entities\Contact());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Contact\Repositories\Cache\CacheContactDecorator($repository);
            }
        );
// add bindings

    }
}
