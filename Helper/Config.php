<?php
declare(strict_types=1);

namespace Monogo\DisableCustomerLog\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Class Config
 *
 * @category Monogo
 * @package  Monogo\DisableCustomerLog
 * @license  MIT
 * @author   Paweł Detka <pawel.detka@monogo.pl>
 */
class Config extends AbstractHelper
{
    const CONFIG_PATH_ENABLED = 'monogo_disablecustomerlog/general/enabled';

    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    /**
     * Config constructor.
     *
     * @param Context               $context
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        Context $context,
        StoreManagerInterface $storeManager
    ) {
        parent::__construct($context);
        $this->storeManager = $storeManager;
    }

    /**
     * Get Store Config by key
     *
     * @param string $config_path
     * @param null   $storeId
     *
     * @return string
     */
    public function getConfig(string $config_path, $storeId = null): string
    {
        return (string)$this->scopeConfig->getValue(
            $config_path,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    /**
     * Get Is Enabled
     *
     * @return int
     */
    public function getIsEnabled(): int
    {
        return (int)$this->getConfig(self::CONFIG_PATH_ENABLED);
    }
}
