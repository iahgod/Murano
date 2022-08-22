<?php
namespace src;

class Config {
    const BASE_DIR = '/mvc/public';

    const DB_DRIVER = 'mysql';
    const DB_HOST = 'localhost';
    const DB_DATABASE = 'murano';
    CONST DB_USER = 'root';
    const DB_PASS = '';

    const ERROR_CONTROLLER = 'ErrorController';
    const DEFAULT_ACTION = 'index';

     //!EMAIL

     const HOST = 'smtp.hostinger.com';
     const USER = 'contato@smarterlar.net';
     const PASSWORD = 'Guest2236';
     const PORT = '465';
     const SMTP_SECURE = '';
     const FROM_NAME = 'Murano';
     const FROM_EMAIL = 'contato@smarterlar.net';
}