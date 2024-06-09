<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feliz Aniversario</title>
    <style>
        body {
            text-align: center;
            background-color: #ffe4e1;
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .container {
            padding: 20px;
        }

        h1,
        h2 {
            color: #e60073;
        }

        .gallery-container {
            display: flex;
            justify-content: center;
            align-items: center;
            overflow-x: auto;
            white-space: nowrap;
            padding-bottom: 10px;
            margin: 0 auto;
            max-width: 100%;
        }

        .gallery {
            display: inline-flex;
            flex-wrap: nowrap;
            gap: 10px;
        }

        .gallery img {
            width: auto;
            height: 150px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .heart {
            color: red;
            font-size: 2rem;
            animation: pulse 1s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.2);
            }

            100% {
                transform: scale(1);
            }
        }

        #quiz {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input {
            border: 2px solid #e60073;
            color: #e60073;
            padding: 10px;
            border-radius: 5px;
            outline: none;
            font-size: 1rem;
        }

        input::placeholder {
            color: #e60073;
        }

        button {
            margin: 5px;
            background-color: #e60073;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }

        button:hover {
            background-color: #cc005f;
        }

        .sunflower {
            position: absolute;
            width: 50px;
            height: 50px;
            background: url('sunflower.svg') no-repeat center center / contain;
            animation: fall 3s linear infinite;
        }

        @keyframes fall {
            0% {
                top: -10%;
                opacity: 1;
                transform: rotate(0deg);
            }

            100% {
                top: 110%;
                opacity: 0;
                transform: rotate(360deg);
            }
        }

        @media (max-width: 768px) {
            .gallery-container {
                padding: 0 10px;
            }

            .gallery img {
                height: 100px;
            }

            #quiz {
                width: 80%;
                margin: 0 auto;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Feliz Aniversario, Mi Amor</h1>
        <div class="heart">❤️</div>
        <p>Hoy cumplimos un mes más juntos y quiero decirte cuánto te amo.</p>

        <h2>Galería de fotos</h2>
        <div class="gallery-container">
            <div class="gallery">
                <?php
                $images = scandir('assets/images');
                foreach ($images as $image) {
                    if ($image !== '.' && $image !== '..') {
                        echo '<img src="assets/images/' . $image . '" alt="' . $image . '">';
                    }
                }
                ?>
            </div>
        </div>

        <h2>Juego de preguntas</h2>
        <button onclick="startQuiz()">Comenzar</button>
        <div id="quiz" style="display: none;">
            <p>¿Cuál fue nuestro primer lugar de cita?</p>
            <p>Una pista: estabas sentada, esperandome.</p>
            <input type="text" id="answer" placeholder="Tu respuesta">
            <button onclick="checkAnswer()">Enviar</button>
            <p id="feedback"></p>
        </div>
    </div>

    <div id="sunflower-container"></div>

    <script>
        function startQuiz() {
            document.getElementById('quiz').style.display = 'flex';
        }

        function checkAnswer() {
            const answer = document.getElementById('answer').value;
            const feedback = document.getElementById('feedback');
            if (answer.toLowerCase() === 'banquita') {
                feedback.textContent = '¡Correcto! Qué día tan especial fue ese.';
                showSunflowers();
            } else {
                feedback.textContent = 'Mmm, intentalo de nuevo.';
            }
        }

        function showSunflowers() {
            const container = document.getElementById('sunflower-container');
            for (let i = 0; i < 30; i++) {
                const sunflower = document.createElement('div');
                sunflower.className = 'sunflower';
                sunflower.style.left = Math.random() * 100 + 'vw';
                sunflower.style.animationDuration = 2 + Math.random() * 3 + 's';
                container.appendChild(sunflower);
                setTimeout(() => {
                    sunflower.remove();
                }, 5000);
            }
        }
    </script>
</body>

</html>