{extends file="main.tpl"}
{block "content"}
    <form action="login" method="post">
        <div class="input">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="{$form->username}" />
        </div>

        <div class="input">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" value="{$form->password}" />
        </div>


        <div class="input">
            <input type="submit" value="Login" />
        </div>
    </form>
{/block}