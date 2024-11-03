<?php

namespace Deployer;

require 'recipe/common.php'; // Use a receita comum para transferir arquivos sem Git

// Nome do projeto
set('application', 'SaliaCloud');

// Caminho de deploy no servidor remoto
set('deploy_path', '/home1/conec734/saliacloud.com.br');

// Configurar o host e SSH
host('108.179.192.199')
    ->set('user', 'conec734') // Use set('user', ...)
    ->set('identity_file', '/home/gutto/.ssh/id_rsa') // Caminho para a chave privada
    ->set('port', 2222); // Use a porta correta

// Tarefa para upload dos arquivos locais para o servidor remoto
task('deploy:update_code', function () {
    writeln('Iniciando upload dos arquivos...');
    upload('.', '/home1/conec734/saliacloud.com.br', [
        'exclude' => ['.git','.env', '.env.*', 'node_modules', 'cache', '*.log'],
    ]);
    writeln('Upload concluído.');
});

// Redefinir a tarefa deploy:env para não fazer nada
task('deploy:env', function () {
    writeln('Tarefa deploy:env desativada.');
});


// Tarefas adicionais
//after('deploy:failed', 'deploy:unlock'); // Desbloqueia em caso de falha

// Tarefa para rodar migrations forçadas após o deploy
task('artisan:migrate', function () {
    run('{{bin/php}} {{release_path}}/artisan migrate --force');
    run('{{bin/php}} {{release_path}}/artisan config:cache');
    run('{{bin/php}} {{release_path}}/artisan route:cache');
    run('{{bin/php}} {{release_path}}/artisan view:cache');
    run('{{bin/php}} {{release_path}}/artisan optimize');
});
