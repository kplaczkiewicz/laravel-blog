import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Header scroll
window.addEventListener('scroll', checkScroll);

function checkScroll() {
    const header = document.querySelector('body > header');
    if (window.scrollY > 50) {
        header.classList.add('header-scroll');
    } else {
        header.classList.remove('header-scroll');
    }
}

checkScroll();

// Filters
const filters = document.querySelectorAll('.filter-item');

// Add href to all the filters
filters.forEach(filter => {
    const queryParams = new URLSearchParams(window.location.search);
    const queryParam = filter.getAttribute('data-query-param');
    const queryValue = filter.getAttribute('data-query-value');

    // Update or append the value
    if (queryParams.has(queryParam)) {
        // Set classes if active
        let currentValues = queryParams.get(queryParam);
        if (currentValues.includes(queryValue)) {
            // Change class of filter
            filter.classList.add('bg-primary');
            filter.classList.add('text-primary-content');

            // Show remove filter
            const removeFilter = filter.querySelector('.remove-filter');
            removeFilter.classList.remove('hidden');

            // If it's set remove the value from the string
            currentValues = currentValues.split(',').filter(e => e != queryValue).join(',');
            queryParams.set(queryParam, currentValues);
        } else {
            // Only add param if it's not active
            queryParams.set(queryParam, queryParams.get(queryParam) + ',' + queryValue);
        }
    } else {
        queryParams.append(queryParam, queryValue);
    }

    filter.setAttribute('href', '/?' + queryParams.toString());
});

// Show image preview
const fileUpload = document.querySelector('.file-show-preview');
if (fileUpload) {
    fileUpload.addEventListener('change', (event) => {
        if (event.target.files.length > 0) {
            const src = URL.createObjectURL(event.target.files[0]);
            document.getElementById("post-current-image").src = src;
        }
    });
}