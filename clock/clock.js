let hour=document.getElementsByClassName('hour')[0];
let second=document.getElementsByClassName('second')[0];
let minute=document.getElementsByClassName('minute')[0];
let date_val= new Date();
let hours=date_val.getHours()/ 12 * 360 - 90;
let minutes=date_val.getMinutes() / 60 * 360 - 90;
let seconds=date_val.getSeconds() / 60 * 360 - 90;
hour.style.transform=`rotate(${hours}deg)`;
second.style.transform=`rotate(${seconds}deg)`;
minute.style.transform=`rotate(${minutes}deg)`;
setInterval(function(){
    let date_val= new Date();
    let hours=date_val.getHours()/ 12 * 360 - 90;
    let minutes=date_val.getMinutes() / 60 * 360 - 90;
    let seconds=date_val.getSeconds() / 60 * 360 - 90;
    hour.style.transform=`rotate(${hours}deg)`;
    second.style.transform=`rotate(${seconds}deg)`;
    minute.style.transform=`rotate(${minutes}deg)`;
},1000);