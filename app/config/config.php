<?php

define('BASEURL', 'http://localhost/smart_mbg/public');

// DB
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'smart_mbg');
// Global output cleaner for XSS Prevention
function esc($string) {
    return htmlspecialchars((string)$string, ENT_QUOTES, 'UTF-8');
}
