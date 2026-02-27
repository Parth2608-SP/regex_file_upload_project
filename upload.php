<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {

    if ($_FILES["file"]["error"] == 0) {

        $fileType = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

        if ($fileType == "txt") {

            $content = file_get_contents($_FILES["file"]["tmp_name"]);

        } else {
            die("Only .txt files are allowed!");
        }

    } else {
        die("File upload error!");
    }

} else {
    die("Invalid Request!");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Result</title>
    <style>
        body{
            font-family: Arial;
            background:#f4f4f4;
            padding:30px;
        }
        .result{
            background:white;
            padding:20px;
            border-radius:10px;
            box-shadow:0 0 10px gray;
        }
        h3{
            color:#007bff;
        }
    </style>
</head>
<body>

<div class="result">

<h2>File Content:</h2>
<p id="text"><?php echo htmlspecialchars($content); ?></p>

<h3>Words Starting with A:</h3>
<p id="aWords"></p>

<h3>Words Starting with Consonants:</h3>
<p id="cWords"></p>

</div>

<script>
let text = document.getElementById("text").innerText;

// Regex 1: Words starting with A or a
let aPattern = /\b[aA]\w*/g;
let aWords = text.match(aPattern) || [];

// Regex 2: Words starting with Consonants
let cPattern = /\b[b-df-hj-np-tv-z]\w*/gi;
let cWords = text.match(cPattern) || [];

document.getElementById("aWords").innerText = aWords.join(", ");
document.getElementById("cWords").innerText = cWords.join(", ");
</script>

</body>
</html>
