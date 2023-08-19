<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grade Sheet</title>
</head>
<body>
    
    <h1>Student Performance</h1>

    <form action="{{ url('generate-pdf') }}" method="POST">
        @csrf
        <label for="year">Select Year:</label>
        <select name="year" id="year">
            @foreach ($years as $year)
                <option value="{{ $year }}">{{ $year }}</option>
            @endforeach
        </select>
        
        <button type="submit">Generate PDF</button>
    </form>

    <div id="performanceGraph"></div>
    <div id="subjectStatistics"></div>
<div id="performanceGraph">
    <canvas id="performanceChart"></canvas>
</div>
<div id="subjectStatistics">
    <canvas id="subjectStatisticsChart"></canvas>
</div>
<div id="performanceComparison">
    <canvas id="performanceComparisonChart"></canvas>
</div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <script>
    // Performance Graph
    const ctx1 = document.getElementById('performanceChart').getContext('2d');
    const performanceChart = new Chart(ctx1, {
        type: 'line',
        data: {
            labels: @json($subjects),
            datasets: [{
                label: 'Student Score',
                data: @json($scores),
                borderColor: 'blue',
                fill: false,
            }]
        }
    });

    // Subject-wise Statistics Graph
    const ctx2 = document.getElementById('subjectStatisticsChart').getContext('2d');
    const subjectStatisticsChart = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: @json($subjects),
            datasets: [{
                label: 'Average Score',
                data: @json($averageScores),
                backgroundColor: 'green',
            }]
        }
    });

    // Performance Comparison Graph
    const ctx3 = document.getElementById('performanceComparisonChart').getContext('2d');
    const performanceComparisonChart = new Chart(ctx3, {
        type: 'bar',
        data: {
            labels: @json($subjects),
            datasets: [
                {
                    label: 'Student Score',
                    data: @json($scores),
                    backgroundColor: 'blue',
                },
                {
                    label: 'Average Score',
                    data: @json($averageScores),
                    backgroundColor: 'green',
                }
            ]
        }
    });
</script>

    </script>
class StudentPerformanceController extends Controller
{
    public function generatePDF(Request $request)
    {
        $year = $request->input('year');
        $data = \DB::table('student_performances')->where('year', $year)->get();

        // Load the view and pass the data
        $view = view('gradesheet', compact('data'))->render();

        // Setup Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Courier');
        $dompdf = new Dompdf($options);
        
        $dompdf->loadHtml($view);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        
        // Stream or download the PDF
        return $dompdf->stream('gradesheet.pdf');
    }
}
</body>
</html>

