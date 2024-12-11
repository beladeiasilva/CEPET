<?php
                    include("C:/xampp/htdocs/cepet/usuario/config/conexao.php");
                    $sql=mysqli_query($mysqli,"SELECT * FROM veterinarios WHERE ID_VETERINARIO = 1");
                    $dados= mysqli_fetch_assoc($sql);

                    
                    ?> 