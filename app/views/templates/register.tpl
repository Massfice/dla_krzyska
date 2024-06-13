{extends file="main.tpl"}
{block name="content"}
    <form action="register" method="post">
        <div class="input">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="{$form->username}" />
        </div>

        <div class="input">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" value="{$form->password}" />
        </div>

        <div class="input">
            <label for="repeat_password">Repeat Password</label>
            <input type="password" id="repeat_password" name="repeat_password" value="{$form->repeat_password}" />
        </div>

        <div class="input">
            <input type="submit" value="Register" />
        </div>
    </form>
{/block}