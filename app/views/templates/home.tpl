{extends file="main.tpl"}
{block "content"}
    <div class="list no_border">
        <div class="half">
            {include file="currencies.tpl"}
        </div>
        {if $is_logged_in}
            <div class="half">
                <form action="convert" method="post">
                    <div class="input">
                        From (1)
                        <div class="half">
                            <input type="number" id="price1" name="price1" value="{$form->price1}" step="0.01" />
                        </div>
                        <div class="half">
                            <select name="currencycode1" id="currencycode1">
                                {foreach from=$currencies item=currency}
                                    {if $form->currencycode1 == $currency['currencycode']}
                                        <option value="{$currency['currencycode']}" selected>
                                            {$currency['currencycode']}
                                        </option>
                                    {else}
                                        <option value="{$currency['currencycode']}">
                                            {$currency['currencycode']}
                                        </option>
                                    {/if}
                                {/foreach}
                            </select>
                        </div>
                    </div>

                    <div class="input">
                        To (2)
                        <select name="currencycode2" id="currencycode2">
                            {foreach from=$currencies item=currency}
                                {if $form->currencycode2 == $currency['currencycode']}
                                    <option value="{$currency['currencycode']}" selected>
                                        {$currency['currencycode']}
                                    </option>
                                {else}
                                    <option value="{$currency['currencycode']}">
                                        {$currency['currencycode']}
                                    </option>
                                {/if}
                            {/foreach}
                        </select>

                    </div>

                    {if isset($converted_price)}
                        <b>Result:</b> {$converted_price}
                    {/if}

                    <div class="input">
                        <input type="submit" value="Convert" />
                    </div>
                </form>
            </div>
        {/if}
    </div>
{/block}