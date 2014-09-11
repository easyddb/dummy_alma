<?php

namespace Provider\AlmaBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

define('ALMA_DATE_FORMAT', 'Y-m-d');

class ProviderAlmaBundle extends Bundle
{

}

class AlmaUtils
{
    public static function createXmlHeader()
    {
        $xml = new \SimpleXMLElement('<AlmaMessage xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:alma="http://www.axiell.com/Schema/alma/v1.0"></AlmaMessage>');

        return $xml;
    }

    public static function formatDate($timestamp)
    {
        $dt = new \DateTime();
        $dt->setTimestamp($timestamp);
        $tz = new \DateTimeZone('Europe/Bucharest');
        $dt->setTimezone($tz);

        return $dt->format(ALMA_DATE_FORMAT);
    }

    public static function formatTimestamp($date)
    {
        $dt = new \DateTime($date);

        return $dt->getTimestamp();
    }
}
