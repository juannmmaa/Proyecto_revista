 <form action="#" method="POST" id="login-form">

                <fieldset>

                    <p>
                        <label for="login-username">Usuario</label>
                        <input type="text" name="login" value="<?php echo set_value("login") ?>" />
                    </p>

                    <p>
                        <label for="login-password">Contraseña</label>
                        <input type="password" name="pass" value="<?php echo set_value("pass") ?>" />
                    </p>

                    <input type="submit" value="Enviar" title="Enviar" />
                    <!--<a href="dashboard.html" class="button round blue image-right ic-right-arrow">Ingresar</a>-->

                </fieldset>

                <br/><div class="information-box round">Una vez ingresado su usuario y contraseña haga click en iniciar sesion.</div>

</form>