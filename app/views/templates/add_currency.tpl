{extends file="main.tpl"}
{block name="content"}
    <form action="add_currency" method="post">
        <div class="input">
            <label for="name">Currency Name</label>
            <input type="text" id="name" name="name" value="{$form->name}" />
        </div>

        <div class="input">
            <label for="code">Currency Code</label>
            <input type="text" id="code" name="code" value="{$form->code}" />
        </div>

        <div class="input">
            <label for="price">Price in dollars</label>
            <input type="number" id="price" name="price" value="{$form->price}" step="0.01" />
        </div>

        <div class=" input">
            <input type="submit" value="Add Currency" />
        </div>
    </form>
{/block}