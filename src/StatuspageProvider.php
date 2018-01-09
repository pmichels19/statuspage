<?php
namespace CodeOrange\Statuspage;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class StatuspageProvider extends ServiceProvider {
	public function register() {
		$this->app->singleton(Statuspage::class);
	}

	public function boot(Schedule $s) {
		$this->loadViewsFrom(__DIR__ . '/views', 'statuspage');

		$this->app->router->get(env('STATUSPAGE_ROUTE', '/'), Controller::class . '@status');
	}
}