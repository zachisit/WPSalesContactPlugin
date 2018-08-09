<?php

namespace BWBSalesContact;


class Utility
{
    /**
     * @param $templateFile
     * @param array $args
     * @return string
     * @throws \Exception
     */
    public static function populateTemplateFile($templateFile, $args = [])
    {
        ob_start();

        $templateDirectory = dirname(__FILE__) . '/Templates';
        $templateFile = $templateFile . '.template.php';

        if(file_exists($templateDirectory . '/' . $templateFile)){
            extract($args);
            include $templateDirectory . '/' . $templateFile;
        } else {
            error_log('Template file does not exist');
            throw new \Exception('Template file does not exist');
        }

        return ob_get_clean();
    }

    /*
     * get list of nonstatic properties for a class
     */
    public static function getNonStaticProperties($object, $includeParentProperties = true, $includeTraitProperties = false)
    {
        if (!class_exists($object)) {
            return []; //If $object is not a valid class, return empty array
        }

        //Create a reflection of the passed object
        $reflection = new \ReflectionClass($object);
        $static = $reflection->getStaticProperties(); //Get the reflections static properties
        $allArr = $reflection->getProperties(); //Get the reflections properties

        $static = array_keys($static);
        foreach ($allArr as $prop) {
            $all[] = trim($prop->name);
        }
        if (!is_array($all)) {
            $all = [$all];
        }
        if (!is_array($static) || empty($static)) { //If $static is empty, simply return $all
            $result = $all;
        } else { // Return the list of variables that are present in $all but not present in $static
            $result =  array_diff($all, $static);
        }

        if (!$includeParentProperties && $parent = get_parent_class($object)) {
            $parentProps = getNonStaticProperties($parent, true);
            $result = array_diff($result, $parentProps);
        }

        if (!$includeTraitProperties && !empty($traits = $reflection->getTraits())) {
            $traitProps = [];
            foreach ($traits as $trait) {
                $traitProperties = $trait->getProperties();
                foreach ($traitProperties as $prop) {
                    $traitProps[] = trim($prop->getName());
                }
            }
            $result = array_diff($result, $traitProps);
        }

        return $result;
    }

    /**
     * @param $object
     * @return string
     */
    public static function getClass($object)
    {
        return end(explode('\\',get_class($object)));
    }

    /**
     * @return bool
     */
    public static function getUserInternetProtocol()
    {
        $ip = false;
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ips = explode(', ', $_SERVER['HTTP_X_FORWARDED_FOR']);
            if ($ip != false) {
                array_unshift($ips, $ip);
                $ip = false;
            }
            $count = count($ips);
            // Exclude IP addresses that are reserved for LANs
            for ($i = 0; $i < $count; $i++) {
                if (!preg_match("/^(10|172\.16|192\.168)\./i", $ips[$i])) {
                    $ip = $ips[$i];
                    break;
                }
            }
        }
        //use the standard variable is others don't pan out
        if (false == $ip && isset($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
}