<?php
function loadEnv($path) {
    if (!file_exists($path)) {
        throw new Exception("File .env không tồn tại");
    }
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos($line, '#') === 0) {
            continue; // Bỏ qua dòng comment
        }
        list($key, $value) = explode('=', $line, 2);
        $key = trim($key);
        $value = trim($value);

        if (!array_key_exists($key, $_SERVER) && !array_key_exists($key, $_ENV)) {
            putenv("$key=$value");
            $_ENV[$key] = $value;
            $_SERVER[$key] = $value;
        }
    }
}

function dump_die($data)
{
    echo "<pre>" . json_encode($data, JSON_PRETTY_PRINT) . "</pre>";
    die();
}
function version()
{       
    loadEnv(__DIR__ . '/.env');
    return getenv('APP_VERSION');
    // return '1.5.2';
}
function env() {
    loadEnv(__DIR__ . '/.env');
    return getenv('APP_VERSION');
}