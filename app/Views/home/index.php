<style>
    .page-title {
        font-size: 2rem;
        margin-bottom: 2rem;
        color: #2d3748;
    }

    .books-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }

    .book-card {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        display: flex;
        flex-direction: column;
    }

    .book-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0,0,0,0.2);
    }

    .book-cover {
        width: 100%;
        height: 350px;
        object-fit: cover;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .book-info {
        padding: 1.5rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .book-category {
        font-size: 0.85rem;
        color: #667eea;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 0.5rem;
    }

    .book-title {
        font-size: 1.3rem;
        font-weight: bold;
        color: #2d3748;
        margin-bottom: 0.5rem;
        line-height: 1.3;
    }

    .book-author {
        color: #718096;
        margin-bottom: 0.8rem;
        font-size: 0.95rem;
    }

    .book-description {
        color: #4a5568;
        margin-bottom: 1rem;
        flex: 1;
        font-size: 0.9rem;
        line-height: 1.5;
    }

    .book-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: auto;
        padding-top: 1rem;
        border-top: 1px solid #e2e8f0;
    }

    .book-price {
        font-size: 1.5rem;
        font-weight: bold;
        color: #667eea;
    }

    .btn {
        padding: 0.7rem 1.5rem;
        border: none;
        border-radius: 5px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s;
    }

    .btn-primary {
        background: #667eea;
        color: white;
    }

    .btn-primary:hover {
        background: #5568d3;
    }

    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        background: white;
        border-radius: 10px;
    }

    .empty-state h2 {
        color: #718096;
        margin-bottom: 1rem;
    }
</style>

<h1 class="page-title">📚 Todos os Livros</h1>

<?php if (!empty($books)): ?>
    <div class="books-grid">
        <?php foreach ($books as $book): ?>
            <div class="book-card">
                <img src="<?= get_cover_url($book['cover_image']) ?>" 
                     alt="<?= esc($book['title']) ?>" 
                     class="book-cover">
                
                <div class="book-info">
                    <div class="book-category"><?= esc($book['category_name']) ?></div>
                    <h2 class="book-title"><?= esc($book['title']) ?></h2>
                    <p class="book-author">✍️ <?= esc($book['author']) ?></p>
                    <p class="book-description"><?= truncate_text(esc($book['description']), 120) ?></p>
                    
                    <div class="book-footer">
                        <span class="book-price"><?= format_price($book['price']) ?></span>
                        <a href="<?= base_url('livro/' . $book['slug']) ?>" class="btn btn-primary">
                            Ver Detalhes
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="empty-state">
        <h2>📭 Nenhum livro disponível no momento</h2>
        <p>Em breve teremos novos títulos!</p>
    </div>
<?php endif; ?>