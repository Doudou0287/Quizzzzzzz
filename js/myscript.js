const canvas = document.querySelector('canvas');
const width = window.innerWidth;
const height = window.innerHeight;
canvas.width = width;
canvas.height = height;
const ctx = canvas.getContext('2d')

  class Ball{
    constructor(x, y, velx, vely, size, color){
        this.x = x;
        this.y = y;
        this.velx = velx;
        this.vely = vely;
        this.size = size;
        this.color = color;
    }

    draw(){
      ctx.beginPath();
      ctx.fillStyle = this.color;
      ctx.arc(this.x,this.y,this.size,0,2 * Math.PI);
      ctx.fill();
    }

    update(){
      if(this.x + this.size >= width || this.x - this.size <= 0){
        this.velx = -this.velx;
      }
      if(this.y + this.size >= height || this.y - this.size <= 0){
        this.vely = -this.vely;
      }
      
      this.x +=this.velx;
      this.y += this.vely;
    }

      

  }
  function rand(min,max){
    const num = Math.floor(Math.random() * (max - min +1)) +min;
    return num;
  }
  const balls = [];
  // 'rgb(${rand(0,255)}, ${rand(0,255)},${rand(0,255)})'
  while(balls.length < 80){
    let size = rand(10,20)
    const ball = new Ball(
      rand(size, width - size),
      rand(size, height - size),
      rand(-5,5),
      rand(-5,5),
      size,
      `rgb(${rand(0,255)}, ${rand(0,255)},${rand(0,255)})`
    );
    balls.push(ball);
  }

  function loop(){
    ctx.fillStyle = 'rgba(0, 0, 0, 0.182)';
    ctx.fillRect(0,0,width,height);
    for(let i = 0; i<balls.length;i++){
        balls[i].draw();
        balls[i].update();
    }

    requestAnimationFrame(loop);
  }

  loop();


  document.body.style.background = "url(" + canvas.toDataURL() + ")";
