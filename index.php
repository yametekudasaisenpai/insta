<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caption Cards</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <!-- <h1 class="site-title">Instagram</h1> -->
    <div class="card-container">
    <?php
        $dir = "captions";
        $files = glob($dir . "/*.txt");
        foreach($files as $file) {
            $fileName = basename($file, ".txt");
            $fileContent = file_get_contents($file);
            $urlEncodedContent = urlencode($fileContent);
            echo "
            <div class='card' data-content=\"$urlEncodedContent\">
                <div class='card-content' onclick='copyToClipboard(this.parentNode)'>
                    <h2 class='card-title'>$fileName</h2>
                    <p class='card-text'>".substr($fileContent, 0, 100)."...</p>
                </div>
                <button class='show-button' onclick=\"showAll(`".str_replace("\"", "&quot;", str_replace("#", " #", $fileContent))."`)\">Show All</button>
            </div>
            ";
        }
        ?>

    </div>

    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <pre id="modal-text"></pre>
        </div>
    </div>

    <div id="copy-alert" class="copy-alert">Copied to clipboard!</div>
    
    <script src="script.js"></script>
</body>
</html>
