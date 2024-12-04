const API_URL = 'https://pokeapi.co/api/v2/pokemon/';

// Manejar el evento de búsqueda
document.getElementById('search-pokemon').addEventListener('click', async () => {
    const pokemonNameOrId = document.getElementById('pokemon-name').value.toLowerCase().trim();
    const output = document.getElementById('output');

    if (!pokemonNameOrId) {
        output.textContent = 'Por favor, ingresa un nombre o ID de un Pokémon.';
        return;
    }

    try {
        // Solicitar datos del Pokémon
        const response = await fetch(`${API_URL}${pokemonNameOrId}`);
        if (!response.ok) throw new Error('Pokémon no encontrado');

        const pokemonData = await response.json();

        // Mostrar información del Pokémon
        output.innerHTML = `
            <h2>${pokemonData.name.toUpperCase()}</h2>
            <p><strong>ID:</strong> ${pokemonData.id}</p>
            <p><strong>Altura:</strong> ${pokemonData.height / 10} m</p>
            <p><strong>Peso:</strong> ${pokemonData.weight / 10} kg</p>
            <p><strong>Habilidades:</strong> ${pokemonData.abilities.map(a => a.ability.name).join(', ')}</p>
            <img src="${pokemonData.sprites.front_default}" alt="${pokemonData.name}">
        `;
    } catch (error) {
        console.error(error);
        output.textContent = 'No se pudo encontrar el Pokémon. Por favor, verifica el nombre o ID.';
    }
});