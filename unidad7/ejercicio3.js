function encontrarNumeroMasGrande(array) {
    let mayor = array[0]; // Inicializa con el primer elemento del array
    
    for (let i = 1; i < array.length; i++) {
        if (array[i] > mayor) {
            mayor = array[i]; // Actualiza el número mayor encontrado
        }
    }
    return mayor;
}

// Ejemplo de uso
const numeros = [12, 45, 67, 93, 89, 34];
const resultado = encontrarNumeroMasGrande(numeros);
console.log(`El número más grande es: ${resultado}`);
