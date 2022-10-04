<?php

declare(strict_types=1);

const DB_HOST = 'db.3wa.io';  // Would probably be `localhost` or `127.0.0.1` in your case (:
const DB_PORT = '3306';
const DB_NAME = 'loicsunve_message';
const DB_USERNAME = 'loicsunve';
const DB_PASSWORD = '79eaf90066f74b445b85ffb4fee83ae9';

function getConnection(): \PDO
{
    return new \PDO(
        'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME,
        DB_USERNAME,
        DB_PASSWORD
    );
}
