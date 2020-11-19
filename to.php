

<svg xmlns="http://www.w3.org/2000/svg" viewBox="-75 0 250 82.5" width="500" height="165">
<defs>
<path id="path-foreground" d="M 0 65 a 200 200 0 0 1 150 -65 160 160 0 0 0 -125 65" />
<path id="path-background" d="M 60 65 l -60 -45 h 22.5 l 60 45 z" />

<!-- mask for the logo -->
<mask id="mask-path">
<rect width="150" height="100" fill="hsl(0, 0%, 100%)" />
<g fill="hsl(0, 0%, 0%)">
<use transform="translate(-3.5 -3.5)" href="#path-foreground" />
<use transform="translate(3 3)" href="#path-foreground" />
</g>
</mask>

<!-- mask(s) purely for the animation -->
<mask id="mask-path-foreground">
<rect width="150" height="100" fill="hsl(0, 0%, 100%)" />
<g fill="hsl(0, 0%, 0%)">
<g transform="translate(150 0)">
<circle transform="scale(0)" r="175" />
</g>
</g>
</mask>

<mask id="mask-path-background">
<rect width="150" height="100" fill="hsl(0, 0%, 100%)" />
<g fill="hsl(0, 0%, 0%)">
<circle transform="scale(0)" r="125" />
</g>
</mask>
</defs>

<g fill="currentColor" stroke="none">
<g mask="url(#mask-path-background)">
<g mask="url(#mask-path)">
<use href="#path-background" />
</g>
</g>
<g mask="url(#mask-path-foreground)">
<use href="#path-foreground" />
</g>
<g transform="translate(0 82.5)">
<text textLength="82.5" style="text-transform: uppercase; font-size: 0.8rem;">
qutbuddin
</text>
</g>
</g>
</svg>

<style>

@import url("https://fonts.googleapis.com/css2?family=Cabin:wght@500&display=swap");

* {
box-sizing: border-box;
padding: 0;
margin: 0;
}
body {
min-height: 100vh;
display: flex;
justify-content: center;
align-items: center;
color: hsl(0, 0%, 100%);
background: hsl(0, 0%, 0%);
}

svg {
display: block;
width: 100vw;
max-width: 35rem;
height: auto;
}
svg text {
font-family: "Cabin", sans-serif;
font-weight: 500;
}
</style>

<script>


    /*
after checking the for prefers-reduced-motion media query

hide **and then** show the SVG elements behind the logo
*/
const { matches } = window.matchMedia("prefers-reduced-motion: reduce");

if (!matches) {
const text = document.querySelector("svg text");
// it seems it is necessary to reiterate the textLength attribute of the parent text
const textLength = text.getAttribute("textLength");
text.innerHTML = text.textContent
.split("")
.map((letter) => `<tspan textLength="${textLength}">${letter}</tspan>`)
.join("");

const animation = anime.timeline();

animation.add({
targets: "text tspan",
opacity: [0, 1],
duration: 425,
easing: "easeInOutQuad",
delay: (d, i) => 150 * i + 500
});

animation.add(
{
targets: "mask circle",
scale: [1, 0],
duration: 2000,
easing: "easeInOutSine"
},
500
);

window.addEventListener("click", () => animation.restart());
}


Resources
</script>
