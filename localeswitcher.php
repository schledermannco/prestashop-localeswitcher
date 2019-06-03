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
use PrestaShop\PrestaShop\Adapter\ObjectPresenter;

if (!defined('_PS_VERSION_')) {
    die(header('HTTP/1.0 404 Not Found'));
}

class LocaleSwitcher extends Module {
    private $templateFile;

    public function __construct() {
        $this->name = 'localeswitcher';
        $this->tab = 'front_office_features';
        $this->author = 'Johan & San';
        $this->version = '1.0';
        $this->need_instance = 0;
        $this->bootstrap = true;
 
        parent::__construct();
 
        $this->displayName = $this->l('Locale Switcher');
        $this->description = $this->l('Adds alternative to language and currency switcher');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

        $this->ps_versions_compliancy = array('min' => '1.7.1', 'max' => _PS_VERSION_);

        $this->templateFile = 'module:localeswitcher/views/templates/hook/localeswitcher.tpl';
    }
    

    public function install() {
        if ( !parent::install() ||  !$this->registerHook('displayHeader')  || !$this->registerHook('displayNav1') || !$this->registerHook('actionAdminCurrenciesControllerSaveAfter') )   
        {
            return false;
        } 
        return true;
    }

    public function uninstall() { 
 
        return parent::uninstall() && $this->unregisterHook('displayHeader') && $this->unregisterHook('DisplayNav1') && $this->unregisterHook('actionAdminCurrenciesControllerSaveAfter');
    }

    public function hookActionAdminCurrenciesControllerSaveAfter($params) {
        return parent::_clearCache($this->templateFile);
    }

     public function hookDisplayHeader()
    {
        $this->context->controller->addCSS($this->_path . 'css/localeswitcher.css', 'all');
        $this->context->controller->addJS($this->_path . 'js/localeswitcher.js', 'all');
    }

    public function hookDisplayNav1($params) { 
    
           if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['localeswitcher'])) {
                     $url_submit = $this->context->link->getLanguageLink($_GET['language']); 
                     $extraParams = array(
                    'SubmitCurrency' => 1,
                    'id_currency' => $_GET['currency']
                );

                $partialQueryString = http_build_query($extraParams);
                $separator = empty(parse_url($url_submit)['query']) ? '?' : '&';
                $url_submit .= $separator . $partialQueryString;
                $url_submit = str_replace("&localeswitcher=1","", $url_submit);
           
          
                Tools::redirect($url_submit);
           }

            $current_currency = null;
            $serializer = new ObjectPresenter;
            $currencies = array_map(
            function ($currency) use ($serializer, &$current_currency) {
                $currencyArray = $serializer->present($currency);

                // serializer doesn't see 'sign' because it is not a regular
                // ObjectModel field.
                $currencyArray['sign'] = $currency->sign;

                $url = $this->context->link->getLanguageLink($this->context->language->id);

                $extraParams = array(
                    'SubmitCurrency' => 1,
                    'id_currency' => $currency->id
                );

                $partialQueryString = http_build_query($extraParams);
                $separator = empty(parse_url($url)['query']) ? '?' : '&';

                $url .= $separator . $partialQueryString;

                $currencyArray['url'] = $url;

                if ($currency->id === $this->context->currency->id) {
                    $currencyArray['current'] = true;
                    $current_currency = $currencyArray;
                } else {
                    $currencyArray['current'] = false;
                }

                return $currencyArray;
            },
            Currency::getCurrencies(true, true)
        );


          if (Configuration::isCatalogMode() || !Currency::isMultiCurrencyActivated()) {
             $this->smarty->assign(array(
            'multicurrency' => 0
        ));
        } else {

        $this->smarty->assign(array(
            'currencies' => $currencies,
            'current_currency' => $current_currency
        ));

        
        }



        $languages = Language::getLanguages(true, $this->context->shop->id);

        foreach ($languages as &$lang) {
            $lang['name_simple'] =  preg_replace('/\s\(.*\)$/', '', $lang['name']);
        }
 

        if (1 < count($languages)) {
           $this->context->smarty->assign(
            array(  
                'languages' => $languages,
                'selected_currency' => $this->context->currency->id,
                'selected_language' => $this->context->language->id,
                'current_language' => array(
                'id_lang' => $this->context->language->id,
                'name' => $this->context->language->name,
                'name_simple' => preg_replace('/\s\(.*\)$/', '', $this->context->language->name)
            ) 
            )
        );

        } else {
            
                $this->smarty->assign(array(
            'multilanguage' => 0
        ));

        }
         
            return $this->fetch($this->templateFile);

    }




 
 

  





}