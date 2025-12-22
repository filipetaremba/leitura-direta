// search_suggestions.js

document.addEventListener('DOMContentLoaded', function() {
    const searchInputs = document.querySelectorAll('input[name="q"]');
    searchInputs.forEach(input => {
        let timeout = null;
        let suggestionBox = null;

        // Cria o box de sugestões
        function createSuggestionBox() {
            if (!suggestionBox) {
                suggestionBox = document.createElement('div');
                suggestionBox.className = 'absolute left-0 right-0 bg-white border border-gray-300 z-50 rounded shadow-lg mt-1 max-h-60 overflow-y-auto';
                suggestionBox.style.display = 'none';
                input.parentNode.appendChild(suggestionBox);
            }
        }

        // Mostra sugestões
        function showSuggestions(suggestions) {
            if (!suggestionBox) createSuggestionBox();
            suggestionBox.innerHTML = '';
            if (suggestions.length === 0) {
                suggestionBox.style.display = 'none';
                return;
            }
            suggestions.forEach(item => {
                const option = document.createElement('div');
                option.className = 'px-4 py-2 cursor-pointer hover:bg-blue-100';
                option.textContent = item.title + (item.author ? ' - ' + item.author : '');
                option.onclick = () => {
                    window.location.href = '/livro/' + item.id;
                };
                suggestionBox.appendChild(option);
            });
            suggestionBox.style.display = 'block';
        }

        // Esconde sugestões
        function hideSuggestions() {
            if (suggestionBox) suggestionBox.style.display = 'none';
        }

        input.addEventListener('input', function() {
            clearTimeout(timeout);
            const value = input.value.trim();
            if (value.length < 2) {
                hideSuggestions();
                return;
            }
            timeout = setTimeout(() => {
                fetch(`/api/search-suggestions?q=${encodeURIComponent(value)}`)
                    .then(res => res.json())
                    .then(data => showSuggestions(data))
                    .catch(() => hideSuggestions());
            }, 250);
        });

        input.addEventListener('blur', function() {
            setTimeout(hideSuggestions, 200);
        });

        createSuggestionBox();
    });
});
