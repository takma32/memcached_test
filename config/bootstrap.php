<?php
ini_set( 'display_errors', 1 );

define('BASE_DIR', dirname(__DIR__). '/');

// require core
require BASE_DIR . 'core/model.php';

require BASE_DIR . 'vendor/SimpleDBI/SimpleDBI.php';

// require config
require BASE_DIR . 'config/core.php';
require BASE_DIR . 'config/database.php';

// Lib
require BASE_DIR . 'lib/memcached.php';
require BASE_DIR . 'lib/db.php';

// require model
require BASE_DIR . 'model/user.php';

