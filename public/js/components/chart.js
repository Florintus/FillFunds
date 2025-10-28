// /js/components/chart.js
export function initChart(endpoint, selector) {
    fetch(endpoint)
        .then(r => r.json())
        .then(data => {
            new Chart(document.querySelector(selector), {
                type: 'line',
                data: data,
                // ...options
            });
        });
}