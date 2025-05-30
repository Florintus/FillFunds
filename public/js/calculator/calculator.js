import { safeEvaluate } from './parser.js';

export class Calculator {
    constructor() {
        this.display = document.getElementById('calcDisplay');
        this.historyBox = document.getElementById('calcHistory');
        this.tooltip = document.getElementById('calcTooltip');
        this.buttonsContainer = document.getElementById('calcButtons');
        this.history = JSON.parse(localStorage.getItem('calcHistory') || '[]');
        this.localeDecimal = ',';    // для отображения
        this.internalDecimal = '.';  // для вычислений
        this.supportedOperators = ['+', '-', '*', '/', '%'];

        this.justCalculated = false;  // флаг, что только что сделали =
        this.lastOperator = null;     // последний введенный оператор
    }

    closeCalculator() {
        document.getElementById('calculator').style.display = 'none';
    }

    initUI() {
        const buttons = [
            '%', 'CE', 'C', '⌫',
            '1/x', 'x²', '√', '/',
            '7', '8', '9', '*',
            '4', '5', '6', '-',
            '1', '2', '3', '+',
            '0', this.localeDecimal, '='
        ];

        buttons.forEach(btn => {
            const b = document.createElement('button');
            b.textContent = btn;
            b.addEventListener('click', () => this.handlePress(btn));
            if (btn === '0') b.style.gridColumn = 'span 2';
            if (btn === '=') {
                b.style.background = '#0078D7';
                b.style.color = '#fff';
            }
            this.buttonsContainer.appendChild(b);
        });

        this.display.value = this.convertInternalToLocale(this.display.value);

        this.updateHistory();
        this.enableDrag();
        this.setupKeyboard();
    }

    handlePress(value) {
        this.tooltip.textContent = '';

        const operators = this.supportedOperators;
        const current = this.convertLocaleToInternal(this.display.value);
        const lastChar = current.slice(-1);

        // Очистка после результата при вводе цифры или разделителя
        if (this.justCalculated && (/\d/.test(value) || value === this.localeDecimal)) {
            this.display.value = '';
            this.justCalculated = false;
            this.lastOperator = null;
        }

        // Если нажали оператор
        if (operators.includes(value)) {
            // Если только что было вычисление
            if (this.justCalculated) {
                this.display.value = this.display.value + this.convertInternalToLocale(value);
                this.justCalculated = false;
                this.lastOperator = value;
                return;
            }

            // Проверяем есть ли в выражении операторы
            const hasOperator = this.supportedOperators.some(op => current.includes(op));

            // Если последний символ оператор И в выражении уже есть оператор
            if (lastChar && operators.includes(lastChar) && hasOperator) {
                // Вычисляем выражение
                this.calculate();
                this.justCalculated = true;

                // Если нажали тот же оператор - выходим
                if (value === lastChar) {
                    return;
                }

                // Если нажали другой оператор - добавляем его
                this.display.value += this.convertInternalToLocale(value);
                this.justCalculated = false;
                return;
            }

            // Если выражение заканчивается числом и есть оператор
            if (hasOperator && !operators.includes(lastChar)) {
                // Вычисляем выражение
                this.calculate();
                return;
            }

            // Если выражение пустое
            if (current === '') {
                this.display.value = '0' + this.convertInternalToLocale(value);
            }
            // Если нет операторов в выражении
            else if (!hasOperator) {
                this.display.value += this.convertInternalToLocale(value);
            }

            this.lastOperator = value;
            this.justCalculated = false;
            return;
        }

        // Если нажали '=' - считаем
        if (value === '=') {
            this.calculate();
            this.justCalculated = true;
            this.lastOperator = null;
            return;
        }

        // Обработка остальных кнопок
        switch (value) {
            case 'C':
                this.clearAll();
                this.justCalculated = false;
                this.lastOperator = null;
                break;
            case 'CE':
                this.clearEntry();
                this.justCalculated = false;
                this.lastOperator = null;
                break;
            case '⌫':
                this.backspace();
                this.justCalculated = false;
                this.lastOperator = null;
                break;
            case '1/x':
                this.appendFunction('1/(', ')');
                this.justCalculated = false;
                this.lastOperator = null;
                break;
            case 'x²':
                this.appendFunction('(', ')^2');
                this.justCalculated = false;
                this.lastOperator = null;
                break;
            case '√':
                this.appendFunction('√(', ')');
                this.justCalculated = false;
                this.lastOperator = null;
                break;
            default:
                this.appendToDisplay(value);
                this.justCalculated = false;
                this.lastOperator = null;
        }
    }

    appendFunction(prefix, suffix) {
        this.display.value += prefix + this.convertLocaleToInternal(this.display.value) + suffix;
    }

    appendToDisplay(val) {
        if (val === this.localeDecimal) {
            val = this.internalDecimal;
        }
        this.display.value += val;
    }

    clearAll() {
        this.display.value = '';
        this.tooltip.textContent = '';
    }

    clearEntry() {
        this.display.value = this.display.value.replace(/[\d.,]+$/, '');
    }

    backspace() {
        if (this.display.value === 'Ошибка') this.display.value = '';
        else this.display.value = this.display.value.slice(0, -1);
    }

    calculate() {
        let expr = this.convertLocaleToInternal(this.display.value.trim());

        if (!expr) return;

        const lastChar = expr.slice(-1);
        if (this.supportedOperators.includes(lastChar)) {
            // Дублируем последний операнд после оператора
            const match = expr.match(/(-?[\d.]+)(?!.*[\d.])/);
            if (match) {
                const lastNumber = match[1];
                expr += lastNumber;
            } else {
                expr = expr.slice(0, -1);
            }
        }

        try {
            const result = safeEvaluate(expr);

            if (isNaN(result) || !isFinite(result)) throw new Error();

            this.display.value = this.convertInternalToLocale(result.toString());
            this.saveHistory(expr, result);
            this.tooltip.textContent = '';
            this.display.style.border = '';
            this.justCalculated = true;
        } catch (e) {
            this.display.value = 'Ошибка';
            this.tooltip.textContent = e.message || 'Некорректное выражение';
            this.highlightError();
        }
    }

    convertLocaleToInternal(value) {
        if (typeof value !== 'string') return value;
        return value.replace(new RegExp(this.localeDecimal, 'g'), this.internalDecimal);
    }

    convertInternalToLocale(value) {
        if (typeof value !== 'string') return value;
        return value.replace(new RegExp('\\' + this.internalDecimal, 'g'), this.localeDecimal);
    }

    saveHistory(expression, result) {
        const record = `${this.convertInternalToLocale(expression)} = ${this.convertInternalToLocale(result.toString())}`;
        this.history.unshift(record);
        this.history = this.history.slice(0, 10);
        localStorage.setItem('calcHistory', JSON.stringify(this.history));
        this.updateHistory();
    }

    updateHistory() {
        this.historyBox.textContent = '';
        this.history.forEach(entry => {
            const div = document.createElement('div');
            div.textContent = entry;
            this.historyBox.appendChild(div);
        });
    }

    highlightError() {
        this.display.style.border = '2px solid red';
        setTimeout(() => this.display.style.border = '', 1000);
    }

    enableDrag() {
        const header = document.getElementById('calcHeader');
        const calculator = document.getElementById('calculator');
        let offsetX = 0, offsetY = 0, isDown = false;

        header.addEventListener('mousedown', (e) => {
            isDown = true;
            offsetX = e.clientX - calculator.offsetLeft;
            offsetY = e.clientY - calculator.offsetTop;
        });

        document.addEventListener('mouseup', () => isDown = false);

        document.addEventListener('mousemove', (e) => {
            if (isDown) {
                let left = e.clientX - offsetX;
                let top = e.clientY - offsetY;

                const maxLeft = window.innerWidth - calculator.offsetWidth;
                const maxTop = window.innerHeight - calculator.offsetHeight;

                calculator.style.left = Math.min(Math.max(0, left), maxLeft) + 'px';
                calculator.style.top = Math.min(Math.max(0, top), maxTop) + 'px';
            }
        });
    }

    setupKeyboard() {
        window.addEventListener('keydown', (e) => {
            let key = e.key;

            if (key === ',') key = this.internalDecimal;

            const keyMap = {
                'Enter': '=',
                'Escape': 'C',
                'Backspace': '⌫',
            };

            key = keyMap[key] || key;

            if (/\d/.test(key) || this.supportedOperators.includes(key) || key === '.' || key === '=' || key === 'C' || key === '⌫') {
                this.handlePress(key);
                e.preventDefault();
            }
        });
    }
}