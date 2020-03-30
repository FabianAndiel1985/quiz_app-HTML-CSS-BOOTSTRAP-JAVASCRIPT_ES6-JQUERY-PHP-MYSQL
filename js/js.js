   // initializing set for used questions
    usedAnswerSet = new Set();
    usedAnswerSet.add(0);

    amountOfQuestions = 0; 

    modal = document.querySelector("#myModal");

    // Get the <span> element that closes the modal

    span = document.querySelector(".close");

    // timer object

    timer = {
            count: 0,
            interval:0,

            // increase the count
            
            addASecond: function()  {
                this.count++;
            },
            
            // set up a interval for every second

            myInterval() {this.interval= setInterval(this.addASecond.bind(this),1000)},

            // end the stared interval

            clearMyInterval() {clearInterval(this.interval)},

            // returning a time string in hours minutes and seconds

            calculateTheTime() {

                this.clearMyInterval();

                let count = this.count;

                let hours = count/3600; 
                hours = hours.toFixed(0);
  
                count %= 3600; 
            
                let minutes = count / 60 ; 
                minutes = minutes.toFixed(0);   

                count %= 60; 
            
                let seconds = count; 

                let playerTime="";

                if (hours > 0) {
                    playerTime += hours + " hours ";
                }

                else if(minutes > 0) {
                    playerTime += minutes + " minutes ";
                }

                playerTime += seconds + " seconds"

                return playerTime;
            }
        }


    // function for checking answer

    checkAnswer = (event) => {

        let userSolution = event.currentTarget.innerHTML;
        $.ajax({url: "./backend/checkAnswer.php",
                data: userSolution,
                type: "post", 
                success: function(result){

                result= JSON.parse(result); 

                amountOfQuestions = result[0];

                    // increase points

                    if(parseInt(result[1]) == 1) {
                        let amountPoints = document.querySelector("#points").innerHTML;
                        amountPoints++;
                        document.querySelector("#points").innerHTML = amountPoints;
                    }

                    if (usedAnswerSet.size - 1 != amountOfQuestions ) {
                    displayQuestion();
                    }

                    else {
                        modal.style.display = "block"; 
                        
                        let playerTime = timer.calculateTheTime();
                        document.querySelector("#playersTime").innerHTML = playerTime;

                        let amountPoints = document.querySelector("#points").innerHTML;
                        document.querySelector("#achievedPoints").innerHTML = amountPoints;
                    }
              
          }});

    }


    // attaching the check answer functionality to answer possibilities

    listItems = document.getElementsByTagName("button");

    for (let item of listItems) {
        item.addEventListener(
            "click",
            checkAnswer
        );
    }

    // making the x button in the modal close the question

    span.onclick = function() {
      modal.style.display = "none";
    }

    // function for displaying a question
    displayQuestion = () => {
        let usedAnswers = Array.from(usedAnswerSet);
        
        $.ajax({
            url: "./backend/retriveData.php",
            data: {'usedAnswers':usedAnswers} ,
            type:"post",
            success: function(response) {

                let receivedData = JSON.parse(response);

                document.querySelector("#question").innerHTML = receivedData.question;

                for (let i = 1; i < 5; i++) {
                    let answerNumber = "answer" + i;
                    document.querySelector("#answer" + i).innerHTML = receivedData[answerNumber];
                }
                usedAnswerSet.add(parseInt(receivedData.id));
            }
        });
    }

    // inital display of question
    displayQuestion();

    timer.myInterval();