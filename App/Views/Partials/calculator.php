<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/css/calculator.css">
</head>

<button id="toggleCalc">Калькулятор</button>

<div id="calculator" style="display: none;">
  <div id="calcHeader">
    Калькулятор
    <button id="closeCalc">&times;</button>
  </div>
  <input type="text" id="calcDisplay" readonly />
  <div id="calcTooltip" style="color: red; font-size: 0.8em;"></div>
  <div id="calcHistory"></div>
  <div id="calcButtons"></div>
</div>

<script type="module">
  import { Calculator } from '/js/calculator/calculator.js';
  
  document.addEventListener('DOMContentLoaded', () => {
    const calculatorElement = document.getElementById('calculator');
    const toggleButton = document.getElementById('toggleCalc');
    const closeButton = document.getElementById('closeCalc');
    
    const calc = new Calculator();
    calc.initUI();
    
    // Функция для проверки видимости калькулятора
    function isCalculatorVisible() {
      return calculatorElement.style.display === 'block';
    }
    
    // Обработчик для кнопки переключения
    toggleButton.addEventListener('click', () => {
      if (isCalculatorVisible()) {
        calculatorElement.style.display = 'none';
      } else {
        calculatorElement.style.display = 'block';
      }
    });
    
    // Обработчик для кнопки закрытия
    closeButton.addEventListener('click', () => {
      calculatorElement.style.display = 'none';
    });
  });
</script>