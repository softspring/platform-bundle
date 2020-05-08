

*This bundle is under development, more features will be added soon, and existing ones may change.*

[![Latest Stable Version](https://poser.pugx.org/softspring/platform-bundle/v/stable.svg)](https://packagist.org/packages/softspring/platform-bundle)
[![Latest Unstable Version](https://poser.pugx.org/softspring/platform-bundle/v/unstable.svg)](https://packagist.org/packages/softspring/platform-bundle)
[![License](https://poser.pugx.org/softspring/platform-bundle/license.svg)](https://packagist.org/packages/softspring/platform-bundle)
[![Total Downloads](https://poser.pugx.org/softspring/platform-bundle/downloads)](https://packagist.org/packages/softspring/platform-bundle)
[![Build status](https://travis-ci.com/softspring/platform-bundle.svg?branch=master)](https://travis-ci.com/softspring/platform-bundle)

# Installation

## Applications that use Symfony Flex

Open a command console, enter your project directory and execute:

```console
$ composer require softspring/platform-bundle
```


# Configuration

## Mapping XML

        <!-- Softspring\PlatformBundle\Model\PlatformObjectTrait -->
        <field name="platform" column="platform" type="smallint" nullable="true"><options><option name="unsigned">true</option></options></field>
        <field name="platformId" column="platform_id" type="string" nullable="true" />
        <field name="platformData" column="platform_data" type="json" nullable="true" />
        <field name="platformLastSync" column="platform_last_sync" type="integer" nullable="true"><options><option name="unsigned">true</option></options></field>
        <field name="platformConflict" column="platform_conflict" type="boolean" nullable="false"><options><option name="default">0</option></options></field>
        <field name="testMode" column="platform_test_mode" type="boolean" nullable="false"><options><option name="default">0</option></options></field>