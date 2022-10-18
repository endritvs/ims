<div class="h-full ml-14 mt-10 mb-10 md:ml-64">
    <div class="w-full">
        <section class="px-4 sm:px-6 lg:px-4 py-12">
            <div class="shadow-lg rounded-lg overflow-hidden">
                <div class="py-3 px-5 bg-gray-50">Radar chart</div>
                <canvas class="p-10" id="chartRadar"></canvas>
            </div>
        </section>
    </div>
</div>

<!-- Required chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Chart radar -->
<script>
    const dataRadar = {
        labels: [
            "Eating",
            "Drinking",
            "Sleeping"
        ],
        datasets: [{
                label: "My First Dataset",
                data: [65, 59, 90],
                fill: true,
                backgroundColor: "rgba(133, 105, 241, 0.2)",
                borderColor: "rgb(133, 105, 241)",
                pointBackgroundColor: "rgb(133, 105, 241)",
                pointBorderColor: "#fff",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "rgb(133, 105, 241)",
            },
            {
                label: "My Second Dataset",
                data: [28, 48, 40],
                fill: true,
                backgroundColor: "rgba(54, 162, 235, 0.2)",
                borderColor: "rgb(54, 162, 235)",
                pointBackgroundColor: "rgb(54, 162, 235)",
                pointBorderColor: "#fff",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "rgb(54, 162, 235)",
            },
        ],
    };

    const configRadarChart = {
        type: "radar",
        data: dataRadar,
        options: {},
    };

    var chartBar = new Chart(
        document.getElementById("chartRadar"),
        configRadarChart
    );
</script>