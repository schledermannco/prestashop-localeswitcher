<?php
/**
 * 2007-2018 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2018 PrestaShop SA
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 
 * @author    San & Johan
 *  
 */

if (!defined('_PS_VERSION_')) {
    die(header('HTTP/1.0 404 Not Found'));
}

class LocaleSwitcher extends Module {

	public function __construct() {
		$this->name = 'llocaleswitcher';
        $this->tab = 'administration';
        $this->author = 'Johan & San';
        $this->version = '1.0';
        $this->need_instance = 0;
        $this->bootstrap = true;
 
        parent::__construct();
 
        $this->displayName = $this->l('Locale Switcher');
        $this->description = $this->l('Adds alternative to language and currency switcher');
        $this->ps_versions_compliancy = array('min' => '1.7.1', 'max' => _PS_VERSION_);
    }
    

    public function install() {
        if ( !parent::install() === false || !$this->registerHook('displayNav2') )   
        {
            return false;
        } 
        return true;
    }

    public function uninstall() { 
 
        return parent::uninstall() && $this->unregisterHook('DisplayNav2');
    }

    public function hookDisplayNav2($params) {  
        $languages = Language::getLanguages(true);
        $currencies = Currency::getCurrencies(true);
        $this->context->smarty->assign(
            array(
                'languages'  => $languages,
                'currencies' => $currencies,
                'default_language' => Configuration::get('PS_LANG_DEFAULT'),
                'default_currency'  => Currency::getCurrencyInstance(Configuration::get('PS_CURRENCY_DEFAULT')) 
            )
        );
        return $this->display(__FILE__, 'views/templates/hook/localeswitcher.tpl');
    }
}