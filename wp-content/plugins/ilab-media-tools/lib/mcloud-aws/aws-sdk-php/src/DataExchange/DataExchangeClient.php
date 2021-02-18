<?php

namespace MediaCloud\Vendor\Aws\DataExchange;
use MediaCloud\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Data Exchange** service.
 * @method \MediaCloud\Vendor\Aws\Result cancelJob(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise cancelJobAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createDataSet(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createDataSetAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createJob(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createJobAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createRevision(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createRevisionAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteAsset(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteAssetAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteDataSet(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteDataSetAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteRevision(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteRevisionAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getAsset(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getAssetAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getDataSet(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getDataSetAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getJob(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getJobAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getRevision(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getRevisionAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listDataSetRevisions(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listDataSetRevisionsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listDataSets(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listDataSetsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listJobs(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listJobsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listRevisionAssets(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listRevisionAssetsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result startJob(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise startJobAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result tagResource(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result untagResource(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateAsset(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateAssetAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateDataSet(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateDataSetAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateRevision(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateRevisionAsync(array $args = [])
 */
class DataExchangeClient extends AwsClient {}
