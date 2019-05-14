

<div class="language-selector">
  <span>{$current_language.name_simple}</span>
  <ul>
    {foreach from=$languages item=language}
      <li {if $language.id_lang == $current_language.id_lang} class="current" {/if}>
        <a href="{$link->getLanguageLink($language.id_lang)}">{$language.name_simple}</a>
      </li>
    {/foreach}
  </ul>
</div>

<div class="currency-selector">
  <span>{$current_currency.iso_code} {$current_currency.sign}</span>
  <ul>
    {foreach from=$currencies item=currency}
      <li {if $currency.current} class="current" {/if}>
        <a rel="nofollow" href="{$currency.url}">{$currency.iso_code} {$currency.sign}</a>
      </li>
    {/foreach}
  </ul>
</div>


// How to handle desktop and mobile?
