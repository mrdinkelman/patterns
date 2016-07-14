<?php
/**
 * PHP version: 5.6+
 */
namespace Helpers;

/**
 * Class ObjectHashHelper
 * @package Helpers\ObjectHash
 */
class ObjectHashHelper
{
    /**
     * Default message related to un-exists hash function
     */
    const EXCEPT_MESSAGE = "Unable to calculate has for object '%s'. Function '%s' doesn't exists";

    /**
     * Standard hash function name or user hash function
     * @var string
     */
    protected $encryptFunctionName;

    /**
     * ObjectHashHelper constructor.
     * @param string $encryptFunctionName
     */
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
    public function calculateHash($object, $except = [])
    {
        $converted = new \stdClass();

        // skip all except properties
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
