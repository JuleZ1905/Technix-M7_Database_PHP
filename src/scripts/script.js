let remove = document.getElementsByClassName("del-button");

remove[0].addEventListener("click", function () {
  let answer = confirm("Are you sure you want to delete this game?");
  if (answer) {
    console.log("Game deleted " + this.dataset.id);
  } else {
    console.log("Game not deleted");
  }
});
