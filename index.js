$(document).ready(function () {
  const train = ["#train-1", "#train-2", "#train-3"];
  let index = 0;

  $("#left").click(function () {
    $(train[index]).removeClass("show");
    $(train[index]).addClass("hide");
    $(train[index]).hide();

    if (index == 0) {
      index = 2;
    } else {
      index--;
    }

    $(train[index]).show();
    $(train[index]).removeClass("hide");
    $(train[index]).addClass("show");
  });
  $("#right").click(function () {
    $(train[index]).removeClass("show");
    $(train[index]).addClass("hide");
    $(train[index]).hide();

    if (index == 2) {
      index = 0;
    } else {
      index++;
    }

    $(train[index]).show();
    $(train[index]).removeClass("hide");
    $(train[index]).addClass("show");
  });
  $("#login").click(function () {
    $("#login-card").toggleClass("hide");
    $("#login-card").toggleClass("show");
  });
});
