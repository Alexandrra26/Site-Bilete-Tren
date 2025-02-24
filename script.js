const ticketsData = [
    { id: 1, destinatie: "Târgul de Crăciun din Viena", pret: 100 },
    { id: 2, destinatie: "Târgul de Crăciun din Praga", pret: 80 },
    { id: 3, destinatie: "Târgul de Crăciun din Berlin", pret: 120 },
    { id: 4, destinatie: "Târgul de Crăciun din Budapesta", pret: 90 }
];

function applyDiscount(pret, categorie_varsta) {
    let pretFinal = pret;
    if (categorie_varsta === "Pensionar") {
        pretFinal *= 0.5;
    } else if (categorie_varsta === "Student") {
        pretFinal *= 0.6;
    } else if (categorie_varsta === "Elev") {
        pretFinal *= 0.2;
    }
    return pretFinal;
}

function generateTickets() {
    const buget = parseFloat(document.getElementById('buget').value);
    const container = document.getElementById('tickets-container');
    container.innerHTML = '';

    ticketsData.forEach(ticket => {
        const ticketElement = document.createElement('div');
        ticketElement.className = 'ticket';
        ticketElement.innerHTML = `
            <p>Destinație: ${ticket.destinatie}</p>
            <p>Preț inițial: ${ticket.pret} EUR</p>
            <label for="categorie_varsta_${ticket.id}">Categorie Vârstă:</label>
            <select id="categorie_varsta_${ticket.id}" name="categorie_varsta" onchange="updatePrice(${ticket.id}, ${ticket.pret})">
                <option value="Adult">Adult</option>
                <option value="Student">Student</option>
                <option value="Elev">Elev</option>
                <option value="Pensionar">Pensionar</option>
            </select>
            <label for="numar_bilete_${ticket.id}">Număr bilete:</label>
            <input type="number" id="numar_bilete_${ticket.id}" name="numar_bilete" value="1" min="1" onchange="updatePrice(${ticket.id}, ${ticket.pret})">
            <p>Preț final: <span id="pret_final_${ticket.id}">${ticket.pret}</span> EUR</p>
            <button type="button" onclick="selectTicket(${ticket.id})">Selectează</button>
        `;
        container.appendChild(ticketElement);
    });
}

function updatePrice(ticketId, pretInitial) {
    const categorie_varsta = document.getElementById(`categorie_varsta_${ticketId}`).value;
    const numar_bilete = document.getElementById(`numar_bilete_${ticketId}`).value;
    const pretFinal = applyDiscount(pretInitial, categorie_varsta) * numar_bilete;
    document.getElementById(`pret_final_${ticketId}`).textContent = pretFinal.toFixed(2);
}

function selectTicket(ticketId) {
    const ticket = ticketsData.find(t => t.id === ticketId);
    const categorie_varsta = document.getElementById(`categorie_varsta_${ticketId}`).value;
    const numar_bilete = document.getElementById(`numar_bilete_${ticketId}`).value;
    const pretFinal = parseFloat(document.getElementById(`pret_final_${ticketId}`).textContent);
    const container = document.getElementById('selected-tickets-container');
    
    const ticketElement = document.createElement('div');
    ticketElement.className = 'selected-ticket';
    ticketElement.innerHTML = `
        <p>Destinație: ${ticket.destinatie}</p>
        <p>Preț: ${pretFinal} EUR</p>
        <p>Categorie Vârstă: ${categorie_varsta}</p>
        <label for="nume">Nume:</label>
        <input type="text" name="nume" required>
        <label for="prenume">Prenume:</label>
        <input type="text" name="prenume" required>
        <label for="data_plecarii">Data Plecării:</label>
        <input type="date" name="data_plecarii" required>
        <label for="numar_bilete">Număr bilete:</label>
        <input type="number" name="numar_bilete" value="${numar_bilete}" readonly>
        <button type="button" onclick="removeTicket(this)">Șterge</button>
        <input type="hidden" name="categorie_varsta" value="${categorie_varsta}">
        <input type="hidden" name="pret" value="${pretFinal}">
    `;
    container.appendChild(ticketElement);
}

function removeTicket(button) {
    button.parentElement.remove();
}

function prepareBookingData() {
    const tickets = [];
    const selectedTickets = document.querySelectorAll('.selected-ticket');
    
    selectedTickets.forEach(ticket => {
        const nume = ticket.querySelector('input[name="nume"]').value;
        const prenume = ticket.querySelector('input[name="prenume"]').value;
        const data_plecarii = ticket.querySelector('input[name="data_plecarii"]').value;
        const categorie_varsta = ticket.querySelector('input[name="categorie_varsta"]').value;
        const buget = parseFloat(ticket.querySelector('input[name="pret"]').value);
        const numar_bilete = ticket.querySelector('input[name="numar_bilete"]').value;
        
        tickets.push({ nume, prenume, data_plecarii, categorie_varsta, buget, numar_bilete });
    });

    document.getElementById('booking-form').bilete.value = JSON.stringify(tickets);
    return true;
}
