<div class="h-full ml-14 mt-10 mb-10 md:ml-64">
    <div class="w-full">
        <section class="px-4 sm:px-6 lg:px-4 py-12">
            <div class="shadow-lg rounded-lg overflow-hidden">
                <div class="py-3 px-5 bg-gray-50 " >Interviews status stats</div>
                <canvas class="p-20" id="chartBar"></canvas>
            </div>
        </section>
    </div>
</div>

<!-- Required chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Chart bar -->
<script>
    var Pending={{ App\Models\interview::where('status', '=', 'pending')->where('company_id',Auth::user()->company_id)->get()->count() }};
    var Declined={{ App\Models\interview::where('status', '=', 'declined')->where('company_id',Auth::user()->company_id)->get()->count() }};
    var Accepted={{ App\Models\interview::where('status', '=', 'accepted')->where('company_id',Auth::user()->company_id)->get()->count() }};
    const labelsBarChart = [
        "Pending",
        "Declined",
        "Accepted",
    ];
    const dataBarChart = {
        labels: labelsBarChart,
        datasets: [{
            label: "Interview status amount",
            backgroundColor: ["#FACC15", "#FF5C5C", "green"],
            barThickness: 100,
            data: [Pending, Declined, Accepted],
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