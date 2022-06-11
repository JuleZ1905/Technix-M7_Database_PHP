let remove = document.getElementsByClassName("del-button");

for (let index = 0; index < remove.length; index++) {
  remove[index].addEventListener("click", function () {
    let answer = confirm("Are you sure you want to delete this game?");
    if (answer) {
      let round_id = this.getAttribute("data-id");
      $.post("/index.php", { action: "delete", id: round_id }).done(
        function () {
          console.log("Deleted");
          window.location.reload();
        }
      );
    }
  });
}
