<?php

/**
 * Class DB
 */
class DB
{
    /**
     * DB constructor.
     */
    public function __construct()
    {

//     $jsonFile = json_decode(require_once ('/configFile/confJson.txt'));
//        var_dump($jsonFile);
//        die();


        $conf = parse_ini_file('/configFile/configFileDB.ini');

        mysql_connect($conf['host'], $conf['user'], $conf['password']);
        mysql_select_db($conf['database']);
    }


    /**
     * @param $sql
     * @param string $class
     * @return array|bool
     */
    public function query($sql, $class = 'stdClass')
    {
        $queryResult = mysql_query($sql)or die('Ошибка! Код ошибки: '.mysql_error());
        if (false == $queryResult)
        {
            return false;
        }
        $ret = [];
        while ($row = mysql_fetch_object($queryResult, $class))
        {
            $ret[] = $row;
        }
        return $ret;
    }

    /**
     * @param $sql
     */
    public function exec($sql)
    {
        mysql_query($sql)or die('Ошибка! Код ошибки: '.mysql_error());
    }

    /**
     * @param $sql
     */
    public function delete($sql)
    {
        mysql_query($sql)or die('Ошибка! Код ошибки: '.mysql_error());
    }
}