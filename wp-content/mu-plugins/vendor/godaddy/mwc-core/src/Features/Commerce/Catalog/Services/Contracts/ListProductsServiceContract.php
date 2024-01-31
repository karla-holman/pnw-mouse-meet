<?php

namespace GoDaddy\WordPress\MWC\Core\Features\Commerce\Catalog\Services\Contracts;

use GoDaddy\WordPress\MWC\Common\Exceptions\BaseException;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Catalog\Operations\Contracts\ListProductsOperationContract;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Catalog\Providers\DataObjects\ProductAssociation;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Exceptions\Contracts\CommerceExceptionContract;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Exceptions\MissingRemoteIdsAfterLocalIdConversionException;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Services\Exceptions\CachingStrategyException;

/**
 * Contract for services that can list products.
 */
interface ListProductsServiceContract
{
    /**
     * Lists products.
     *
     * @param ListProductsOperationContract $operation
     * @return ProductAssociation[]
     * @throws CommerceExceptionContract|CachingStrategyException|BaseException|MissingRemoteIdsAfterLocalIdConversionException
     */
    public function list(ListProductsOperationContract $operation) : array;
}
