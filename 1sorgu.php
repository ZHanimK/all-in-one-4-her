<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Query1</title>
    <style>
    form {
        margin: 100px 0 0 100px;
    }
    .contain {
        float: right;
        width: 400px;
        height: 300px;
        background-color: lightblue;
        position: absolute;
        top: 100px;
        right: 500px;
    }
    .satir {
        border-bottom: 1px solid red;
        margin-top: 52px;
    }
    </style>
</head>
<body>
    <form action="">
        <h3>TITLE</h3>
            <div>
                <input type="checkbox" name="bachelor" value="bechalor"><label for="bachelor">bachelor</label>
            </div>
            <div>
                <input type="checkbox" name="master" value="master"><label for="master">master</label>
            </div>
            <div>
                <input type="checkbox" name="phd" value="phd"><label for="phd">phd</label>
            </div>
    </form>
    <form action="">
        <h3>GENDER</h3>
            <div>
                <input type="checkbox" name="female" value="female"><label for="female">female</label>
            </div>
            <div>
                <input type="checkbox" name="male" value="male"><label for="male">male</label>
            </div>
            <div>
                <input type="checkbox" name="other" value="other"><label for="other">other</label>
            </div>
    </form>
    <div class="contain">
    <h3>SONUÇ</h3>
        <div class="satir" id="satir1"></div>
        <div class="satir" id="satir2"></div>
        <div class="satir" id="satir3"></div>
        <div class="satir" id="satir4"></div>
    </div>
</body>
</html>