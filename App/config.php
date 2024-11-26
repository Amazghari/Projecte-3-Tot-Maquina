<?php

return [
    /* configuració de connexió a la base dades */
    /* Path on guardarem el fitxer sqlite */
    "sqlite" => [
        "path" => Emeset\Env::get("sqlite_path", "../"),
        "name" => Emeset\Env::get("sqlite_name", "db.sqlite")
    ],
    "db" => [
        "name" => "totmaquina",   // The name of the database to connect to
        "user" => "myuser",    // The username for accessing the database
        "pass" => "mypassw0rd",   // The password for the database user
        "host" => "mariadb_totmaquina_container",   // The host where MariaDB is running
        "charset" => "utf8mb4",  // Character set for proper encoding support
        "port" => "3307"         // Default MariaDB port
    ],

    /* Nom de la cookie */
    "cookie" => [
        "name" => Emeset\Env::get("cookie_name", 'visites')
    ],
    "login" => [
        "usuari" => Emeset\Env::get("login_usuari", "dani"),
        "clau" => Emeset\Env::get("login_clau", "1234")
    ],
    "app" => [
        "name" => Emeset\Env::get("app_name", "Emeset demo"),
        "version" => Emeset\Env::get("app_version", "0.2.5")
    ]
];