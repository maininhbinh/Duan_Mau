var check = false;
var form = "";
var xhttp = new XMLHttpRequest();
function setState(boolen) {
  check = boolen;
}
function editComment(element, value) {
  let item = document.querySelector(`.${element}`);
  let itemChildren = item.querySelector("p");
  let itemChildren2 = item.querySelector("div");
  form = element;

  if (check && !itemChildren) {
    item.removeChild(itemChildren2);
    let elementP = document.createElement("p");
    elementP.innerHTML = value;
    item.append(elementP);
    setState(false);
  }

  if (!check && !itemChildren2) {
    let editor = `
    <div class="reply-input container reply">
        <div class="context">
            <textarea class="cmnt-input" >${value}</textarea>
            <button>
                <i class="fa-solid fa-pen-to-square"></i>
            </button>
        </div>
    </div>`;

    item.removeChild(itemChildren);
    item.innerHTML += editor;
    setState(true);
  }
}

function removeComment(element) {
  let item = document.querySelector(`.${element}`);
  let idComment = item.querySelector("#idcomment").value;

  xhttp.open(
    "GET",
    `http://duan_mau.pro/365shop/comment/${idComment}/delete`,
    true
  );

  xhttp.onload = function () {
    if (xhttp.status === 200) {
      console.log(xhttp.responseText);
    }
  };

  xhttp.send();

  form = "";
  item.remove();
}

function replyComment(element) {
  form = element;
  let item = document.querySelector(`.${element}`);
  let itemChildren = item.querySelector("p");
  let itemChildren2 = item.querySelector("div");
  let editor = `
    <div class="reply-input container reply">
        <div class="context">
            <textarea class="cmnt-input" name="reply" id="reply" placeholder="reply"></textarea>
            <button onclick=" postReplyComment('${form}')">
                <i class="fa-solid fa-paper-plane"></i>
            </button>
        </div>
    </div>`;

  if (!check && itemChildren) {
    item.innerHTML += editor;
    setState(true);
  }

  if (check && itemChildren2 && itemChildren) {
    item.removeChild(itemChildren2);
    setState(false);
  }
}

function postReplyComment(element) {
  let item = document.querySelector(`.${element}`);
  let idUser = item.querySelector("#idUser").value;
  let idProduct = item.querySelector("#idProduct").value;
  let idComment = item.querySelector("#idcomment").value;
  let value = item.querySelector("#reply").value;
  let itemChildren = item.querySelector("p");
  let itemChildren2 = item.querySelector("div");

  xhttp.open(
    "POST",
    `http://duan_mau.pro/365shop/shop/${idProduct}/comment/${idUser}/reply/${idComment}`,
    true
  );

  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  let data = "comment=" + encodeURIComponent(value);

  xhttp.onload = function () {
    if (xhttp.status === 200) {
      console.log(xhttp.responseText);
    }
  };
  xhttp.send(data);
  window.location.reload("");
}
