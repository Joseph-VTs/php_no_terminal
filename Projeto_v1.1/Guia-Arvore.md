obs: as aspas duplas "conteudo" será para dizer o que for feito

### Projeto_v1.1/
- Empresa/
    - Sistema/
        - Arquivos-Json/
            - FuncionariosUsuarios.json
        - CRUD/
            - Create.php -> aqui serão cadastrados os funcionários que teram acesso e definido o tipo de acesso (adm, create, read), ainda não foram feitas as validações de entrada, está no básico por hora{
                        campos do cadastro(Nome, Sobrenome, Idade, Senha -> obs ainda falta o tipo)
                        após cadastro salva os dados em um arquivo .json -> /../Funcoes/ArquivoJson.php
                    }
            - Read.php -> pega e lista todos os funcionários/usuários do /../Funcoes/ArquivoJson.php com (nome, sobrenome, idade -> obs: com excessão da senha, que é confidencial do usuário, e ainda falta transformar ela em rash).
        - Funcoes/
            - Auxiliares.php -> temos uma função(
                    formatarTextoComAcentos(){
                        O Problema
                        - %-Ns do printf conta os bytes, e não os caracteres visuais.
                        - O nome na tela (J-o-ã-o), tem 4 letras.
                        - Mas ocupa 5 bytes no PHP por causa do ã.

                        A Solução = 
                        - Para resolver isso de forma definitiva.
                        - Iremos criar uma pequena função auxiliar,
                        que iremos calcular o tamanho visual "real" com (mb_strwidth), ele irá adicionar os espaços corretos manualmente.
                        - O mb_strimwidth evita que nomes gigantes quebrem a estrutura da tabela
                    }
                )
            - Uteis.php (a fazer)
            - ArquivoJson.php
        - modulos/
            - Estoque.php -> afazer
            - UsuariosFuncionarios.php "
                Menu(
                    Cadastrar Novo Funcionário -> /../CRUD/Create.php obs: aqui serão cadastrados os funcionários que teram acesso e definido o tipo de acesso (adm, create, read), ainda não foram feitas as validações de entrada, está no básico por hora{
                        campos do cadastro(Nome, Sobrenome, Idade, Senha -> obs ainda falta o tipo)
                        após cadastro salva os dados em um arquivo .json -> /../Funcoes/ArquivoJson.php
                    }
                    Ver Funcionários Cadastrados -> /../CRUD/Read.php -> pega e lista todos os funcionários/usuários do /../Funcoes/ArquivoJson.php com (nome, sobrenome, idade -> obs: com excessão da senha, que é confidencial do usuário, e ainda falta transformar ela em rash
                    )

                    próximas etapas( 
                        - obs: talvez fique um menu abaixo da tabela /../CRUD/Read.php com as determinadas opções.
                        - ou faço de outra forma, ainda estou pensando nos processos
                        - Opção de Editar
                        - Opção ver Detalhes
                        - Opção de Deletar
                    )
                )
            "
        - Sistema.php "
            Entrada do Usuário - Identificação (adm, create = deafault - read = apenas leitura de dados usado para sistema)
        "
        - userAdm.php " Usuário que terá acesso total ao CRUD, ou seja, usuário confiavél
            Menu(
                Estoque -> afazer
                Funcionários = redirecionar -> /modulos/UsuariosFuncionarios.php
                Clientes -> afazer
                Manual -> afazer
            )
        "
        - userCreate.php -> afazer
        - userRead.php -> afazer
    - index.php "
        Menu(
            Entrar no Sistema -> feito
            Manual de Intruções -> afazer
        )
    "
- Guia-Arvore.md "esse arquivo aqui"

da mesma maneira que foi feito no post anterior que fazer um novo post falando um pouco sobre o que foi feito hoje