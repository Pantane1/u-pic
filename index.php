<?php
$images = glob("uploads/*");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Image Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            padding: 20px;
        }

        h2 {
            margin-bottom: 10px;
        }

        .upload-box {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }

        input[type="file"] {
            margin-right: 10px;
        }

        button {
            padding: 8px 15px;
            border: none;
            background: #007bff;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            text-align: center;
            transition: 0.2s ease;
        }

        .card:hover {
            transform: translateY(-3px);
        }

        img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 5px;
        }

        .download-btn {
            margin-top: 10px;
            display: inline-block;
            padding: 6px 12px;
            background: #28a745;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
        }

        .download-btn:hover {
            background: #1e7e34;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="upload-box">
        <h2>Upload Image</h2>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="image" required>
            <button type="submit">Upload</button>
        </form>
    </div>

    <h2>Saved Images</h2>

    <div class="gallery">
        <?php foreach ($images as $image): ?>
            <div class="card">
                <img src="<?php echo $image; ?>">
                <a class="download-btn" href="<?php echo $image; ?>" download>
                    Download
                </a>
            </div>
        <?php endforeach; ?>
    </div>

</div>

</body>
</html>
