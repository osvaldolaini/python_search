##'larevel básico' (jetstream + livewire + tailwind)
-laravel new nomeDoProjeto
-cd nomeDoProjeto
-composer require laravel/jetstream
-php artisan jetstream:install livewire --dark
-npm install
-npm run build
-php artisan livewire:publish --config
-php artisan migrate
-php artisan vendor:publish --tag=laravel-errors
-php artisan storage:link

    >livewire.config
	// 'layout' => 'components.layouts.app',
    	'layout' => 'layouts.app',

##'Plugin Tailwind'
-npm i -D daisyui@latest
-plugins: [require("daisyui")], (tailwind.config.js)
-npm run build

##'Portugues para o laravel (lucascudo/laravel-pt-br-localization)
-php artisan lang:publish'
-composer require lucascudo/laravel-pt-br-localization --dev
-php artisan vendor:publish --tag=laravel-pt-br-localization
	//https://github.com/opcodesio/log-viewer
	-composer require opcodesio/log-viewer
	-php artisan log-viewer:publish

##'Pacote LOG activitylog'
composer require spatie/laravel-activitylog
php artisan vendor:publish --provider="Spatie\Activitylog\ActivitylogServiceProvider" --tag="activitylog-migrations"
php artisan migrate
php artisan vendor:publish --provider="Spatie\Activitylog\ActivitylogServiceProvider" --tag="activitylog-config"
