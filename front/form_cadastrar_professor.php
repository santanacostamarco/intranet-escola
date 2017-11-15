<div class="form">
  <form action="cadastrar.php">

    <div class="form-title">
      <h4> Dados Pessoais </h4>
    </div>

    <table>
      <input type="hidden" name="user-type" value="professor"/>
      <tr>
        <td> <label for="first-name" class="form-lable"> Nome <abbr class="required"> * </abbr></label> </td>
        <td> <label for="last-name" class="form-lable"> Sobrenome <abbr class="required"> * </abbr></label> </td>
      </tr>
      <tr>
        <td><input type="text" name="user-first-name" class="form-input" required /></td>
        <td><input type="text" name="user-last-name" class="form-input" required /></td>
      </tr>
      <tr>
        <td> <label for="birthdate" class="form-lable"> Data de Nascimento <abbr class="required"> * </abbr></label> </td>
        <td> <label for="sexo" class="form-lable"> Sexo <abbr class="required"> * </abbr></label> </td>
      </tr>
      <tr>
        <td><input type="date" name="user-birthdate" class="form-input" required /></td>
        <td>
          <input type="radio" name="user-sexo" value="feminino" class="form-radio-input"> Feminino </input>
          <input type="radio" name="user-sexo" value="masculino" class="form-radio-input"> Masculino </input>
          <input type="radio" name="user-sexo" value="outro" class="form-radio-input"> Outro </input>
        </td>
      </tr>
    </table>

    <div class="form-title">
      <h4> Dados de Logon </h4>
    </div>

    <table>
      <tr>
        <td> <label for="username" class="form-lable"> Nome de usuário <abbr class="required"> * </abbr></label> </td>
        <td> <label for="email" class="form-lable"> E-mail <abbr class="required"> * </abbr></label> </td>
      </tr>
      <tr>
        <td><input type="text" name="user-username" class="form-input" required /></td>
        <td><input type="email" name="user-email" class="form-input" required /></td>
      </tr>
    </table>
    <div class="system-info warning"> <p> A senha será gerada automáticamente e enviada
      para o e-mail cadastrado, solicite que o usuário troque no primeiro acesso.</p>
    </div>

    <div class="form-title">
      <h4> Dados de Contrato </h4>
    </div>

    <table>

    </table>

    <div class="form-submit-control">
      <input type="submit" value="CADASTRAR" class="form-submit" />
    </div>

  </form>
</div>
