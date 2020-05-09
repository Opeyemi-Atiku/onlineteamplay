<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fixtures</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
</head>
<body>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>S/N</td>
                <td>Fixture</td>
            </tr>
        </thead>
        
        <tbody>
            
            @for($i = 0; $i < count($fixtures); $i++)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $fixtures[$i] }}</td>
                </tr>
            @endfor
        </tbody>
            
    </table>
</body>
</html>