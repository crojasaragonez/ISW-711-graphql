<?php return array (
  'barryvdh/laravel-cors' => 
  array (
    'providers' => 
    array (
      0 => 'Barryvdh\\Cors\\ServiceProvider',
    ),
  ),
  'facade/ignition' => 
  array (
    'providers' => 
    array (
      0 => 'Facade\\Ignition\\IgnitionServiceProvider',
    ),
    'aliases' => 
    array (
      'Flare' => 'Facade\\Ignition\\Facades\\Flare',
    ),
  ),
  'fideloper/proxy' => 
  array (
    'providers' => 
    array (
      0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
    ),
  ),
  'joselfonseca/lighthouse-graphql-passport-auth' => 
  array (
    'providers' => 
    array (
      0 => 'Joselfonseca\\LighthouseGraphQLPassport\\Providers\\LighthouseGraphQLPassportServiceProvider',
    ),
  ),
  'laravel/passport' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Passport\\PassportServiceProvider',
    ),
  ),
  'laravel/telescope' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Telescope\\TelescopeServiceProvider',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'mll-lab/laravel-graphql-playground' => 
  array (
    'providers' => 
    array (
      0 => 'MLL\\GraphQLPlayground\\GraphQLPlaygroundServiceProvider',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
  'nunomaduro/collision' => 
  array (
    'providers' => 
    array (
      0 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    ),
  ),
  'nuwave/lighthouse' => 
  array (
    'providers' => 
    array (
      0 => 'Nuwave\\Lighthouse\\LighthouseServiceProvider',
      1 => 'Nuwave\\Lighthouse\\SoftDeletes\\SoftDeletesServiceProvider',
    ),
    'aliases' => 
    array (
      'graphql' => 'Nuwave\\Lighthouse\\GraphQL',
    ),
  ),
  'spatie/laravel-permission' => 
  array (
    'providers' => 
    array (
      0 => 'Spatie\\Permission\\PermissionServiceProvider',
    ),
  ),
);