<div class="arquivos">
  <div class="upload">
    <form action="upload_file.php" method="post">
      <div class="form-title">
        <h4> Upload de arquivos </h4>
      </div>
      <label for="selecionar-arquivo" id="input-selecionar-arquivo"> Selecione um arquivo </label>
      <input type="file" id="selecionar-arquivo" class="form-input" style="display:none">
      <div class="form-submit-control">
        <button type="submit" class="form-submit"> Enviar </button>
      </div>
    </form>
    <script>
      $("input#selecionar-arquivo").change(function(){
        var nomeArquivo = $("input#selecionar-arquivo").val().split("\\")[2];
        $("label#input-selecionar-arquivo").html(nomeArquivo);
      });

    </script>
  </div>
</div>

<?php
  echo "arquivos";
?>
