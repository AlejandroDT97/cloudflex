<?php

$databases['default']['default'] = array (
  'database' => 'cms_22_1d0256eee6a3',
  'username' => 'user_22_1d0256eee6a3',
  'password' => 'UV3cq3yQN5lbpRSvf6uS',
  'prefix' => '',
  'host' => 'localhost',
  'port' => '',
  'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
  'driver' => 'mysql',
);

// Hash salt para seguridad
$settings['hash_salt'] = '6@Z1bH)9kpsO(hy:j~(W;UEd;jf]T;4;sMOrVP}jda[OV0!tTjWl!Gk*=UhK9p4Y';

// Configuración de permisos y archivos
$settings['file_public_path'] = 'sites/default/files';
$settings['file_private_path'] = '';
$settings['file_temp_path'] = '/tmp';

// Configuración de errores
$settings['container_yamls'][] = DRUPAL_ROOT . '/sites/development.services.yml';
$settings['error_level'] = 'hide';

// Habilitar configuración de sobrescritura local (útil para desarrollo)
if (file_exists(__DIR__ . '/settings.local.php')) {
  include __DIR__ . '/settings.local.php';
}

// Configuración del entorno (puedes cambiar 'dev' a 'prod' en producción)
$settings['environment'] = 'dev';

// Clave de instalación si es necesaria (por ejemplo para Drush)
$settings['install_profile'] = 'standard';
