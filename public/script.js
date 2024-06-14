const bgAnimation = document.getElementById('bganimation');

const numberofboxers = 400;

for (let i = 0; i < numberofboxers; i++) {
    const colorbox = document.createElement('div');
    colorbox.classList.add('colorBox');
    bgAnimation.append(colorbox)
}