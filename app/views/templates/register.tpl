{extends file="main.tpl"}
{block name="content"}
    <form action="register" method="post">
        <div class="input">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" />
        </div>

        <div class="input">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" />
        </div>

        <div class="input">
            <label for="repeat_password">Repeat Password</label>
            <input type="password" id="repeat_password" name="repeat_password" />
        </div>

        <div class="input">
            <input type="submit" value="Register" />
        </div>
    </form>
{/block}