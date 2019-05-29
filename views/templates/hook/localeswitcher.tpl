 <div id="localeswitcher">
    <span class="localeswitcher localeswitcher_toggle" id="localeSwitcherButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="/upload/SC-Web-Icons_globe.png" alt="Change language">
    </span>
    
    <div class="localeswitcher_dropdown" aria-labelledby="localeSwitcherButton">
        <div class="localeswitcher_container">
            <form action="" method="get">
                <div clas="localswitcher_switcher_container">
                
                    <label for="language">{l s='language' mod='Modules.localeswitcher'}</label>
                    <select name="language" class="p-selector chosen-select" id="language"> 
                        {foreach from=$languages item=language}
                            <option value="{$language.id_lang}" {if $selected_language == $language.id_lang} selected {/if}>{$language.name_simple}</option>
                        {/foreach}       
                    </select>
                    <label for="currency">{l s='currency' mod='Modules.localeswitcher'}</label>
                    <select name="currency" class="p-selector chosen-select" id="currency">
                        {foreach from=$currencies item=currency}
                            <option value="{$currency.id}" {if $selected_currency == $currency.id} selected {/if}>{$currency.iso_code} {$currency.sign}</option>
                        {/foreach}
                    </select>
                    
                </div> 

                <div class="localeswitcher_action_container">
                   <input type="hidden" name="localeswitcher" value="1"/>
                    <button type="submit" class="localeswitcher_btn">UPDATE</button>
                </div>
            </form>
        </div>
    </div>
</div>
