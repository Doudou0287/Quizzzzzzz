const semi = document.querySelectorAll('.semicircle');
const timer = document.querySelector('.timer');
const hr= 0, min= 0, sec = 30;
const hours = hr * 3600000, minutes = min * 60000, seconds = sec * 1000;
const setTime = hours + minutes + seconds;
const start = Date.now();
const coming = start + setTime;

const timerLoop = setInterval(countDown);
countDown();

function countDown(){
    const current = Date.now();
    const remaining = coming - current;
    const angle = (remaining/setTime) * 360;
    if(angle > 180){
        semi[2].style.display = 'none';
        semi[0].style.transform = 'rotate(180deg)';
        semi[1].style.transform = `rotate(${angle}deg)`;
        
    } 
    else{
        semi[2].style.display = 'block';
        semi[0].style.transform = `rotate(${angle}deg)`;
        semi[1].style.transform = `rotate(${angle}deg)`;
        
    }
    if(angle > 90){
        semi[0].style.backgroundColor = 'blue';
        timer.style.color = 'blue';
    }
    else{
        semi[0].style.backgroundColor = 'red';
        timer.style.color = 'red';
    }
    const hrs = Math.floor((remaining/ (1000 * 60 * 60)) % 24).toLocaleString('en-US',{minimumIntegerDigits: 2, useGrouping:false});
    const mins = Math.floor((remaining/ (1000 * 60)) % 60).toLocaleString('en-US',{minimumIntegerDigits: 2, useGrouping:false});
    const secs = Math.floor(remaining/ 1000 % 60).toLocaleString('en-US',{minimumIntegerDigits: 2, useGrouping:false});

    timer.innerHTML = `
    <div>${hrs}</div>
    <div class="colon">:</div>
    <div>${mins}</div>
    <div class="colon">:</div>
    <div>${secs}</div>
    `;



    if(remaining<0){
        clearInterval(timerLoop);
        semi[0].style.display = 'none';
        semi[1].style.display = 'none';
        semi[2].style.display = 'none';

        timer.innerHTML = `
        <div>00</div>
        <div class="colon">:</div>
        <div>00</div>
        <div class="colon">:</div>
        <div>00</div>
        `;
    }
}
