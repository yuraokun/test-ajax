import $, { get } from 'jquery';





$('button').click(send);

function send() {
  const now = new Date();
  let Y = now.getFullYear()
  let M = now.getMonth() + 1
  let d = now.getDate()

  let h = now.getHours()
  let m = now.getMinutes()
  let s = now.getSeconds()

  const timestamp = Y + "年" + M + "月" + d + "日" + h + "時" + m + "分" + s + "秒";

  const dataObj = {
    number: $('input').val(),
    time_id: timestamp
  }
  $.post("./index.php",
    { data: dataObj },
    function (dt) {
      console.log(dt);
    }
  );
}


let timeStamp;

setInterval(() => {

  getData();
}, 5000);

function getData() {

  $.ajax({
    url: './send.php',
    type: 'GET',
    dataType: 'json',
    // フォーム要素の内容をハッシュ形式に変換
    // data: $('form').serializeArray(),
    // timeout: 5000,
  })
    .done(function (data) {
      console.log(data);



      render(data);
    })
    .fail(function () {
      // 通信失敗時の処理を記述
    });


}

function render(data) {

  if (timeStamp) {

    if (timeStamp === data[0].time_id) {
      console.log("not render")
      return
    }
  }

  timeStamp = data[0].time_id;

  console.log("render");
  let temp = "";

  data.forEach((el, index) => {

    if (index === 0) {
      temp += `<div class='data first'>`
    } else {
      temp += `<div class='data'>`
    }
    temp += `
    <p>${el.number} : </p>
    <p>${el.time_id}</p>
    </div>
    `

  });

  $('main').html(temp);

}