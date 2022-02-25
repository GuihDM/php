<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de arquivos</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="mt-5 text-center">Upload de arquivos</h1>
        <Form method="post" enctype="multipart/form-data" class="m-3">
            <div class="input-group">
            <input type="file" class="form-control" id="arquivo" name="arquivo[]" multiple aria-describedby="arquivo" aria-label="Upload"
            required>
            <button class="btn btn-primary" type="submit" id="enviar" name="enviar">Enviar</button>
            </div>
        </Form>
    </div>

    <?php
        function reArrayFiles(&$file_post) {

            $file_ary = array();
            $file_count = count($file_post['name']);
            $file_keys = array_keys($file_post);
        
            for ($i=0; $i<$file_count; $i++) {
                foreach ($file_keys as $key) {
                    $file_ary[$i][$key] = $file_post[$key][$i];
                }
            }
            return $file_ary;
        }
            

        if (isset($_POST['enviar'])){
           $arquivoArray = reArrayFiles($_FILES['arquivo']);

        foreach ($arquivoArray as $arquivo){
            //VALIDAÇÕES
            $tamanhoMax = 2097152; //2MB
            $permitido = ["jpg", "png", "jpeg", "mp4"];
            $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
            
            //VERIFICAR SE TEM TAMANHO PERMITIDO
                if($arquivo['size'] >= $tamanhoMax){
                    echo '<div class="alert alert-danger" role="alert">
                    Arquivo muito grande, tente novamente com um arquivo menor que 2mb!
                  </div><br>';
                }
                else{
                    //VERIFICAÇÃO DE EXTENSÃO
                    if(in_array($extensao, $permitido)){
                        //echo "Permitido";
                        $pasta = "imagens/";
                        if(!is_dir($pasta)){
                            mkdir($pasta,0755);
                        }

                        $tmp = $arquivo['tmp_name'];
                        $novoNome = uniqid().".$extensao";

                        if(move_uploaded_file($tmp,$pasta.$novoNome)){
                            echo "Upload realizado com Sucesso!<br>";

                        }else{
                            echo '<div class="alert alert-danger" role="alert">
                            Erro: Não foi possível fazer upload
                          </div><br>';
                        }
                    }else{
                        //echo "Não permitido";
                        echo '<div class="alert alert-danger" role="alert">
                            Erro: Extensão ('. $extensao.') não permitida!
                          </div><br>';
                    }
                }
        }



        }
    

    ?>


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>