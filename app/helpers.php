<?php

function get_db_config()
{
    if(getevn('IS_IN_HEROKU')) {
        $url = parse_url(getevn("DATABASE_URL"));

        return $db_config = [
            'connection' => 'pgsql',
            'host' => $url['host'],
            'database' => substr($url["path"], 1),
            'username' => $url['user'],
            'password' => $url['pass']
        ];
    } else {
        return $db_config = [
            'connection' => 'pgsql',
            'host' => $url['host'],
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
        ];
    }
}