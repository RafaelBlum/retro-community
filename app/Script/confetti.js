alert('asdsadas')
import JSConfetti from 'js-confetti';

const jsConfetti = new JSConfetti();

// Adicione um event listener ao botão
document.getElementById('confettiButton').addEventListener('click', () => {
    jsConfetti.addConfetti({
        emojis: ['⭐'],
        confettiNumber: 20, // Opcional: quantidade de confetes
    });
});



// window.confetti = ()=> jsConfetti.addConfetti(
//     {
//         emojis: ['⭐'],
//     }
// );
