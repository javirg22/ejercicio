function convertirCelsiusAFahrenheit(celsius) {
    return celsius * 1.8 + 32;
}

// Asignamos un valor a la variable celsius
let celsius = 25;

// Llamamos a la función con el valor de celsius
let resultado = convertirCelsiusAFahrenheit(celsius);

// Mostramos el resultado en la consola
console.log(`El resultado en Fahrenheit es: ${resultado}`);
