<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OCR Laravel</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>
<body>

    <div class="container">
        <!-- Bagian Input -->
        <div class="input-section">
            <h3>Input</h3>
            <form action="{{ route('ocr.index') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image" accept="image/*" required>
                <button type="submit">Proses OCR</button>
            </form>

            @if(isset($imageUrl))
                <div style="margin-top:10px;">
                    <h4>Preview Gambar:</h4>
                    <img src="{{ $imageUrl }}" alt="" style="max-width:100%;border:1px solid #ccc;border-radius:5px;">
                </div>
            @endif
        </div>

        <!-- Bagian Output -->
        <div class="output-section" id="output-section">
            <h3>Output</h3>
            <div class="output-box">
                @if($text)
                    {{ $text }}
                @else
                    <em>Hasil OCR akan tampil di sini...</em>
                @endif
            </div>

            @if($text)
                <div style="margin-top:10px; font-size:14px; color:#333;">
                    <strong>Jumlah Karakter:</strong> {{ $charCount }} <br>
                    <strong>Jumlah Kata:</strong> {{ $wordCount }}
                </div>
            @endif
        </div>
    </div>

    

    @if($text)
    <script>
        // ✅ Auto-scroll ke output setelah submit
        document.getElementById('output-section').scrollIntoView({ behavior: 'smooth' });
    </script>
    @endif

</body>
</html>
