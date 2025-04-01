//Category Cards
function showCategory(category) {
    const selector = document.getElementById('category-selector');
    const lists = document.querySelectorAll('.category-list');
    const tabs = document.querySelector('.nav-tabs');

    if (category === 'back') {
        selector.style.display = 'flex';
        lists.forEach(el => el.style.display = 'none');
        if (tabs) tabs.style.display = 'flex';
        return;
    }

    selector.style.display = 'none';
    if (tabs) tabs.style.display = 'none';
    lists.forEach(el => el.style.display = 'none');

    const categoryEl = document.getElementById('category-' + category);
    if (categoryEl) {
        categoryEl.style.display = 'flex';
    }
}

document.querySelectorAll(".category-search").forEach((input) => {
    input.addEventListener("input", function () {
        const category = this.dataset.category;
        const query = this.value.toLowerCase();
        const container = document.getElementById("category-" + category);

        container.querySelectorAll(".activity-card").forEach((card) => {
            const name = card.dataset.name;
            card.style.display = name.includes(query) ? "block" : "none";
        });
    });
});

//////////////////////////////////////////////////////////////////////////
// Checkboxes and Filter
//////////////////////////////////////////////////////////////////////////
document.querySelectorAll(".difficulty-toggle").forEach((checkbox) => {
    checkbox.addEventListener("change", () => {
        const category = checkbox.closest(".btn-group").dataset.category;
        filterAndSort(category);
    });
});

function filterAndSort(category) {
    const container = document.getElementById("category-" + category);
    const searchInput =
        container.querySelector(".category-search")?.value.toLowerCase() || "";
    const sortOrder = container.querySelector(".sort-alpha")?.value;

    const selectedDifficulties = Array.from(
        document.querySelectorAll(
            `#category-${category} .difficulty-toggle:checked`
        )
    ).map((cb) => cb.value);

    const cards = Array.from(container.querySelectorAll(".activity-card"));

    let filtered = cards.filter((card) => {
        const matchesName = card.dataset.name.includes(searchInput);
        const matchesDifficulty =
            selectedDifficulties.length === 0 ||
            selectedDifficulties.includes(card.dataset.difficulty);
        return matchesName && matchesDifficulty;
    });

    // Sort
    filtered.sort((a, b) => {
        const nameA = a.dataset.name;
        const nameB = b.dataset.name;
        if (sortOrder === "az") return nameA.localeCompare(nameB);
        if (sortOrder === "za") return nameB.localeCompare(nameA);
        return 0;
    });

    cards.forEach((card) => (card.style.display = "none"));
    filtered.forEach(
        (card) => container.appendChild(card) && (card.style.display = "block")
    );
}

function setupFiltering(tabPrefix) {
    const searchInput = document.querySelector(`.${tabPrefix}-search`);
    const sortInput = document.querySelector(`.${tabPrefix}-sort`);
    const diffCheckboxes = document.querySelectorAll(`.${tabPrefix}-diff`);
    const list = document.getElementById(`${tabPrefix}-list`);

    function filter() {
        const query = searchInput.value.toLowerCase();
        const sort = sortInput.value;
        const selectedDiffs = Array.from(diffCheckboxes).filter(cb => cb.checked).map(cb => cb.value);
        const cards = Array.from(list.querySelectorAll('.activity-card'));

        let filtered = cards.filter(card => {
            const matchesText = card.dataset.name.includes(query);
            const matchesDiff = selectedDiffs.length === 0 || selectedDiffs.includes(card.dataset.difficulty);
            return matchesText && matchesDiff;
        });

        // Sort
        filtered.sort((a, b) => {
            const nameA = a.dataset.name;
            const nameB = b.dataset.name;
            if (sort === 'az') return nameA.localeCompare(nameB);
            if (sort === 'za') return nameB.localeCompare(nameA);
            return 0;
        });

        // Hide all
        cards.forEach(card => card.style.display = 'none');
        // Show filtered
        filtered.forEach(card => {
            card.style.display = 'block';
            list.appendChild(card);
        });
    }

    [searchInput, sortInput].forEach(el => el.addEventListener('input', filter));
    diffCheckboxes.forEach(cb => cb.addEventListener('change', filter));
}

// Call for both tabs
setupFiltering('favourited');
setupFiltering('completed');

