/**
 * Blog Template - Client-side search
 * Filters archives list as user types
 * Hides tag cloud when searching
 */

(function() {
    'use strict';

    const searchInput = document.getElementById('search');
    const archivesList = document.getElementById('archives-list');
    const tagsCloud = document.querySelector('.tags-cloud');

    if (!searchInput || !archivesList) return;

    const items = archivesList.querySelectorAll('li');

    searchInput.addEventListener('input', function() {
        const query = this.value.toLowerCase().trim();

        // Hide tag cloud when searching
        if (tagsCloud) {
            tagsCloud.style.display = query ? 'none' : '';
        }

        items.forEach(function(item) {
            const title = item.getAttribute('data-title') || '';

            if (query === '' || title.includes(query)) {
                item.classList.remove('hidden');
            } else {
                item.classList.add('hidden');
            }
        });
    });

    // Focus search on page load
    searchInput.focus();
})();
