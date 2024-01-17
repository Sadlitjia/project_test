<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/extensions/bootstrap_dist/css/bootstrap.min.css') }}">
    <title>Answers Export</title>
    <style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
    </style>
</head>
<body>
    <h3 class="text-center">Data - {{ $opd->nama }}</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Pengguna</th>
                <th>Pertanyaan</th>
                <th>Jawaban</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($answers as $answer)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $answer->pengguna->nama }}</td>
                    <td>{{ $answer->item_question->pertanyaan }}</td>
                    <td>{{ $answer->jawaban }}</td>
                    <td>{{ \Carbon\Carbon::parse($answer->tanggal)->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="{{ asset('assets/extensions/bootstrap_dist/js/bootstrap.min.js') }}"></script>
</body>
</html>
