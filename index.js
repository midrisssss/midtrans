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
  $("#login, #login2").click(function () {
    $("#frame").removeClass("hide");
    $("#frame").addClass("show");
    $("#login-card").toggleClass("hide");
    $("#login-card").toggleClass("show");
    $("#signup-card").removeClass("show");
    $("#signup-card").addClass("hide");
  });
  $("#signup, #signup2").click(function () {
    $("#frame").removeClass("hide");
    $("#frame").addClass("show");
    $("#signup-card").toggleClass("hide");
    $("#signup-card").toggleClass("show");
    $("#login-card").removeClass("show");
    $("#login-card").addClass("hide");
  });
  $("#account").click(function () {
    $("#frame").removeClass("hide");
    $("#frame").addClass("show");
    $("#logout-card").toggleClass("hide");
    $("#logout-card").toggleClass("show");
  });
  $("#frame, #logout-no").click(function () {
    $("#frame").addClass("hide");
    $("#frame").removeClass("show");
    if ($("#login-card").hasClass("show")) {
      $("#login-card").toggleClass("hide");
      $("#login-card").toggleClass("show");
    }
    if ($("#signup-card").hasClass("show")) {
      $("#signup-card").toggleClass("hide");
      $("#signup-card").toggleClass("show");
    }
    if($("#account").hasClass("show")) {
      $("#logout-card").toggleClass("hide");
      $("#logout-card").toggleClass("show");
    };
  });

  $("#search").click(function (e) {
    e.preventDefault();
    let service =
      $("#services").val() == "" ? "s=" : "s=" + $("#services").val();
    let from = $("#from").val() == "" ? "&from=" : "&from=" + $("#from").val();
    let to = $("#to").val() == "" ? "&to=" : "&to=" + $("#to").val();

    window.location.href = "index.php?" + service + from + to ;

    //   $.ajax({
    //     type: "POST",
    //     url: "book.php",
    //     data: {
    //       service: service,
    //       from: from,
    //       to: to,
    //       date: date,
    //       time: time,
    //     },
    //     succes: function (response) {
    //       alert(response);
    //     },
    //   });
  });
});
