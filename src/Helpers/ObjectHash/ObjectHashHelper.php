<?php

namespace Helpers\ObjectHash;

class ObjectHashHelper implements IObjectHash
{
    const EXCEPT_MESSAGE = "Unable to calculate has for object '%s'. Function '%s' doesn't exists";

    protected $encryptFunctionName;

    public function __construct($encryptFunctionName = 'sha1')
    {
        $this->encryptFunctionName = strtolower($encryptFunctionName);
    }

    /**
     * Generates unique hash for object props values
     * Use except param for skipping few props if needed
     *
     * @param mixed $object
     * @param array $except
     *
     * @return string
     */
    public function calculateHash($object, $except = array())
    {
        $converted = new \stdClass();

        foreach ($object as $prop => $value) {
            if (in_array($prop, $except)) {
                continue;
            }

            $converted->$prop = $value;
        }

        if (!function_exists($this->encryptFunctionName)) {
            throw new \RuntimeException(
                sprintf(
                    self::EXCEPT_MESSAGE,
                    (new \ReflectionClass($object))->getShortName(),
                    $this->encryptFunctionName
                )
            );
        }

        return call_user_func($this->encryptFunctionName, serialize($converted));
    }
}