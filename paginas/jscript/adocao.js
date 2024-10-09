document.addEventListener('DOMContentLoaded', () => {
    loadStates();
    document.getElementById('estado').addEventListener('change', loadCities);
});

async function loadStates() {
    try {
        const response = await fetch('https://servicodados.ibge.gov.br/api/v2/estados');
        const states = await response.json();

        const estadoSelect = document.getElementById('estado');
        states.forEach(state => {
            const option = document.createElement('option');
            option.value = state.sigla;
            option.textContent = state.nome;
            estadoSelect.appendChild(option);
        });
    } catch (error) {
        console.error('Erro ao carregar os estados:', error);
    }
}

async function loadCities() {
    const estado = document.getElementById('estado').value;
    try {
        const response = await fetch(`https://servicodados.ibge.gov.br/api/v2/malhas/${estado}`);
        const cities = await response.json();

        const cidadeSelect = document.getElementById('cidade');
        cidadeSelect.innerHTML = '<option value="">Selecione a cidade</option>'; // Limpar cidades anteriores

        // Aqui assumimos que cities é um array de objetos que contém a cidade
        // Caso contrário, você precisará ajustar isso de acordo com a estrutura dos dados.
        cities.forEach(city => {
            const option = document.createElement('option');
            option.value = city.id; // Se city.id não existir, utilize outro identificador.
            option.textContent = city.nome; // Verifique a estrutura do objeto para usar o campo correto.
            cidadeSelect.appendChild(option);
        });
    } catch (error) {
        console.error('Erro ao carregar as cidades:', error);
    }
}


function filtrar() {
    const tipo = document.getElementById('tipoanimal').value;
    const genero = document.getElementById('generoanimal').value;
    const idade = document.getElementById('idade').value;
    const racaCachorro = document.getElementById('cachorroRaca').value;
    const racaGato = document.getElementById('gatoRaca').value;
    const porte = document.getElementById('porte').value;
    const corCachorro = document.getElementById('cachorrocor').value;
    const corGato = document.getElementById('gatocor').value;
    const estado = document.getElementById('estado').value;
    const cidade = document.getElementById('cidade').value;
    const ongs = document.getElementById('ongs').value;

    const cards = document.querySelectorAll('.animal-card');
    cards.forEach(card => {
        const cardTipo = card.dataset.tipo;
        const cardGenero = card.dataset.genero;
        const cardIdade = card.dataset.idade;
        const cardRaca = card.dataset.raca;
        const cardPorte = card.dataset.porte;
        const cardCor = card.dataset.cor;

        const isTipoMatch = !tipo || cardTipo === tipo;
        const isGeneroMatch = !genero || cardGenero === genero;
        const isIdadeMatch = !idade || cardIdade <= idade; // Adaptação na lógica de idade
        const isRacaMatch = (tipo === 'cachorro' && (!racaCachorro || cardRaca === racaCachorro)) ||
                            (tipo === 'gato' && (!racaGato || cardRaca === racaGato));
        const isPorteMatch = !porte || cardPorte === porte;
        const isCorMatch = (tipo === 'cachorro' && (!corCachorro || cardCor === corCachorro)) ||
                            (tipo === 'gato' && (!corGato || cardCor === corGato));
        const isEstadoMatch = !estado || card.dataset.estado === estado;
        const isCidadeMatch = !cidade || card.dataset.cidade === cidade;
        const isOngMatch = !ongs || card.dataset.ong === ongs;

        if (isTipoMatch && isGeneroMatch && isIdadeMatch && isRacaMatch && isPorteMatch && isCorMatch && isEstadoMatch && isCidadeMatch && isOngMatch) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}
