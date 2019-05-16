<div class="language-selector-wrapper">
    <span class="hidden-sm-down hidden-md-up">{l s='Language:' d='Shop.Theme'}</span>
    <div class="language-selector dropdown js-dropdown">
        <span class="expand-more" data-toggle="dropdown">
            <img src="/upload/SC-Web-Icons_globe.png" alt="Change language">
        </span>

        <div class="localeswitcher dropdown-menu">
                <div class="localeswitcher_switcher_container">
                    <label for="language">{l s='language' mod='Modules.localeswitcher'}</label>
                    <select name="" class="p-selector chosen-select" id="language">
                        
                        {foreach from=$languages item=language}
                            <option value="{$language.id_lang}">{$language.name_simple}</option>
                            
                        {/foreach}
                        
                    </select>
                    <label for="currency">{l s='currency' mod='Modules.localeswitcher'}</label>
                    <select name="" class="p-selector chosen-select" id="currency">
                        {foreach from=$currencies item=currency}
                        <option value="{$currency.id}">{$currency.iso_code} {$currency.sign}</option>
                        {/foreach}
                    </select>           
                </div>
                <div class="localeswitcher_action_container">
                    <a class="localeswitcher_btn">UPDATE</a>
                </div>
            </div>
        </div>
    </div>
</div>
