<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body class="flex flex-col justify-center items-center w-full">
    <div class="w-1/2 m-2">
        {{ $cases->links() }}
    </div>
    <div class="w-10/12 m-2 overflow-auto">
        <table class="w-full m-2">
            <tr>
                <th class="p-2 border">date</th>
                <th class="p-2 border">cases_new</th>
                <th class="p-2 border">deaths_new</th>
                <th class="p-2 border">cluster_cases</th>
                <th class="p-2 border">cluster_tests</th>
                <th class="p-2 border">cluster_deaths</th>
                <th class="p-2 border">cluster_recovered</th>
                <th class="p-2 border">admitted_total</th>
                <th class="p-2 border">discharged_total</th>
                <th class="p-2 border">icu_covid</th>
                <th class="p-2 border">vent_covid</th>
            </tr>
            @foreach ($cases as $case)
                <tr>
                    <td class="p-2 border">{{ $case->date }}</td>
                    <td class="p-2 border">{{ $case->cases_new ?: '0' }}</td>
                    <td class="p-2 border">{{ $case->deaths_new ?: '0' }}</td>
                    <td class="p-2 border">{{ $case->cluster_cases ?: '0' }}</td>
                    <td class="p-2 border">{{ $case->cluster_tests ?: '0' }}</td>
                    <td class="p-2 border">{{ $case->cluster_deaths ?: '0' }}</td>
                    <td class="p-2 border">{{ $case->cluster_recovered ?: '0' }}</td>
                    <td class="p-2 border">{{ $case->admitted_total ?: '0' }}</td>
                    <td class="p-2 border">{{ $case->discharged_total ?: '0' }}</td>
                    <td class="p-2 border">{{ $case->icu_covid ?: '0' }}</td>
                    <td class="p-2 border">{{ $case->vent_covid ?: '0' }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>