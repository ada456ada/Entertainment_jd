const formatTime = date => {
  const year = date.getFullYear()
  const month = date.getMonth() + 1
  const day = date.getDate()
  const hour = date.getHours()
  const minute = date.getMinutes()
  const second = date.getSeconds()

  return [year, month, day].map(formatNumber).join('/') + ' ' + [hour, minute, second].map(formatNumber).join(':')
}

const formatNumber = n => {
  n = n.toString()
  return n[1] ? n : '0' + n
}

let timeout,start,debounce=(fn,time_round,maxtime,data)=>{
  const now=new Date().getTime();
  clearTimeout(timeout);
  if(!start){
    start=now;
  }
  if(now-start>=maxtime){
    fn(data);
    start=now;
  }else{
    timeout=setTimeout(function(){fn(data);},time_round);
  }
}

module.exports = {
  formatTime: formatTime,
  debounce: debounce
}
