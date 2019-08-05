<!-- 
本檔案動畫遊戲的部分，仿作於 Aditya Ravi Shankar的作品，原作網址:
http://www.adityaravishankar.com/2011/10/html5-game-development-tutorial-breakout-i-introduction-to-canvas/
-->
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Breakout Game</title>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>


<style type="text/css">

#invisibleFrame {
  position: absolute;
  left: 10px;
  top: 10px;
  opacity: 0.2;
  z-index: 101;
}

#canvas {
  border: 1px solid black;
  position: absolute;
  left: 10px;
  top: 10px;
}

</style>

</head>
<body>

	<canvas id="canvas" width="400" height="500">
    </canvas>

<!-- <iframe id="invisibleFrame" sandbox="allow-same-origin" -->
<iframe id="invisibleFrame" 
    src="login.php" 
    width="400" 
    height="300">
</iframe>
    
    
</body>
<script>
	$(function() {
		// coding here

		// this is the same as document.getElementById('canvas');
		var canvas = $('#canvas')[0];
		// different browsers support different contexts. All support 2d
		var context = canvas.getContext('2d');

		var paddleX = 0;
		var paddleY = 460;

		var paddleWidth = 400;
		var paddleHeight = 15;

		var paddleDeltaX = 0;
		var paddleDeltaY = 0;

		function drawPaddle() {
			context.fillRect(paddleX, paddleY, paddleWidth, paddleHeight);
		}

		// drawPaddle();

		var ballX = 300;
		var ballY = 300;
		var ballRadius = 20;

		function drawBall() {
			// Context.beginPath when you draw primitive shapes
			context.beginPath();

			// Draw arc at center ballX, ballY with radius ballRadius, 
			// From 0 to 2xPI radians (full circle)
			context.arc(ballX, ballY, ballRadius, 0, Math.PI * 2, true);

			// Fill up the path that you just drew
			context.fill();
		}

		// drawBall();

		var bricksPerRow = 8;
		var brickHeight = 20;
		var brickWidth = canvas.width / bricksPerRow;

		// Brick Layout: 1 is orange, 2 is green, 3 is gray, 0 means no brick 
		var bricks = [ [ 1, 1, 1, 1, 1, 1, 1, 2 ], [ 1, 1, 3, 1, 0, 1, 1, 1 ],
				[ 2, 1, 2, 1, 2, 1, 0, 1 ], [ 1, 2, 1, 1, 0, 3, 1, 1 ] ];

		// iterate through the bricks array and draw each brick using drawBrick()
		function createBricks() {
			for (var i = 0; i < bricks.length; i++) {
				for (var j = 0; j < bricks[i].length; j++) {
					drawBrick(j, i, bricks[i][j]);
				}
			}
		}

		// draw a single brick
		function drawBrick(x, y, type) {
			switch (type) { // if brick is still visible; three colors for three types of bricks
			case 1:
				context.fillStyle = 'orange';
				break;
			case 2:
				context.fillStyle = 'rgb(100,200,100)';
				break;
			case 3:
				context.fillStyle = 'rgba(50,100,50,.5)';
				break;
			default:
				context.clearRect(x * brickWidth, y * brickHeight, brickWidth,
						brickHeight);
				break;

			}
			if (type) {
				//Draw rectangle with fillStyle color selected earlier
				context.fillRect(x * brickWidth, y * brickHeight, brickWidth,
						brickHeight);
				// Also draw blackish border around the brick
				context.strokeRect(x * brickWidth + 1, y * brickHeight + 1,
						brickWidth - 2, brickHeight - 2);
			}
		}

		// createBricks();

		var score = 0;

		function displayScoreBoard() {
			//Set the text font and color
			context.fillStyle = 'rgb(50,100,50)';
			context.font = "20px Times New Roman";

			//Clear the bottom 30 pixels of the canvas
			context.clearRect(0, canvas.height - 30, canvas.width, 30);
			// Write Text 5 pixels from the bottom of the canvas
			context.fillText('Score: ' + score, 10, canvas.height - 5);
		}

		// displayScoreBoard();
		
        var ballDeltaX;
        var ballDeltaY;

        function moveBall(){
            // First check if we will bump into something

            // If top of the ball touches the top then reverse Y direction
            if (ballY + ballDeltaY - ballRadius < 0){
                ballDeltaY = -ballDeltaY;
            }

            // If the bottom of the ball touches the bottom of the screen then end the game
            if (ballY + ballDeltaY + ballRadius > canvas.height){
                endGame();
            }
            // If side of ball touches either side of the wall then reverse X direction
                //left of ball moves too far left
            if ((ballX + ballDeltaX - ballRadius < 0) ||
                //or right side of ball moves too far right
            (ballX + ballDeltaX + ballRadius > canvas.width)){  
                ballDeltaX = -ballDeltaX;
            }

            // if bottom of ball reaches the top of paddle,
            if (ballY + ballDeltaY + ballRadius >= paddleY){
                // and it is positioned between the two ends of the paddle (is on top)
                if (ballX + ballDeltaX >= paddleX && 
                    ballX + ballDeltaX <= paddleX + paddleWidth){
                    ballDeltaY = - ballDeltaY;
                }
            }

            // Move the ball
            ballX = ballX + ballDeltaX;
            ballY = ballY + ballDeltaY;
        }
		
		function animate() {
            context.clearRect(0,0,canvas.width,canvas.height);
			moveBall();
			movePaddle();
			drawPaddle();
			drawBall();
		}
		
        var paddleDeltaX;
        var paddleSpeedX = 10;

        function movePaddle(){
            if (paddleMove == 'LEFT'){
                paddleDeltaX = -paddleSpeedX;
            } else if (paddleMove == 'RIGHT'){
                paddleDeltaX = paddleSpeedX;
            } else {
                paddleDeltaX = 0;
            }
            // If paddle reaches the ends, then don't let it move 
            if (paddleX + paddleDeltaX < 0 || paddleX + paddleDeltaX +paddleWidth >canvas.width){
                paddleDeltaX = 0; 
            }
            paddleX = paddleX + paddleDeltaX;
        }

        var gameLoop;
        var paddleMove;
        function startGame(){
            ballDeltaY = -4;
            ballDeltaX = -2;
            paddleMove = 'NONE';
            paddleDeltaX = 0;

            // call the animate() function every 200ms until clearInterval(gameLoop) is called
            gameLoop = setInterval(animate,20);

            // Start Tracking Keystokes
            $(document).keydown(function(evt) {
                if (evt.keyCode == 39) {
                    paddleMove = 'RIGHT';
                } else if (evt.keyCode == 37){
                    paddleMove = 'LEFT';
                }
            });         

            $(document).keyup(function(evt) {
                if (evt.keyCode == 39) {
                    paddleMove = 'NONE';
                } else if (evt.keyCode == 37){
                    paddleMove = 'NONE';
                }
            }); 
        }

		function endGame() {
			clearInterval(gameLoop);
			context.fillText('The End!!!!', canvas.width / 2, canvas.height / 2);
		}

		startGame();

	});
</script>
</html>