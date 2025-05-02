# Code Citations

## License: desconocido
https://github.com/Naim-Reza/php-user_management/tree/d686585d2cadf0bf7e5a335193887ae78e6d3cca/class/user_controller.php

```
";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows
```


## License: desconocido
https://github.com/pandavshyam/Career-Onset/tree/f3fe0140e20b7a00222fee79d242a4789c89ea03/signup.php

```
= $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
```


## License: desconocido
https://github.com/madolell/MadoFit/tree/7225a9c8af3deb730f2cbfbeb12b3b78700f4038/Codigo/usuario/requisitosLogin.php

```
* FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
```


## License: desconocido
https://github.com/alejandrozapata0304/pagina-web-el-chilalo/tree/dbda06fdac5b44311f2f14f51c763698f1fc010f/ImprentaElChilalo.Ch/src/inicio_sesion.php

```
usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if (
```


## License: desconocido
https://github.com/Mamba1099/PHP_signup-/tree/09517848aa945c4548b3181dece64484fca78c2b/process_signup.php

```
?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->
```

