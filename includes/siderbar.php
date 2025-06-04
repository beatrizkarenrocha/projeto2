
<div class="sidebar bg-dark text-white p-3" style="min-height: 100vh; width: 220px; font-size: 14px;">
    <h5 class="text-light">Painel</h5>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="#" class="nav-link text-light" data-page="dashboard">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-light" data-page="usuarios/usuario-index">
                <i class="fas fa-users me-2"></i> Usuários
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-light" data-page="fornecedores/fornecedor-index">
                <i class="fas fa-truck me-2"></i> Fornecedores
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-light" data-page="produtos/produto-index">
                <i class="fas fa-box-open me-2"></i> Produtos
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-light" data-page="pedidos/pedido-index">
                <i class="fas fa-shopping-cart me-2"></i> Pedidos
            </a>
        </li>
        <li class="nav-item mt-auto">
    <a class="nav-link text-danger" href="../includes/logout.php">
        <i class="fas fa-sign-out-alt me-2"></i>Sair
    </a>
</li>

    </ul>
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