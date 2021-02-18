<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/rpc/error_details.proto

namespace MediaCloud\Vendor\Google\Rpc;
use MediaCloud\Vendor\Google\Protobuf\Internal\GPBType;
use MediaCloud\Vendor\Google\Protobuf\Internal\RepeatedField;
use MediaCloud\Vendor\Google\Protobuf\Internal\GPBUtil;

/**
 * Describes the resource that is being accessed.
 *
 * Generated from protobuf message <code>google.rpc.ResourceInfo</code>
 */
class ResourceInfo extends \MediaCloud\Vendor\Google\Protobuf\Internal\Message
{
    /**
     * A name for the type of resource being accessed, e.g. "sql table",
     * "cloud storage bucket", "file", "Google calendar"; or the type URL
     * of the resource: e.g. "type.googleapis.com/google.pubsub.v1.Topic".
     *
     * Generated from protobuf field <code>string resource_type = 1;</code>
     */
    private $resource_type = '';
    /**
     * The name of the resource being accessed.  For example, a shared calendar
     * name: "example.com_4fghdhgsrgh&#64;group.calendar.google.com", if the current
     * error is [google.rpc.Code.PERMISSION_DENIED][google.rpc.Code.PERMISSION_DENIED].
     *
     * Generated from protobuf field <code>string resource_name = 2;</code>
     */
    private $resource_name = '';
    /**
     * The owner of the resource (optional).
     * For example, "user:<owner email>" or "project:<Google developer project
     * id>".
     *
     * Generated from protobuf field <code>string owner = 3;</code>
     */
    private $owner = '';
    /**
     * Describes what error is encountered when accessing this resource.
     * For example, updating a cloud project may require the `writer` permission
     * on the developer console project.
     *
     * Generated from protobuf field <code>string description = 4;</code>
     */
    private $description = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_type
     *           A name for the type of resource being accessed, e.g. "sql table",
     *           "cloud storage bucket", "file", "Google calendar"; or the type URL
     *           of the resource: e.g. "type.googleapis.com/google.pubsub.v1.Topic".
     *     @type string $resource_name
     *           The name of the resource being accessed.  For example, a shared calendar
     *           name: "example.com_4fghdhgsrgh&#64;group.calendar.google.com", if the current
     *           error is [google.rpc.Code.PERMISSION_DENIED][google.rpc.Code.PERMISSION_DENIED].
     *     @type string $owner
     *           The owner of the resource (optional).
     *           For example, "user:<owner email>" or "project:<Google developer project
     *           id>".
     *     @type string $description
     *           Describes what error is encountered when accessing this resource.
     *           For example, updating a cloud project may require the `writer` permission
     *           on the developer console project.
     * }
     */
    public function __construct($data = NULL) { \MediaCloud\Vendor\GPBMetadata\Google\Rpc\ErrorDetails::initOnce();
        parent::__construct($data);
    }

    /**
     * A name for the type of resource being accessed, e.g. "sql table",
     * "cloud storage bucket", "file", "Google calendar"; or the type URL
     * of the resource: e.g. "type.googleapis.com/google.pubsub.v1.Topic".
     *
     * Generated from protobuf field <code>string resource_type = 1;</code>
     * @return string
     */
    public function getResourceType()
    {
        return $this->resource_type;
    }

    /**
     * A name for the type of resource being accessed, e.g. "sql table",
     * "cloud storage bucket", "file", "Google calendar"; or the type URL
     * of the resource: e.g. "type.googleapis.com/google.pubsub.v1.Topic".
     *
     * Generated from protobuf field <code>string resource_type = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setResourceType($var)
    {
        GPBUtil::checkString($var, True);
        $this->resource_type = $var;

        return $this;
    }

    /**
     * The name of the resource being accessed.  For example, a shared calendar
     * name: "example.com_4fghdhgsrgh&#64;group.calendar.google.com", if the current
     * error is [google.rpc.Code.PERMISSION_DENIED][google.rpc.Code.PERMISSION_DENIED].
     *
     * Generated from protobuf field <code>string resource_name = 2;</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * The name of the resource being accessed.  For example, a shared calendar
     * name: "example.com_4fghdhgsrgh&#64;group.calendar.google.com", if the current
     * error is [google.rpc.Code.PERMISSION_DENIED][google.rpc.Code.PERMISSION_DENIED].
     *
     * Generated from protobuf field <code>string resource_name = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setResourceName($var)
    {
        GPBUtil::checkString($var, True);
        $this->resource_name = $var;

        return $this;
    }

    /**
     * The owner of the resource (optional).
     * For example, "user:<owner email>" or "project:<Google developer project
     * id>".
     *
     * Generated from protobuf field <code>string owner = 3;</code>
     * @return string
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * The owner of the resource (optional).
     * For example, "user:<owner email>" or "project:<Google developer project
     * id>".
     *
     * Generated from protobuf field <code>string owner = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setOwner($var)
    {
        GPBUtil::checkString($var, True);
        $this->owner = $var;

        return $this;
    }

    /**
     * Describes what error is encountered when accessing this resource.
     * For example, updating a cloud project may require the `writer` permission
     * on the developer console project.
     *
     * Generated from protobuf field <code>string description = 4;</code>
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Describes what error is encountered when accessing this resource.
     * For example, updating a cloud project may require the `writer` permission
     * on the developer console project.
     *
     * Generated from protobuf field <code>string description = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setDescription($var)
    {
        GPBUtil::checkString($var, True);
        $this->description = $var;

        return $this;
    }

}

