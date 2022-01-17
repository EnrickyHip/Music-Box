function* executaVariasVezes(num){
    //primeira vez
    let result = num + 5;
    yield result;

    //segunda vez
    result = num - 5;
    yield result;

    //terceira vez
    result = num *5;
    yield result
}

const gen = executaVariasVezes(10);

console.log(gen.next().value);
console.log(gen.next().value);
console.log(gen.next().value);