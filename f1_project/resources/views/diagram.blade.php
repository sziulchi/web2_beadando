<x-mainpage>
    <section id="main" class="container">
        <header>
            <h2>Diagramok</h2>
            <p>Statisztikák az F1 adatbázis alapján</p>
        </header>

        <section class="box">
            <h3>Top 10 pilóta futamgyőzelmek szerint</h3>
            <div style="position: relative; height: 400px;">
                <canvas id="winnersChart"></canvas>
            </div>
        </section>

        <div class="row">
            <div class="col-6 col-12-narrower">
                <section class="box">
                    <h3>Futamgyőzelmek nemzetiség szerint</h3>
                    <div style="position: relative; height: 350px;">
                        <canvas id="nationalityChart"></canvas>
                    </div>
                </section>
            </div>
            <div class="col-6 col-12-narrower">
                <section class="box">
                    <h3>Nagydíjak száma évtizedenként</h3>
                    <div style="position: relative; height: 350px;">
                        <canvas id="decadeChart"></canvas>
                    </div>
                </section>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <script>
        const f1Red = '#e10600';

        new Chart(document.getElementById('winnersChart'), {
            type: 'bar',
            data: {
                labels: @json($winnerLabels),
                datasets: [{
                    label: 'Futamgyőzelmek',
                    data: @json($winnerData),
                    backgroundColor: f1Red,
                }]
            },
            options: {
                indexAxis: 'y',
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: { x: { beginAtZero: true, ticks: { precision: 0 } } }
            }
        });

        new Chart(document.getElementById('nationalityChart'), {
            type: 'doughnut',
            data: {
                labels: @json($nationalityLabels),
                datasets: [{
                    data: @json($nationalityData),
                    backgroundColor: ['#e10600', '#1e41ff', '#00a19c', '#ff8700', '#6c3483',
                                      '#2e7d32', '#fdd835', '#795548', '#607d8b', '#ec407a'],
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: { legend: { position: 'bottom' } }
            }
        });

        new Chart(document.getElementById('decadeChart'), {
            type: 'bar',
            data: {
                labels: @json($decadeLabels),
                datasets: [{
                    label: 'Nagydíjak száma',
                    data: @json($decadeData),
                    backgroundColor: '#1e41ff',
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }
            }
        });
    </script>
</x-mainpage>