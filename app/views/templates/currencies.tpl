{if $show_actions}
    <div>
        <a href="add_currency_view">Add Currency</a>
    </div>
{/if}
{foreach from=$currencies item=currency}
    <div class="list">
        <div>{$currency['currencyname']} [ {$currency['currencycode']} ]</div>
        <div>$ {$currency['price_in_dollars']}</div>
        {if $show_actions}
            <div>
                <a href="">Edit</a>
                <a href="">Delete</a>
            </div>
        {/if}
    </div>
{/foreach}