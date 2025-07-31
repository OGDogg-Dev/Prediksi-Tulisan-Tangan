<!DOCTYPE html>
<html>
<head>
    <title>OCR Laravel</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <div class="container">
        <!-- Input Kecil -->
        <div class="input-section">
            <h3>Input</h3>
            <form action="{{ route('ocr.index') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image" required>
                <button type="submit">Proses OCR</button>
            </form>
        </div>

        <!-- Output Besar -->
        <div class="output-section">
            <h3>Output</h3>
            <div class="output-box">
                @if($text)
                    {{ $text }}
                @else
                    <em>Hasil Prediksi Tulisan Muncul disini</em>
                @endif
            </div>
        </div>
    </div>

    

</body>
</html>
