<!-- modern_calculator.php -->

<style>
:root {
  --bg-color: #f0f0f0;
  --text-color: #000;
  --display-bg: #fff;
  --display-color: #000;
  --button-bg: #e0e0e0;
  --button-color: #000;
  --button-hover: #ccc;
  --history-bg: #fff;
  --history-color: #333;
}
body.dark {
  --bg-color: #1e1e1e;
  --text-color: #fff;
  --display-bg: #2c2c2c;
  --display-color: #fff;
  --button-bg: #2c2c2c;
  --button-color: #fff;
  --button-hover: #3d3d3d;
  --history-bg: #2c2c2c;
  --history-color: #ccc;
}
#calculator {
  position: fixed;
  top: 100px;
  left: 100px;
  width: 320px;
  background: var(--bg-color);
  border-radius: 10px;
  padding: 10px;
  color: var(--text-color);
  font-family: sans-serif;
  box-shadow: 0 0 20px rgba(0,0,0,0.5);
  z-index: 1000;
}
#calcHeader {
  cursor: move;
  padding: 5px;
  text-align: center;
  font-weight: bold;
  background: var(--button-bg);
  border-radius: 8px 8px 0 0;
}
#calcHeader button {
  float: right;
  background: none;
  color: var(--button-color);
  border: none;
  font-size: 16px;
}
#calcDisplay {
  width: 100%;
  background: var(--display-bg);
  color: var(--display-color);
  border: none;
  font-size: 24px;
  text-align: right;
  margin-bottom: 5px;
}
#calcHistory {
  height: 60px;
  overflow-y: auto;
  font-size: 12px;
  background: var(--history-bg);
  color: var(--history-color);
  padding: 5px;
  border-radius: 4px;
  margin-bottom: 8px;
}
#calculator button {
  background: var(--button-bg);
  border: none;
  padding: 15px;
  color: var(--button-color);
  font-size: 16px;
  border-radius: 4px;
  cursor: pointer;
}
#calculator button:hover {
  background: var(--button-hover);
}
</style>

<div id="calculator">
  <div id="calcHeader">
    Калькулятор
    <button onclick="document.getElementById('calculator').style.display='none'">&times;</button>
  </div>
  <input type="text" id="calcDisplay" readonly>
  <div id="calcHistory"></div>
  <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 5px;">
    <button onclick="calcPress('%')">%</button>
    <button onclick="calcClearEntry()">CE</button>
    <button onclick="calcClear()">C</button>
    <button onclick="calcBackspace()">⌫</button>

    <button onclick="calcPress('1/')">1/x</button>
    <button onclick="calcPress('**2')">x²</button>
    <button onclick="calcPress('sqrt')">√</button>
    <button onclick="calcPress('/')">/</button>

    <button onclick="calcPress('7')">7</button>
    <button onclick="calcPress('8')">8</button>
    <button onclick="calcPress('9')">9</button>
    <button onclick="calcPress('*')">×</button>

    <button onclick="calcPress('4')">4</button>
    <button onclick="calcPress('5')">5</button>
    <button onclick="calcPress('6')">6</button>
    <button onclick="calcPress('-')">-</button>

    <button onclick="calcPress('1')">1</button>
    <button onclick="calcPress('2')">2</button>
    <button onclick="calcPress('3')">3</button>
    <button onclick="calcPress('+')">+</button>

    <button onclick="calcPress('0')" style="grid-column: span 2;">0</button>
    <button onclick="calcPress('.')">,</button>
    <button onclick="calcPress('=')" style="background: #0078D7; color: white;">=</button>
  </div>
</div>

<script>
let history = [];
let lastResult = null;

function calcPress(val) {
  const display = document.getElementById('calcDisplay');
  const historyBox = document.getElementById('calcHistory');

  if (display.value === 'Ошибка' && /[0-9.]/.test(val)) {
    display.value = '';
  }

  if (val === '=') {
    let expr = display.value.trim();

    try {
      if (/^[\d.]+[\+\-\*\/]$/.test(expr)) {
        const lastNum = expr.match(/[\d.]+$/)[0];
        expr += lastNum;
      }

      expr = expr.replace(/sqrt\(([^)]+)\)/g, 'Math.sqrt($1)');
      expr = expr.replace(/([0-9.]+)\s*\*\*2/, 'Math.pow($1,2)');
      expr = expr.replace(/1\/([0-9.]+)/, '(1/$1)');

      const result = eval(expr);
      display.value = result;
      history.unshift(expr + ' = ' + result);
      historyBox.innerHTML = history.slice(0, 5).map(h => '<div>' + h + '</div>').join('');
    } catch {
      display.value = 'Ошибка';
    }
  } else if (val === 'sqrt') {
    display.value = `sqrt(${display.value})`;
  } else {
    display.value += val;
  }
}

function calcClear() {
  document.getElementById('calcDisplay').value = '';
}
function calcClearEntry() {
  const disp = document.getElementById('calcDisplay');
  disp.value = disp.value.replace(/[\d.]+$/, '');
}
function calcBackspace() {
  const disp = document.getElementById('calcDisplay');
  if (disp.value === 'Ошибка') disp.value = '';
  else disp.value = disp.value.slice(0, -1);
}

// Перетаскивание
const calc = document.getElementById('calculator');
const header = document.getElementById('calcHeader');
let offsetX = 0, offsetY = 0, isDown = false;

header.addEventListener('mousedown', function(e) {
  isDown = true;
  offsetX = e.clientX - calc.offsetLeft;
  offsetY = e.clientY - calc.offsetTop;
});
window.addEventListener('mouseup', () => isDown = false);
window.addEventListener('mousemove', function(e) {
  if (isDown) {
    calc.style.left = (e.clientX - offsetX) + 'px';
    calc.style.top = (e.clientY - offsetY) + 'px';
  }
});

// Поддержка клавиатуры
window.addEventListener('keydown', function(e) {
  const keyMap = {
    'Enter': '=',
    'Escape': 'C',
    'Backspace': 'back',
    ',': '.'
  };
  let key = e.key;
  if (key in keyMap) key = keyMap[key];

  if (!isNaN(key) || ['+', '-', '*', '/', '.', '%'].includes(key)) {
    calcPress(key);
  } else if (key === '=') {
    calcPress('=');
  } else if (key === 'C') {
    calcClear();
  } else if (key === 'back') {
    calcBackspace();
  }
});

// Тема по localStorage
window.addEventListener('DOMContentLoaded', () => {
  const savedTheme = localStorage.getItem('theme');
  if (savedTheme === 'dark') document.body.classList.add('dark');
});

// Пример кнопки переключения темы
function toggleTheme() {
  document.body.classList.toggle('dark');
  localStorage.setItem('theme', document.body.classList.contains('dark') ? 'dark' : 'light');
}
</script>
