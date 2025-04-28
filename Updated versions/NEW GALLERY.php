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
    ['src' => 'hitler.jpg', 'description' => 'Adolf hitler']
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <style>
        .gallery {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            border: 2px solid #ccc;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }
        .gallery img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border: 2px solid gray;
            cursor: pointer;
            transition: border-color 0.3s;
        }
        .gallery img:hover {
            border-color: black;
        }
        .selected {
            margin-top: 20px;
            border: 2px solid #ccc;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .selected img {
            width: 200px;
            height: 200px;
            object-fit: cover;
        }
        .description {
            margin-top: 10px;
            display: none;
            font-size: 16px;
            color: #333;
        }
    </style>
    <script>
        function selectImage(src, text) {
            document.getElementById('selectedImage').src = src;
            document.getElementById('imageDescription').textContent = text;
            document.getElementById('imageDescription').style.display = 'block';
        }
    </script>
</head>
<body>
    <div class="gallery">
        <?php foreach ($images as $image): ?>
            <img src="<?php echo $image['src']; ?>" onclick="selectImage(this.src, '<?php echo $image['description']; ?>')">
        <?php endforeach; ?>
    </div>
    <div class="selected">
        <img id="selectedImage" src="" alt="Selected Image">
        <p id="imageDescription" class="description"></p>
    </div>
</body>
</html>