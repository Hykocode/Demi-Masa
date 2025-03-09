<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Clock</title>
    <style>
        :root {
            --clock-size: 45vh;
            --timezone-font: 2.5em;
            --digital-font: 2.8em;
            --container-gap: 4vw;
        }

        /* 40-43 inch TV */
        @media screen and (min-width: 1920px) {
            :root {
                --clock-size: 55vh;
                --timezone-font: 3em;
                --digital-font: 3.2em;
                --container-gap: 5vw;
            }
        }

        /* 50-55 inch TV */
        @media screen and (min-width: 2560px) {
            :root {
                --clock-size: 65vh;
                --timezone-font: 3.5em;
                --digital-font: 3.8em;
                --container-gap: 6vw;
            }
        }
        body {
            padding: 0;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image:url('background 2.png');
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
        }

        .clock-container {
            position: relative;
            width: var(--clock-size);
            height: var(--clock-size);
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: calc(var(--clock-size) * 0.15);
        }

        .analog-clock {
            position: relative;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: transparent;
            backdrop-filter: blur(10px);
            border: 8px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        }

        .center-dot {
            position: absolute;
            width: 12px;
            height: 12px;
            background: #00ffcc;
            border-radius: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 4;
            box-shadow: 0 0 10px #00ffcc;
        }

        .hand {
            position: absolute;
            bottom: 50%;
            left: 50%;
            transform-origin: bottom;
            border-radius: 4px;
        }

        .hour-hand {
            width: 6px;
            height: 25%;
            background: #ffffff;
            z-index: 1;
            box-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
        }

        .minute-hand {
            width: 4px;
            height: 35%;
            background: #ffffff;
            z-index: 2;
            box-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
        }

        .second-hand {
            width: 2px;
            height: 40%;
            background: #00ffcc;
            z-index: 3;
            box-shadow: 0 0 10px #00ffcc;
        }

        .digital-clock {
            position: absolute;
            bottom: calc(var(--clock-size) * -0.35);
            left: 50%;
            transform: translateX(-50%);
            font-size: var(--digital-font);
            color: #00ffcc;
            text-shadow: 0 0 10px #00ffcc;
            font-family: 'Courier New', monospace;
            letter-spacing: 2px;
            border:#00ffcc solid 2px;
            text-align: center;
            padding: 10px;
        }

        .time-text {
            margin: 0;
        }

        .hour-markings {
            position: absolute;
            width: 100%;
            height: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        .hour-marking {
            position: absolute;
            width: 2px;
            height: 12px;
            background: rgba(255, 255, 255, 0.3);
            left: 50%;
            transform-origin: bottom;
        }

        .clock-layout {
    height: 100vh;
    width: 100vw;
    display: grid;
    grid-template-columns: 1fr auto 1fr;
    gap: var(--container-gap);
    align-items: center;
    padding: calc(var(--container-gap) * 0.5);
    box-sizing: border-box;
    font-family: 'poppins';
}

.timezone-left, .timezone-right {
    display: flex;
    flex-direction: column;
    gap: 4vh;
}

.timezone-clock {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    padding: calc(var(--container-gap) * 0.1);
    border-radius: calc(var(--container-gap) * 0.8);
    text-align: center;
}

.timezone-name {
    color: #00ffcc;
    font-size: var(--timezone-font);
    margin-bottom: 1vh;
}

.timezone-time {
    color: white;
    font-size: calc(var(--timezone-font) * 1.2);
}

.timezone-left, .timezone-right {
    gap: calc(var(--container-gap) * 0.8);
}

@font-face{
     font-family: 'poppins';
     src: url('font/Poppins-Variable.ttf') format('truetype');
                
 }
    </style>
</head>
<body>

<div class="clock-layout">
    <div class="timezone-left">
        <div class="timezone-clock">
            <div class="timezone-name">Mekkah</div>
            <div class="timezone-time" id="mekkah-time"></div>
        </div>
        <div class="timezone-clock">
            <div class="timezone-name">Palestine</div>
            <div class="timezone-time" id="palestine-time"></div>
        </div>
        <div class="timezone-clock">
            <div class="timezone-name">Jordan</div>
            <div class="timezone-time" id="jordan-time"></div>
        </div>
    </div>

    <div class="clock-container">
        
        <div class="analog-clock">
            <div class="hour-markings" id="hour-markings"></div>
            <div class="hour-hand hand"></div>
            <div class="minute-hand hand"></div>
            <div class="second-hand hand"></div>
            <div class="center-dot"></div>
        </div>
        <div class="digital-clock">
            <p class="time-text" id="time-text"></p>
        </div>
    </div>
 <div class="timezone-right">
        <div class="timezone-clock">
            <div class="timezone-name">Beijing</div>
            <div class="timezone-time" id="beijing-time"></div>
        </div>
        <div class="timezone-clock">
            <div class="timezone-name">London</div>
            <div class="timezone-time" id="london-time"></div>
        </div>
        <div class="timezone-clock">
            <div class="timezone-name">Paris</div>
            <div class="timezone-time" id="paris-time"></div>
        </div>
    </div>
</div>
    <script>
        function updateClock() {
            const now = new Date();
            
            // Analog clock
            const seconds = now.getSeconds();
            const minutes = now.getMinutes();
            const hours = now.getHours() % 12;
            
            const secondDeg = (seconds * 6) + (minutes * 360);
            const minuteDeg = (minutes * 6) + (seconds * 0.1);
            const hourDeg = (hours * 30) + (minutes * 0.5);
            
            document.querySelector('.second-hand').style.transform = `rotate(${secondDeg}deg)`;
            document.querySelector('.minute-hand').style.transform = `rotate(${minuteDeg}deg)`;
            document.querySelector('.hour-hand').style.transform = `rotate(${hourDeg}deg)`;
            
            // Digital clock
            const timeString = now.toLocaleTimeString('en-US', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: true
            }).toUpperCase();
            
            document.getElementById('time-text').textContent = timeString;
        }

        // Create hour markings
        const hourMarkings = document.getElementById('hour-markings');
        for (let i = 0; i < 12; i++) {
            const marking = document.createElement('div');
            marking.className = 'hour-marking';
            marking.style.transform = `rotate(${i * 30}deg) translateX(-50%)`;
            hourMarkings.appendChild(marking);
        }

        // Update clock every second
        setInterval(updateClock, 1000);
        updateClock(); // Initial update

        function updateTimeZones() {
    const timeZones = {
        'mekkah': 'Asia/Riyadh',
        'palestine': 'Asia/Jerusalem',
        'jordan': 'Asia/Amman',
        'beijing': 'Asia/Shanghai',
        'london': 'Europe/London',
        'paris': 'Europe/Paris'
    };

    for (const [city, timezone] of Object.entries(timeZones)) {
        const time = new Date().toLocaleTimeString('en-US', {
            timeZone: timezone,
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: true
        });
        document.getElementById(`${city}-time`).textContent = time;
    }
}

setInterval(updateTimeZones, 1000);
updateTimeZones();

    </script>
</body>
</html>