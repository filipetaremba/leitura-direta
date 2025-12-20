<style>
    .book-detail {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        margin-bottom: 3rem;
    }

    .book-detail-grid {
        display: grid;
        grid-template-columns: 400px 1fr;
        gap: 3rem;
        padding: 3rem;
    }

    .book-cover-large {
        width: 100%;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }

    .book-details {
        display: flex;
        flex-direction: column;
    }

    .breadcrumb {
        color: #667eea;
        font-size: 0.9rem;
        margin-bottom: 1rem;
    }

    .breadcrumb a {
        color: #667eea;
        text-decoration: none;
    }

    .breadcrumb a:hover {
        text-decoration: underline;
    }

    .book-detail-title {
        font-size: 2.5rem;
        color: #2d3748;
        margin-bottom: 1rem;
        line-height: 1.2;
    }

    .book-detail-author {
        font-size: 1.3rem;
        color: #718096;
        margin-bottom: 1.5rem;
    }

    .book-meta {
        display: flex;
        gap: 2rem;
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 2px solid #e2e8f0;
    }

    .meta-item {
        display: flex;
        flex-direction: column;
    }

    .meta-label {
        font-size: 0.85rem;
        color: #a0aec0;
        text-transform: uppercase;
        font-weight: 600;
        margin-bottom: 0.3rem;
    }

    .meta-value {
        font-size: 1.2rem;
        color: #2d3748;
        font-weight: 600;
    }

    .book-detail-description {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #4a5568;
        margin-bottom: 2rem;
    }

    .price-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 2rem;
        border-radius: 10px;
        margin-bottom: 2rem;
    }

    .price-label {
        font-size: 1rem;
        opacity: 0.9;
        margin-bottom: 0.5rem;
    }

    .price-value {
        font-size: 3rem;
        font-weight: bold;
    }

    .btn-whatsapp {
        display: inline-flex;
        align-items: center;
        gap: 0.8rem;
        padding: 1.2rem 2.5rem;
        background: #25D366;
        color: white;
        text-decoration: none;
        border-radius: 10px;
        font-size: 1.3rem;
        font-weight: bold;
        transition: all 0.3s;
        box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);
    }

    .btn-whatsapp:hover {
        background: #20ba5a;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(37, 211, 102, 0.4);
    }

    .related-section {
        margin-top: 4rem;
    }

    .section-title {
        font-size: 1.8rem;
        color: #2d3748;
        margin-bottom: 2rem;
    }

    .related-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 2rem;
    }

    .related-card {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        transition: transform 0.3s;
    }

    .related-card:hover {
        transform: translateY(-5px);
    }

    .related-cover {
        width: 100%;
        height: 300px;
        object-fit: cover;
    }

    .related-info {
        padding: 1rem;
    }

    .related-title {
        font-weight: bold;
        color: #2d3748;
        margin-bottom: 0.3rem;
    }

    .related-author {
        font-size: 0.9rem;
        color: #718096;
    }

    @media (max-width: 968px) {
        .book-detail-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="book-detail">
    <div class="book-detail-grid">
        <!-- CAPA -->
        <div>
            <img src="<?= get_cover_url($book['cover_image']) ?>" 
                 alt="<?= esc($book['title']) ?>" 
                 class="book-cover-large">
        </div>

        <!-- DETALHES -->
        <div class="book-details">
            <div class="breadcrumb">
                <a href="<?= base_url('/') ?>">Início</a> / 
                <a href="<?= base_url('categoria/' . $book['category_slug']) ?>"><?= esc($book['category_name']) ?></a> / 
                <?= esc($book['title']) ?>
            </div>

            <h1 class="book-detail-title"><?= esc($book['title']) ?></h1>
            <p class="book-detail-author">✍️ por <strong><?= esc($book['author']) ?></strong></p>

            <div class="book-meta">
                <div class="meta-item">
                    <span class="meta-label">Categoria</span>
                    <span class="meta-value"><?= esc($book['category_name']) ?></span>
                </div>
                <div class="meta-item">
                    <span class="meta-label">Visualizações</span>
                    <span class="meta-value"><?= number_format($book['views'], 0, ',', '.') ?> 👁️</span>
                </div>
            </div>

            <div class="book-detail-description">
                <?= nl2br(esc($book['description'])) ?>
            </div>

            <div class="price-section">
                <div class="price-label">Preço do Livro Digital:</div>
                <div class="price-value"><?= format_price($book['price']) ?></div>
            </div>

            <a href="<?= esc($whatsappLink) ?>" 
               target="_blank" 
               class="btn-whatsapp">
                <span style="font-size: 2rem;">📱</span>
                Comprar via WhatsApp
            </a>
        </div>
    </div>
</div>

<!-- LIVROS RELACIONADOS -->
<?php if (!empty($relatedBooks)): ?>
<div class="related-section">
    <h2 class="section-title">📚 Livros Relacionados</h2>
    <div class="related-grid">
        <?php foreach ($relatedBooks as $related): ?>
            <a href="<?= base_url('livro/' . $related['slug']) ?>" class="related-card">
                <img src="<?= get_cover_url($related['cover_image']) ?>" 
                     alt="<?= esc($related['title']) ?>" 
                     class="related-cover">
                <div class="related-info">
                    <div class="related-title"><?= esc($related['title']) ?></div>
                    <div class="related-author"><?= esc($related['author']) ?></div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>