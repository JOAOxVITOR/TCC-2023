<?php
class Conexao
{
    public static $instance;

    public static function getConexao()
    {
        if (!isset(self::$instance)) {
            self::$instance = new PDO('mysql:host=localhost;dbname=helpfast', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }

        return self::$instance;
    }
}
