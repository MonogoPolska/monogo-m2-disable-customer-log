<?php
declare(strict_types=1);

namespace Monogo\DisableCustomerLog\Plugin\Customer\Model;

use Monogo\DisableCustomerLog\Helper\Config;

/**
 * PHP version 7.0
 * Class Logger
 *
 * @category Monogo
 * @package  Monogo\DisableCustomerLog
 * @license  MIT
 * @author   Paweł Detka <pawel.detka@monogo.pl>
 */
class Logger
{
    protected $config;

    /**
     * Logger constructor.
     *
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * Log plugin
     *
     * @param \Magento\Customer\Model\Logger $subject
     * @param callable                       $proceed
     * @param int                            $customerId
     * @param array                          $data
     *
     * @return \Magento\Customer\Model\Logger
     */
    public function aroundLog(
        \Magento\Customer\Model\Logger $subject,
        callable $proceed,
        $customerId,
        array $data
    ) {
        if ($this->config->getIsEnabled()) {
            return $subject;
        }
        return $proceed($customerId, $data);
    }
}
