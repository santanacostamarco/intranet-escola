**TUTORIAL DE USO DO SISTEMA**

*1º passo: faça o download do projeto*
-a. via GIT 
Se estiver utilizando o S.O. das Janelas baixe o GIT no link a seguir:
Clique para Baixar
-1. No S.O. do Pinguim:
    # apt-get install git
(para distribuições derivadas de Debian)
    # yum install git
(para distribuições derivadas de RedHat)
-2. Na Maçã:
    # port install git-core +svn +doc +bash_completion +gitweb
(via MacPorts)
ou http://sourceforge.net/projects/git-osx-installer/

Crie uma pasta para receber o projeto, esta pasta pode ficar diretamente no servidor, por exemplo: se for usar o Xampp como servidor: crie a pasta em /opt/lampp/htdocs/nome-da-pasta (no Linux) ou c:\xampp\htdocs\nome-da-pasta (no Windows)
-3. Para baixar via SSL
    $ git clone git@bitbucket.org:adsgavs/intranet-escola.git
-4. Para baixar via HTTP
$ git clone https://santannacostamarco@bitbucket.org/adsgavs/intranet-escola.git

-b. ou baixe o projeto diretamente pelo link:
https://bitbucket.org/adsgavs/intranet-escola/get/1ad765346607.zip

-2º passo: adicione ao seu servidor PHP:
Recomendamos o software XAMPP para criar o ambiente do servidor de hospedagem com suporte PHP e MySQL ;)

Se estiver usando o Xampp deposite o diretório do projeto na pasta “htdocs” do XAMPP.

-3º passo: Set-up do Banco de dados

Com o Apache e MySQL funcionando, acesse “localhost/phpmyadmin”;

Crie um banco de dados chamado “intranet-escola”;

Em seguida use o importador do phpmyadmin clicando em “Importar”, ali haverá um campo para selecionar o arquivo;

Navegue até o diretório do projeto e selecione o arquivo “database.sql”; 

Clique em executar!



ATENÇÃO!
	É importante que o login do banco de dados seja o padrão de instalação do xampp (usuário “root” e senha “”), e que o nome do banco seja “intranet-escola”.
	Caso você deseja criar ou já possua um login e senha para o mysql altere o seguinte trecho no arquivo “functions.php”:

     05		$connection = mysqli_connect('localhost', '[seu_usuario]', '[sua_senha]', '[nome_do_banco]');

Após estes passos o projeto estará funcionando perfeitamente!
Acesse o projeto em “localhost/intranet-escola” e faça login no sistema com o usuário “admin” e senha “@admin@”


(o # significa que o comando deve ser executado com autenticação de super user (SUDO)
o $ indica que o comando pode ser executado sem autenticação de super user).




**Edit a file, create a new file, and clone from Bitbucket in under 2 minutes**

When you're done, you can delete the content in this README and update the file with details for others getting started with your repository.

*We recommend that you open this README in another tab as you perform the tasks below. You can [watch our video](https://youtu.be/0ocf7u76WSo) for a full demo of all the steps in this tutorial. Open the video in a new tab to avoid leaving Bitbucket.*

---

## Edit a file

You’ll start by editing this README file to learn how to edit a file in Bitbucket.

1. Click **Source** on the left side.
2. Click the README.md link from the list of files.
3. Click the **Edit** button.
4. Delete the following text: *Delete this line to make a change to the README from Bitbucket.*
5. After making your change, click **Commit** and then **Commit** again in the dialog. The commit page will open and you’ll see the change you just made.
6. Go back to the **Source** page.

---

## Create a file

Next, you’ll add a new file to this repository.

1. Click the **New file** button at the top of the **Source** page.
2. Give the file a filename of **contributors.txt**.
3. Enter your name in the empty file space.
4. Click **Commit** and then **Commit** again in the dialog.
5. Go back to the **Source** page.

Before you move on, go ahead and explore the repository. You've already seen the **Source** page, but check out the **Commits**, **Branches**, and **Settings** pages.

---

## Clone a repository

Use these steps to clone from SourceTree, our client for using the repository command-line free. Cloning allows you to work on your files locally. If you don't yet have SourceTree, [download and install first](https://www.sourcetreeapp.com/). If you prefer to clone from the command line, see [Clone a repository](https://confluence.atlassian.com/x/4whODQ).

1. You’ll see the clone button under the **Source** heading. Click that button.
2. Now click **Check out in SourceTree**. You may need to create a SourceTree account or log in.
3. When you see the **Clone New** dialog in SourceTree, update the destination path and name if you’d like to and then click **Clone**.
4. Open the directory you just created to see your repository’s files.

Now that you're more familiar with your Bitbucket repository, go ahead and add a new file locally. You can [push your change back to Bitbucket with SourceTree](https://confluence.atlassian.com/x/iqyBMg), or you can [add, commit,](https://confluence.atlassian.com/x/8QhODQ) and [push from the command line](https://confluence.atlassian.com/x/NQ0zDQ).
