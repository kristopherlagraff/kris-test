<?php

namespace MediaCloud\Vendor\Aws\imagebuilder;
use MediaCloud\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **EC2 Image Builder** service.
 * @method \MediaCloud\Vendor\Aws\Result cancelImageCreation(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise cancelImageCreationAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createComponent(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createComponentAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createDistributionConfiguration(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createDistributionConfigurationAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createImage(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createImageAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createImagePipeline(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createImagePipelineAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createImageRecipe(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createImageRecipeAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createInfrastructureConfiguration(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createInfrastructureConfigurationAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteComponent(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteComponentAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteDistributionConfiguration(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteDistributionConfigurationAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteImage(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteImageAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteImagePipeline(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteImagePipelineAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteImageRecipe(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteImageRecipeAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteInfrastructureConfiguration(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteInfrastructureConfigurationAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getComponent(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getComponentAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getComponentPolicy(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getComponentPolicyAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getDistributionConfiguration(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getDistributionConfigurationAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getImage(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getImageAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getImagePipeline(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getImagePipelineAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getImagePolicy(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getImagePolicyAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getImageRecipe(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getImageRecipeAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getImageRecipePolicy(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getImageRecipePolicyAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getInfrastructureConfiguration(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getInfrastructureConfigurationAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result importComponent(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise importComponentAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listComponentBuildVersions(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listComponentBuildVersionsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listComponents(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listComponentsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listDistributionConfigurations(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listDistributionConfigurationsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listImageBuildVersions(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listImageBuildVersionsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listImagePipelineImages(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listImagePipelineImagesAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listImagePipelines(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listImagePipelinesAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listImageRecipes(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listImageRecipesAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listImages(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listImagesAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listInfrastructureConfigurations(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listInfrastructureConfigurationsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result putComponentPolicy(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise putComponentPolicyAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result putImagePolicy(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise putImagePolicyAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result putImageRecipePolicy(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise putImageRecipePolicyAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result startImagePipelineExecution(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise startImagePipelineExecutionAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result tagResource(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result untagResource(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateDistributionConfiguration(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateDistributionConfigurationAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateImagePipeline(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateImagePipelineAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateInfrastructureConfiguration(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateInfrastructureConfigurationAsync(array $args = [])
 */
class imagebuilderClient extends AwsClient {}
