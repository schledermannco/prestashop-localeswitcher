   <div class="localeswitcher">
        <div class="localeswitcher_switcher_container">
            <label for="language">{l s='language' mod='Modules.localeswitcher'}</label>
            <select name="" class="p-selector chosen-select" id="language">
                <option value="DA">{l s='danish' mod='Modules.localeswitcher'}</option>   // Do they come from elsewere
                <option value="EN">{l s='english' mod='Modules.localeswitcher'}</option>  //
            </select>
            <label for="currency">{l s='currency' mod='Modules.localeswitcher'}</label>
            <select name="" class="p-selector chosen-select" id="currency">
                <option value="DKK"></option>
                <option value="EUR">EURO</option>
                <option value="SEK">SEK</option>
            </select>           
        </div>
        <div class="localeswitcher_action_container">
            <a class="localeswitcher_btn">UPDATE</a>
        </div>
    </div>

    <style>
        *, ::after, ::before {
            box-sizing: inherit;
        }

        .localeswitcher {
            border: 1px solid #85744e;
            background: #f1f1f3;
            width: 340px;
            color: #000;
            position: absolute;
        }

        .localswitcher_switcher_container {
            padding: 25px 17px 4px;
        }

        .localeswitcher_action_container {
            padding: 8px 17px 18px 17px;
        }

        .localeswitcher_btn {
            color: #fff;
            padding: 8px 10px;
            background: #86cddb;
            border: 1px solid #86cddb;
            text-align: center;
            text-transform: uppercase;
            font-size: 14px;
            display: block;

        }

        .localeswitcher-btn:hover {
            color: #000;
        }
    </style>