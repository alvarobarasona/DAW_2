//Función que cambia el display del elemento pasado por parámetro a "none" si éste era "block" y viceversa.
function changeDisplay(element) {
    element.style.display == "none" ? element.style.display = "block" : element.style.display = "none";
}
//Guardo en la constante MARIO el elemento <img> de Mario.
const MARIO = document.getElementById("mario");
//Cambio el display de Mario de "block" por defecto a "none" para hacerlo invisible.
changeDisplay(MARIO);
//Guardo en la constante SHELL el elemento <img> del caparazón.
const SHELL = document.getElementById("shell");
//Cambio el display del caparazón de "block" por defecto a "none" para hacerlo invisible.
changeDisplay(SHELL);
//Guardo en la constante GO el elemento <img> del texto.
const GO = document.getElementById("go");
//Cambio el display del texto GO de "block" por defecto a "none" para hacerlo invisible.
changeDisplay(GO);
//Guardo en la constante WHISTLE_SOUND el elemento <audio> del sonido del silbato.
const WHISTLE_SOUND = document.getElementById("whistle-audio");
//Cargo el audio para que esté preparado para reproducirse cuando se lo indique.
WHISTLE_SOUND.setAttribute("preload", "auto");
//Guardo en la constante MARIO_THEME el elemento <audio> de la canción de Mario.
const MARIO_THEME = document.getElementById("mario-theme-audio");
//Cargo el audio para que esté preparado para reproducirse cuando se lo indique.
MARIO_THEME.setAttribute("preload", "auto");
//Guardo en la constante JUMP_SOUND el elemento <audio> del sonido del salto.
const JUMP_SOUND = document.getElementById("jump-audio");
//Cargo el audio para que esté preparado para reproducirse cuando se lo indique.
JUMP_SOUND.setAttribute("preload", "auto");
//Guardo en la constante YAHOO_SOUND el elemento <audio> del sonido del grito.
const YAHOO_SOUND = document.getElementById("wahoo-audio");
//Cargo el audio para que esté preparado para reproducirse cuando se lo indique.
YAHOO_SOUND.setAttribute("preload", "auto");
//Guardo en la constante SHELL_SOUND el elemento <audio> del sonido del caparazón al pisarse.
const SHELL_SOUND = document.getElementById("shell-audio");
//Cargo el audio para que esté preparado para reproducirse cuando se lo indique.
SHELL_SOUND.setAttribute("preload", "auto");
//Guardo en la constante BUTTON el elemento <button> del texto.
const BUTTON = document.getElementById("start-button");
//Añado el evento de click al botón para que se active al hacer click en él.
BUTTON.addEventListener("click", () => {
    //Indico a la constante que tiene guardado el elemento <audio> con el sonido del silbato que empiece a reproducirse.
    WHISTLE_SOUND.play();
    //Cambio el display del botón de "block" por defecto a "none" para hacerlo invisible.
    changeDisplay(BUTTON);
    //Cambio el display del texto GO de "none"  a "block" para hacerlo visible y así hacer que se ejecute su animación.
    changeDisplay(GO);
    //Guardo en la constante animationTextDuration la duración de la animación del texto GO.
    const ANIMATION_TEXT_DURATION = 2000;
    //Creo un setTimeout para que se ejecute el código de su interior una vez alcanzado el tiempo pasado por parámetro de la animación del texto GO.
    setTimeout(() => {
        //Indico a la constante que tiene guardado el elemento <audio> con la canción de Mario que empiece a reproducirse.
        MARIO_THEME.play();
        //Guardo en la variable timeToJump el tiempo que transcurre desde que enta en el anterior setTimeout hasta la animación del primer salto.
        let timeToJump = 500;
        //Creo un setTimeout para que se ejecute el código de su interior una vez alcanzado el tiempo pasado por parámetro, que justo coincide con la animación del primer salto.
        setTimeout(() => {
            //Indico a la constante que tiene guardado el elemento <audio> con el sonido del salto que se reproduzca.
            JUMP_SOUND.play();
            //Guardo en la constante TIME_TO_SCREAM el tiempo que transcurre desde que enta en el anterior setTimeout hasta la animación del grito justo después del primer salto.
            const TIME_TO_SCREAM = 50;
            //Creo un setTimeout para que se ejecute el código de su interior una vez alcanzado el tiempo pasado por parámetro, para que Mario grite justo después de la animación del salto.
            setTimeout(() => {
                //Indico a la constante que tiene guardado el elemento <audio> con el sonido del grito que se reproduzca.
                YAHOO_SOUND.play();
                //Guardo en la constante TIME_TO_STEP_ON_SHELL el tiempo que transcurre desde que enta en el anterior setTimeout hasta la animación del caparazón pisado después de que se ejecute el grito de Mario.
                const TIME_TO_STEP_ON_SHELL = 600;
                //Creo un setTimeout para que se ejecute el código de su interior una vez alcanzado el tiempo pasado por parámetro, para que se reproduzca el sonido cuando se pisa el caparazón justo cuando Mario impacta con éste en la animación.
                setTimeout(() => {
                    //Indico a la constante que tiene guardado el elemento <audio> con el sonido del caparazón pisado que se reproduzca.
                    SHELL_SOUND.play();
                    //Reutilizo la variable timeToJump para darle el nuevo valor del tiempo transcurrido desde el anterior setTimeout hasta la animación del segundo salto.
                    timeToJump = 2600;
                    //Creo un setTimeout para que se ejecute el código de su interior una vez alcanzado el tiempo pasado por parámetro, para que se reproduzca el sonido del segundo salto.
                    setTimeout(() => {
                        //Indico a la constante que tiene guardado el elemento <audio> con el sonido del salto que se reproduzca.
                        JUMP_SOUND.play();
                    }, timeToJump);
                }, TIME_TO_STEP_ON_SHELL);
            }, TIME_TO_SCREAM);
        }, timeToJump);
        //Cambio el display del texto GO de "block"  a "none" para hacerlo invisible.
        changeDisplay(GO);
        //Cambio el display de Mario de "none"  a "block" para hacerlo visible y así hacer que se ejecute su animación.
        changeDisplay(MARIO);
        //Cambio el display del caparazón de "none"  a "block" para hacerlo visible y así hacer que se ejecute su animación.
        changeDisplay(SHELL);
        //Guardo en la constante animationMarioDuration la duración de la animación de Mario y el caparazón.
        const ANIMATION_MARIO_DURATION = 5500;
        //Creo un setTimeout para que se ejecute el código de su interior una vez alcanzado el tiempo pasado por parámetro de la animación de Mario y el caparazón. De ésta forma, la animación se reinicia.
        setTimeout(() => {
            //Indico a la constante que tiene guardado el elemento <audio> con la canción de Mario que se pare.
            MARIO_THEME.pause();
            //Indico a la constante que tiene guardado el elemento <audio> con la canción de Mario que se reinicie.
            MARIO_THEME.currentTime = 0;
            //Cambio el display del botón de "none"  a "block" para hacerlo visible.
            changeDisplay(BUTTON);
            //Cambio el display de Mario de "block"  a "none" para hacerlo invisible.
            changeDisplay(MARIO);
            //Cambio el display del caparazón de "block"  a "none" para hacerlo invisible.
            changeDisplay(SHELL);
        }, ANIMATION_MARIO_DURATION);
    }, ANIMATION_TEXT_DURATION);
});