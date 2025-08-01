const time = document.getElementById("time");
const timeformat = document.getElementById("timeformat");

document.addEventListener('DOMContentLoaded',()=>{
    setInterval(showTime,1000);
});

const showTime = ()=>{
    let date = new Date();
    let hr = date.getHours();
    let min = date.getMinutes();
    let sec = date.getSeconds();

     let period = hr >= 12 ? "PM" : "AM";
    hr = hr % 12;
    hr = hr === 0 ? 12 : hr;

    hr = hr<10 ? `0${hr}` : hr;
    min = min<10 ? `0${min}`:min;
    sec = sec<10 ? `0${sec}`:sec;
    time.innerHTML = `${hr} : ${min} : ${sec}`;
    timeformat.innerHTML = period;
}