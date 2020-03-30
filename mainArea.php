<?php
    session_start();

    if (!isset($_SESSION['user'])) {
        header("location:index.php");
    }

    // immediately destroy the session

    session_unset();
    session_destroy();
?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
    <!-- favicon -->
    <link href="favicon.ico" rel="icon" type="image/x-icon" />
    <!-- viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- bootstrap styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- individual styles -->
    <link rel="stylesheet" type="text/css" href="styles/general-styles.css">
    <!-- styles main area -->
    <link rel="stylesheet" type="text/css" href="styles/mainArea-styles.css">

</head>

<body>

    <header>
        <h1 class="text-center mb-5"> 
            The quiz game 
        </h1>
    </header>

    <!-- The Modal -->
    <div id="myModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <span class="close text-right">&times;</span>
        <h1 class="text-center font-weight-bold">You won!!!!</p>
        <p class="mt-4"> The game took you 
            <span id="playersTime"> 
            </span> 
        </p>
         <p class="mt-5"> You achieved 
            <span id="achievedPoints"> 
            </span> points
        </p>
      </div>

    </div>

    <div class="d-flex flex-column justify-content-between">
        <main>
            <div class="container-fluid text-center p-5">
                <h1 id="question"></h1>
                <ul class="text-left mt-3">
                    <li>
                        <button type="button" id="answer1" class="btn btn-success">
                            
                        </button>
                    </li>
                    <li>
                        <button type="button" id="answer2" class="btn btn-success mt-2">
                            
                        </button>
                    </li>
                </ul>
                <ul class="text-left mt-3">
                    <li>
                        <button type="button" id="answer3" class="btn btn-success">
                            
                        </button> 
                    </li>
                    <li>
                        <button type="button" id="answer4" class="btn btn-success mt-2">                
                        </button> 
                    </li>
                </ul>
            </div>

            <div id="displayPlayerPoints">
                <div id="playerPoints" class="mt-5 font-weight-bold">
                    Player One Points 
                </div> 
                <span id="points" class="font-weight-bold"> 
                    0
                </span>
            </div>
        </main>

        <div class="text-center pt-2 pb-3">
           &copy; Fabian Andiel 2020
        </div>

    </div>
   

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- individual scripts -->
    <script type="text/javascript" src="js/js.js"></script>
</body>

</html>