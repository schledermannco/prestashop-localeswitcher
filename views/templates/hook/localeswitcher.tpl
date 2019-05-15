   <div class="localeswitcher">
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
