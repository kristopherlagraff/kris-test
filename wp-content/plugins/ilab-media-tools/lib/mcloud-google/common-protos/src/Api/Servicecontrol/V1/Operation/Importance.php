<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/api/servicecontrol/v1/operation.proto

namespace MediaCloud\Vendor\Google\Api\Servicecontrol\V1\Operation;

use UnexpectedValueException;

/**
 * Defines the importance of the data contained in the operation.
 *
 * Protobuf type <code>google.api.servicecontrol.v1.Operation.Importance</code>
 */
class Importance
{
    /**
     * The API implementation may cache and aggregate the data.
     * The data may be lost when rare and unexpected system failures occur.
     *
     * Generated from protobuf enum <code>LOW = 0;</code>
     */
    const LOW = 0;
    /**
     * The API implementation doesn't cache and aggregate the data.
     * If the method returns successfully, it's guaranteed that the data has
     * been persisted in durable storage.
     *
     * Generated from protobuf enum <code>HIGH = 1;</code>
     */
    const HIGH = 1;

    private static $valueToName = [
        self::LOW => 'LOW',
        self::HIGH => 'HIGH',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Importance::class, \MediaCloud\Vendor\Google\Api\Servicecontrol\V1\Operation_Importance::class);

