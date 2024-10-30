<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'y');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('162.241.203.181')
    ->set('remote_user', 'deployer')
    ->set('deploy_path', '~/y');

// Hooks

after('deploy:failed', 'deploy:unlock');
