<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Develo\FactfinderHyvaCompat\ViewModel;

use Magento\Framework\View\Asset\Repository as AssetRepository;

class SearchForm implements \Magento\Framework\View\Element\Block\ArgumentInterface
{

    /**
     * @var AssetRepository
     */
    private $assetRepository;

    public function __construct(AssetRepository $assetRepository)
    {
        $this->assetRepository = $assetRepository;
    }

    public function getAssetUrl($asset)
    {
        return $this->assetRepository->getUrl($asset);
    }

}

