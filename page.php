<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cope Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


    <link rel="stylesheet" href="page.css"/>

</head>
<body>

<?php //include './DB/testDB.php';
//?>
<?php //include './DB/addRegion.php';
//?>
<div class="bodyFlex">

    <div class="sidebar">
        <div class="sidebarName">
            <img src="https://adminlte.io/themes/v3/dist/img/AdminLTELogo.png" class="nameImg">
            <div class="nameText">AdminLTE 3</div>
        </div>
        <div class="sidebarName">
            <img src="https://adminlte.io/themes/v3/dist/img/AdminLTELogo.png" class="nameImg">
            <div class="nameText">Alexander Pierce</div>
        </div>

        <div class="sidebarDown">
            <div class="searchBox">
                <input name="search" type="text" placeholder="Search" class="search">
                <input type="submit" class="btn searchBot" value="Ok">
            </div>

            <div class="buttons">
                <div id='dropDownButton ' class='dropDownBt buttonsActive'>
                    <div>Country City</div>
                </div>

            </div>
            <div class="buttons">
                <div id='dropDownButton' class='dropDownBt'>
                    <div>Cars</div>
                </div>

            </div>
            <div class="buttons">
                <div id='dropDownButton' class='dropDownBt'>
                    <div>Cars 2</div>
                </div>

            </div>

        </div>

    </div>


    <div class="tibbleBoxBody">

        <div class="searchInputBox">
            <div class="countryBox">
                <input id="countrySelectBt" type="button" class="countrySelectBt" value="Select Country">
                <div id='dropDownBoxCountry' class="dropDownBox"></div>

                <input id="inputCountry" type="text" class="countrySelectBt" placeholder="Add">
            </div>
            <div class="countryBox">
                <input id="regionSelectBt" type="button" class="countrySelectBt" value="Select Region">
                <div id='dropDownBoxRegion' class="dropDownBoxRegion">
                </div>

                <input id="inputRegion" type="text" class="countrySelectBt" placeholder="Add">

            </div>

            <div class="countryBox">
                <input id="citySelectBt" type="button" class="countrySelectBt" value="Select City">
                <div id='dropDownBoxCity' class="dropDownBoxCity">   </div>

                <input id="inputCity" type="text" class="countrySelectBt" placeholder="Add">

            </div>
            <input id="addButton" type="submit" class="countrySelectBt  countrySelectBtAdd" value="ok">

        </div>

        <div class="tibbleBox">
            <div class="nameTibbleBox">
                <h1 class="nameTibble">Country</h1>
                <h1 class="nameTibble">Region</h1>
                <h1 class="nameTibble">City</h1>
            </div>
        </div>
            <div id="tibbleBox" class="tibbleBox"></div>







    </div>
</div>


<script src="page.js" ></script>
<script src="tibble.js" type="module"></script>

</body>
</html>