import { Calculator } from './calculator.js';

document.addEventListener('DOMContentLoaded', () => {
    const calc = new Calculator();
    calc.initUI();
});

export function initCalculatorUI() {
    const calculatorElement = document.getElementById('calculator');
    const toggleButton = document.getElementById('toggleCalc');
    const closeButton = document.getElementById('closeCalc');

    const calculator = new Calculator();
    calculator.initUI();

    toggleButton.addEventListener('click', () => {
        calculatorElement.style.display =
            calculatorElement.style.display === 'none' ? 'block' : 'none';
    });

    closeButton.addEventListener('click', () => {
        calculatorElement.style.display = 'none';
    });

}

initCalculatorUI();
