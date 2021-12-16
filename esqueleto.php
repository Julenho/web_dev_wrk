 <h3 class="featurette-heading">Comentários</h3>
                        <p></p>

                        <form name="form" method="post" action="#">
                                <div class="form-group">
                                        <label for="exampleFormControlInput1" placeholder="Digite seu nome">Nome:</label>
                                        <input type="text" class="form-control" name=nome>
                                </div>
                                <p></p>
                                <div class="form-group">
                                        <label for="exampleFormControlInput1" placeholder="Seu email">Endereço de email</label>
                                        <input type="text" class="form-control" name=email>
                                </div>
                                <p></p>
                                <div class="form-group">
                                        <label for="exampleFormControlTextarea1" placeholder="Digite seu comentário">Comentário</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name=comentario></textarea>
                                </div>
                                <p></p>
                                <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                        <hr>

                        <?php
                                $link = mysqli_connect("localhost","julio","4567","comentarios") or die("Error " . mysqli_error($link));

                                $nome=$_POST['nome'];
                                $email=$_POST['email'];
                                $comentario=$_POST['comentario'];
                                $pagina='dango';
                                if (!$link) {
                                        die("Falha na conexão: " . mysqli_connect_error());
                                }

                                $sql="INSERT INTO tbcomentarios(nome,email,pagina,comentario) values('$nome','$email','$pagina','$comentario')";


                                if(strlen($_POST['nome'])) #insere somente se no form foi escrito o nome
                                {
                                        if (mysqli_query($link, $sql)){
                                                echo "Comentário postado com sucesso!" . "<br><hr>";
                                        } else {
                                                echo "Erro: ". $sql . "<br>" . mysqli_error($link);
                                        }
                                }

                                $sqlist = "SELECT * FROM tbcomentarios WHERE pagina='dango' ORDER BY id desc";

                                $list=mysqli_query($link, $sqlist);


                                if ($list->num_rows > 0) {
                                        while($row = $list->fetch_assoc()) {
                                        echo "Usuário: " . $row["nome"] . "<br>" . "Email: " . $row["email"]. "<br>" . "Comentário: "  . $row["comentario"]. "<br><hr>";
                                        }
                                } else {
                                         echo "Seja o primeiro a comentar!";
                                }

                                mysqli_close($link);
                        ?>


