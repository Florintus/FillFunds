const OPERATORS = ['+', '-', '*', '/', '%'];
const FUNCTIONS = ['√', '^2'];

function tokenize(expr) {
    const tokens = [];
    let numberBuffer = '';

    const pushNumber = () => {
        if (numberBuffer.length) {
            tokens.push({ type: 'number', value: parseFloat(numberBuffer) });
            numberBuffer = '';
        }
    };

    for (let i = 0; i < expr.length; i++) {
        const ch = expr[i];

        if ('0123456789.'.includes(ch)) {
            numberBuffer += ch;
        } else {
            pushNumber();

            if (OPERATORS.includes(ch) || ch === '(' || ch === ')') {
                tokens.push({ type: 'operator', value: ch });
            } else if (ch === '√') {
                tokens.push({ type: 'function', value: 'sqrt' });
            } else if (ch === '^' && expr[i + 1] === '2') {
                tokens.push({ type: 'function', value: 'square' });
                i++; // пропускаем 2
            } else if (ch.trim() === '') {
                // игнор пробелов
            } else {
                throw new Error(`Недопустимый символ: ${ch}`);
            }
        }
    }
    pushNumber();
    return tokens;
}

function parse(tokens) {
    let pos = 0;

    function parseExpression() {
        let node = parseTerm();

        while (pos < tokens.length && (tokens[pos].value === '+' || tokens[pos].value === '-')) {
            const op = tokens[pos].value;
            pos++;
            const right = parseTerm();
            node = { type: 'binary', operator: op, left: node, right };
        }

        return node;
    }

    function parseTerm() {
        let node = parseFactor();

        while (pos < tokens.length && (tokens[pos].value === '*' || tokens[pos].value === '/' || tokens[pos].value === '%')) {
            const op = tokens[pos].value;
            pos++;
            const right = parseFactor();
            node = { type: 'binary', operator: op, left: node, right };
        }

        return node;
    }

    function parseFactor() {
        let token = tokens[pos];

        if (!token) throw new Error('Неожиданный конец выражения');

        if (token.type === 'number') {
            pos++;
            let node = { type: 'number', value: token.value };
            // Проверка на функцию после числа (например ^2)
            if (pos < tokens.length && tokens[pos].type === 'function') {
                const func = tokens[pos].value;
                pos++;
                if (func === 'square') {
                    node = { type: 'unary', operator: 'square', argument: node };
                } else {
                    throw new Error('Неизвестная функция после числа');
                }
            }
            return node;
        } else if (token.type === 'function') {
            pos++;
            if (token.value === 'sqrt') {
                // ожидание скобки
                if (!tokens[pos] || tokens[pos].value !== '(') throw new Error('Ожидалась "(" после sqrt');
                pos++;
                const argument = parseExpression();
                if (!tokens[pos] || tokens[pos].value !== ')') throw new Error('Ожидалась ")" после sqrt');
                pos++;
                return { type: 'unary', operator: 'sqrt', argument };
            }
            throw new Error('Неизвестная функция');
        } else if (token.value === '(') {
            pos++;
            const node = parseExpression();
            if (!tokens[pos] || tokens[pos].value !== ')') throw new Error('Ожидалась ")"');
            pos++;
            return node;
        } else if (token.value === '-') {
            pos++;
            const argument = parseFactor();
            return { type: 'unary', operator: 'negate', argument };
        } else {
            throw new Error(`Неожиданный токен: ${token.value}`);
        }
    }

    const ast = parseExpression();

    if (pos < tokens.length) throw new Error('Лишние символы в конце выражения');

    return ast;
}

function evaluate(node) {
    switch (node.type) {
        case 'number': return node.value;
        case 'binary': {
            const left = evaluate(node.left);
            const right = evaluate(node.right);
            switch (node.operator) {
                case '+': return left + right;
                case '-': return left - right;
                case '*': return left * right;
                case '/': if (right === 0) throw new Error('Деление на ноль'); return left / right;
                case '%': if (right === 0) throw new Error('Деление на ноль'); return left % right;
            }
        }
        case 'unary': {
            const arg = evaluate(node.argument);
            switch (node.operator) {
                case 'sqrt':
                    if (arg < 0) throw new Error('Корень из отрицательного числа');
                    return Math.sqrt(arg);
                case 'square': return arg * arg;
                case 'negate': return -arg;
            }
        }
    }
    throw new Error('Неизвестный тип узла');
}

export function safeEvaluate(expr) {
    const tokens = tokenize(expr);
    const ast = parse(tokens);
    return evaluate(ast);
}
