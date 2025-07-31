<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OCR - Baca Teks dari Gambar</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>READ TEXT FROM IMAGES</h1>
        <p>Upload gambar atau ambil foto untuk mengekstrak teks menggunakan OCR</p>

        <form action="{{ route('ocr.index') }}" method="POST" enctype="multipart/form-data" id="ocrForm">
            @csrf
            <div class="upload-area" onclick="document.getElementById('imageInput').click()">
                <input type="file" name="image" id="imageInput" accept="image/*" hidden required>
                <div class="upload-icon">📄</div>
                <p><strong>Pilih File atau Drag & Drop</strong></p>
                <p>Mendukung format JPG, PNG, PDF. Maks. ukuran 10MB</p>
            </div>

            <div class="upload-actions">
                <button type="button" onclick="ambilFoto()">📷 Ambil Foto</button>
                <button type="submit" class="submit-btn">UPLOAD & SCAN</button>
            </div>

            @if($imageUrl)
            <div class="preview-area">
                <h3>Preview Gambar</h3>
                <img src="{{ $imageUrl }}" alt="Preview Gambar">
            </div>
            @endif

            <div class="output-area">
                <h3>📄 Hasil OCR</h3>
                <div class="output-box">
                    @if($text)
                        <pre>{{ $text }}</pre>
                    @else
                        <em>Teks yang terdeteksi dari gambar akan muncul di sini...</em>
                    @endif
                </div>

                @if($text)
                <div class="output-meta">
                    <p><strong>Jumlah Karakter:</strong> {{ $charCount }}</p>
                    <p><strong>Jumlah Kata:</strong> {{ $wordCount }}</p>
                    <button type="button" onclick="copyText()">📋 Salin Teks</button>
                    <a href="{{ $imageUrl }}" download class="download-btn">⬇️ Unduh</a>
                </div>
                @endif
            </div>
        </form>
    </div>

    <script>
        function copyText() {
            const text = @json($text ?? '');
            navigator.clipboard.writeText(text).then(() => {
                alert('Teks berhasil disalin!');
            });
        }

        function ambilFoto() {
            document.getElementById('imageInput').click();
        }
    </script>
</body>
</html>
