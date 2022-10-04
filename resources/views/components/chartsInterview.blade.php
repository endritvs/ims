<div class="h-full ml-14 mt-10 mb-10 md:ml-64">
    <div class="w-full">
        <section class="px-4 sm:px-6 lg:px-4 py-12">
            <div class="shadow-lg rounded-lg overflow-hidden">
                <div class="py-3 px-5 bg-gray-50">Chart Candidates</div>
                <canvas class="p-20" id="chartBar"></canvas>
            </div>
        </section>
    </div>
</div>

<!-- Required chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Chart bar -->
<script>
    const labelsBarChart = [
        "January",
        "February",
        "March",
        "April",

    ];
    const dataBarChart = {
        labels: labelsBarChart,
        datasets: [{
            label: "Chart Review",
            backgroundColor: "hsl(224, 54%, 30%)",
            borderColor: "hsl(252, 82.9%, 67.8%)",
            data: [0, 1, 5, 3, 10],
        }, ],
    };

    const configBarChart = {
        type: "bar",
        data: dataBarChart,
        options: {},
    };

    var chartBar = new Chart(
        document.getElementById("chartBar"),
        configBarChart
    );
</script>