

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel Administrativo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    
</head>
<body>
<div class="d-flex">
    <!-- Sidebar -->
    <?php include ('../includes/siderbar.php'); ?>

    <!-- Conteúdo -->
       <!-- Conteúdo -->
       <div class="flex-grow-1 content" id="content">
        <!-- Conteúdo padrão de boas-vindas -->
        <div class="container mt-4">
            <div class="card shadow-sm rounded-3">
                <div class="card-body">
                    <h2 class="mb-3">🎉 Bem-vindo(a) ao Painel Administrativo</h2>
                    <p class="lead">Use o menu lateral à esquerda para acessar as funcionalidades do sistema.</p>
                    
                    <div class="alert alert-info mt-4">
                        👉 Clique em uma opção da <strong>sidebar</strong> (menu lateral) para começar.<br>
                        Exemplo: <strong>Dashboard, Usuários, Produtos...</strong>
                    </div>

                    <hr>

                    <p class="text-muted">Se precisar de ajuda, entre em contato com o suporte técnico ou consulte a documentação interna.</p>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<script>
    document.querySelectorAll('.nav-link[data-page]').forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const page = this.getAttribute('data-page');

            fetch(`${page}.php`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Página não encontrada");
                    }
                    return response.text();
                })
                .then(html => {
                    document.getElementById('content').innerHTML = html;

                    // Remove classe ativa anterior
                    document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));

                    // Adiciona classe ativa ao link clicado
                    this.classList.add('active');
                })
                .catch(error => {
                    document.getElementById('content').innerHTML = `<p class="text-danger">Erro: ${error.message}</p>`;
                });
        });
    });
</script>
</body>
</html>
