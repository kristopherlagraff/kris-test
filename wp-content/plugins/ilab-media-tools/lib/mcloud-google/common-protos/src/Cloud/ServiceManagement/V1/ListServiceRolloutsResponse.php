<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/api/servicemanagement/v1/servicemanager.proto

namespace MediaCloud\Vendor\Google\Cloud\ServiceManagement\V1;
use MediaCloud\Vendor\Google\Protobuf\Internal\GPBType;
use MediaCloud\Vendor\Google\Protobuf\Internal\RepeatedField;
use MediaCloud\Vendor\Google\Protobuf\Internal\GPBUtil;

/**
 * Response message for ListServiceRollouts method.
 *
 * Generated from protobuf message <code>google.api.servicemanagement.v1.ListServiceRolloutsResponse</code>
 */
class ListServiceRolloutsResponse extends \MediaCloud\Vendor\Google\Protobuf\Internal\Message
{
    /**
     * The list of rollout resources.
     *
     * Generated from protobuf field <code>repeated .google.api.servicemanagement.v1.Rollout rollouts = 1;</code>
     */
    private $rollouts;
    /**
     * The token of the next page of results.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     */
    private $next_page_token = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \MediaCloud\Vendor\Google\Cloud\ServiceManagement\V1\Rollout[]|\Google\Protobuf\Internal\RepeatedField $rollouts
     *           The list of rollout resources.
     *     @type string $next_page_token
     *           The token of the next page of results.
     * }
     */
    public function __construct($data = NULL) { \MediaCloud\Vendor\GPBMetadata\Google\Api\Servicemanagement\V1\Servicemanager::initOnce();
        parent::__construct($data);
    }

    /**
     * The list of rollout resources.
     *
     * Generated from protobuf field <code>repeated .google.api.servicemanagement.v1.Rollout rollouts = 1;</code>
     * @return \MediaCloud\Vendor\Google\Protobuf\Internal\RepeatedField
     */
    public function getRollouts()
    {
        return $this->rollouts;
    }

    /**
     * The list of rollout resources.
     *
     * Generated from protobuf field <code>repeated .google.api.servicemanagement.v1.Rollout rollouts = 1;</code>
     * @param \MediaCloud\Vendor\Google\Cloud\ServiceManagement\V1\Rollout[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setRollouts($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \MediaCloud\Vendor\Google\Protobuf\Internal\GPBType::MESSAGE, \MediaCloud\Vendor\Google\Cloud\ServiceManagement\V1\Rollout::class);
        $this->rollouts = $arr;

        return $this;
    }

    /**
     * The token of the next page of results.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     * @return string
     */
    public function getNextPageToken()
    {
        return $this->next_page_token;
    }

    /**
     * The token of the next page of results.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setNextPageToken($var)
    {
        GPBUtil::checkString($var, True);
        $this->next_page_token = $var;

        return $this;
    }

}

