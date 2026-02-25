<?php
$images = glob("uploads/*");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Image Manager</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, 200px);
            gap: 15px;
        }
        .card {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
        a {
            text-decoration: none;
            background: black;
            color: white;
            padding: 5px 10px;
            display: inline-block;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<h2>Upload Image</h2>

<form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="image" required>
    <button type="submit">Upload</button>
</form>

<hr>

<h2>Saved Images</h2>

<div class="gallery">
<?php foreach ($images as $image): ?>
    <div class="card">
        <img src="<?php echo $image; ?>">
        <a href="<?php echo $image; ?>" download>Download</a>
    </div>
<?php endforeach; ?>
</div>

</body>
</html>
