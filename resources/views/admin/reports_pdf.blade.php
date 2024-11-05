<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Visitas</title>
</head>
<body>
    <h1>Reporte de Visitas - {{ $selectedMonth }}/{{ $selectedYear }}</h1>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Día</th>
                <th>Visitas</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reportDataFormatted['days'] as $index => $day)
                <tr>
                    <td>{{ $day }}</td>
                    <td>{{ $reportDataFormatted['views'][$index] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
