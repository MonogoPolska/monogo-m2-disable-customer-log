#### Magento 2 module to disable customer logging for improve speed.

This module will work only with Magento 2.3.0 and higher

# **Install**

### Git
- Locate the **/app/code** directory which should be under the magento root installation.
- If the **code** folder is not there, create it.
- Create a folder **Monogo** inside the **code** folder. 
- Change to the **Monogo** folder and clone the Git repository (https://github.com/MonogoPolska/monogo-m2-disable-customer-log.git) into **Monogo** specifying the local repository folder to be **OptimizeDatabase** 
e.g. 

``` git clone https://github.com/MonogoPolska/monogo-m2-disable-customer-log DisableCustomerLog```

### Composer
```composer require monogo/disable-customer-log```

### Magento Setup
- Run Magento commands

```php bin/magento setup:upgrade```

```php bin/magento setup:di:compile```

```php bin/magento setup:static-content:deploy```

# **App Configuration Options**

Go to Stores->Configuration->Monogo->Disable Customer Log

- Enable module **Default value is 1 (Yes)**

### Default values:
enabled: 0

### Affected tables:
* customer_log
* customer_visitor

# **TODO**
- Tests