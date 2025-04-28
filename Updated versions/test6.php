<?php
$images = [
    ['src' => 'hap.jpg', 'description' => 'Happy'],
    ['src' => 'long.jpg', 'description' => 'Very Long'],
    ['src' => 'Mind.jpg', 'description' => 'Sad'],
    ['src' => 'onepunch.jpg', 'description' => 'ONE PUNCHHHHHHHHHHHH'],
    ['src' => 'you.jpg', 'description' => 'ITS YOUUUUUU'],
    ['src' => 'fetchimage.jpg', 'description' => 'Fetch'],
    ['src' => 'obama.jpg', 'description' => 'Barack Obama'],
    ['src' => 'BlackmenKiss.jpg', 'description' => 'Two Black Men Kissing'],
    ['src' => 'joe.jpg', 'description' => 'Joe Biden'],
    ['src' => 'Donald.jpg', 'description' => 'Donald Trump'],
    ['src' => 'rizal.jpg', 'description' => 'Dr Jose Rizal'],
    ['src' => 'hitler.jpg', 'description' => 'Adolf hitler'],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery (Colorful Design)</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom right, #89f7fe, #66a6ff);
            color: #333;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .container {
            width: 95%;
            max-width: 1100px;
            margin: 0 auto;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #4a148c;
            margin-bottom: 40px;
            font-weight: 700;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 25px;
            padding: 20px;
            background-color: #e1f5fe;
            border-radius: 10px;
            margin-bottom: 40px;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .gallery-card {
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            border: 3px solid transparent;
        }

        .gallery-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.2);
            border-color: #00bcd4;
        }

        .gallery-card img {
            display: block;
            width: 100%;
            height: 190px;
            object-fit: cover;
            border-bottom: 1px solid #e0e0e0;
        }

        .card-description {
            padding: 12px 8px;
            font-size: 15px;
            color: #555;
            width: 100%;
            box-sizing: border-box;
            font-weight: 600;
        }

        /* --- CSS controlling the Selected Image Area --- */
        .selected-area {
            margin-top: 30px;
            padding: 30px;
            background-color: #ffe0b2;
            border: 1px solid #ffcc80;
            border-radius: 10px;
            text-align: center;
            min-height: 380px; /* Ensures a minimum height for the area */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .selected-area h2 {
            color: #e65100;
            margin-top: 0;
            margin-bottom: 25px;
            font-weight: 700;
        }

        .selected-image-wrapper {
            /* This wrapper creates a fixed-size container for the image */
            width: 100%; /* Allows centering */
            max-width: 400px; /* Maximum width of the display box */
            height: 300px; /* Fixed height of the display box */
            margin: 0 auto 25px auto;
            border: 4px solid #ff9800;
            border-radius: 10px;
            overflow: hidden; /* Hides any part of the image that exceeds this box */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            display: flex; /* Used to center the image inside this box */
            align-items: center;
            justify-content: center;
            background-color: #fff; /* White background behind the image */
        }

        .selected-image {
            /* This image scales to fit inside the wrapper */
            display: block;
            max-width: 100%; /* Image won't be wider than its wrapper */
            max-height: 100%; /* Image won't be taller than its wrapper */
            width: auto; /* Maintain aspect ratio */
            height: auto; /* Maintain aspect ratio */
            object-fit: contain; /* Ensures the whole image is visible within the wrapper */
        }

        .selected-description {
            font-size: 22px;
            color: #333;
            font-weight: 700;
            min-height: 1.5em;
        }

        .selected-area .initial-message {
            font-size: 19px;
            color: #757575;
            font-weight: 400;
        }
        .selected-area img#selectedImage:not([src]) + .selected-description {
            display: none;
        }

        /* --- End of CSS controlling the Selected Image Area --- */

        /* Add some basic responsiveness */
        @media (max-width: 768px) {
             body {
                 padding: 10px;
             }
            .container {
                padding: 20px;
                margin: 10px;
            }
            h1 {
                 margin-bottom: 30px;
             }
            .gallery-grid {
                grid-template-columns: repeat(auto-fit, minmax(130px, 1fr));
                gap: 15px;
                padding: 15px;
                 margin-bottom: 30px;
            }

            .gallery-card img {
                height: 160px;
            }
            .card-description {
                font-size: 14px;
                 padding: 10px 5px;
            }
             .selected-area {
                 padding: 20px;
                 min-height: 300px;
             }
             .selected-image-wrapper {
                 max-width: 90%;
                 height: 250px; /* Fixed height on small screens */
             }
             .selected-description {
                 font-size: 19px;
             }
             .selected-area .initial-message {
                 font-size: 17px;
             }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (!document.getElementById('selectedImage').getAttribute('src')) {
                document.getElementById('selectedDescription').innerHTML = '<span class="initial-message">Click an image thumbnail above to see it larger here.</span>';
            }
        });

        function selectImage(src, text) {
            document.getElementById('selectedImage').src = src;
            document.getElementById('selectedDescription').textContent = text;
            const initialMessageSpan = document.querySelector('#selectedDescription .initial-message');
            if (initialMessageSpan) {
                initialMessageSpan.remove();
            }

            document.getElementById('selectedArea').scrollIntoView({
                behavior: 'smooth'
            });
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Featured Images</h1>
        <div class="gallery-grid">
            <?php foreach ($images as $image): ?>
                <div class="gallery-card" onclick="selectImage('<?php echo $image['src']; ?>', '<?php echo $image['description']; ?>')">
                    <img src="<?php echo $image['src']; ?>" alt="<?php echo $image['description']; ?>">
                    <div class="card-description"><?php echo $image['description']; ?></div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="selected-area" id="selectedArea">
             <h2>Currently Viewing</h2>
             <div class="selected-image-wrapper">
                 <img id="selectedImage" src="" alt="Selected Image" class="selected-image">
             </div>
            <p id="selectedDescription" class="selected-description"></p>
        </div>
    </div>
</body>
</html>