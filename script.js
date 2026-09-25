
//DARK mód
const toggleBtn = document.getElementById("mode_toggle");
const body = document.getElementById("grad1");

toggleBtn.addEventListener("click", () => {
    body.classList.toggle("dark-mode");
});

//JÁTÉK VÁLASZTÓ
const gameData = {
    Color: { title: "Color Game", desc: "asd" },
    Memory: { title: "Memory Game", desc: "asd" },
    Reaction: { title: "Reaction Game", desc: "asd" }
};

const gameButtons = document.querySelectorAll(".game_btn");
const gameDisplay = document.getElementById("game_display");

gameButtons.forEach(btn => {
    btn.addEventListener("click", () => {
        const game = gameData[btn.id];
        gameDisplay.innerHTML = `<h3>${game.title}</h3><p>${game.desc}</p>`;
    });
});