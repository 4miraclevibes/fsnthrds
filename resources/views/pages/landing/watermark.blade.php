<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }} - Watermark</title>
    
    <!-- QR Code JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    
    <style>
        body {
            margin: 0;
            padding: 40px;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        
        .watermark-container {
            background: white;
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 800px;
            width: 100%;
        }
        
        .category-image {
            width: 400px;
            height: 400px;
            object-fit: cover;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        .category-name {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        
        .category-slug {
            font-size: 24px;
            color: #666;
            margin-bottom: 30px;
        }
        
        #qrcode {
            display: flex;
            justify-content: center;
            margin: 30px 0;
        }
        
        #qrcode img {
            width: 250px !important;
            height: 250px !important;
        }
        
        .timestamp {
            font-size: 18px;
            color: #999;
            margin-top: 30px;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }
        
        @media print {
            body {
                background: white;
                padding: 0;
            }
            
            .watermark-container {
                box-shadow: none;
            }
            
            .category-image {
                box-shadow: none;
            }
        }

        @media (max-width: 768px) {
            .watermark-container {
                padding: 30px;
            }
            
            .category-image {
                width: 300px;
                height: 300px;
            }
            
            .category-name {
                font-size: 36px;
            }
            
            .category-slug {
                font-size: 20px;
            }
            
            #qrcode img {
                width: 200px !important;
                height: 200px !important;
            }
            
            .timestamp {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="watermark-container">
        <img src="{{ $category->image }}" alt="{{ $category->name }}" class="category-image">
        <div class="category-name">{{ $category->name }}</div>
        <div class="category-slug">{{ $category->slug }}</div>
        
        <div id="qrcode"></div>
        
        <div class="timestamp">
            Dibuat pada: {{ now()->format('d M Y H:i:s') }}
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const currentUrl = window.location.href;
            
            new QRCode(document.getElementById("qrcode"), {
                text: currentUrl,
                width: 250,
                height: 250,
                colorDark: "#000000",
                colorLight: "#ffffff",
                correctLevel: QRCode.CorrectLevel.H
            });
        });
    </script>
</body>
</html>
