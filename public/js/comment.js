var check = false;
function setState(boolen) {
  check = boolen;
}
function editComment(element, value) {
  let item = document.querySelector(`.${element}`);
  let itemChildren = item.querySelector("p");
  let itemChildren2 = item.querySelector("div");

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
                <i class="fa-solid fa-paper-plane"></i>
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
  item.remove();
}

function replyComment(element) {
  let item = document.querySelector(`.${element}`);
  let itemChildren = item.querySelector("p");
  let itemChildren2 = item.querySelector("div");
  let editor = `
    <div class="reply-input container reply">
        <div class="context">
            <textarea class="cmnt-input" placeholder="reply"></textarea>
            <button>
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
