var questions = [
    {
        question: "what color are apples?",
        an1: "RED",
        an2: "blue",
        an3:"black ",  
        an4:"white ",
        answer: "a"
    },
    {
        question: "what color are orangs?",
        an1: "(a) RED ",
        an2: "(b) blue",
        an3:"(c)black ",  
        an4:"(d)white ",
        answer: "a"
    },
    {
        question: "what color are banana?",
        an1: "(a) RED ",
        an2: "(b) blue",
        an3:"(c)black ",  
        an4:"(d)white ",
        answer: "a"
    },
    {
        question: "what color are ananas?",
        an1: "(a) RED ",
        an2: "(b) blue",
        an3:"(c)black ",  
        an4:"(d)white ",
        answer: "a"
    },
    {
        question: "what color are cacao?",
        an1: "(a) RED ",
        an2: "(b) blue",
        an3:"(c)black ",  
        an4:"(d)white ",
        answer: "a"
    }
];

var score= 0;

for(var i=0; i<questions.length ;i++ ){
    document.getElementById('question').innerHTML = questions[i].question;
    document.getElementById('an1').innerHTML = questions[i].an1;
    document.getElementById('an2').innerHTML = questions[i].an2;
    document.getElementById('an3').innerHTML = questions[i].an3;
    document.getElementById('an4').innerHTML = questions[i].an4;        
}
